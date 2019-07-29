<template>
    <line-chart v-if="getChartData.length != 0" :download="true" :data="transform.chart"></line-chart>
</template>
<script>
    export default{
        props: ['data$'],
        data(){
            return {
                reload: true,
                transform: {chart: []}
            }
        },
        computed: {
            getChartData(){
                var vm = this
                var counter = {}
                var date = []
                _.map(vm.data$, function (response) {
                    var index = _.findIndex(vm.transform.chart, ['name', response.product.medicine.name])
                    if (index === -1) {
                        vm.transform.chart.push({name: response.product.medicine.name, data: {}})
                        index = _.findIndex(vm.transform.chart, ['name', response.product.medicine.name])
                    }
                    var pick = {};
                    date.push(`${response.created_at.split(' ')[0]}`)
                    if (response.type === 0) {
                        pick[`${response.created_at.split(' ')[0]}`] = !_.isUndefined(counter[`${response.created_at.split(' ')[0]}-out-${response.product.id}`]) ? (counter[`${response.created_at.split(' ')[0]}-out-${response.product.id}`]) += response.out_quantity : counter[`${response.created_at.split(' ')[0]}-out-${response.product.id}`] = response.out_quantity
                    }
                    _.merge(vm.transform.chart[index].data, pick)


                })
                var i, j, undefinedObject = {}, k, unique = _.uniq(date);


                for (i = 0; i < vm.transform.chart.length; i++) {
                    undefinedObject = {}
                    for (j = 0; j < unique.length; j++) {
                        if (_.isUndefined(vm.transform.chart[i].data[unique[j]])) {
                            undefinedObject[unique[j]] = 0

                        }
                    }
                    _.merge(vm.transform.chart[i].data, undefinedObject)
                }
                return unique
            }
        },

    }
</script>
