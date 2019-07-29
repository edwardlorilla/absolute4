<template>
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a @click="logout_m" class="dropdown-item">
                        <i class="fa fa-sign-out mr-2"></i>Logout
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a @click.once="isApproved" class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa" :class="$root.unreadNotification.length ? 'fa-bell' : 'fa-bell-o'"></i>
                    <span class="badge badge-warning navbar-badge">{{$root.unreadNotification.length}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{$root.unreadNotification.length}} Notifications</span>
                    <div class="dropdown-divider"></div>
                    <router-link class="dropdown-item"
                                 v-for="notification in $root.unreadNotification"
                                 :to="{name: notification.data.type === 'medical-supply' || notification.data.type === 'office-supply' ? 'pending.supply' : notification.data.type === 'medical-request' ? 'pending.show':  notification.type === 'App\\Notifications\\Reorder' &&  notification.data.type == 1 ? 'supplies.check' : notification.type === 'App\\Notifications\\ReorderMedicine' ? 'product.edit.check-item': notification.type === 'App\\Notifications\\Expiry' ? 'product.edit.check-item' : 'office.supplies.check', params: {id: notification.type === 'App\\Notifications\\Reorder' &&  (notification.data.type == 1 || notification.data.type == 0) ? notification.data.supply_id : notification.type === 'App\\Notifications\\ReorderMedicine'? notification.data.product_id : notification.type === 'App\\Notifications\\Expiry' ? notification.data.data.id :  notification.id}}"
                                 :key="notification.id">
                        <i class="fa fa-sign-out mr-2"></i>{{ notification.data.message}}
                    </router-link>
                    <span class="dropdown-item dropdown-item-text"> {{$root.unreadNotification.length == 0 ? 'No Notification Yet!' : ''}}</span>
                    <router-link :to="{ name: $root.store.state.roles.user ? 'view.medicine.request' :  'pending-request.view' }" class="dropdown-item dropdown-footer">See All
                        Notifications
                    </router-link>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                        class="fa fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
</template>
<script>
    export default{
        methods: {
            logout_m(){
                var vm = this
                vm.$root.store.dispatch('loadingChange', true)
                axios.post('/logout').then(function () {
                    window.location.href = window.location.href;
                    // vm.$root.store.dispatch('loadingChange', false)
                }).catch(function (error) {
//                    vm.$root.store.dispatch('loadingChange', false)
                    window.location.href = window.location.href;
                })
            },
            isApproved(){
                var vm = this
                _.forEach(vm.$root.store.state.notifications.data, function (query) {
                    if(query.type === 'App\\Notifications\\Expiry' || query.data.type == 'medicine-approved' || query.data.type == 'supply-approved' || query.data.type == 'office-supply-approved') {
                        axios.get(`/api/user/notification/${query.id}`).then()
                    }
                })
            }
        }
    }
</script>