<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="m-0">Add New Medicine</h5>
                </div>
                <div class="card-body">
                    <el-form ref="form"
                             @submit.native.prevent="onSubmit"
                             :label-position="labelPosition"
                             label-width="160px"
                             :model="form">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="el-form-item" :class="errors.medicine_id ? 'is-error is-required' : ''">
                                    <div class="row">
                                        <div class="col-sm"><label for="medicine_id">Medicine/ Item Description</label>
                                        </div>
                                        <div class="col-sm text-right">
                                            <button type="button" v-if="!isAddMedicine"
                                                    @click="handleSidebar"
                                                    class="btn btn-sm btn-link">Add Medicine
                                            </button>

                                        </div>
                                    </div>
                                    <div class="el-form-item__content">
                                        <el-select
                                                v-if="!isAddMedicine"
                                                style="width: 100%;"
                                                v-model="form.medicine_id"
                                                filterable
                                                size="small"
                                                remote
                                                placeholder="Enter Medicine Name"
                                                :remote-method="search_medicine"
                                                :loading="loading">
                                            <el-option
                                                    v-for="(item, index) in medicines"
                                                    :key="index"
                                                    :label="item.label"
                                                    :value="item.value.id">
                                            </el-option>
                                        </el-select>
                                        <div v-else>
                                            <div class="input-group input-group-sm">
                                                <input v-model="medicine_name" type="text" class="form-control">
                                                <span class="input-group-append">
                                        <button @click="addMedicine" type="button"
                                                class="btn btn-success">Create Generic Medicine</button>
                                        <button class="btn btn-default" type="button"
                                                @click="isAddMedicine = false;$root.store.dispatch('handleSideBar')">Cancel</button>
                                    </span>
                                            </div>
                                        </div>
                                        <div v-if="errors.medicine_id" v-for="error in errors.medicine_id"
                                             class="el-form-item__error">
                                            Generic, Medication, Dosage must be unique
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="el-form-item"  :class="errors.medication ? 'is-error is-required' : ''"
                                              label="">

                                    <label>Medication</label>
                                    <div class="el-form-item__content">
                                    <el-input size="small" style="width: 100%;" required v-model="form.medication"></el-input>
                                    <div v-if="errors.medication" v-for="error in errors.medication"
                                         class="el-form-item__error">
                                        {{error}}
                                    </div>

                                    </div>
                                </div>-->

                                <!--<div class="el-form-item" :class="errors.dosage ? 'is-error is-required' : ''">
                                    <label>Dosage</label>
                                    <div class="el-form-item__content">
                                    <el-input size="small" style="width: 100%;"  type="number" required v-model="form.dosage"></el-input>
                                    <div v-if="errors.dosage" v-for="error in errors.dosage"
                                         class="el-form-item__error">
                                        {{error}}
                                    </div>
                                    </div>
                                </div>-->
                                <div class="el-form-item" :class="errors.category_id ? 'is-error is-required' : ''"
                                     label="Form">
                                    <label>Unit</label>
                                    <div class="el-form-item__content">
                                        <el-select size="small" style="width: 100%;" v-model="form.category_id">
                                            <el-option v-for="(category, index, key) in categories" :key="key"
                                                       :label="category.name"
                                                       :value="category.id"></el-option>
                                        </el-select>
                                        <div v-if="errors.category_id" v-for="error in errors.category_id"
                                             class="el-form-item__error">
                                            {{error}}
                                        </div>
                                    </div>
                                </div>
                                <div class="el-form-item" :class="errors.unit_cost ? 'is-error is-required' : ''">
                                    <label for="unit_cost">Unit Cost</label>
                                    <div class="el-form-item__content">
                                        <input required type="number"
                                               min="1"
                                               v-model="form.unit_cost"
                                               class="form-control form-control-sm"
                                               id="unit_cost"
                                               name="unit_cost" placeholder="Unit Cost">
                                        <div v-if="errors.unit_cost" v-for="error in errors.unit_cost" class="el-form-item__error">
                                            {{error}}
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="el-form-item" :class="errors.category_id ? 'is-error is-required' : ''">
                                    <label>Pack Size</label>
                                    <div class="el-form-item__content">
                                    <el-select size="small"  style="width: 100%;" v-model="form.package_id">
                                    <el-option v-for="(package, index, key) in packages" :key="key"
                                               :label="package.name"
                                               :value="package.id"></el-option>
                                </el-select>
                                <div v-if="errors.category_id" v-for="error in errors.category_id"
                                     class="el-form-item__error">
                                    {{error}}
                                </div>
                                    </div>
                            </div>-->
                                <div class="el-form-item" :class="errors.reorder_point ? 'is-error is-required' : ''">
                                    <label for="reorder_point">Reorder Point</label>
                                    <div class="el-form-item__content">
                                        <el-input size="small" style="width: 100%;" type="number" required
                                                  min="1"
                                                  v-model="form.reorder_point"></el-input>
                                        <div v-if="errors.reorder_point" v-for="error in errors.reorder_point"
                                             class="el-form-item__error">
                                            {{error}}
                                        </div>
                                    </div>
                                </div>

                                <!-- <el-form-item :class="errors.purchase_rate ? 'is-error is-required' : ''" label="Purchase Rate">
                                     <el-input required v-model="form.purchase_rate"></el-input>
                                     <div v-if="errors.purchase_rate" v-for="error in errors.purchase_rate" class="el-form-item__error">
                                         {{error}}
                                     </div>
                                 </el-form-item>
                                <el-form-item :class="errors.item_pack ? 'is-error is-required' : ''"
                                              label="No. of Items in Pack">
                                    <el-col :span="11">
                                        <el-input required v-model="form.packs.item_pack"></el-input>
                                    </el-col>
                                    <el-col class="line" :span="2">-</el-col>
                                    <el-col :span="11">
                                        <el-select v-model="form.packs.item_type">
                                            <el-option v-for="(package, index, key) in packages" :key="key"
                                                       :label="package.name"
                                                       :value="package.id"></el-option>
                                        </el-select>
                                    </el-col>
                                    <div v-if="errors.item_pack" v-for="error in errors.item_pack"
                                         class="el-form-item__error">
                                        {{error}}
                                    </div>
                                </el-form-item>
                                <el-form-item :class="errors.sub_item ? 'is-error is-required' : ''"
                                              label="No. of Sub-Item in Item.">
                                    <el-col :span="11">
                                        <el-input required v-model="form.packs.sub_item"></el-input>
                                    </el-col>
                                    <el-col class="line" :span="2">-</el-col>
                                    <el-col :span="11">
                                        <el-select v-model="form.packs.sub_item_type">
                                            <el-option v-for="(package, index, key) in packages" :key="key"
                                                       :label="package.name"
                                                       :value="package.id"></el-option>
                                        </el-select>
                                    </el-col>
                                    <div v-if="errors.sub_item" v-for="error in errors.sub_item"
                                         class="el-form-item__error">
                                        {{error}}
                                    </div>
                                </el-form-item>
                                <el-form-item label="No. of Items in Pack">
                                    <el-input :disabled="true" required v-model="subItemSubCost"></el-input>
                                </el-form-item>-->


                            </div>
                            <!--<div class="col">-->
                            <!---->
                            <!--&lt;!&ndash;  <div class="el-form-item" :class="errors['unit_id.id'] ? 'is-error is-required' : ''">-->
                            <!--<div class="row">-->
                            <!--<div class="col-sm"><label for="unit_id">Unit</label></div>-->
                            <!--<div class="col-sm text-right">-->
                            <!--<button type="button" v-if="!isAddUnit" @click="isAddUnit = !isAddUnit"-->
                            <!--class="btn btn-sm btn-link">Add Unit-->
                            <!--</button>-->

                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="el-form-item__content">-->
                            <!--<el-select-->
                            <!--style="width: 100%;"-->
                            <!--v-model="form.unit_id"-->
                            <!--filterable-->
                            <!--remote-->
                            <!--size="small"-->
                            <!--value-key="id"-->
                            <!--v-if="!isAddUnit"-->
                            <!--required-->
                            <!--placeholder="Please a Unit Name"-->
                            <!--:remote-method="search_unit"-->
                            <!--:loading="loading">-->
                            <!--<el-option-->
                            <!--v-for="(item, index) in units"-->
                            <!--:key="item.value.id"-->
                            <!--:label="item.label"-->
                            <!--:value="item.value">-->

                            <!--</el-option>-->
                            <!--</el-select>-->
                            <!--<div v-else>-->
                            <!--<div class="input-group input-group-sm">-->
                            <!--<input placeholder="Unit Name" v-model="unit_name" type="text"-->
                            <!--class="form-control form-control-sm">-->
                            <!--<span class="input-group-append">-->
                            <!--<button @click="addUnit" type="button"-->
                            <!--class="btn btn-success">Create Unit</button>-->
                            <!--<button class="btn btn-default" type="button"-->
                            <!--@click="isAddUnit = false">Cancel</button>-->
                            <!--</span>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div v-if="errors['unit_id.id']" v-for="error in errors['unit_id.id']" class="el-form-item__error">-->
                            <!--{{error}}-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="el-form-item" :class="errors['dispensing_unit_id.id'] ? 'is-error is-required' : ''">-->
                            <!--<div class="row">-->
                            <!--<div class="col-sm"><label style="font-size: small;"-->
                            <!--for="dispensing_unit_id">Dispensing-->
                            <!--Unit</label></div>-->
                            <!--<div class="col-sm text-right">-->
                            <!--<button type="button" v-if="!isAddDispensingUnit"-->
                            <!--@click="isAddDispensingUnit = !isAddDispensingUnit"-->
                            <!--class="btn btn-sm btn-link">Add-->
                            <!--</button>-->

                            <!--</div>-->
                            <!--</div>-->
                            <!--<div class="el-form-item__content">-->
                            <!--<el-select-->
                            <!--style="width: 100%;"-->
                            <!--v-model="form.dispensing_unit_id"-->
                            <!--filterable-->
                            <!--remote-->
                            <!--size="small"-->
                            <!--required-->
                            <!--value-key="id"-->
                            <!--v-if="!isAddDispensingUnit"-->
                            <!--placeholder="Please a Dispensing Unit Name"-->
                            <!--:remote-method="search_dispensing_unit"-->
                            <!--:loading="loading">-->
                            <!--<el-option-->
                            <!--v-for="(item, index) in dispensing_units"-->
                            <!--:key="item.value.id"-->
                            <!--:label="item.label"-->
                            <!--:value="item.value">-->
                            <!--</el-option>-->
                            <!--</el-select>-->
                            <!--<div v-else>-->
                            <!--<div class="input-group input-group-sm">-->
                            <!--<input placeholder="Unit Name" v-model="unit_name" type="text"-->
                            <!--class="form-control form-control-sm">-->
                            <!--<span class="input-group-append">-->
                            <!--<button @click="addDispensingUnit" type="button"-->
                            <!--class="btn btn-success">Create</button>-->
                            <!--<button class="btn btn-default" type="button"-->
                            <!--@click="isAddDispensingUnit = false">Cancel</button>-->
                            <!--</span>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--<div v-if="errors['dispensing_unit_id.id']" v-for="error in errors['dispensing_unit_id.id']" class="el-form-item__error">-->
                            <!--{{error}}-->
                            <!--</div>-->
                            <!--</div>-->

                            <!--</div>&ndash;&gt;-->

                            <!--</div>-->
                            <!--<div class="col-lg-4">
                               el-form-item :class="errors.name ? 'is-error is-required' : ''" label="Product Name">
                                   <el-input required v-model="form.name"></el-input>
                                   <div v-if="errors.name" v-for="error in errors.name" class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.quantity ? 'is-error is-required' : ''" label="Quantity">
                                   <el-input required type="number" v-model="form.quantity"></el-input>
                                   <div v-if="errors.quantity" v-for="error in errors.quantity"
                                        class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.reorder_point ? 'is-error is-required' : ''"
                                             label="Re-Order Point">
                                   <el-input type="number" required v-model="form.reorder_point"></el-input>
                                   <div v-if="errors.reorder_point" v-for="error in errors.reorder_point"
                                        class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.package_id ? 'is-error is-required' : ''"
                                             label="Package Name">
                                   <el-select v-model="form.package_id">
                                       <el-option v-for="(package, index, key) in packages" :key="key"
                                                  :label="package.name"
                                                  :value="package.id"></el-option>
                                   </el-select>
                                   <div v-if="errors.package_id" v-for="error in errors.package_id"
                                        class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.vat ? 'is-error is-required' : ''" label="VAT">
                                   <el-input required v-model="form.vat"></el-input>
                                   <div v-if="errors.vat" v-for="error in errors.vat" class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>

                               <el-form-item :class="errors.mrp_rate ? 'is-error is-required' : ''" label="MRP Rate">
                                   <el-input required v-model="form.mrp_rate"></el-input>
                                   <div v-if="errors.mrp_rate" v-for="error in errors.mrp_rate" class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.sale_rate ? 'is-error is-required' : ''" label="Sale Rate">
                                   <el-input required v-model="form.sale_rate"></el-input>
                                   <div v-if="errors.sale_rate" v-for="error in errors.sale_rate" class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item label="Item Unit Cost">
                                     <el-input :disabled="true" v-model="itemUnitCost"></el-input>
                               </el-form-item>
                               <el-form-item label="Sub-item Unit Cost">
                                   <el-input :disabled="true" required v-model="subItemSubCost"></el-input>
                               </el-form-item>
                               <el-form-item :class="errors.discount ? 'is-error is-required' : ''" label="Discount">
                                   <el-input required v-model="form.discount"></el-input>
                                   <div v-if="errors.discount" v-for="error in errors.discount" class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.manufacture_date ? 'is-error is-required' : ''"
                                             label="Manufacturing Date">
                                   <el-input prefix-icon="el-icon-date" type="date" required
                                             v-model="form.manufacture_date"></el-input>
                                   <div v-if="errors.manufacture_date" v-for="error in errors.manufacture_date"
                                        class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>
                               <el-form-item :class="errors.expiry_date ? 'is-error is-required' : ''"
                                             label="Expiry Date">
                                   <el-input prefix-icon="el-icon-date" type="date" required
                                             v-model="form.expiry_date"></el-input>
                                   <div v-if="errors.expiry_date" v-for="error in errors.expiry_date"
                                        class="el-form-item__error">
                                       {{error}}
                                   </div>
                               </el-form-item>

                            </div>-->
                            <!-- <div class="col-lg-4">
                                 <fieldset>
                                     <legend>Rack Entry</legend>
                                     <el-form-item :class="errors['rack.weight'] ? 'is-error is-required' : ''"
                                                   label="Weight">
                                         <el-input required v-model="form.rack.weight"></el-input>
                                         <div v-if="errors['rack.weight']" v-for="error in errors['rack.weight']"
                                              class="el-form-item__error">
                                             {{error}}
                                         </div>
                                     </el-form-item>
                                     <el-form-item :class="errors['rack.rack_id'] ? 'is-error is-required' : ''"
                                                   label="Rack Number">
                                         <el-select v-model="form.rack.rack_id">
                                             <el-option v-for="(rack, index, key) in racks" :key="key" :label="rack.name"
                                                        :value="rack.id"></el-option>
                                         </el-select>
                                         <div v-if="errors['rack.rack_id']" v-for="error in errors['rack.rack_id']"
                                              class="el-form-item__error">
                                             {{error}}
                                         </div>
                                     </el-form-item>
                                 </fieldset>
                             </div>-->
                        </div>

                        <el-form-item>
                            <el-button type="primary" @click="onSubmit"
                                       :disabled="!(form.medicine_id  && form.category_id && form.reorder_point && form.unit_cost)"
                                       :loading="isDisabled">Save Information
                            </el-button>
                            <el-button @click="$router.push('/' + $route.meta.url)">Cancel</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </div>

    </div>
