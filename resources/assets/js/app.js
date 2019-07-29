require('babel-polyfill');
require('./bootstrap');
window.Vue = require('vue')

import NProgress from 'nprogress';
import ElementUI from 'element-ui';
import VueRouter from 'vue-router'
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'
import VueDataTables from 'vue-data-tables'
import vueSignature from "vue-signature"
import Print from 'vue-print-nb'
import VueChartkick from 'vue-chartkick'
import Chart from 'chart.js'
import moment from 'moment'
Object.defineProperty(Vue.prototype, '$moment', {
    get(){
        return this.$root.moment
    }
})


Vue.use(VueChartkick, {adapter: Chart})
Vue.use(Print);
Vue.use(vueSignature);
Vue.use(ElementUI);
locale.use(lang)
Vue.use(VueDataTables)
Vue.use(VueRouter)
Vue.component('pre-loader', require('./components/Utilities/Preloader.vue'));
Vue.use(require('./components/Plugin/acl'));
const router = new VueRouter({
    mode: 'history',
    base: '/dashboard',
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/profile",
            component: resolve => {
                require.ensure(["./components/Layout/Profile/Profile.vue"], () => {
                    resolve(require("./components/Layout/Profile/Profile.vue"))
                })
            },
            name: "profile.index",
            meta: {title: 'Profile'},
            children: [
                {
                    path: "edit",
                    component: resolve => {
                        require.ensure(["./components/Layout/Profile/Edit.vue"], () => {
                            resolve(require("./components/Layout/Profile/Edit.vue"))
                        })
                    },
                    name: "profile.edit",
                }, {
                    path: "signature",
                    component: resolve => {
                        require.ensure(["./components/Layout/Profile/Signature.vue"], () => {
                            resolve(require("./components/Layout/Profile/Signature.vue"))
                        })
                    },
                    name: "profile.signature",
                },
                {
                    path: "change-password",
                    component: resolve => {
                        require.ensure(["./components/Layout/Profile/ChangePassword.vue"], () => {
                            resolve(require("./components/Layout/Profile/ChangePassword.vue"))
                        })
                    },
                    name: "change.password"
                },
                {
                    path: "settings",
                    component: resolve => {
                        require.ensure(["./components/Layout/Profile/Setting.vue"], () => {
                            resolve(require("./components/Layout/Profile/Setting.vue"))
                        })
                    },
                    name: "setting.index"
                }
            ]
        },
        {
            path: "/",
            component: resolve => {
                require.ensure(["./components/Layout/Dashboard/wrapper.vue"], () => {
                    resolve(require("./components/Layout/Dashboard/wrapper.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            name: "dashboard.wrapper",
            meta: {
                title: 'Dashboard', roles: ['superadministrator'], permissions: [
                    {
                        role: "registered",
                        access: (user, to) => user.can.superadministrator,
                        redirect: "pending.medicine.request"
                    }
                ]
            }
        },
        {
            path: "/:model(racks*|roles*|users*|categories*|packages*|suppliers*)",
            component: resolve => {
                require.ensure(["./components/Layout/Table/Grid.vue"], () => {
                    resolve(require("./components/Layout/Table/Grid.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            meta: {
                roles: ['superadministrator'], permissions: [
                    {
                        role: "registered",
                        access: (user, to) => user.can.superadministrator,
                        redirect: "pending.medicine.request"
                    }
                ]
            },
            name: "model.index",

        },

        {
            path: "/requests",
            component: resolve => {
                require.ensure(["./components/Layout/Requests/index.vue"], () => {
                    resolve(require("./components/Layout/Requests/index.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => {
                        require.ensure(["./components/Layout/Requests/Request"], () => {
                            resolve(require("./components/Layout/Requests/Request.vue"))
                        })
                    },
                    name: "requests.index",
                    meta: {title: 'Requests', url: "requests", type: '', roles: ['superadministrator']}
                },
                {
                    path: "create",
                    component: resolve => {
                        require.ensure(["./components/Layout/Requests/edit.vue"], () => {
                            resolve(require("./components/Layout/Requests/edit.vue"))
                        })
                    },
                    name: "requests.create",
                    meta: {title: 'Request', url: "requests", type: 'Create', roles: ['superadministrator']}
                }, {
                    path: "edit/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/Requests/create.vue"], () => {
                            resolve(require("./components/Layout/Requests/edit.vue"))
                        })
                    },
                    name: "requests.edit",
                    meta: {title: 'Request', url: "requests", type: 'Edit', roles: ['superadministrator']}
                },
                {
                    path: "print/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/Requests/print.vue"], () => {
                            resolve(require("./components/Layout/Requests/print.vue"))
                        })
                    },
                    name: "requests.print",
                    meta: {title: 'Request', url: "requests", type: 'Print', roles: ['superadministrator']}
                }
            ]
        },
        {
            path: '/medicines',
            component: resolve => require(["./components/Layout/Medicine/index.vue"], resolve),
            children: [
                {
                    path: '',
                    name: 'view-medicine',
                    component: resolve => require(["./components/Layout/Medicine/view.vue"], resolve),
                },
                {
                    path: 'create',
                    name: 'create-medicine',
                    component: resolve => require(["./components/Layout/Medicine/create.vue"], resolve),
                },
                {
                    path: 'edit/:id',
                    name: 'edit-medicine',
                    component: resolve => require(["./components/Layout/Medicine/create.vue"], resolve),
                },
            ]
        },
        {
            path: "/transactions",
            component: resolve => {
                require.ensure(["./components/Layout/Transactions/index.vue"], () => {
                    resolve(require("./components/Layout/Transactions/index.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => {
                        require.ensure(["./components/Layout/Transactions/Transaction.vue"], () => {
                            resolve(require("./components/Layout/Transactions/Transaction.vue"))
                        })
                    },
                    name: "transactions.index",
                    meta: {title: 'Transactions', url: "transactions", type: '', roles: ['superadministrator']}
                }
            ]
        },
        {
            path: "/purchase-orders",
            component: resolve => {
                require.ensure(["./components/Layout/Order/index.vue"], () => {
                    resolve(require("./components/Layout/Order/index.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => {
                        require.ensure(["./components/Layout/Order/view.vue"], () => {
                            resolve(require("./components/Layout/Order/view.vue"))
                        })
                    },
                    name: "orders.view",
                    meta: {title: 'Purchase Orders', url: "orders", type: '', roles: ['superadministrator']}
                },{
                    path: ":id(\\d+)/print",
                    component: resolve => {
                        require.ensure(["./components/Layout/Order/print.vue"], () => {
                            resolve(require("./components/Layout/Order/print.vue"))
                        })
                    },
                    name: "orders.print",
                    meta: {title: 'Purchase Orders', url: "orders", type: '', roles: ['superadministrator']}
                },
            ]
        },
        {
            path: "/products",
            component: resolve => {
                require.ensure(["./components/Layout/CategoryPackage/ProductIndex.vue"], () => {
                    resolve(require("./components/Layout/CategoryPackage/ProductIndex.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => {
                        require.ensure(["./components/Layout/Table/Product.vue"], () => {
                            resolve(require("./components/Layout/Table/Product.vue"))
                        })
                    },
                    name: "products.index",
                    meta: {title: 'Product', url: "products", type: '', roles: ['superadministrator']}
                },
                {
                    path: "create",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/ProductCreate.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/ProductCreate.vue"))
                        })
                    },
                    name: "product.create",
                    meta: {title: 'Product', url: "products", type: 'Create', roles: ['superadministrator']}
                }, {
                    path: "edit/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/ProductCreate.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/ProductCreate.vue"))
                        })
                    },
                    name: "product.edit",
                    meta: {title: 'Product', url: "products", type: 'Edit', roles: ['superadministrator']}
                }, {
                    path: "purchase-order/",
                    component: resolve => {
                        require.ensure(["./components/Layout/Product/create.vue"], () => {
                            resolve(require("./components/Layout/Product/create.vue"))
                        })
                    },
                    name: "product.purchare-order",
                    meta: {title: 'Product', url: "products", type: 'Edit', roles: ['superadministrator']}
                },
                {
                    path: "edit/:id/check-item",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/ProductEditCheckIn.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/ProductEditCheckIn.vue"))
                        })
                    },
                    name: "product.edit.check-item",
                    meta: {title: 'Product', url: "products", type: 'Check In', roles: ['superadministrator']}
                },
            ]
        },
        {
            path: "/racks",
            component: resolve => {
                require.ensure(["./components/Layout/CategoryPackage/index.vue"], () => {
                    resolve(require("./components/Layout/CategoryPackage/index.vue"))
                })
            },
            children: [
                {
                    path: "create",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/create.vue"))
                        })
                    },
                    name: "racks.create",
                    meta: {title: 'Rack', url: "racks", type: 'Create', roles: ['superadministrator']}
                }, {
                    path: "edit/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/create.vue"))
                        })
                    },
                    name: "racks.edit",
                    meta: {title: 'Rack', url: "racks", type: 'Edit', roles: ['superadministrator']}
                },
            ]
        },
        {
            path: "/category",
            meta: {roles: ['superadministrator']},
            component: resolve => {
                require.ensure(["./components/Layout/CategoryPackage/index.vue"], () => {
                    resolve(require("./components/Layout/CategoryPackage/index.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "create",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/create.vue"))
                        })
                    },
                    name: "categories.create",
                    meta: {title: 'Category', url: "categories", type: 'Create'}
                }, {
                    path: "edit/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/create.vue"))
                        })
                    },
                    name: "categories.edit",
                    meta: {title: 'Category', url: "categories", type: 'Edit'}
                },
            ]
        },
        {
            path: "/package",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Layout/CategoryPackage/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "create",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/create.vue"))
                        })
                    },
                    name: "packages.create",
                    meta: {title: 'Package', url: "packages", type: 'Create'}
                },
                {
                    path: "edit/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/create.vue"))
                        })
                    },
                    name: "packages.edit",
                    meta: {title: 'Package', url: "packages", type: 'Edit'}
                }
            ]
        },
        {
            path: "/supplier",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Layout/CategoryPackage/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "create",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/Supplier/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/Supplier/create.vue"))
                        })
                    },
                    name: "suppliers.create",
                    meta: {title: 'Supplier', url: "suppliers", type: 'Create'}
                },
                {
                    path: "edit/:id",
                    component: resolve => {
                        require.ensure(["./components/Layout/CategoryPackage/Supplier/create.vue"], () => {
                            resolve(require("./components/Layout/CategoryPackage/Supplier/create.vue"))
                        })
                    },
                    name: "suppliers.edit",
                    meta: {title: 'Supplier', url: "suppliers", type: 'Edit'}
                }
            ]
        },
        {
            path: "/divisions",
            meta: {roles: ['superadministrator']},
            component: resolve => {
                require.ensure(["./components/Division/index.vue"], () => {
                    resolve(require("./components/Division/index.vue"))
                })
            },
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => {
                        require.ensure(["./components/Division/view.vue"], () => {
                            resolve(require("./components/Division/view.vue"),)
                        })
                    },
                    name: "divisions.view",
                    meta: {title: 'Divisions', url: "divisions", type: ''}
                },
                {
                    path: "create",
                    component: resolve => require(['./components/Division/create.vue'], resolve),
                    name: "divisions.create",
                    meta: {title: 'Division', url: "divisions", type: 'Create'}
                },
                {
                    path: "edit/:id",
                    component: resolve => require(["./components/Division/create.vue"], resolve),
                    name: "divisions.edit",
                    meta: {title: 'Edit Divisions', url: "divisions", type: 'Edit'}
                }, {
                    path: "show/:id",
                    component: resolve => require(["./components/Division/show.vue"], resolve),
                    name: "divisions.show",
                    meta: {title: 'Receipt', url: "divisions", type: ''}
                },
            ]
        },
        {
            path: "/receipts",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Layout/Receipt/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => require(["./components/Layout/Receipt/view.vue"], resolve),
                    name: "receipt.view",
                    meta: {title: 'Divisions', url: "ris-print", type: ''}
                },{
                    path: "print/:id(\\d+)",
                    component: resolve => require(["./components/Layout/Receipt/print.vue"], resolve),
                    name: "receipt.print",
                    meta: {title: 'Divisions', url: "ris-print", type: ''}
                },
            ]
        },
        {
            path: "/users",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Layout/CategoryPackage/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [

                {
                    path: "create",
                    component: resolve => require(["./components/Layout/CategoryPackage/UserCreate.vue"], resolve),
                    name: "users.create",
                    meta: {title: 'User', url: "users", type: 'Create'}
                },
                {
                    path: ":id",
                    component: resolve => require(["./components/Layout/User/index.vue"], resolve),
                    name: "users.index",
                    meta: {title: 'User', url: "users", type: ''}
                },
                {
                    path: "edit/:id",
                    component: resolve => require(["./components/Layout/CategoryPackage/UserCreate.vue"], resolve),
                    name: "users.edit",
                    meta: {title: 'User', url: "users", type: 'Edit'}
                },

            ]
        },
        {
            path: "/supplies",
            component: resolve => require(["./components/Supplies/Supplies.vue"], resolve),
            meta: {title: 'Supplies', url: "supplies", roles: ['superadministrator']},
            name: "supplies.view",
        },
        {
            path: "/office-supplies",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Layout/Office/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "check/:id(\\d+)",
                    component: resolve => require(["./components/Layout/Office/checkin.vue"], resolve),
                    name: "office.supplies.check",
                    meta: {title: 'Check in', url: "supplies", type: 'Check-in'}
                },
                {
                    path: "receive-item/create",
                    component: resolve => {
                        require.ensure(["./components/Layout/Office/recieve_supply.vue"], () => {
                            resolve(require("./components/Layout/Office/recieve_supply.vue"))
                        })
                    },
                    name: "requests.office-receive-item.create",
                    meta: {title: 'Request', url: "supplies/receive-item", type: 'Create'}
                },
                {
                    path: "",
                    component: resolve => {
                        require.ensure(["./components/Layout/Office/view.vue"], () => {
                            resolve(require("./components/Layout/Office/view.vue"))
                        })
                    },
                    name: "supply.office-supplies",
                    meta: {
                        title: 'Office Supplies',
                        url: "supplies",
                        type: '',
                    }
                },
                {
                    path: "edit/:id(\\d+)",
                    component: resolve => require(["./components/Supplies/create_office_supply.vue"], resolve),
                    name: "office-supply.edit",
                    meta: {title: 'Supplies', url: "supplies", type: 'Edit'}
                },
                {
                    path: "create",
                    component: resolve => require(["./components/Supplies/create_office_supply.vue"], resolve),
                    name: "supplies.create.office-supply",
                    meta: {title: 'Supplies', url: "supplies?type=0", type: 'Create'}
                },
            ]
        },

        {
            path: "/pending-request",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Layout/Pending/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    name: 'pending-request.view',
                    component: resolve => require(["./components/Layout/Pending/view.vue"], resolve),
                    meta: {
                        title: 'Pending Request',
                        url: "pending",
                        type: '',
                    },
                }, {
                    path: ":id",
                    name: 'pending.show',
                    component: resolve => require(["./components/Layout/Pending/show.vue"], resolve),
                    meta: {

                        title: 'Pending Request',
                        url: "pending",
                        type: '',
                    },
                }, {
                    path: "supply/:id",
                    name: 'pending.supply',
                    component: resolve => require(["./components/Layout/Pending/show-supply.vue"], resolve),
                    meta: {

                        title: 'Pending Supply Request',
                        url: "pending",
                        type: '',
                    },
                }
            ]
        },
        {
            path: "/user-request",
            meta: {roles: ['user', 'superadministrator']},
            component: resolve => require(["./components/Layout/Pending/UserRequestView/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => require(["./components/Layout/Pending/UserRequestView/view.vue"], resolve),
                    name: "view.medicine.request",
                    meta: {
                        title: 'Request',
                        url: "users/mark-as-read/notification", // /view
                        type: 'view-request-medicine',
                    }
                },
                {
                    path: "print/:id",
                    component: resolve => require(["./components/Layout/Pending/UserRequestView/print_user_request.vue"], resolve),
                    name: "view.medicine.print.request",
                    meta: {
                        title: 'Request',
                        url: "/user/notification", // /view
                        type: 'view-request-medicine',
                    }
                },
                {
                    path: "medicine-request",
                    component: resolve => require(["./components/Layout/Pending/UserRequestView/Medicine.vue"], resolve),
                    name: "pending.medicine.request",
                    meta: {
                        title: 'Request Medicine',
                        url: "pending", // /request-medicine
                        type: 'request-medicine',
                    }
                },
                {
                    path: "supply",
                    component: resolve => require(["./components/Layout/Pending/UserRequestView/recieve_supply.vue"], resolve),
                    name: "pending.supply.request",
                    meta: {
                        title: 'Request Supply',
                        url: "pending/supply",
                        type: 'pending_request',
                    }
                }, {
                    path: "office-supply",
                    component: resolve => require(["./components/Layout/Pending/UserRequestView/recieve_office_supply.vue"], resolve),
                    name: "pending.office-supply.request",
                    meta: {
                        onSubmitType: 0,
                        title: 'Request Office Supply',
                        url: "pending/supply",
                        type: 'pending_request',
                    }
                }
            ]
        },
        {
            path: "/supplies",
            meta: {roles: ['superadministrator']},
            component: resolve => require(["./components/Supplies/index.vue"], resolve),
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "receive-item/create",
                    component: resolve => {
                        require.ensure(["./components/Supplies/recieve_supply.vue"], () => {
                            resolve(require("./components/Supplies/recieve_supply.vue"))
                        })
                    },
                    name: "requests.receive-item.create",
                    meta: {title: 'Request', url: "supplies/receive-item", type: 'Create'}
                },
                {
                    path: "create",
                    component: resolve => require(["./components/Supplies/create_supply.vue"], resolve),
                    name: "supplies.create",
                    meta: {title: 'Supplies', url: "supplies?type=1", type: 'Create'}
                }, {
                    path: "purchase-order/create",
                    component: resolve => require(["./components/Supplies/create_po.vue"], resolve),
                    name: "supplies.purchase-order.create",
                    meta: {title: 'Supplies', url: "supplies", type: 'Create'}
                },
                {
                    path: "requests",
                    component: resolve => require(["./components/Supplies/supply_request.vue"], resolve),
                    name: "supplies.request",
                    meta: {title: 'Request', url: "supplies", type: 'request'}
                },
                {
                    path: "print/:id(\\d+)",
                    component: resolve => require(["./components/Supplies/print.vue"], resolve),
                    name: "supplies.print",
                    meta: {title: 'Request', url: "supplies", type: 'Print'}
                }, {
                    path: "print-requisition/:id(\\d+)",
                    component: resolve => require(["./components/Supplies/print_requisition.vue"], resolve),
                    name: "supplies.print_requisition",
                    meta: {title: 'Request', url: "supplies", type: 'Print'}
                },
                {
                    path: ":id(\\d+)",
                    component: resolve => require(["./components/Supplies/show.vue"], resolve),
                    name: "supplies.index",
                    meta: {title: 'Supplies', url: "supplies", type: ''}
                },
                {
                    path: "edit/:id(\\d+)",
                    component: resolve => require(["./components/Supplies/create.vue"], resolve),
                    name: "supplies.edit",
                    meta: {title: 'Supplies', url: "supplies", type: 'Edit'}
                },
                {
                    path: "check/:id(\\d+)",
                    component: resolve => require(["./components/Supplies/checkin.vue"], resolve),
                    name: "supplies.check",
                    meta: {title: 'Check in', url: "supplies", type: 'Check-in'}
                },

            ]
        },
        {
            path: "/role",
            component: resolve => require(["./components/Layout/CategoryPackage/index.vue"], resolve),
            meta: {roles: ['superadministrator']},
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "create",
                    component: resolve => require(["./components/Layout/CategoryPackage/RoleCreate.vue"], resolve),
                    name: "roles.create",
                    meta: {title: 'Role', url: "roles", type: 'Create', roles: ['superadministrator']}
                },
                {
                    path: "edit/:id",
                    component: resolve => require(["./components/Layout/CategoryPackage/RoleCreate.vue"], resolve),
                    name: "roles.edit",
                    meta: {title: 'Role', url: "roles", type: 'Edit'}
                }
            ]
        },
        {
            path: "/activities",
            component: resolve => require(["./components/Layout/Activity/index.vue"], resolve),
            meta: {roles: ['superadministrator']},
            redirect: window.Laravel.store.superadministrator ? false : '/user-request',
            children: [
                {
                    path: "",
                    component: resolve => require(["./components/Layout/Activity/view.vue"], resolve),
                    name: "activity.view",
                    meta: {title: 'Activity', url: "activities", type: '', roles: ['superadministrator']}
                }, {
                    path: "create",
                    component: resolve => require(["./components/Layout/Activity/create.vue"], resolve),
                    name: "activity.create",
                    meta: {title: 'Activity', url: "activities", type: 'Create', roles: ['superadministrator']}
                },
                {
                    path: "edit/:id",
                    component: resolve => require(["./components/Layout/Activity/edit.vue"], resolve),
                    name: "activity.edit",
                    meta: {title: 'Activity', url: "activities", type: 'Edit'}
                }
            ]
        },
        {path: '*', name: 'error.not-found', component: resolve => require(["./components/Layout/Errors/404.vue"], resolve)},
    ]
});
router.beforeEach((to, from, next) => {
    if (to.path) {
        NProgress.start()
    }
    if (to.params.model) {
        to.meta.url = to.params.model
        to.meta.title = _.startCase(to.params.model)
    }
    var isAuth = false
    if (to.meta.roles) {
        _.forEach(to.meta.roles, function (select) {
            if (window.Laravel.permissions.indexOf(select) !== -1) {
                isAuth = true
                next()
            }
        });
        if (!isAuth) {
            next(false)
        }
    } else {
        next()
    }

});
router.afterEach(() => {
    NProgress.done()
});
import VueRouterUserRoles from "./vue-router-user-roles";
Vue.use(VueRouterUserRoles, {router});
$(window).on('load', function () {
    axios.get('/api/user').then(function (response) {

        var store = {}, roles = window.Laravel.roles
        for (var i = 0; i < roles.length; i++) {
            store[roles[i]] = true;
        }
        response.data['can'] = store
        $('.preloader svg').fadeOut();
        $('.preloader main').fadeOut();
        $('.preloader').fadeOut();
        $('body').delay(333).css({'overflow': 'visible'});
        return response.data
    }).then(user => {
        Vue.prototype.$user.set(Object.assign(user, {role: "registered"}));
        new Vue({
            el: '#app',
            router,
            data(){
                var vm = this
                return {
                    validate: {
                        required: [
                            {required: true}
                        ]
                    },
                    moment,
                    profileId: '',
                    store: {
                        state: {
                            notifications: {data: []},
                            alert: {
                                state: false,
                                text: '',
                                type: 'success'
                            },
                            roles: vm.$can(),
                            user: user.user,
                            can: user.can,
                            setting: user.setting,
                            loading: false
                        },
                        mutations: {
                            handleSideBar(){
                                document.body.classList.toggle('sidebar-collapse')
                            },
                            ALERT(state, data){
                                state.alert.type = data.type
                                state.alert.text = data.text
                                state.alert.state = true
                                setTimeout(function () {
                                    state.alert.state = false
                                }, 3000)
                            },
                            dataURItoBlob(state, dataURI) {
                                var byteString = atob(dataURI.split(',')[1]);
                                var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]
                                var ab = new ArrayBuffer(byteString.length);
                                var ia = new Uint8Array(ab);
                                for (var i = 0; i < byteString.length; i++) {
                                    ia[i] = byteString.charCodeAt(i);
                                }
                                var blob = new Blob([ab], {type: mimeString});
                                return blob;
                            },
                            settingChange(state, data){
                                state.setting = data
                            },
                            userChange(state, data){
                                _.merge(state.user, data)
                            },
                            loadingChange(state, data){
                                state.loading = data
                            },
                            loadNotification(state, data){
                                var vm = this
                                state.loading = true
                                axios.get(`/api/users/notification/${state.user.id}`).then(function (response) {
                                    state.loading = false
                                    state.notifications = response.data
                                   

                                }).catch(function (err) {
                                    state.loading = false
                                    if (err.data) {
                                        vm.$message({message: error.response.data.message, type: 'error'})
                                    }
                                })
                            }
                        },
                        dispatch(mutation, data = {}){ //$root.store.dispatch
                            this.mutations[mutation](this.state, data)
                        }
                    }
                }
            },
            computed:{
                unreadNotification(){
                    var vm = this
                    return _.filter(vm.store.state.notifications.data, function (notification) {
                        return !notification.read_at
                    })
                }
            },
            mounted(){
                this.store.dispatch('loadNotification')
            },
            render: h => h(require('./components/App.vue'))
        });
    });
});
