/**
 * Created by Edward Lance Lorilla on 8/9/2018.
 */
/*
 * Simple plugin adding $can method to Vue.
     * Require permissions loaded in window.Laravel.permissions and current userId in window.Laravel.userId
 */

const Acl = {
    install(Vue, options) {
        // "can" directive accept string with single permission or object containing "permission", and "authorId"
        Vue.directive('can', {
            bind (el, binding, vnode, oldVnode) {
                if (binding.value instanceof Object) {
                    if (binding.value.authorId==window.Laravel.userId) {
                        return true;
                    }
                    permission = binding.value.permission;
                } else {
                    permission = binding.value;
                }
                if (window.Laravel.permissions.indexOf(permission)==-1) {
                    el.style.display = 'none';
                }
            }
        });
        Vue.prototype.$can = function () {
            var store = {}, roles = window.Laravel.roles
            for (var i = 0; i < roles.length; i++) {
                store[roles[i]] = true;
            }
            return store
        }
    }
};

module.exports = Acl;