<template>
    <div class="content-wrapper" style="min-height: 711px;">
        <content-header />
        <div class="content">
            <div class="container-fluid">
                <slot></slot>
            </div>
        </div>
        <snackbar :type="$root.store.state.alert.type"
                  :text="$root.store.state.alert.text"
                  :visible="$root.store.state.alert.state" >
        </snackbar>
    </div>
</template>
<script>
    import ContentHeader from './ContentHeader.vue'
    import Snackbar from './Snackbar/index.vue'
    export default {
        components: {ContentHeader, Snackbar}
    }
</script>