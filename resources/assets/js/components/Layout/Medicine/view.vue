<template>
    <div>
        <grid-view :columns="columns"
                   :data="data.model"
                   create-name="Add Medicine"
                   on-delete="/api/medicines"
                   on-edit-name="edit-medicine"
                   on-create-name="create-medicine"
                   @delete="data.model.data.splice($event, 1)"
        ></grid-view>
    </div>
</template>
<style>
</style>
<script>
    import GridView from './Grid.vue'
    export default{
        data(){
            return {
                columns: [
                    {
                        label: 'Name',
                        prop:  'name',
                        sort: true
                    }
                ],
                data: []
            }
        },
        components: {
            GridView,
        },
        beforeRouteEnter (to, from, next) {
            axios.get(`/api/medicines`, {params: to.query}).then(function (response) {
                next(vm => vm.setData(response.data))
            })
        },
        beforeRouteUpdate (to, from, next) {
            var vm = this
            axios.get(`/api/medicines`, {params: to.query}).then(function (response) {
                vm.setData(response.data)
                next()
            })
        },
        methods: {
            setData(response){
                this.data = response
            },
        }
    }
</script>