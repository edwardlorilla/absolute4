<template>
    <div class="row">
        <div class="col-lg-12">
            <form ref="form"
                  @submit.prevent="onSubmit">
                <div class="card">

                    <div class="card-header">
                        <h5 class="m-0">Add New Supply</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Item Name</label>
                                    <input required type="text"
                                           v-model="form.name" class="form-control form-control-sm"
                                           id="name" name="name"
                                           placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input required type="text"
                                           v-model="form.description" class="form-control form-control-sm"
                                           id="description" name="description"
                                           placeholder="description">
                                </div>
                                <div class="form-group">
                                    <label for="reorder_point">Reorder Point</label>
                                    <input required type="number"
                                           min="1"
                                           v-model="form.reorder_point" class="form-control form-control-sm"
                                           id="reorder_point" name="reorder_point"
                                           placeholder="reorder_point">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :loading="isDisabled">Save Information
                        </button>
                        <button type="button" class="btn btn-default" @click="$router.push('/' + $route.meta.url)">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</template>
<style scope>

</style>
<script>
    export default {
        data(){
            return {
                form: {
                    name: '',
                    description: '',
                    reorder_point: '',
                    dosage: '',
                    medication: '',
                    medicine_id: '',
                    product_id: '',
                    po_number: '',
                    pr_number: '',
                    quantity: '',
                    vat: '',
                    purchase_rate: '',
                    mrp_rate: '',
                    sale_rate: '',
                    discount: 0,
                    manufacture_date: '',
                    expiry_date: '',
                    packs: {
                        item_pack: '',
                        item_type: '',
                        sub_item: '',
                        sub_item_type: '',
                    },
                    category_id: '',
                    package_id: '',
                    rack: {
                        weight: 0,
                        rack_id: ''
                    }
                },
                racks: [],
                categories: [],
                packages: [],
                isDisabled: false,
                labelPosition: 'left',
                errors: [],
                medicines: [],
                loading: false,
            }
        },
        beforeRouteEnter (to, from, next) {

            if (to.params.id) {
                axios.get(`/api/supplies/edit/${to.params.id}`).then(function (response) {
                    next(vm => vm.setData(response.data)
                    )
                })
            } else {
                next()
            }
        },
        beforeRouteUpdate (to, from, next) {
            var vm = this
            if (to.params.id) {
                axios.get(`/api/supplies/edit/${to.params.id}`).then(function (response) {
                    vm.setData(response.data)
                    next()
                })
            } else {
                next()
            }
        },
        methods: {
            setData(data){

                var vm = this
                vm.form.name = data.name
                vm.form.description = data.description
                vm.form.reorder_point = data.reorder_point

            },
            onSubmit(){
                let vm = this
                const formData = new FormData(vm.$refs.form);
                let jsonObject = {};

                for (const [key, value]  of formData.entries()) {
                    jsonObject[key] = value;
                }
                jsonObject['id'] = vm.$route.params.id ?  vm.$route.params.id : ''
                vm.isDisabled = true
                vm.errors = []
                axios({
                    method: 'post',
                    url: `/api/${vm.$route.meta.url}?type=1`,
                    data: jsonObject
                })
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
        }
    }
</script>