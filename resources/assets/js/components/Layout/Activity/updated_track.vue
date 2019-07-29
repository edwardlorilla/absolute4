<template>
    <div v-if="data">
        <p>{{user}} has been updated a supply on {{ $moment.utc(data.created_at).local().fromNow()}} </p>
    </div>
</template>

<script>
    export default{
        props:[
            'user',
            'data'
        ]
    }
</script>

<style scoped>

</style>