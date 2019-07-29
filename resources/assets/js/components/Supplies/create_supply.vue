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
                                           v-model="form.name"
                                           class="form-control form-control-sm"
                                           id="name" name="name"
                                           placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input required type="text"
                                           v-model="form.description"
                                           class="form-control form-control-sm"
                                           id="description" name="description"
                                           placeholder="description">
                                </div>
                                <div class="form-group">
                                    <label for="reorder_point">Reorder Point</label>
                                    <input required type="number"
                                           min="1"
                                           v-model="form.reorder_point"
                                           class="form-control form-control-sm"
                                           id="reorder_point" name="reorder_point"
                                           placeholder="reorder_point">
                                </div>
                                <div class="form-group">
                                    <label for="unit_cost">Unit Cost</label>
                                    <input required type="number"
                                           min="1"
                                           v-model="form.unit_cost"
                                           class="form-control form-control-sm"
                                           id="unit_cost"
                                           name="unit_cost" placeholder="Unit Cost">
                                </div>

                        </div>
                          <!--  <div class="col">
                                <div class="el-form-item" :class="errors.unit_id ? 'is-error is-required' : ''">
                                    <div class="row">
                                        <div class="col-sm"><label for="unit_id">Unit</label></div>
                                        <div class="col-sm text-right">
                                            <button type="button" v-if="!isAddUnit" @click="isAddUnit = !isAddUnit"
                                                    class="btn btn-sm btn-link">Add Unit
                                            </button>

                                        </div>
                                    </div>
                                    <div class="el-form-item__content">
                                        <el-select
                                                style="width: 100%;"
                                                v-model="form.unit_id"
                                                filterable
                                                remote
                                                size="small"
                                                value-key="id"
                                                v-if="!isAddUnit"
                                                required
                                                placeholder="Please a Unit Name"
                                                :remote-method="search_unit"
                                                :loading="loading">
                                            <el-option
                                                    v-for="(item, index) in units"
                                                    :key="item.value.id"
                                                    :label="item.label"
                                                    :value="item.value">

                                            </el-option>
                                        </el-select>
                                        <div v-else>
                                            <div class="input-group input-group-sm">
                                                <input placeholder="Unit Name" v-model="unit_name" type="text"
                                                       class="form-control form-control-sm">
                                                <span class="input-group-append">
                                <button @click="addUnit" type="button"
                                        class="btn btn-success">Create Unit</button>
                                <button class="btn btn-default" type="button"
                                        @click="isAddUnit = false">Cancel</button>
                            </span>
                                            </div>
                                        </div>
                                        <div v-if="errors.unit_id" v-for="error in errors.unit_id" class="el-form-item__error">
                                            {{error}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm"><label style="font-size: small;"
                                                                   for="dispensing_unit_id">Dispensing
                                            Unit</label></div>
                                        <div class="col-sm text-right">
                                            <button type="button" v-if="!isAddDispensingUnit"
                                                    @click="isAddDispensingUnit = !isAddDispensingUnit"
                                                    class="btn btn-sm btn-link">Add
                                            </button>

                                        </div>
                                    </div>
                                    <el-select
                                            style="width: 100%;"
                                            v-model="form.dispensing_unit_id"
                                            filterable
                                            remote
                                            size="small"
                                            required
                                            value-key="id"
                                            v-if="!isAddDispensingUnit"
                                            placeholder="Please a Dispensing Unit Name"
                                            :remote-method="search_dispensing_unit"
                                            :loading="loading">
                                        <el-option
                                                v-for="(item, index) in dispensing_units"
                                                :key="item.value.id"
                                                :label="item.label"
                                                :value="item.value">
                                        </el-option>
                                    </el-select>
                                    <div v-else>
                                        <div class="input-group input-group-sm">
                                            <input placeholder="Unit Name" v-model="unit_name" type="text"
                                                   class="form-control form-control-sm">
                                            <span class="input-group-append">
                                <button @click="addUnit" type="button"
                                        class="btn btn-success">Create</button>
                                <button class="btn btn-default" type="button"
                                        @click="isAddDispensingUnit = false">Cancel</button>
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="!(form.name && form.description && form.reorder_point && form.unit_cost )" :loading="isDisabled">Save Information
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
                    unit_cost: '',
                    unit: '',
                    dispensing_unit: '',
                },
                unit_cost: 0,
                unit_id: '',
                isAddDispensingUnit: false,
                unit_name: '',
                dispensing_unit_id: '',
                isAddUnit: false,
                racks: [],
                categories: [],
                packages: [],
                isDisabled: false,
                labelPosition: 'left',
                errors: [],
                medicines: [],
                loading: false,
                units:[],
                dispensing_units:[]
            }
        },
        methods: {
            search_unit(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.units = []
                }
            },
            onSearchUnit: _.debounce(function (query, vm) {
                vm.getUnit(query).then(function (q) {
                    vm.loading = false
                    vm.units = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            search_dispensing_unit(query){
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchDispensingUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.dispensing_units = []
                }
            },
            getUnit(query){
                return axios.get('/api/search/units?search=' + query)
            },
            onSearchDispensingUnit: _.debounce(function (query, vm) {
                vm.getUnit(query).then(function (q) {
                    vm.loading = false
                    vm.dispensing_units = q.data.map(item => {
                        return {value: item, label: item.name};
                    })
                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
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
        }
    }
</script>