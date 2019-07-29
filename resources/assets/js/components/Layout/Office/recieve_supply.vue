<template>
    <div class="card">
        <div class="card-header">
            Request Items
        </div>
        <div class="card-body">
            <div>
                <el-form ref="form" @submit.native.prevent="onSubmit" :label-position="labelPosition" size="mini"
                         :model="form">

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <div v-if="!isAddDivision">
                                    <div class="row" >
                                        <div class="col-sm"><label for="division" class="el-form-item__label">Division</label></div>
                                        <div class="col-sm text-right">
                                            <button type="button" v-if="!isAddDivision" @click="isAddDivision = !isAddDivision"
                                                    class="btn btn-sm btn-link">Add Division
                                            </button>

                                        </div>

                                    </div>
                                    <el-select
                                            style="width:100%;"
                                            :disabled="selectDivision"
                                            v-model="form.division"
                                            remote
                                            clearable
                                            filterable
                                            placeholder="Please enter a keyword"
                                            :remote-method="searchDivision"
                                            default-first-option
                                            :loading="loadingDivision">
                                        <el-option
                                                v-for="(item, index) in optionDivision"
                                                :key="index"
                                                :label="item.label"
                                                :value="item.value">
                                        </el-option>
                                    </el-select>
                                </div>

                                <div v-else>
                                    <div class="input-group input-group-sm">
                                        <input placeholder="Division Name" v-model="division_name" type="text"
                                               class="form-control">
                                        <input placeholder="Supply Division Name" v-model="division_supply"
                                               class="form-control" type="text">
                                        <span class="input-group-append">
                                            <button @click="addDivision" type="button" class="btn btn-success">Create Division</button>
                                            <button class="btn btn-default" type="button"
                                                    @click="isAddDivision = false">Cancel</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3>Add Items</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Current Stock</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <el-select
                                                :disabled="select"
                                                v-model="addTable.name"
                                                @change="onChange"
                                                remote
                                                clearable
                                                filterable
                                                placeholder="Please enter a keyword"
                                                :remote-method="search_"
                                                :loading="loading">
                                            <el-option
                                                    v-for="(item, index) in options"
                                                    :key="index"
                                                    :value-key="item.value.id"
                                                    :label="item.label"
                                                    :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </td>
                                    <td>
                                        <el-input :disabled="true" type="number" min="0" max="addTable.quantity"
                                                  placeholder="Current Quantity" v-model="addTable.quantity"/>
                                    </td>
                                    <td>
                                        <el-input-number v-model="addTable.out_quantity" @change="onChangeOutQuantity" :min="0"
                                                         :max="cloneQuantity"></el-input-number>
                                    </td>
                                    <td>
                                        <el-button type="primary" :disabled="addTable.out_quantity === 0" @click="addColumn">Add
                                        </el-button>
                                    </td>
                                </tr>
                                <edit-supplies v-for="(item, index) in form.supplies" :max="item.cloneQuantity" :item="item"
                                               :key="index"/>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <el-form-item>
                        <el-button type="primary"
                                   :disabled="!form.supplies.length"
                                   @click="onSubmitRequest"
                                   :loading="isDisabled">{{$route.meta.type}}
                        </el-button>
                        <el-button :loading="isDisabled" @click="$router.push('/' + $route.meta.url)">Back</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </div>
    </div>

</template>

