<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Items</h3>
                </div>
                <div class="card-body">
                    <form ref="form" id="myform" @submit.prevent="postRequest">
                    <div class="row">
                        <div class="col-sm">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm"><label for="division">Division</label></div>
                                        <div class="col-sm text-right">
                                            <button type="button" v-if="!isAddDivision" @click="isAddDivision = !isAddDivision"
                                                    class="btn btn-sm btn-link">Add Division
                                            </button>

                                        </div>
                                    </div>

                                    <el-select
                                            v-if="!isAddDivision"
                                            style="width: 100%;"
                                            v-model="division_select"
                                            :disabled="isDisabled"
                                            filterable
                                            remote
                                            placeholder="Enter Location Name"
                                            :remote-method="search_division"
                                            :loading="loading">
                                        <el-option
                                                v-for="(item, index) in divisions"
                                                :key="index"
                                                :label="item.label"
                                                :value="item.value.id">
                                        </el-option>
                                    </el-select>
                                    <div v-else>
                                        <div class="input-group input-group-sm">
                                            <input placeholder="Division Name" v-model="division_name" type="text"
                                                   class="form-control">
                                            <input placeholder="Supply Division" v-model="division_supply"
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
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm"><label for="source">Source</label></div>
                                    <div class="col-sm text-right">
                                        <button type="button" v-if="!isAddSource" @click="isAddSource = !isAddSource"
                                                class="btn btn-sm btn-link">Add Source
                                        </button>

                                    </div>
                                </div>
                                <el-select
                                        v-if="!isAddSource"
                                        style="width: 100%;"
                                        v-model="source_select"
                                        :disabled="isDisabled"
                                        filterable
                                        remote
                                        placeholder="Enter Location Name"
                                        :remote-method="search_source"
                                        :loading="loading">
                                    <el-option
                                            v-for="(item, index) in sources"
                                            :key="index"
                                            :label="item.label"
                                            :value="item.value.id">
                                    </el-option>
                                </el-select>
                                <div v-else>
                                    <div class="input-group input-group-sm">
                                        <input v-model="source_name" type="text" class="form-control">
                                        <span class="input-group-append">
                                            <button @click="addSource" type="button" class="btn btn-success">Create Source</button>
                                            <button class="btn btn-default" type="button" @click="isAddSource = false">Cancel</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="office">Office</label>
                                <input type="text" id="office" class="form-control" name="office">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" id="code" class="form-control" name="code">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="responsibilities">Responsibilities</label>
                                <input type="text" id="responsibilities" class="form-control" name="responsibilities">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm"><label for="receive">Received By</label></div>
                                    <div class="col-sm text-right">
                                        <button type="button" v-if="!isAddReceive" @click="isAddReceive = !isAddReceive"
                                                class="btn btn-sm btn-link">Add Received By
                                        </button>

                                    </div>
                                </div>
                                <el-select
                                        v-if="!isAddReceive"
                                        style="width: 100%;"
                                        v-model="receive_select"
                                        :disabled="isDisabled"
                                        filterable
                                        remote
                                        placeholder="Enter Receive Name"
                                        :remote-method="search_receive"
                                        :loading="loading">
                                    <el-option
                                            v-for="(item, index) in locations"
                                            :key="index"
                                            :label="item.label"
                                            :value="item.value.id">
                                    </el-option>
                                </el-select>
                                <div v-else>
                                    <div class="input-group input-group-sm">
                                        <input v-model="receive_name" type="text" class="form-control">
                                        <span class="input-group-append">
                                            <button @click="addReceive" type="button" class="btn btn-success">Create Receive</button>
                                            <button class="btn btn-default" type="button" @click="isAddReceive = false">Cancel</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Supply Name</th>
                            <th>Current Quantity</th>
                            <th>Quantity</th>
                            <th>Remarks</th>
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
                                        @change="onChange"
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
                                <el-input type="text" placeholder="Remarks" v-model="addTable.remarks"/>
                            </td>
                            <td>
                                <el-button type="primary" :disabled="addTable.out_quantity === 0" @click="addColumn">Add
                                </el-button>
                            </td>
                        </tr>
                        <edit-supplies v-for="(item, index) in supplies" :max="item.cloneQuantity" :item="item"
                                       :key="index"/>
                        </tbody>
                    </table>
                    </form>
                </div>
                <div class="card-footer">
                    <button form="myform"  class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import EditSupplies from './edit_supplies.vue'
    export default{
        components: {
            EditSupplies
        },
        beforeCreate(){
            axios.get('/api/supplies/mass-update')
        },
        data(){
            return {
                isAddDivision: false,
                isAddSource: false,
                isAddReceive: false,
                receive_select: '',
                division_select: '',
                source_select: '',
                sources: [],
                divisions: [],
                supplies: [],
                locations: [],
                cloneQuantity: 0,
                loading: false,
                options: [],
                select: false,
                addTable: {id: '', name: '', quantity: '', out_quantity: '', remarks: ''},
                isDisabled: false,
                source_name: '',
                division_name: '',
                receive_name: '',
                division_supply: ''
            }
        },
        methods: {
            postRequest(){

                var vm = this
                vm.isDisabled = true
                const formData = new FormData(vm.$refs.form);
                let jsonObject = {};
                for (const [key, value]  of formData.entries()) {
                    jsonObject[key] = value;

                }
                jsonObject['id'] = vm.$route.params.id ? vm.$route.params.id : ''
                jsonObject['division_id'] = vm.division_select
                jsonObject['source_id'] = vm.source_select
                jsonObject['location_id'] = vm.receive_select
                jsonObject['supplies'] = vm.supplies
                axios.post(`/api/requisitions`, jsonObject).then(function (response) {

                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isDisabled = false
                    vm.$router.push({name: "supplies.print_requisition", params: {id : response.data.id}})
                }).catch(function (error) {
                    vm.$message({message: error.response.data.message, type: 'error'})
                    vm.isDisabled = false
                })
            },
            addDivision(){
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/divisions`, {name: vm.division_name, supply_division: vm.division_supply} ).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isAddDivision = false
                    vm.isDisabled = false
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                        vm.isAddDivision = false
                    }
                    vm.isDisabled = false
                });
            },
            addReceive(){
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/locations`, {name: vm.receive_name, type: 1} ).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isAddReceive = false
                    vm.isDisabled = false
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                        vm.isAddDivision = false
                    }
                    vm.isDisabled = false
                });
            },
            addSource(){
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/sources`, {name: vm.source_name} ).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isAddSource = false
                    vm.isDisabled = false
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }
                    vm.isAddDivision = false
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
            addColumn(){

                let message = 'Please input the'
                let vm = this
                if (vm.addTable.id && vm.addTable.name && vm.addTable.out_quantity) {
                    axios.get('/api/supplies/disabled/' + vm.addTable.id).then(function (q) {
                        vm.supplies.unshift(_.clone(vm.addTable))
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
                    if (!!vm.addTable.category_id) {
                        message += ' Category |'
                    }
                    if (!!vm.addTable.package_id) {
                        message += ' Package |'
                    }
                    vm.$message({
                        message: message,
                        type: 'warning'
                    });
                }
            },
            onChange(e){
                var vm = this
                vm.select = true
                if (e) {
                    vm.addTable = {
                        id: e.id,
                        name: e.name,
                        quantity: e.quantity,
                        out_quantity: 0,
                        type: 0
                    }

                    vm.cloneQuantity = e.quantity
                    vm.select = false

                } else {
                    vm.addTable = {id: '', name: '', category_id: '', package_id: '', quantity: '', out_quantity: ''}
                    vm.cloneQuantity = 0
                    vm.select = false
                }

            },
            onSearch: _.debounce(function (query, vm) {
                axios.get('/api/search/request-supply?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.options = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            onSearchReceive: _.debounce(function (query, vm) {
                axios.get('/api/search/locations/requisitions?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.locations = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            onSearchDivision: _.debounce(function (query, vm) {
                axios.get('/api/search/divisions?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.divisions = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            onSearchSource: _.debounce(function (query, vm) {
                axios.get('/api/search/sources?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.sources = q.data.map(item => {
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
            search_division(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchDivision(query, vm)
                } else {
                    vm.loading = false
                    vm.divisions = []
                }
            },
            search_receive(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchReceive(query, vm)
                } else {
                    vm.loading = false
                    vm.divisions = []
                }
            },
            search_source(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchSource(query, vm)
                } else {
                    vm.loading = false
                    vm.sources = []
                }
            },
        }
    }
</script>
