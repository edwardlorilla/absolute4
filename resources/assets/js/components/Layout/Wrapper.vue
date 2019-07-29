<template>
    <div id="app" v-loading.fullscreen="$root.store.state.loading" class="wrapper">
    <navigation/>
    <main-sidebar/>
    <main-content>
        <router-view/>
    </main-content>
    <control-sidebar/>
    </div>
</template>
<script>
    import Navigation from './Navigation.vue'
    import MainSidebar from './MainSidebar.vue'
    import MainContent from './MainContent.vue'
    import ControlSidebar from './ControlSidebar.vue'
    export default{
        components: {
            Navigation,
            MainSidebar,
            MainContent,
            ControlSidebar,
        },
    }
</script>
