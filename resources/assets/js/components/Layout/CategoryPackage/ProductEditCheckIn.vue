<template>
    <div>
        <form ref="form" @submit.prevent="onSubmit">


            <div class="row">

                <div class="col-12">
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
                                <div class="col">
                                    <strong>Unit Cost:</strong> {{product.unit_cost}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Unit:</strong> {{product.category_id ? product.category.name : ''}}
                                </div>
                                <div class="col">
                                    <label for="total_quantity">Total Quantity: </label>
                                    {{unitCost}}
                                </div>
                            </div><div class="row">
                                <div class="col">
                                    <label for="total_cost">Total Cost: </label>
                                    {{totalCost}}
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col">

                                    <div class="form-group">
                                        <label for="po_number">PO Number</label>
                                        <input v-model="po_number" required type="text"
                                               tabindex="1"
                                               class="form-control form-control-sm"
                                               :class="errors.po_number ? 'is-invalid' : ''"
                                               id="po_number" name="po_number"
                                               placeholder="po_number">
                                        <span v-if="errors.po_number" v-for="error in errors.po_number" class="invalid-feedback" role="alert">
                                        <strong>PO number has already taken</strong>
                                    </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="package">Quantity per {{product.package_id ? product.package.name :
                                            'box'}} / Bundle</label>
                                        <input required type="number" v-model="quantity_per" class="form-control form-control-sm"
                                               :min="1"
                                               id="package"
                                               tabindex="2"
                                               name="quantity"
                                               :placeholder="`Quantity per ${product.package_id ? product.package.name : 'box'}`">
                                    </div>
                                    <div  class="el-form-item" :class="errors.source_select ? 'is-error is-required' : ''" >
                                        <div class="row">
                                            <div class="col-sm"><label for="source">Source</label></div>
                                            <div class="col-sm text-right">
                                                <button type="button" v-if="!isAddSource"
                                                        @click="handleSidebar"
                                                        class="btn btn-sm btn-link">Add Source
                                                </button>

                                            </div>
                                        </div>
                                        <div class="el-form-item__content">
                                        <el-select
                                                v-if="!isAddSource"
                                                style="width: 100%;"
                                                size="small"
                                                v-model="source_select"
                                                :disabled="isDisabled"
                                                filterable
                                                tabindex="3"
                                                remote
                                                required
                                                placeholder="Enter Source of Fund Name"
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
                                        <button @click="addSource" type="button"
                                                class="btn btn-success">Create Source</button>
                                        <button class="btn btn-default" type="button"
                                                @click="isAddSource = false;$root.store.dispatch('handleSideBar')">Cancel</button>
                                    </span>
                                            </div>
                                        </div>
                                            <div v-if="errors.source_select" v-for="error in errors.source_select" class="el-form-item__error">
                                                {{error}}
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="form-group has-feedback">
                                        <label for="date_delivered">Date Delivered</label>
                                        <input v-model="date_delivered" required type="date"
                                               tabindex="6"
                                               class="form-control form-control-sm"
                                               :class="errors.date_delivered ? 'is-invalid' : ''"
                                               id="date_delivered"
                                               name="date_delivered" placeholder="Date Delivered">
                                        <span v-if="errors.date_delivered" v-for="error in errors.date_delivered" class="invalid-feedback" role="alert">
                                        <strong>{{ error }}</strong>
                                            </span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="quantity">Quantity Delivered</label>
                                        <input required type="number" v-model="quantity" class="form-control form-control-sm"
                                               min="1"
                                               id="quantity"
                                               tabindex="7"
                                               :class="errors.quantity ? 'is-invalid' : ''"
                                               name="quantity" placeholder="Quantity">
                                        <span v-if="errors.quantity" v-for="error in errors.quantity" class="invalid-feedback" role="alert">
                                        <strong>{{ error }}</strong>
                                    </span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="expiry_date">Expiry Date</label>
                                        <input type="date" class="form-control form-control-sm" v-model="expiry_date" id="expiry_date"
                                               :class="errors.expiry_date ? 'is-invalid' : ''"
                                               tabindex="9"
                                               name="expiry_date"
                                               placeholder="expiry_date">
                                        <span v-if="errors.expiry_date" v-for="error in errors.expiry_date" class="invalid-feedback" role="alert">
                                        <strong>{{ error }}</strong>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" :disabled="!(date_delivered && expiry_date && po_number && quantity && quantity_per && source_select) || loading" class="btn btn-primary mb-2">Check in</button>
                        </div>

                    </div>
                </div>
                </div>
        </form>

        <div v-if="data" class="dv">
            <div class="dv-header">
                <div class="dv-header-columns">

                    <span class="dv-header-pre">Search: </span>
                    <el-select v-model="query.search_column" placeholder="Select">
                        <el-option label="All"
                                   value="all"></el-option>
                        <el-option
                                v-for="(value, key) in columns"
                                :key="key"
                                :label="value.name"
                                :value="value.id">
                        </el-option>
                    </el-select>
                </div>
                <div class="dv-header-operators">
                    <el-select v-model="query.search_operator" placeholder="Select">
                        <el-option
                                v-for="(value, key) in operators"
                                :key="key"
                                :label="value"
                                :value="key">
                        </el-option>
                    </el-select>
                </div>
                <div class="dv-header-search">
                    <div class="row">
                        <div class="col-lg-4">
                            <el-input placeholder="Search" @keyup.enter="loadData"
                                      v-model="filters[0].value"></el-input>
                        </div>
                        <div class="col-lg-4">
                            <el-select v-model="filters[1].value" clearable placeholder="Select Users"
                                       multiple="multiple">
                                <el-option v-for="(user, index, key) in users" :key="key" :label="user.name"
                                           :value="user.id"></el-option>
                            </el-select>
                        </div>
                        <div class="col-lg-4">
                            <el-select @clear="clearTypeHandleChange" v-model="filters[2].value" clearable
                                       placeholder="Select Type">
                                <el-option label="IN" value="1"></el-option>
                                <el-option label="OUT" value="0"></el-option>
                            </el-select>
                        </div>
                    </div>
                </div>
            </div>

            <data-tables-server v-if="nextPage || prevPage || !nextPage || !prevPage || meta"
                                :data="data"
                                :action-col="actionCol"
                                :total="meta.total"
                                :filters="filters"
                                :pagination-props="{ background: true, pageSize: query.per_page ,  pageSizes: [query.per_page, 10, 20, 30] }"
                                :page-size="query.per_page"
                                :current-page="meta.current_page"
                                @query-change="loadData"
                                :table-props="tableProps"
                                :loading="loading">
                <el-table-column v-for="title in columns" :prop="title.id" :label="title.name" :key="title.id"
                                 sortable="custom">
                </el-table-column>
            </data-tables-server>
        </div>
    </div>
</template>
<style>
    .el-table .warning-row {
        background: oldlace;
    }

    .el-table .success-row {
        background: aliceblue;
    }

    .el-input-group__prepend {
        background-color: #fff;
    }
</style>
<script>
    const getData = (url, page, callback) => {
        axios
            .get(`${url}`, {params: page})
            .then(response => {
                callback(null, {data: response.data, page: page});
            }).catch(error => {
            if (error) {
                callback(error, error.response);
            }

        });
    };
    export default{
        data() {
            var sortOrders = {}
            return {
                errors:[],
                date_delivered: '',
                po_number: '',
                pr_number: '',
                expiry_date: '',
                quantity_per: 0,
                product: {},
                quantity: 0,
                unit_cost: 0,
                units: [],
                dispensing_units: [],
                isAddDispensingUnit: false,
                isAddSource: false,
                isAddUnit: false,
                unit_id: '',
                unit_name: '',
                dispensing_unit_id: '',
                source_select: '',
                sources: [],
                source_name: '',
                num1: 1,
                filters: [
                    {
                        value: '',
                        'search_prop': 'id' // define search_prop for backend usage.
                    },
                    {
                        value: '',
                        'search_prop': 'id' // define search_prop for backend usage.
                    }, {
                        value: '',
                        'search_prop': 'id' // define search_prop for backend usage.
                    }
                ],
                dialogMessage: {title: '', message: ''},
                dialogVisible: false,
                actionCol: {
                    label: 'Action',
                    props: {
                        align: 'center',
                    },
                },
                isDisabled: false,
                query: {
                    page: 1,
                    column: 'id',
                    direction: 'desc',
                    per_page: 15,
                    search_column: 'all',
                    search_operator: 'like',
                    search_input: ''
                },
                operators: {
                    equal: '=',
                    not_equal: '<>',
                    less_than: '<',
                    greater_than: '>',
                    less_than_or_equal_to: '<=',
                    greater_than_or_equal_to: '>=',
                    in: 'IN',
                    like: 'LIKE'
                },
                columns: [{}],
                sortKey: '',
                sortOrders: sortOrders,
                data: [],
                meta: {},
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
                filterKey: '',
                loading: false,
                _numberLoad: 0,
                users: [],
                tableProps: {
                    rowClassName: function ({row, rowIndex}) {
                        if (row.type == 'OUT') {
                            return 'warning-row';
                        } else {
                            return 'success-row';
                        }
                        return '';
                    }
                }
            };
        },
        computed: {
            unitCost(){
                var vm = this
                return vm.quantity && parseFloat(vm.quantity_per) > 0 ? parseFloat(vm.quantity) * parseFloat(vm.quantity_per) : 0
            },
            totalCost(){
                var vm = this
                return vm.quantity && parseFloat(vm.quantity_per) && vm.product.unit_cost > 0 ? parseFloat(vm.quantity) *  parseFloat(vm.quantity_per) * parseFloat(vm.product.unit_cost) : 0
            },
            nextPage() {
                if (!this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                var vm = this
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (!this.meta || this.meta.current_page === 1) {
                    return;
                }
                var vm = this
                return this.meta.current_page - 1;
            },
            paginatonCount() {
                if (!this.meta) {
                    return;
                }
                const {current_page, last_page} = this.meta;
                return `Displaying ${current_page} of ${last_page} rows`;
            },
        },
        beforeRouteEnter (to, from, next) {
            if (to.params.id) {
                getData(`/api/${to.meta.url}/${to.params.id}`, to.query, (err, data) => {
                    next(vm => vm.setData(err, data));
                });
            } else {
                next()
            }
        },
        beforeRouteUpdate (to, from, next) {
            var vm = this
            if (to.params.id) {
                getData(`/api/${to.meta.url}/${to.params.id}`, to.query, (err, data) => {
                    vm.setData(err, data)
                    next()
                });
            } else {
                next()
            }
        },
        methods: {
            unit_m(request){
                return axios.post('/api/units', request)
            },
            addUnit(){
                var vm = this
                vm.isDisabled = true
                vm.errors = []
                vm.unit_m({name: vm.unit_name}).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.units = []
                    vm.units.push({value: response.data, label: response.data.name})
                    vm.unit_id = response.data.id
                    vm.isDisabled = false
                    vm.isAddUnit = false
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }
                    vm.isDisabled = false
                });
            },
            search_unit(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.units = []
                }
            },
            search_dispensing_unit(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchDispensingUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.dispensing_units = []
                }
            },
            getUnit(query){
                return axios.get('/api/search/units?search=' + query)
            },
            onSearchDispensingUnit: _.debounce(function (query, vm) {
                vm.getUnit(query).then(function (q) {
                    vm.loading = false
                    vm.dispensing_units = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            onSearchUnit: _.debounce(function (query, vm) {
                vm.getUnit(query).then(function (q) {
                    vm.loading = false
                    vm.units = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            handleSidebar(){
                var vm = this
                vm.isAddSource = !vm.isAddSource
                vm.$root.store.dispatch('handleSideBar')
            },
            addSource(){
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/sources`, {name: vm.source_name}).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isAddSource = false
                    vm.sources.push({value: response.data, label: response.data.name})
                    vm.isDisabled = false
                    return response.data.id
                }).then(function (id) {
                    vm.source_select = id
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }
                    vm.isAddDivision = false
                    vm.isDisabled = false
                });
                vm.$root.store.dispatch('handleSideBar')
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
            clearTypeHandleChange(){
                vm.filters[2].value = ''
            },
            onSubmit(){
                var vm = this
                vm.errors = []
                vm.loading = true
                const formData = new FormData(vm.$refs.form);
                let jsonObject = {};

                for (const [key, value]  of formData.entries()) {
                    jsonObject[key] = value;
                }
                if (vm.$route.params.id) {
                    jsonObject['id'] = vm.$route.params.id
                }
                jsonObject['quantity_per'] = vm.quantity_per
                jsonObject['quantity'] = vm.quantity * vm.quantity_per
                jsonObject['source_select'] = vm.source_select
                axios.post(`/api/products/${vm.$route.params.id}/check-item`, jsonObject).then(function (q) {
                    vm.$message({message: q.statusText, type: 'success'})
                    q.data.type = q.data.type === 0 ? 'OUT' : 'IN'
                    vm.data.unshift(q.data)
                    vm.loading = false
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.errors = error.response.data.errors;
                        vm.$message({message: error.response.data.message, type: 'error'})
                        vm.$root.store.dispatch('loadNotification')
                    } else if (error.response) {
                        vm.$message({message: error.response.statusText, type: 'error'})
                    }
                    vm.loading = false
                })
            },
            sortBy: function (key) {
                this.sortKey = key
                this.sortOrders[key] = this.sortOrders[key] * -1
            },
            loadData: _.debounce(function (event) {

                var vm = this;

                vm.loading = true
                var option = _.clone(vm.$route.query)
                if (event.type === 'sort') {
                    option.column = event.sort.prop
                    option.direction = event.sort.order == 'ascending' ? 'asc' : 'desc'
                }

                if (event.type != "init") {
                    if (event.type === 'page') {
                        option.page = event.page
                        option.per_page = event.pageSize
                    }
                    if (event.type === 'filter' && !_.isEmpty(vm.filters[0].value)) {

                        option.search_column = vm.query.search_column
                        option.search_operator = vm.query.search_operator
                        option.search_input = vm.filters[0].value
                    } else if (event.type === 'filter' && !_.isEmpty(vm.filters[1].value)) {
                        option.user_id = vm.filters[1].value.toString()
                    } else if (event.type === 'filter' && !_.isEmpty(vm.filters[2].value)) {
                        option.type = vm.filters[2].value.toString()
                    }
                    else {
                        delete option.user_id
                        delete option.search_input
                    }


                    if (_.isEmpty(vm.filters[2].value)) {
                        delete option.type
                    }

                    vm.$router.push({
                        path: `${vm.$route.path}`,
                        query: option
                    }, function () {
                        vm.loading = false
                        if (option.search_input == '') {
                            delete option.search_input
                            vm.filters[1].value = ''
                        }

                    }, function () {
                        vm.loading = false
                    });

                } else {
                    vm.loading = false
                }
            }, 500),
            setData (err, data) {
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {
                    vm.data = _.map(data.data.model.data, function (q) {
                        q.type = q.type == 0 ? 'OUT' : 'IN'
                        return q
                    });
                    let users = _.map(vm.data, function (f) {
                        return f.user;
                    })
                    vm.product = data.data.product
                    vm.users = _.compact(_.uniqBy(users, 'id'))
                    vm.links.first_page_url = data.data.model.first_page_url;
                    vm.links.last_page_url = data.data.model.last_page_url;
                    vm.links.prev_page_url = data.data.model.prev_page_url;
                    vm.links.next_page_url = data.data.model.next_page_url;

                    vm.meta.current_page = data.data.model.current_page;
                    vm.meta.from = data.data.model.from;
                    vm.meta.last_page = data.data.model.last_page;
                    vm.query.per_page = _.parseInt(data.data.model.per_page);
                    vm.meta.to = data.data.model.to;
                    vm.meta.total = data.data.model.total;

                    vm.columns = data.data.columns;
                    if (data.page.search_input) {
                        vm.filters[0].value = data.page.search_input;
                    }

                    vm.filters[0].search_prop = vm.search_column // define search_prop for backend usage.

                }
            },
        }
    }
</script>
