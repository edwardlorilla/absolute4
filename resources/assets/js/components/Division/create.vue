<template>
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header">
                    <h5 class="m-0">{{$route.meta.type}} {{$route.meta.title}}</h5>
                </div>
                <div class="card-body">
                    <el-form ref="form" @submit.native.prevent="onSubmit" :label-position="labelPosition" size="small"
                             label-width="100px" :model="form">
                        <el-form-item :class="errors.name ? 'is-error is-required' : ''" label="Code">
                            <el-input required v-model="form.name"></el-input>
                            <div v-if="errors.name" v-for="error in errors.name" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.station ? 'is-error is-required' : ''" label="Station">
                            <el-input required v-model="form.station"></el-input>
                            <div v-if="errors.station" v-for="error in errors.station" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.supply_division ? 'is-error is-required' : ''"
                                      label="Head Of Office">
                            <div class="row">
                                <div class="col-sm text-right">
                                    <button type="button" @click="isAddUser = !isAddUser"
                                            class="btn btn-sm btn-link">Add User
                                    </button>

                                </div>
                            </div>
                            <el-select
                                    style="width: 100%;"
                                    v-model="form.user_id"
                                    filterable
                                    remote
                                    size="small"
                                    value-key="id"
                                    required
                                    placeholder="Please a User keyword"
                                    :remote-method="search_user"
                                    :loading="loading">
                                <el-option
                                        style="padding: 0px;"
                                        v-for="(item, index) in users"
                                        :key="item.value.id"
                                        :label="item.label"
                                        :value="item.value.id">
                                    <div style="padding: 0 20px;">
                                        <span style="float: left">{{ item.label }}</span>
                                        <span style="float: right; color: #8492a6; font-size: 13px">{{ item.value.email }}</span>
                                    </div>

                                </el-option>
                            </el-select>
                            <div>
                                <el-dialog
                                        title="Add User"
                                        :visible.sync="isAddUser">

                                    <el-form size="small" label-width="120px" :model="user" status-icon ref="user">
                                        <el-form-item label="Name" prop="name" :rules="$root.validate.required">
                                            <el-input type="text" v-model="user.name"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Email" prop="email" :rules="$root.validate.required">
                                            <el-input type="email" v-model="user.email"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Address" prop="address"

                                                      :rules="$root.validate.required">
                                            <el-input type="text" v-model="user.address"></el-input>
                                        </el-form-item>
                                        <el-form-item label="Password" prop="password"
                                                      :class="errors.password ? 'is-error is-required' : ''">
                                            <el-input type="password" v-model="user.password"
                                            ></el-input>
                                            <div v-if="errors.password" v-for="error in errors.password" class="el-form-item__error">
                                                {{error}}
                                            </div>
                                        </el-form-item>
                                        <el-form-item label="Confirm Password" prop="confirm_password"
                                                      :class="errors.confirm_password ? 'is-error is-required' : ''">
                                            <el-input type="password" v-model="user.confirm_password"
                                            ></el-input>
                                            <div v-if="errors.confirm_password" v-for="error in errors.confirm_password" class="el-form-item__error">
                                                {{error}}
                                            </div>
                                        </el-form-item>
                                    </el-form>


                                    <span slot="footer" class="dialog-footer">
    <el-button @click="isAddUser = false">Cancel</el-button>
    <el-button type="primary" @click="onUserSubmit">Confirm</el-button>
  </span>
                                </el-dialog>
                            </div>
                            <div v-if="errors.user_id" v-for="error in errors.user_id" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmit" :loading="isDisabled">{{$route.meta.type}}
                            </el-button>
                            <el-button @click="$router.push('/' + $route.meta.url)">Cancel</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import Operation from './OperationMixin'
    export default {
        mixins: [Operation],
        data(){
            return {
                isAddUser: false,
                form: {
                    name: '',
                    user_id: '',
                    station: ''
                },
                users: [],
                user: {
                    name: '',
                    email: '',
                    address: '',
                    password: '',
                    confirm_password: '',
                    roles: [3] // user
                },
                loading: false,
                errors:{}
            }
        },
        methods: {

            onUserSubmit(){
                var vm = this;
                this.$refs.user.validate((valid) => {
                    if (valid) {

                        axios.post('/api/users', vm.user).then(function (response) {
                            vm.users = [{value: response.data, label: response.data.name}]
                            vm.form.user_id = response.data.id
                            vm.isAddUser = false;
                            vm.user = {
                                name: '',
                                email: '',
                                address: '',
                                password: '',
                                confirm_password: '',
                                roles: [3] // user
                            }
                        }).catch(function (error) {
                            if (error.response.data.errors && error.response.data.errors && error.response.data.message) {
                                vm.errors = error.response.data.errors;
                                vm.$message({message: error.response.data.message, type: 'error'})
                            }else{
                                vm.$message({ message: error.statusText, type: 'warning' });
                            }
                            vm.isDisabled = false
                        })
                    } else {
                        return false;
                    }
                });


            },
            getUser(query){
                return axios.get('/api/search/users?search=' + query)
            },
            search_user(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchUser(query, vm)
                } else {
                    vm.loading = false
                    vm.units = []
                }
            },
            onSearchUser: _.debounce(function (query, vm) {
                vm.getUser(query).then(function (q) {
                    vm.loading = false
                    vm.users = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
        }
    }
</script>