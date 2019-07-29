<template>
    <div v-if="data">
        <p>{{data.name}} has been deleted a product {{data.name}} on {{ $moment.utc(data.created_at).local().fromNow()}} </p>
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