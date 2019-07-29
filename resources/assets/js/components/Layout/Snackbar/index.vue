<template>
    <transition name="yum">
        <el-alert
                id="yum-snackbar"
                v-if="visible"
                :title="type"
                :type="type"
                :description="text"
                show-icon>
        </el-alert>
    </transition>

</template>
<style>
    #yum-snackbar {
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
    }
    .yum-enter-active {
        animation: yum-fadein 0.5s;
    }
    .yum-leave-active {
        animation: yum-fadeout 0.5s 2.5s;
    }
    @keyframes yum-fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }
    @keyframes yum-fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 0;
            opacity: 0;
        }
    }

</style>
<script>

    export default{
        props:['type', 'text', 'visible']
    }
</script>