<script>
    import EditSupplies from './edit_supplies.vue'
    export default {
        beforeCreate(){
            axios.get('/api/supplies/mass-update')
        },
        components: {
            EditSupplies
        },
        data(){
            return {
                isDisabled: false,
                option: {
                    penColor: "rgb(0, 0, 0)",
                    backgroundColor: "rgb(255,255,255)"
                },
                request_id: 1,
                dialogVisible: false,
                optionDivision: [],
                loadingDivision: false,
                selectDivision: false,
                isAddDivision: false,
                division_name: '',
                division_supply: '',
                select: false,
                cloneQuantity: 0,
                addTable: {id: '', name: '', category_id: '', package_id: '', quantity: '', out_quantity: ''},
                columns: [
                    {
                        id: 'name',
                        label: 'Transactions Name'
                    },
                    {
                        id: 'category_id',
                        label: 'Category Name'
                    },
                    {
                        id: 'package_id',
                        label: 'Unit'
                    },
                    {
                        id: 'quantity',
                        label: 'Current Stock'
                    },
                    {
                        id: 'out_quantity',
                        label: 'Quantity'
                    }
                ],
                form: {
                    supplies: [],
                    division: '',
                    request_date: '',
                    request_year_code: '',

                },
                loading: false,
                options: [],
                labelPosition: 'left',
                errors: [],
            }
        },
        methods: {
            addDivision(){
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/divisions`, {
                    name: vm.division_name,
                    supply_division: vm.division_supply
                }).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isAddDivision = false
                    vm.isDisabled = false
                    vm.optionDivision.push({value: response.data.id, label: response.data.name})
                    vm.form.division = response.data.id
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                        vm.isAddDivision = false
                    }
                    vm.isDisabled = false
                });
            },
            onSubmitRequest(){
                let vm = this,
                    n = new Date(),
                    y = n.getFullYear(),
                    m = n.getMonth() + 1,
                    d = n.getDate();
                vm.isDisabled = true
                vm.errors = []
                vm.form.year = y;
                vm.form.request_date = m + "/" + d + "/" + y;
                vm.form.request_year_code = y;
                axios({
                    method: vm.$route.params.id ? 'PUT' : 'POST',
                    url: '/api/' + (vm.$route.params.id ? `${vm.$route.meta.url}/${vm.$route.params.id}` : `${vm.$route.meta.url}`),
                    data: vm.form
                })
                    .then(function (response) {
                        vm.$message({message: response.statusText, type: 'success'})
                        vm.isDisabled = false
                        vm.form = {
                            supplies: [],
                            name: '',
                            year: '',
                            request_date: '',
                            request_year_code: ''
                        }
                        vm.dialogVisible = true
                        vm.request_id = response.data.id
                        vm.$router.push({name: "requests.print", params: {id: vm.request_id}})
                    })
                    .catch(function (error) {
                        if (error.response.data.errors && error.response.data.message) {
                            vm.errors = error.response.data.errors;
                            vm.$message({message: error.response.data.message, type: 'error'})
                        }
                        vm.isDisabled = false
                    });
            },
            onChangeOutQuantity(e, q){
                var vm = this
                if (e > q) {
                    vm.addTable.quantity -= (e - q)
                } else {
                    vm.addTable.quantity += ( q - e)
                }
            },
            onChange(e){
                var vm = this
                vm.select = true
                if (e) {
                    vm.addTable = {
                        id: e.id,
                        name: e.name,
                        description: e.description,
                        quantity: e.quantity,
                        out_quantity: 0
                    }

                    vm.cloneQuantity = e.quantity
                    vm.select = false

                } else {
                    vm.addTable = {id: '', name: '', category_id: '', package_id: '', quantity: '', out_quantity: ''}
                    vm.cloneQuantity = 0
                    vm.select = false
                }

            },
            addColumn(){
                let message = 'Please input the'
                let vm = this
                if (vm.addTable.id && vm.addTable.name  && vm.addTable.out_quantity) {
                    axios.get('/api/supplies/disabled/' + vm.addTable.id).then(function (q) {
                        vm.form.supplies.unshift(_.clone(vm.addTable))
                        vm.options = []
                        vm.addTable = {
                            id: '',
                            name: '',
                            quantity: '',
                            out_quantity: ''
                        }
                    })

                } else {

                    if (!!vm.addTable.id) {
                        message += ' ID |'
                    }
                    if (!!vm.addTable.name) {
                        message += ' Name |'
                    }
                    vm.$message({
                        message: message,
                        type: 'warning'
                    });
                }


            },
            onSearchDivision: _.debounce(function (query, vm) {
                axios.get('/api/search/divisions?search=' + query).then(function (q) {
                    vm.loadingDivision = false
                    vm.optionDivision = q.data.map(item => {
                        return {value: item.id, label: item.name};
                    })
                }).catch(function () {
                    vm.loadingDivision = false
                })
            }, 350),
            onSearch: _.debounce(function (query, vm) {
                vm.loading = true
                axios.get('/api/search/supplies?search=' + query +`&type=0`).then(function (q) {
                    vm.loading = false
                    vm.options = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            searchDivision(query){
                var vm = this

                if (query !== '') {
                    vm.loadingDivision = true
                    vm.onSearchDivision(query, vm)
                } else {
                    vm.loadingDivision = false
                    vm.optionDivision = []
                }
            },
            search_(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearch(query, vm)
                } else {
                    vm.loading = false
                    vm.option = []
                }
            },
        }
    }
</script>



