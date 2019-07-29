<template>
    <div>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Purchase Order Detail
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group has-feedback">
                                    <label for="po_number">PO Number</label>
                                    <input v-model="po_number" required type="text"
                                           :class="errors.po_number ? 'is-invalid' : ''"
                                           class="form-control form-control-sm"
                                           id="po_number" name="po_number"
                                           placeholder="po_number">
                                    <span v-if="errors.po_number" v-for="error in errors.po_number"
                                          class="invalid-feedback" role="alert">
                                    <strong>{{ error }}</strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="date_delivered">Date Delivered</label>
                                    <input v-model="date_delivered" required type="date"
                                           class="form-control form-control-sm"
                                           id="date_delivered"
                                           name="date_delivered" placeholder="Date Delivered">
                                </div>
                                <div class="form-group">
                                    <label for="pr_number">PR Number</label>
                                    <input v-model="pr_number" required type="text"
                                           class="form-control form-control-sm"
                                           id="pr_number" name="pr_number"
                                           placeholder="pr_number">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm"><label for="source">Source</label></div>
                                        <div class="col-sm text-right">
                                            <button type="button" v-if="!isAddSource"
                                                    @click="isAddSource = !isAddSource"
                                                    class="btn btn-sm btn-link">Add Source
                                            </button>

                                        </div>
                                    </div>
                                    <el-select
                                            v-if="!isAddSource"
                                            style="width: 100%;"
                                            size="small"
                                            v-model="source_select"
                                            :disabled="isDisabled"
                                            filterable
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
                                    @click="isAddSource = false">Cancel</button>
                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-6">
                <form ref="form" @submit.prevent="onSubmit">
                    <div class="card">
                        <div class="card-header">
                            Supply Information
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <label for="supply">Supply</label>
                                        <el-select
                                                style="width: 100%;"
                                                v-model="supply_id"
                                                value-key="id"
                                                filterable
                                                required
                                                size="small"
                                                remote
                                                required
                                                placeholder="Please a Supply"
                                                :remote-method="search_supply"
                                                :loading="loading">
                                            <el-option
                                                    v-for="(item, index) in supplies"
                                                    :key="item.value.id"
                                                    :label="item.label"
                                                    :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity Delivered</label>
                                        <input required type="number" v-model="quantity"
                                               min="1"
                                               class="form-control form-control-sm"
                                               id="quantity"
                                               name="quantity" placeholder="Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity Per</label>
                                        <input required type="number" v-model="quantity_per"
                                               min="1"
                                               class="form-control form-control-sm"
                                               id="quantity_per"
                                               name="quantity_per" placeholder="Quantity">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button :disabled="!(supply_id && quantity && quantity_per && po_number &&date_delivered &&pr_number && source_select )"
                                    type="submit" class="btn btn-primary mb-2">Check in
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>


        <div v-if="data" class="dv">


            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Supply</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in data">
                    <td>{{item.supply_id.name}}</td>
                    <td>{{item.quantity}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="dv-footer">
            <div class="dv-footer-item">
                <button @click="onSave" :disabled="data.length <= 0" class="btn btn-success">
                    Save Information
                </button>
            </div>
        </div>
        <div style="margin-bottom: 10px;"></div>
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
    export default {
        data() {
            var sortOrders = {}
            return {
                errors:[],
                supplies: [],
                product: {},
                supply_id: '',
                date_delivered: '',
                po_number: '',
                pr_number: '',
                expiry_date: '',
                quantity_per: '',
                quantity: 0,
                unit_cost: 0,
                units: [],
                unit: {},
                dispensing_unit: {},
                dispensing_units: [],
                isAddDispensingUnit: false,
                isAddSource: false,
                isAddProduct: false,
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
            unitCost() {
                var vm = this
                return vm.quantity && vm.unit_cost ? parseFloat(vm.quantity) * parseFloat(vm.unit_cost) : 0
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
        beforeRouteEnter(to, from, next) {
            if (to.params.id) {
                getData(`/api/${to.meta.url}/${to.params.id}`, to.query, (err, data) => {
                    next(vm => vm.setData(err, data));
                });
            } else {
                next()
            }
        },
        beforeRouteUpdate(to, from, next) {
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
            unit_m(request) {
                return axios.post('/api/units', request)
            },
            addUnit() {
                var vm = this
                vm.isDisabled = true
                vm.errors = []
                vm.unit_m({name: vm.unit_name}).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.units = []
                    vm.isDisabled = false
                    vm.isAddUnit = false
                }).catch(function (error) {
                    if (error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }
                    vm.isDisabled = false
                });
            },
            onSearchSupply: _.debounce(function (query, vm) {
                axios.get('/api/search/supplies/create_po?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.supplies = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            search_unit(query) {
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.units = []
                }
            },
            search_supply(query) {
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchSupply(query, vm)
                } else {
                    vm.loading = false
                    vm.supplies = []
                }
            },
            search_dispensing_unit(query) {
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchDispensingUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.dispensing_units = []
                }
            },
            getUnit(query) {
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
            addSource() {
                var vm = this
                vm.isDisabled = true
                axios.post(`/api/sources`, {name: vm.source_name}).then(function (response) {
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
            search_source(query) {
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
            clearTypeHandleChange() {
                vm.filters[2].value = ''
            },
            onSave() {
                var vm = this,
                    obj = {
                        po_number: vm.po_number,
                        pr_number: vm.pr_number,
                        date_delivered: vm.date_delivered,
                        source_id: vm.source_select,
                        data: vm.data
                    }

                axios.post('/api/supplies/purchase-order', obj).then(function (response) {

                    vm.$message({message: response.statusText, type: 'success'})
                }).catch(function (error) {
                    vm.$message({message: error.statusText, type: 'warning'})
                    vm.loading = false
                });
            },
            onSubmit() {
                var vm = this
                const formData = new FormData(vm.$refs.form);
                let jsonObject = {};

                for (const [key, value]  of formData.entries()) {
                    jsonObject[key] = value;
                }
                if (vm.$route.params.id) {
                    jsonObject['id'] = vm.$route.params.id
                }

                jsonObject['quantity_per'] = vm.quantity_per
                jsonObject['supply_id'] = vm.supply_id
                jsonObject['quantity'] = vm.quantity *  vm.quantity_per
                jsonObject['po_number'] = vm.po_number
                axios.post('/api/orders/validate-supply-checkin', jsonObject).then(function () {
                    vm.data.push(jsonObject)
                }).catch(function (error) {
                    if (error) {
                        if (error.response.data.errors && error.response.data.message) {
                            vm.errors = error.response.data.errors;
                            vm.$message({message: error.response.data.message, type: 'error'})
                        }
                    }

                    vm.isDisabled = false
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
            setData(err, data) {
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
