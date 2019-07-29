<template>
    <div>
        <line-chart v-if="getChartData.length != 0" :download="true" :data="transform.chart"></line-chart>
    </div>
</template>
<style>
</style>
<script>
    export default{
        props: ['data$'],
        data(){
            return {
                transform: {chart: [{"name": "IN", "data": {}}, {"name": "OUT", "data": {}}]}
            }
        },
        computed: {

            getChartData(){
                var vm = this
                var counter = {}
                var date = []
                _.map(vm.data$, function (response) {
                    var index = _.findIndex(vm.transform.chart, ['name', response.type === 0 ? 'OUT' : 'IN'])
                    var pick = {};
                        date.push(`${response.created_at.split(' ')[0]}`)
                    pick[`${response.created_at.split(' ')[0]}`] = (response.type === 0 ? (counter[`${response.created_at.split(' ')[0]}_out`] >= 0 ? ++counter[`${response.created_at.split(' ')[0]}_out`] : counter[`${response.created_at.split(' ')[0]}_out`] = 1 ) : (counter[`${response.created_at.split(' ')[0]}_in`] >= 0 ? ++counter[`${response.created_at.split(' ')[0]}_in`] : counter[`${response.created_at.split(' ')[0]}_in`] = 1 ) );
                    _.merge(vm.transform.chart[index].data, _.clone(pick))


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
