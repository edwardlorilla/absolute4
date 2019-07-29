<template>
    <div v-if="data" class="dv">
        <div class="dv-header">
            <div class="dv-header-title">
                <el-button size="mini" type="primary" @click="_create">Add New Medicine</el-button>
            </div>
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
                    <div class="col-lg-6">
                        <el-input placeholder="Search" @keyup.enter="loadData" v-model="filters[0].value"></el-input>
                    </div>
                    <div class="col-lg-6">
                        <el-select v-model="filters[1].value" clearable placeholder="Select Categories"
                                   multiple="multiple">
                            <el-option v-for="(category, index, key) in categories" :key="key" :label="category.name"
                                       :value="category.id"></el-option>
                        </el-select>
                    </div>
                </div>
            </div>
        </div>
        <div class="dv-header">
            <div class="dv-header-title">
                <el-button size="mini" type="primary" @click="addNewPO">Add New Purchase Order #</el-button>
                <el-button size="mini" type="success" @click="addNewGeneric">Add New Generic</el-button>
            </div>

        </div>
        <el-dialog
                :show-close="false"
                :title="dialogMessage.title"
                :visible.sync="dialogVisible"
                width="30%"
                :before-close="handleClose">
            <span>{{dialogMessage.message}}</span>
            <span slot="footer" class="dialog-footer">
            <el-button :disabled="loading" @click="dialogVisible = false">Cancel</el-button>
            <el-button :loading="loading" type="primary" @click="_delete(dialogMessage.row)">Confirm</el-button>
          </span>
        </el-dialog>


        <el-dialog
            title="Tips"
            :visible.sync="checkItemDialog"
            width="30%"
            :before-close="handleClose">
            <span>This is a message</span>
            <span slot="footer" class="dialog-footer">
            <el-button @click="checkItemDialog = false">Cancel</el-button>
            <el-button type="primary" @click="checkItemDialog = false">Confirm</el-button>
            </span>
        </el-dialog>
        <data-tables-server v-if="nextPage || prevPage || !nextPage || !prevPage || meta"
                            :data="filteredData"
                            :table-props="tableProps"
                            :action-col="actionCol"
                            :total="meta.total"
                            :filters="filters"
                            :pagination-props="{ background: true, pageSize: query.per_page ,  pageSizes: [query.per_page, 10, 20, 30] }"
                            :page-size="query.per_page"
                            :current-page="meta.current_page"
                            @query-change="loadData"
                            :loading="loading">
			<el-table-column prop="id" label="MedID" />
			<el-table-column prop="medicine.name" label="Generic" />
			<!--<el-table-column prop="unit.name" label="Unit" />-->
			<!--<el-table-column prop="medication" label="Medication" />-->
			<!--<el-table-column prop="dosage" label="Dosage" />-->
			<el-table-column
						prop="quantity" 
						label="Quantity">
			<template slot-scope="scope">
                            <span v-if="scope.row.reorder_point >= scope.row.quantity" style="color:red;">{{scope.row.quantity}}</span>
							<span v-else>{{scope.row.quantity}}</span>
                        </template>
			</el-table-column>
            <el-table-column
                    prop="expiry_date"
                    label="Expiry Date">
                <template slot-scope="scope">

                    <span v-if="new Date(scope.row.expiry_date).getTime() <= new Date().getTime()" style="color:red;">{{scope.row.expiry_date}}</span>
                    <span v-else>{{scope.row.expiry_date}}</span>
                </template>
            </el-table-column>
			<el-table-column prop="category.name" label="Unit" />
        </data-tables-server>
    </div>
</template>
<style>
    .el-table .warning-row {
        background: oldlace;
    }

    .el-table .success-row {
        background: aliceblue;
    }
