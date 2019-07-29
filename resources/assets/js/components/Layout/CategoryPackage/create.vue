<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h5 class="m-0">{{$route.meta.type}} {{$route.meta.title}}</h5>
                </div>
                <div class="card-body">
                    <el-form  ref="form" @submit.native.prevent="onSubmit" :label-position="labelPosition" size="small" label-width="100px" :model="form">
                        <el-form-item :class="errors.name ? 'is-error is-required' : ''" label="Name">
                            <el-input required v-model="form.name" ></el-input>
                            <div v-if="errors.name" v-for="error in errors.name" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmit"  :loading="isDisabled">{{$route.meta.type}}</el-button>
                            <el-button @click="$router.push('/' + $route.meta.url)">Cancel</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import Operation from './OperationMixin'
    export default {
        mixins:[Operation],
        data(){
            return{
                form: {
                    name: ''
                }
            }
        }
    }
</script>