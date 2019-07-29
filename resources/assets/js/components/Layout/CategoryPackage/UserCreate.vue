<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h5 class="m-0">{{$route.meta.type}} {{$route.meta.title}}</h5>
                </div>
                <div class="card-body">
                    <el-form ref="form" @submit.native.prevent="onSubmit" label-position="labelPosition" size="small"
                             label-width="200px" :model="form">
                        <el-form-item :class="errors.name ? 'is-error is-required' : ''" label="Name">
                            <el-input type="text" required v-model="form.name"></el-input>
                            <div v-if="errors.name" v-for="error in errors.name" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.email ? 'is-error is-required' : ''" label="Email">
                            <el-input type="email" required v-model="form.email"></el-input>
                            <div v-if="errors.email" v-for="error in errors.email" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.password ? 'is-error is-required' : ''" label="Password">
                            <el-input type="password" required v-model="form.password"></el-input>
                            <div v-if="errors.password" v-for="error in errors.password" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.confirm_password ? 'is-error is-required' : ''"
                                      label="Confirm Password">
                            <el-input type="password" required v-model="form.confirm_password"></el-input>
                            <div v-if="errors.confirm_password" v-for="error in errors.confirm_password"
                                 class="el-form-item__error">
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
        <div class="col-lg-6">
            <div class="card" :class="errors.roles ? 'card-danger' : ''">

                <div class="card-header">
                    <h5 class="m-0">Roles</h5>
                </div>
                <div class="card-body">
                    <el-checkbox :indeterminate="isIndeterminate" v-model="checkAllRoles"
                                 @change="handleCheckAllRolesChange">Check all
                    </el-checkbox>
                    <div style="margin: 15px 0;"></div>
                    <el-checkbox-group v-model="checkRoles" @change="handleCheckedRolesChange">
                        <el-checkbox v-for="(role, index) in roles" :label="role.id" :key="role.id">
                            {{role.display_name}}
                        </el-checkbox>
                    </el-checkbox-group>
                </div>

            </div>
            <div v-if="isUser" class="card">

                <div class="card-header">
                    <h5 class="m-0">User Division</h5>
                </div>
                <div class="card-body">
                    <el-form label-width="200px" size="small">
                        <el-form-item :class="errors['division.name'] ? 'is-error is-required' : ''"
                                      label="Code">
                            <el-input required v-model="division.name"></el-input>
                            <div v-if="errors['division.name']" v-for="error in errors['division.name']"
                                 class="el-form-item__error">
                                Division Code field is required
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors['division.station'] ? 'is-error is-required' : ''"
                                      label="Station">
                            <el-input required v-model="division.station"></el-input>
                            <div v-if="errors['division.station']" v-for="error in errors['division.station']"
                                 class="el-form-item__error">
                                Division Station is required
                            </div>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                isDisabled: false,
                labelPosition: 'left',
                errors: {
                    division: {
                        name: '',
                        station: ''
                    }
                },
                form: {
                    name: '',
                    email: '',
                    password: '',
                    confirm_password: '',


                },
                division: {name: '', station: ''},
                checkAllRoles: false,
                //checkAllPermissions: false,
                isIndeterminate: true,
                roles: [],
                checkRoles: [],
                isUser: false
                //permissions: [],
                //checkPermissions: [],

            }
        },

        beforeRouteEnter (to, from, next) {
            if (to.params.id) {
                axios.get(`/api/${to.meta.url}/${to.params.id}`).then(function (response) {
                    next(vm => vm.setData(response.data))
                })
            } else {
                axios.get(`/api/${to.meta.url}/create`).then(function (response) {
                    next(vm => vm.setData(response.data))
                })

            }
        },
        beforeRouteUpdate (to, from, next) {
            var vm = this
            if (to.params.id) {
                axios.get(`/api/${to.meta.url}/${to.params.id}`).then(function (response) {
                    vm.setData(response.data)
                    next()
                })
            } else {
                next()
            }


        },
        methods: {
            contains(a, obj) {
                var i = a.length;
                while (i--) {
                    if (a[i] === obj) {
                        return true;
                    }
                }
                return false;
            },
            handleCheckAllRolesChange(val) {
                var vm = this
                vm.checkRoles = val ? _.map(vm.roles, 'id') : [];
                vm.isIndeterminate = false;
            },
            /*handleCheckAllPermissionsChange(val) {
             var vm = this
             vm.checkRoles = val ? _.map(vm.permissions, 'name') : [];
             vm.isIndeterminate = false;
             },*/
            handleCheckedRolesChange(value) {

                let vm = this, checkedCount = value.length;
                vm.contains(value, 3) ? vm.isUser = true : vm.isUser = false
                vm.checkAllRole = checkedCount === vm.roles.length;
                vm.isIndeterminate = checkedCount > 0 && checkedCount < vm.roles.length;
            },
            /* handleCheckedPermissionsChange(value) {
             let vm = this, checkedCount = value.length;
             vm.checkAllRole = checkedCount === vm.permissions.length;
             vm.isIndeterminate = checkedCount > 0 && checkedCount < vm.permissions.length;
             },*/
            onSubmit(){
                let vm = this
                vm.isDisabled = true
                vm.errors = []
                var form = _.clone(vm.form)
                form.roles = vm.checkRoles
                if(vm.isUser){
                    form['division'] = vm.division
                }

                //vm.form.permissions = vm.checkPermissions
                axios.post('/api/' + vm.$route.meta.url, form)
                    .then(function (response) {
                        vm.$message({message: response.statusText, type: 'success'})
                        vm.isDisabled = false
                    })
                    .catch(function (error) {
                        if (error.response.data.errors && error.response.data.message) {
                            vm.errors = error.response.data.errors;
                            vm.$message({message: error.response.data.message, type: 'error'})
                        }
                        vm.isDisabled = false
                    });
            },
            setData (row) {
                var vm = this
                vm.roles = row.roles
                if (row.user) {

                    vm.form = row.user
                    vm.division = row.user.division
                    vm.checkRoles = _.map(vm.form.roles, 'id');
                    vm.contains(vm.checkRoles, 3) ? vm.isUser = true : vm.isUser = false
                    //vm.checkPermissions = _.map(vm.form.permissions, 'id');
                } else {
                    vm.isUser = true
                    vm.checkRoles = [3]
                }


                //vm.permissions = row.permissions

            }
        },
    }
</script>