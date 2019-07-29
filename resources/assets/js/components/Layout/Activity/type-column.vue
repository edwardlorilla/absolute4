<template>
    <div>
       <div v-if="type == 'created_request'">
           <span class="fa fa-medkit"> Create Request</span>
       </div>
        <div v-else-if="type == 'created_track'">
           <span class="fa fa-exchange"> Check Supply</span>
       </div>
        <div v-else-if="type == 'created_supply'">
           <span class="fa fa-plus-square"> Create Supply</span>
       </div>
        <div v-else-if="type == 'updated_supply'">
           <span class="fa fa-plus-square"> Update Supply</span>
       </div>
        <div v-else-if="type == 'deleted_supply'">
           <span class="fa fa-plus-square"> Delete Supply</span>
       </div>
        <div v-else-if="type == 'created_product'">
           <span class="fa fa-plus-square"> Create Product</span>
       </div>
        <div v-else-if="type == 'updated_product'">
           <span class="fa fa-plus-square"> Update Product</span>
       </div>
        <div v-else-if="type == 'updated_track'">
           <span class="fa fa-plus-square"> Update Supply</span>
       </div>
        <div v-else-if="type == 'deleted_product'">
           <span class="fa fa-plus-square"> Delete Product</span>
       </div>
    </div>
</template>
<script>
    export default{
        props:['type']
    }
</script>