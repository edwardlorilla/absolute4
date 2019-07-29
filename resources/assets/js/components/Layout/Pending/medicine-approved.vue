<template>
    <el-table
            :data="data.request"
            style="width: 100%">
        <el-table-column
                prop="name"
                label="Product Name">
        </el-table-column>
        <el-table-column
                prop="out_quantity"
                label="Quantity">
        </el-table-column>
       <!-- <el-table-column
                prop="package_id"
                label="Package">
        </el-table-column>-->
        <el-table-column
                prop="category_id"
                label="Categories">
        </el-table-column>
    </el-table>
</template>
<script>

    export default{
        props:['data']
    }
</script>
