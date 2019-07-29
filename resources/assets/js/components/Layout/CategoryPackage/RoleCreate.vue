<template>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="m-0">{{$route.meta.type}} {{$route.meta.title}}</h5>
                </div>
                <div class="card-body">
                    <el-form ref="form" @submit.native.prevent="onSubmit" label-position="labelPosition" size="small" label-width="200px" :model="form">
                        <el-form-item :class="errors.name ? 'is-error is-required' : ''" label="Name">
                            <el-input type="text" required v-model="form.name" ></el-input>
                            <div v-if="errors.name" v-for="error in errors.name" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.display_name ? 'is-error is-required' : ''" label="Display Name">
                            <el-input type="email" required v-model="form.display_name" ></el-input>
                            <div v-if="errors.display_name" v-for="error in errors.display_name" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item :class="errors.description ? 'is-error is-required' : ''" label="Description">
                            <el-input type="password" required v-model="form.description" ></el-input>
                            <div v-if="errors.description" v-for="error in errors.description" class="el-form-item__error">
                                {{error}}
                            </div>
                        </el-form-item>
                        <el-form-item>
                            <el-button  type="primary" @click="onSubmit"  :loading="isDisabled">{{$route.meta.type}}</el-button>
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
                    name: '',
                    display_name: '',
                    description: ''
                }
            }
        }
    }
</script>