</template>
<style scope>

</style>
<script>
    export default {
        data() {
            return {
                form: {
                    medicine_id: '',
                    medication: '',
                    dosage: '',
                    category_id: '',
                    unit_cost: '',
                    unit_id: '',
                    dispensing_unit_id: '',
                    reorder_point: 9
                },
                unit_name: '',
                isAddUnit: false,
                units: [],
                unit: {},
                dispensing_unit: {},
                dispensing_units: [],
                isAddDispensingUnit: false,
                medicine_name: '',
                isAddMedicine: false,
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
        computed: {
            itemUnitCost() {
                let vm = this
                return (vm.form.sale_rate != 0 && vm.form.packs.item_pack != 0) ? vm.form.sale_rate / vm.form.packs.item_pack : 0;
            },
            subItemSubCost() {
                let vm = this
                return (vm.form.packs.item_pack != 0 && vm.form.packs.sub_item != 0) ? vm.form.packs.item_pack * vm.form.packs.sub_item : 0;
            }
        },
        beforeRouteEnter(to, from, next) {
            if (to.params.id) {
                axios.all(
                    [
                        axios.get('/api/select'),
                        axios.get(`/api/${to.meta.url}/edit/${to.params.id}`)
                    ]
                ).then(axios.spread(function (o, p) {
                    next(function (vm) {
                        var c = o.data;
                        return (
                            (vm.categories = c.categories),
                                (vm.packages = c.packages),
                                (vm.racks = c.racks),
                                (vm.units = [{value: p.data.unit, label: p.data.unit.name}]),
                                (vm.dispensing_units = [{
                                    value: p.data.dispensing_unit,
                                    label: p.data.dispensing_unit.name
                                }]),
                                (vm.form = p.data),
                                (vm.form.unit_id = p.data.unit),
                                (vm.form.dispensing_unit_id = p.data.dispensing_unit)

                        );
                    })
                }));
            } else {
                axios.all(
                    [
                        axios.get('/api/select')
                    ]
                ).then(axios.spread(function (o, p) {
                    next(function (vm) {
                        var c = o.data;
                        return ((vm.categories = c.categories),
                            (vm.packages = c.packages),
                            (vm.racks = c.racks));
                    })
                }));
            }
        },
        beforeRouteUpdate(to, from, next) {
            var vm = this
            if (to.params.id) {
                axios.all(
                    [
                        axios.get('/api/select'),
                        axios.get(`/api/edit/${to.meta.url}/${to.params.id}`)
                    ]
                ).then(axios.spread(function (o, p) {
                    let v = o.data;
                    vm.categories = v.categories
                    vm.packages = v.packages
                    vm.racks = v.racks
                    (vm.units = [{value: p.data.unit, label: p.data.unit.name}]),
                        (vm.dispensing_units = [{value: p.data.dispensing_unit, label: p.data.dispensing_unit.name}]),
                        vm.form = p.data
                        (vm.form.unit_id = p.data.unit),
                        (vm.form.dispensing_unit_id = p.data.dispensing_unit)
                    next()
                }));
            } else {
                axios.all(
                    [
                        axios.get('/api/select')
                    ]
                ).then(axios.spread(function (o) {
                    let v = o.data;
                    vm.categories = v.categories
                    vm.packages = v.packages
                    vm.racks = v.racks
                    next()
                }));
            }
        },
        methods: {
            unit_m(request) {
                return axios.post('/api/units', request)
            },
            addUnit() {
                var vm = this
                vm.isDisabled = true
                vm.errors = []
                vm.unit_m({name: vm.unit_name}).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.units = []
                    vm.units.push({value: response.data, label: response.data.name})
                    vm.form.unit_id = response.data
                    vm.isDisabled = false
                    vm.isAddUnit = false
                    vm.isAddDispensingUnit = false
                }).catch(function (error) {
                    if (error.response.data && error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }

                    vm.isDisabled = false
                });
            },
            addDispensingUnit() {
                var vm = this
                vm.isDisabled = true
                vm.errors = []
                vm.unit_m({name: vm.unit_name}).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.dispensing_units = []
                    vm.dispensing_units.push({value: response.data, label: response.data.name})
                    vm.form.dispensing_unit_id = response.data
                    vm.isDisabled = false
                    vm.isAddDispensingUnit = false
                }).catch(function (error) {
                    if (error.response.data && error.response.data.errors && error.response.data.message) {
                        vm.$message({message: error.response.data.message, type: 'error'})
                    }

                    vm.isDisabled = false
                });
            },
            handleSidebar() {
                var vm = this
                vm.isAddMedicine = !vm.isAddMedicine
                vm.$root.store.dispatch('handleSideBar')
            },
            addMedicine() {
                var vm = this
                vm.isDisabled = true
                vm.errors = []
                vm.isAddMedicine = !vm.isAddMedicine
                vm.$root.store.dispatch('handleSideBar')
                axios.post('/api/medicines', {name: vm.medicine_name}).then(function (response) {
                    vm.$message({message: response.statusText, type: 'success'})
                    vm.medicines = []
                    vm.medicines.push({value: response.data, label: response.data.name})
                    vm.form.medicine.id = response.data.id
                    vm.isDisabled = false

                }).catch(function (error) {
                    if (error.response) {
                        if (error.response.data.errors && error.response.data.message) {
                            vm.$message({message: error.response.data.message, type: 'error'})
                        }
                    }

                    vm.isDisabled = false
                });
            },
            search_medicine(query) {
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearch(query, vm)
                } else {
                    vm.loading = false
                    vm.medicines = []
                }
            },
            onSearch: _.debounce(function (query, vm) {
                vm.loading = true
                axios.get('/api/search/medicines?search=' + query).then(function (q) {
                    vm.loading = false
                    vm.medicines = q.data.map(item => {
                        return {value: item, label: item.name};
                    })

                }).catch(function () {
                    vm.loading = false
                })
            }, 350),
            search_unit(query) {
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
            search_dispensing_unit(query) {
                var vm = this

                if (query !== '') {
                    vm.loading = true
                    vm.onSearchDispensingUnit(query, vm)
                } else {
                    vm.loading = false
                    vm.dispensing_units = []
                }
            },
            getUnit(query) {
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
            onSubmit() {
                let vm = this
                vm.isDisabled = true
                vm.errors = []
                let id = vm.$route.params.id;
                axios[id ? 'put' : 'post'](`/api/${vm.$route.meta.url}${id ? `/${id}` : ''}`, vm.form)
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