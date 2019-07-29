<template>
    <div v-if="data">
        <p>{{user}}'s has been added a product {{data.name}} with {{data.quantity}} {{data.quantity === 1 ? 'item' :
            'items'}} on {{ $moment.utc(data.created_at).local().fromNow()}}</p>
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