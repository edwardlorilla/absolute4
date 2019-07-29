<template>
    <tr>

        <td>
            <el-input v-if="edit_" placeholder="Product Name" v-model="item.name" />
            <label v-else>{{item.name}}</label>
        </td>
        <td>
            <el-input v-if="edit_"  :disabled="true" type="number" min="0" max="addTable.quantity" placeholder="Current Quantity" v-model="item.quantity"/>
            <label v-else>{{item.quantity}}</label>
        </td>
        <td>
            <el-input-number v-if="edit_"  v-model="item.out_quantity" @change="onChangeOutQuantity" :min="0" :max="max"></el-input-number>
            <label v-else>{{item.out_quantity}}</label>
        </td>
        <td>
            <el-button type="primary" @click="onEdit" >{{edit_ ? 'Done' : 'Edit'}}</el-button>
        </td>
    </tr>
</template>
<script>
    export default{
        props: ['item', 'max'],
        data(){
            return {
                edit_: false
            }
        },
        methods: {
            onChangeOutQuantity(e, q){
                var vm = this
                if(e > q) {
                    vm.item.quantity -=  (e - q)
                }else {
                    vm.item.quantity +=  ( q - e)
                }
            },
            onEdit(){
                var vm = this
                vm.edit_ = !vm.edit_
            }
        }
    }
</script>
