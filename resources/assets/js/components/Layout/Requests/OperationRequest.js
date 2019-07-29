/**
 * Created by Edward Lance Lorilla on 7/28/2018.
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
        setData (row) {
            var vm = this
            vm.optionCustomer.push({value: row.customer.id, label: row.customer.name});
            vm.optionDoctor.push({value: row.doctor.id, label: row.doctor.name});
            vm.form = {
                id: row.id,
                request_date: row.request_date,
                request_year_code: row.request_year_code,
                remark: row.remark,
                doctor: row.doctor.id,
                customer: row.customer.id,
                products: []
            }


            //{id: '', name: '', category_id: '', package_id: '', quantity: '', out_quantity: ''}
            _.map(row.transactions, function(q){
                let product = q.product;
                axios.get('/api/products/disabled/' +product.id)
                return vm.form.products.unshift({

                    id: product.id,
                    transaction_id: q.id,
                    name: product.name,
                    category_id: product.category.name,
                    // package_id: product.package.name,
                    quantity: product.quantity,
                    cloneQuantity: product.quantity,
                    out_quantity: q.out_quantity
                })
            });
        }
    },
}