</style>
<script>
    const getData = (url, page, callback) => {
        axios
            .get(`/api/${url}`, {params: page})
            .then(response => {
                callback(null, {data: response.data, page: page});
            }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {

        data() {
            var sortOrders = {}
            return {
                tableProps: {
                    rowClassName: function ({row, rowIndex}) {
                        if (new Date(row.expiry_date).getTime() <= new Date().getTime() ) {
                            return 'warning-row';
                        } else {
                            return 'success-row';
                        }
                        return '';
                    }
                },
                checkItemDialog: false,
                checkItemDialogMessage: {title: '', message: ''},
                filters: [
                    {
                        value: '',
                        'search_prop': 'id' // define search_prop for backend usage.
                    },
                    {
                        value: '',
                        'search_prop': 'id' // define search_prop for backend usage.
                    }
                ],
                dialogMessage: {title: '', message: ''},
                dialogVisible: false,
                actionCol: {
                    label: 'Action',
                    width: 180,
                    props: {
                        align: 'center',
                    },
                    buttons: [{
                        props: {
                            type: 'primary',
                            icon: 'el-icon-edit'
                        },
                        handler: row => {
                            var vm = this
                            vm.$router.push({
                                name: vm.$route.meta.title.toLowerCase() + '.edit',
                                params: {id: row.id, row: row}
                            })
                        },
                        label: 'Edit'
                    }, {
                        handler: row => {
                            var vm = this
                            axios.delete(`/api/products/${row.id}`).then(function () {
                                vm.data.splice(vm.data.indexOf(row), 1)
                            })


                        },
                        label: 'Delete'
                    }, {
                        handler: row => {
                            var vm = this
                            vm.$router.push({
                                name: vm.$route.meta.title.toLowerCase() + '.edit.check-item',
                                params: {id: row.id, row: row}
                            })
                        },
                        label: 'Check Item'
                    }]
                },
                query: {
                    page: 1,
                    column: 'id',
                    direction: 'desc',
                    per_page: 15,
                    search_column: 'all',
                    search_operator: 'like',
                    search_input: ''
                }
                ,
                operators: {
                    equal: '=',
                    not_equal: '<>',
                    less_than: '<',
                    greater_than: '>',
                    less_than_or_equal_to: '<=',
                    greater_than_or_equal_to: '>=',
                    in: 'IN',
                    like: 'LIKE'
                }
                ,
                columns: [{}],
                sortKey: '',
                sortOrders: sortOrders,
                data: [],
                meta: {}
                ,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                }
                ,
                error: null,
                filterKey: '',
                loading: false,
                _numberLoad: 0,
                categories: []
            }
                ;
        },
        computed: {
            filteredData: function () {
                var sortKey = this.sortKey
                var filterKey = this.filterKey && this.filterKey.toLowerCase()
                var order = this.sortOrders[sortKey] || 1
                var data = this.data
                if (filterKey) {
                    data = data.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
                        })
                    })
                }
                if (sortKey) {
                    data = data.slice().sort(function (a, b) {
                        a = a[sortKey]
                        b = b[sortKey]
                        return (a === b ? 0 : a > b ? 1 : -1) * order
                    })
                }
                return data
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
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1)
            }
        },
        beforeRouteEnter (to, from, next) {
            getData(to.meta.url, to.query, (err, data) => {

                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.

        beforeRouteUpdate (to, from, next) {
            //this.users = this.links = this.meta = null
            getData(to.meta.url, to.query, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            addNewGeneric(){
                var vm =this
                vm.$router.push({name: "create-medicine"})
            },
            addNewPO(){
                var vm =this
                vm.$router.push({name: "product.purchare-order"})
            },
            _delete(row){
                var vm = this
                if (row) {
                    vm.loading = true
                    axios.delete(`/api/${vm.$route.meta.url}/${row.id}`).then(function (response) {
                        vm.data.splice(vm.data.indexOf(row), 1)
                        vm.loading = false
                        vm.dialogVisible = false
                        vm.dialogMessage = {title: '', message: '', row: {}}
                        vm.$message({message: response.statusText, type: 'success'})
                    }).catch(function (error) {
                        vm.$message({message: error.statusText, type: 'warning'})
                        vm.loading = false
                    });
                }
            },
            handleClose(done) {
                this.$confirm('Are you sure to close this dialog?')
                    .then(_ => {
                        done();
                    })
                    .catch(_ => {
                    });
            },
            _create(){
                let vm = this
                vm.$router.push({name: vm.$route.meta.title.toLowerCase() + '.create'})
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
                        option.category_id = vm.filters[1].value.toString()
                    }
                    else {
                        delete option.category_id
                        delete option.search_input
                    }
                    vm.$router.push({
                        path: `${vm.$route.path}`,
                        query: option
                    }, function () {
                        vm.loading = false
                        if (option.search_input == '') {
                            delete option.search_input
                            vm.filters[0].value = ''
                        }
                        if(option.category_id == ''){
                            delete option.category_id
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
                    vm.data = data.data.model.data;
                    /*
                    *---------------------relationship------------------------
                    */
                    let categories = _.map(data.data.model.data, function (f) {
                        return f.category;
                    })
                    vm.categories = _.uniqBy(categories, 'id')
                    /*
                     *---------------------pagination------------------------
                     */
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
