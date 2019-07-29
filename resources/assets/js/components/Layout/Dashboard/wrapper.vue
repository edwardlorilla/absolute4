<template>
    <div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fa fa-pie-chart mr-1"></i>
                            Transactions<!--
                            <h1 v-if="$can('read-users')">You have permission to manage users</h1>
                            <h1 v-else>You dont have permission to manage users</h1>-->
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div v-if="transactions.length">
                            <transaction :data$="transactions" />
                        </div>
                        <div v-else>
                            You don't have any data
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fa fa-pie-chart mr-1"></i>
                            Products
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div v-if="transactions.length" >
                            <product :data$="transactions" />
                        </div>
                        <div v-else>
                            You don't have any data
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fa fa-pie-chart mr-1"></i>
                            Notifications<!--
                            <h1 v-if="$can('read-users')">You have permission to manage users</h1>
                            <h1 v-else>You dont have permission to manage users</h1>-->
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div v-if="notifications">
                            <notifications
                                    v-if="notifications.data"
                                    :columns="columns"
                                    :data="notifications"
                                    :show-edit="false"
                                    :show-create="false"
                                    :show-delete="false"
                            ></notifications>
                        </div>
                        <div v-else>
                            You don't have any data
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fa fa-pie-chart mr-1"></i>
                            Recent Expired Medicine<!--
                            <h1 v-if="$can('read-users')">You have permission to manage users</h1>
                            <h1 v-else>You dont have permission to manage users</h1>-->
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <recent-expire-medicine  v-if="expires.data"
                                                 :columns="expiredColumn"
                                                 :data="expires"
                                                 :show-edit="false"
                                                 :show-create="false"
                                                 :show-delete="false"/>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import Transaction from '../Chart/Transactions/chart.vue'
    import Product from '../Chart/Product/LineChart.vue'
    import Notifications from '../Chart/Notifications.vue'
    import RecentExpireMedicine from './RecentExpireMedicine.vue'
    export default{
        components: {
            Transaction,
            Product,
            Notifications,
            RecentExpireMedicine
        },
        data(){
            return{
                transactions: [],
                notifications: [],
                expires: [],
                expiredColumn:[
                    {
                        label: 'Product Name',
                        prop:  'data.data.medicine.name',
                        sort: true
                    },
                    {
                        label: 'Expire Date',
                        prop:  'data.data.expiry_date',
                        sort: true
                    }

                ],
                columns: [
                    {
                        label: 'User Name',
                        prop:  'notifiable.name',
                        sort: true
                    },{
                        label: 'Email',
                        prop:  'notifiable.email',
                        sort: true
                    },{
                        label: 'Message',
                        prop:  'data.message',
                        sort: true
                    },
                ],
            }
        },
        beforeRouteEnter(a, b, c) {
            axios.get(`/api/dashboard`).then(function (d) {
                c(e => e.setData(d.data));
            });
        },
        beforeRouteUpdate(a, b, c) {
            var d = this;
            axios.get(`/api/dashboard`).then(function (e) {
                d.setData(e.data), c();
            });
        },
        methods:{
            setData(a) {
                var b = this;
                b.transactions = a.transactions;
                b.notifications = a.notifications;
                b.expires= a.expires;
            }
        }
    }
</script>
