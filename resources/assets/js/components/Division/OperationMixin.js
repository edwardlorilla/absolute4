/**
 * Created by Edward Lance Lorilla on 7/18/2018.
 */
export default {
    data() {
        return {
            isDisabled: false,
            labelPosition: 'left',
            errors: [],
        }
    },
    beforeRouteEnter (to, from, next) {
        if (to.params.id) {
            axios.get(`/api/${to.meta.url}/${to.params.id}`).then(function (response) {
                next(vm => vm.setData(response.data))
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
        onSubmit(){
            let vm = this
            vm.isDisabled = true
            vm.errors = []
            axios.post('/api/' + vm.$route.meta.url, vm.form)
                .then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.isDisabled = false
                })
                .catch(function (error) {

                    if (error.response.data.errors && error.response.data.message) {
                        vm.errors = error.response.data.errors;
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }
                    vm.isDisabled = false
                });
        },
        setData (row) {
            var vm = this
            vm.form = row
            if (!row.packs) {
                vm.form.packs = {
                    item_pack: '',
                    item_type: '',
                    sub_item: '',
                    sub_item_type: '',
                }
            }

        }
    },
}