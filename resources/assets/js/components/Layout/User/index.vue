<template>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">{{$route.meta.type}} {{$route.meta.title}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <address v-if="form.name">
                                <strong>Name</strong><br>
                                {{form.name}}
                            </address>

                            <address v-if="form.email">
                                <strong>Email</strong><br>
                                <a :href="'mailto:' + form.email">{{form.email}}</a>
                            </address>
                            <address v-if="form.address">
                                <strong>Address</strong><br>
                                {{form.address}}
                            </address>
                            <address>
                                <router-link class="btn btn-success" :to="{name: 'users.edit'}">Edit</router-link>
                            </address>
                        </div>
                        <div class="col-6">
                            <strong>Roles</strong>
                            <ul v-if="form.roles.length !== 0">
                                <li v-for="role in form.roles">
                                    {{role.description}}
                                </li>
                            </ul>
                            <blockquote v-else>
                                <footer>This user has not been assign any roles yet!</footer>
                            </blockquote>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                form: {},
                roles: []
            }
        },
        beforeRouteEnter (to, from, next) {
            if (to.params.id) {
                axios.get(`/api/${to.meta.url}/${to.params.id}`).then(function (response) {
                    next(vm => vm.setData(response.data) )
                })
            } else {
                next()
            }
        },
        beforeRouteUpdate (to, from, next) {
            var vm = this
            if (to.params.id) {
                axios.get(`/api/${to.meta.url}/${to.params.id}`).then(function (response) {
                    vm.setData(response.data)
                    next()
                })
            } else {
                next()
            }
        },
        methods: {
            setData (row) {
                var vm = this
                vm.form = row.user
                vm.roles = row.roles
            }
        }
    }
</script>
