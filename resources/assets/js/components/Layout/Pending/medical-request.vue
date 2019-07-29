<template>
    <el-table
            :data="data.products"
            style="width: 100%">
        <el-table-column
                prop="name"
                label="Product Name">
        </el-table-column>
        <el-table-column
                prop="out_quantity"
                label="Quantity">
        </el-table-column>
    </el-table>
</template>
<script>

    export default{
        props:['data']
    }
</script>
