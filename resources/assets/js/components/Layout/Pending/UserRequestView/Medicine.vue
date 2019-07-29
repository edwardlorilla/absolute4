<template>
    <el-form ref="form" @submit.native.prevent="onSubmit" :label-position="labelPosition" size="mini"
             :model="form">

        <div class="row">
            <div class="card">
                <div class="card-header">
                    Medicine Information
                </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <strong>Generic Name:</strong> {{product.medicine_id ?
                        product.medicine.name.toUpperCase() : ''}}
                    </div>
                   <!-- <div class="col">
                        <strong>Dosage:</strong> {{product.dosage }}
                    </div>-->
                </div>
                <!--<div class="row">
                    <div class="col">
                        <strong>Form:</strong> {{product.category_id ? product.category.name : ''}}
                    </div>
                    <div class="col">
                        <strong>Medication:</strong> {{product.medication }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <strong>Pack Size:</strong> {{product.package_id ? product.package.name : ''}}
                    </div>
                </div>-->

            </div>
           <div class="card-body">
               <table class="table table-bordered">
                   <thead>
                   <tr>
                       <th>Product Name</th>
                       <th>Category Name</th>
                       <!--<th>Unit</th>-->
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
                                   style="width: 100%;"
                                   value-key="id"
                                   clearable
                                       filterable
                                       placeholder="Please enter a keyword"
                                       :remote-method="search_"
                                       :loading="loading">
                                   <el-option
                                           style="padding: 0px;"
                                           v-for="(item, index) in options"
                                           :key="index"
                                           :label="item.label"
                                           :value="item.value">
                                       <div @mouseover="onChangeProduct(item)"
                                            @mouseleave="onChangeProductOut">
                                           <span style="padding: 0 20px;">{{ `${item.label}` }}</span>
                                       </div>
                                   </el-option>
                               </el-select>
                           </td>
                           <td>
                               <el-input type="text" placeholder="Category Name" v-model="addTable.category_id"/>
                           </td>
                          <!-- <td>
                           <el-input type="text" placeholder="Unit" v-model="addTable.package_id"/>
                       </td>-->
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
                   <edit-product v-for="(item, index) in form.products" :max="item.cloneQuantity" :item="item"
                                 :key="index"/>
                   </tbody>
               </table>
           </div>
        </div>
            </div>
        <el-form-item>
            <el-button type="primary" :disabled="!(form.products.length)" @click="onSubmitRequest"
                       :loading="isDisabled">Submit
            </el-button>
            <el-button :loading="isDisabled" @click="$router.push('/' + $route.meta.url)">Back</el-button>
        </el-form-item>
    </el-form>

</template>

<script>
    import Operation from './OperationRequest'
    import EditProduct from './editProduct.vue'
    export default {
        beforeCreate(){
            axios.get('/api/products/mass-update')
        },
        components: {
            EditProduct
        },
        mixins: [Operation],
        data(){
            return {
                product:{},
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
                addTable: {
                    id: '',
                    name: '',
                    category_id: '',
                    // package_id: '',
                    quantity: '',
                    out_quantity: ''
                },
                columns: [
                    {
                        id: 'name',
                        label: 'Transactions Name'
                    },
                    {
                        id: 'category_id',
                        label: 'Category Name'
                    },
                    /*{
                        id: 'package_id',
                        label: 'Unit'
                    },*/
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
                    products: [],
                    division: '',
                    request_date: '',
                    request_year_code: '',

                },
                loading: false,
                options: []
            }
        },
        mounted(){

        },
        methods: {
            addDivision(){
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/divisions`, {
                    name: vm.division_name,
                    supply_division: vm.division_supply,
                    station: ''
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
                        vm.$message({message: 'Your request currently under review.', type: 'success'})
                        vm.isDisabled = false
                        vm.form = {
                            products: [],
                            division: '',
                            name: '',
                            year: '',
                            request_date: '',
                            request_year_code: ''
                        }
                        vm.dialogVisible = true
                        vm.request_id = response.data.id
                        vm.$root.store.dispatch('loadNotification');
                        //vm.$router.push({name: "requests.print", params: {id: vm.request_id}})
                    })
                    .catch(function (error) {
                        if (error.response.data.errors && error.response.data.message) {
                            vm.errors = error.response.data.errors;
                            vm.$message({message: error.response.data.message, type: 'error'})
                        }
                        vm.isDisabled = false
                        if(vm.errors.division){
                            vm.$confirm('No division assigned, please contact your administrator', 'Warning', {
                                confirmButtonText: 'OK',
                                cancelButtonText: 'Cancel',
                                type: 'warning'
                            })
                        }
                    });
            },
            onChangeOutQuantity(e, q){
                var vm = this
                var current = _.isInteger(e) ? e : 0, previos = _.isInteger(q) ? q : 0
                if(_.isInteger(current) && _.isInteger(previos)){
                    if (current > previos) {
                        vm.addTable.quantity -= (current - previos)
                    } else {
                        vm.addTable.quantity += ( previos - current)
                    }
                }else{
                    vm.addTable.quantity = vm.cloneQuantity
                }
            },
            onChangeProduct(e){
                var vm = this
                vm.product = e.value
            },
            onChangeProductOut(){
                var vm = this
                if (!vm.addTable.name) {
                    vm.product = {}
                }

            },
            onChange(e){
                var vm = this
                vm.select = true
                if (e) {
                    vm.addTable = {
                        id: e.id,
                        name: e.medicine.name,
                        category_id: e.category ? e.category.name : '',
                        package_id: e.package ? e.package.name : '',
                        quantity: e.quantity,
                        out_quantity: 0
                    }

                    vm.cloneQuantity = e.quantity
                    vm.select = false

                } else {
                    vm.addTable = {
                        id: '',
                        name: '',
                        category_id: '',
                        // package_id: '',
                        quantity: '',
                        out_quantity: ''
                    }
                    vm.cloneQuantity = 0
                    vm.select = false
                }

            },
            addColumn(){

                let message = 'Please input the'
                let vm = this
                if (vm.addTable.id && vm.addTable.name && vm.addTable.category_id && vm.addTable.out_quantity) {
                    axios.get('/api/products/disabled/' + vm.addTable.id).then(function (q) {
                        vm.form.products.unshift(_.clone(vm.addTable))
                        vm.options = []
                        vm.addTable = {
                            id: '',
                            name: '',
                            category_id: '',
                            // package_id: '',
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
                    if (!!vm.addTable.category_id) {
                        message += ' Category |'
                    }
                    /*if (!!vm.addTable.package_id) {
                        message += ' Package |'
                    }*/
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
                axios.get('/api/search/request-medicine?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.options = _.map(q.data, function (item) {
                        return {value: item, label: item.medicine.name};
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



