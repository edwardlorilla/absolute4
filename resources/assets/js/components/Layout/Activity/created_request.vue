<template>
    <div v-if="data">
        <p>{{user}}'s has been checked out medicine on {{ $moment.utc(data.created_at).local().fromNow()}}</p>
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