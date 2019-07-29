<template>
    <el-form ref="form" @submit.native.prevent="onSubmit" :label-position="labelPosition" size="mini"
             :model="form">

        <div class="row">

            <div class="col-lg-3">
                <div class="el-form-item" :class="errors.remark ? 'el-form-item--feedback is-error' : ''">
                    <label for="remark" class="el-form-item__label">Remark</label>
                    <div class="el-form-item__content" style="margin-left: 63px;">
                        <div class="el-input el-input--mini">
                            <input type="text" autocomplete="off" v-model="form.remark" class="el-input__inner">
                            <span v-if="errors.remark" class="el-input__suffix"><span class="el-input__suffix-inner">
                            </span>
                                <i class="el-input__icon el-input__validateIcon el-icon-circle-close"></i>
                            </span>
                        </div>
                        <div v-if="errors.remark" class="el-form-item__error">
                            Please input the remark
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="el-form-item" :class="errors.request_date ? 'el-form-item--feedback is-error' : ''">
                    <label for="request_date" class="el-form-item__label">Date</label>
                    <div class="el-form-item__content" style="margin-left: 50px;">
                        <div class="el-input el-input--mini">
                            <input type="text" autocomplete="off" class="el-input__inner" v-model="form.request_date">
                            <span v-if="errors.request_date" class="el-input__suffix"><span
                                    class="el-input__suffix-inner">
                            </span>
                                <i class="el-input__icon el-input__validateIcon el-icon-circle-close"></i>
                            </span>
                        </div>
                        <div v-if="errors.request_date" class="el-form-item__error">
                            Please input the Request Data
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="el-form-item" :class="errors.request_year_code ? 'el-form-item--feedback is-error' : ''">
                    <label for="request_year_code" class="el-form-item__label">Year Code</label>
                    <div class="el-form-item__content" style="margin-left: 73px;">
                        <div class="el-input el-input--mini">
                            <input type="text" autocomplete="off" v-model="form.request_year_code"
                                   class="el-input__inner">
                            <span v-if="errors.request_year_code" class="el-input__suffix"><span
                                    class="el-input__suffix-inner">
                            </span>
                                <i class="el-input__icon el-input__validateIcon el-icon-circle-close"></i>
                            </span>
                        </div>
                        <div v-if="errors.request_year_code" class="el-form-item__error">
                            Please input the Request Year Code
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
                    <edit-product v-for="(item, index) in form.products" :max="cloneQuantity" :item="item"
                                  :key="index"/>
                    </tbody>
                </table>
            </div>
        </div>

        <el-form-item>
            <el-button type="primary" @click="onSubmitRequest" :disabled="isDisabled_c" :loading="isDisabled">{{$route.meta.type}}</el-button>
            <el-button :disabled="isDisabled" @click="$router.push('/' + $route.meta.url)">Cancel</el-button>
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
        computed:{
            isDisabled_c(){
                var vm = this;
                console.log(vm.form.products.length === 0)
                return vm.form.products.length === 0
            },
        },
        mixins: [Operation],
        data(){
            return {
                optionCustomer:[],
                loadingCustomer: false,
                select: false,
                selectCustomer: false,
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
                    customer: '',
                    products: [],
                    name: '',
                    year: '',
                    request_date: '',
                    request_year_code: '',
                    remark: '',

                },
                loading: false,
                options: []
            }
        },
        methods: {

            onSubmitRequest(){
                let vm = this
                vm.isDisabled = true
                vm.errors = []

                axios.post('/api/' + vm.$route.meta.url, vm.form)
                    .then(function (response) {
                        vm.$message({message: response.statusText, type: 'success'})
                        vm.isDisabled = false
                        vm.form = { products: [], name: '', year: '', request_date: '', request_year_code: '', remark: ''}
                        vm.$router.push({name: "requests.print",params:{ id: response.data.id}})
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
                            category_id: e.category.name,
                            package_id: e.package.name,
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
                if(vm.addTable.id && vm.addTable.name && vm.addTable.category_id && vm.addTable.package_id && vm.addTable.out_quantity){
                    axios.get('/api/products/disabled/' + vm.addTable.id).then(function (q) {
                        vm.form.products.unshift(_.clone(vm.addTable))
                        vm.options = []
                        vm.addTable = {id: '', name: '', category_id: '', package_id: '', quantity: '', out_quantity: ''}
                    })

                }else{

                    if(!!vm.addTable.id){
                        message += ' ID |'
                    }
                    if(!!vm.addTable.name){
                        message += ' Name |'
                    }
                    if(!!vm.addTable.category_id){
                        message += ' Category |'
                    }
                    if(!!vm.addTable.package_id){
                        message += ' Package |'
                    }
                    vm.$message({
                        message: message ,
                        type: 'warning'
                    });
                }


            },
            onSearchCustomer: _.debounce(function (query, vm) {
                axios.get('/api/search/customers?search=' + query).then(function (q) {
                    vm.loadingCustomer = false
                    vm.optionCustomer = q.data.map(item => {
                        return {value: item.id, label: item.name};
                    })
                }).catch(function () {
                    vm.loadingCustomer = false
                })
            }, 350),
            onSearch: _.debounce(function (query, vm) {
                axios.get('/api/search/request-medicine?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.options = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
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
            searchCustomer(query){
                var vm = this

                if (query !== '') {
                    vm.loadingCustomer = true
                    vm.onSearch(query, vm)
                } else {
                    vm.loadingCustomer = false
                    vm.optionCustomer = []
                }
            },
        }
    }
</script>



