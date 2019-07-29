<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link class="brand-link" :to="{name: 'dashboard.wrapper'}">
            <img :src="$root.store.state.setting.photo ?  '/storage/images/' + $root.store.state.setting.photo.file : '/storage/AdminLTELogo.png'"
                 alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{$root.store.state.setting.name}}</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div v-if="$root.store.state.user.name" class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img :src="$root.store.state.user.photo ? '/storage/images/' + $root.store.state.user.photo.file : '/storage/avatar.png'"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <router-link class="d-block" :to="{name: 'profile.edit'}">{{$root.store.state.user.name}}
                    </router-link>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column">
                    <li v-for="route in filterRoute" class="nav-item">
                        <router-link class="nav-link"
                                     :to="route.to">
                            <i class="fa  nav-icon" :class="route.icon ? route.icon : 'fa-circle-o' "></i>
                            <p>{{route.name}}<span v-if="route.badge" class="right badge badge-danger">{{route.badge}}</span></p>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>
<script>
    export default {
        computed: {
            filterRoute(){
                var vm = this,
                    routes = [
                        {
                            to: { name: 'dashboard.wrapper'},
                            name: 'Dashboard',
                            icon: 'fa-tachometer ',
                            roles: ['superadministrator']
                        },
                        {
                            to: '/user-request',
                            name: 'User Requests',
                            icon: 'fa-users ',
                            roles: ['user']
                        },
                        {
                            to: '/users',
                            name: 'Users',
                            icon: 'fa-users ',
                            roles: ['superadministrator']
                        },{
                            to: '/divisions',
                            name: 'User Division',
                            icon: 'fa-users ',
                            roles: ['superadministrator']
                        },
                        {
                            to: '/categories',
                            name: 'Categories',
                            icon: 'fa-tags',
                            roles: ['superadministrator']
                        },
                        {
                            to: '/packages',
                            name: 'Packages',
                            icon: 'fa-archive',
                            roles: ['superadministrator']
                        },
                        {
                            to: '/medicines',
                            name: 'Generic Medicine',
                            icon: 'fa-cubes',
                            roles: ['superadministrator']
                        },{
                            to: '/products',
                            name: 'Main Medicine',
                            icon: 'fa-cubes',
                            roles: ['superadministrator']
                        },
                        {
                            to: '/pending-request',
                            name: 'Pending Request',
                            icon: 'fa-medkit',
                            roles: ['superadministrator'],
                            badge: vm.$root.store.state.notifications ? vm.$root.store.state.notifications.data.length: null,
                        },

                        {
                            to: '/requests',
                            name: 'Request Medicines',
                            icon: 'fa-medkit',
                            roles: ['superadministrator']
                        }, /*{
                            to: '/transactions',
                            name: 'Medicine Transactions',
                            icon: 'fa-exchange',
                            roles: ['superadministrator']
                        },*/{
                            to: '/supplies',
                            name: 'Medicine Supplies',
                            icon: 'fa-plus-square',
                            roles: ['superadministrator']
                        },{
                            to: '/office-supplies',
                            name: 'Office Supplies',
                            icon: 'fa-tasks',
                            roles: ['superadministrator']
                        },{
                            to: '/activities',
                            name: 'Activities',
                            icon: 'fa-history',
                            roles: ['superadministrator']
                        },{
                            to: '/purchase-orders',
                            name: 'Purchase Orders',
                            icon: 'fa-shopping-basket',
                            roles: ['superadministrator']
                        },
                        {
                            to: '/receipts',
                            name: 'Other Recipient/ Print RIS',
                            icon: 'fa-tasks',
                            roles: ['superadministrator']
                        },
                    ],
                    selectedFilter = _.map(routes, function (select) {
                        var filter = _.filter(select.roles, function (role) {
                            return window.Laravel.permissions.indexOf(role) !== -1
                        })
                        return !_.isEmpty(filter) ? select : null
                    });
                return _.compact(selectedFilter)
            }
        }
    }
</script>