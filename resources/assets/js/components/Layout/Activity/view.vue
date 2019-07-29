<template>
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
                <el-input placeholder="Search" @keyup.enter="loadData" v-model="filters[0].value"></el-input>
            </div>
        </div>
        <data-tables-server v-if="nextPage || prevPage || !nextPage || !prevPage || meta"
                            :data="filteredData"
                            :action-col="actionCol"
                            :total="meta.total"
                            :filters="filters"
                            :pagination-props="{ background: true, pageSize: query.per_page ,  pageSizes: [query.per_page, 10, 20, 30] }"
                            :page-size="query.per_page"
                            :current-page="meta.current_page"
                            @query-change="loadData"
                            :loading="loading">
            <el-table-column
                    label="Associated User"
                    prop="user.name"
            />
            <el-table-column
                    label="TYPE">
                <template slot-scope="scope">
                    <type-column :type="scope.row.type"/>
                </template>
            </el-table-column>
            <el-table-column
                    label="Data">
                <template slot-scope="scope">
                   <component :is="scope.row.type" :user="scope.row.user.name" :data="scope.row.subject" />
                </template>
            </el-table-column>
        </data-tables-server>
    </div>
</template>
<script>
    import typeColumn from './type-column.vue'
    import created_request from './created_request.vue';
    import created_track from './created_track.vue';
    import created_supply from './created_supply.vue';
    import created_product from './created_product.vue';
    import updated_track from './updated_track.vue';
    import deleted_supply from './deleted_supply.vue';
    import deleted_product from './deleted_product.vue';
    import updated_product from './updated_product.vue';
    import updated_supply from './updated_supply.vue';
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
        components: {
            typeColumn,
            created_request,
            created_track,
            created_supply,
            created_product,
            updated_track,
            deleted_supply,
            deleted_product,
            updated_product,
            updated_supply
        },
        data() {
            var sortOrders = {}
            return {
                filters: [
                    {
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
                _numberLoad: 0
            };
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


                if (event.type === 'page') {
                    option.page = event.page
                    option.per_page = event.pageSize
                }
                if (event.type != "init") {

                    if (event.type === 'filter' && vm.filters[0].value.length != 0) {

                        option.search_column = vm.query.search_column
                        option.search_operator = vm.query.search_operator
                        option.search_input = vm.filters[0].value
                    }
                    else {
                        delete option.search_input
                    }
                    vm.$router.push({
                        path: `${vm.$route.path}`,
                        query: option
                    }, function () {
                        vm.loading = false
                    }, function () {
                        vm.loading = false
                    });
                } else {
                    vm.loading = false
                }
            }, 500),
            setData (err, data) {
                console.log(data)
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {
                    console.log(data)
                    vm.data = data.data.model.data;
                    console.log(vm.data)
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
