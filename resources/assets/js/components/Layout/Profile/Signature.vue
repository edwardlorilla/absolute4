<template>
    <form ref="form" class="form-horizontal">
        <div class="card-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">User Signature</label>
                <div style="display: block;margin-right: auto;margin-left: auto; border:1px solid #000000;">
                    <img height="200px" width="400px" v-if="changeSignature"  :src="`/storage/images/${$root.store.state.user.file}`" alt="user-signature">
                    <vue-signature v-else ref="signature" :sigOption="option" :w="'400px'" :h="'200px'"/>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div v-if="changeSignature ">
                <el-button type="success" @click="changeSignature = !changeSignature">Edit Signature</el-button>
            </div>
           <div v-else>
               <el-button @click="changeSignature = !changeSignature">Cancel</el-button>
               <el-button @click="clear">Clear</el-button>
               <el-button @click="undo">Undo</el-button>
               <el-button type="primary" @click="save">Confirm</el-button>
           </div>
        </div>
    </form>

</template>
<script>
    export default{

        data(){
            return {
                changeSignature: !!this.$root.store.state.user.file,
                option: {
                    penColor: "rgb(0, 0, 0)",
                    backgroundColor: "rgb(255,255,255)"
                },
            }
        },
        methods: {
            dataURItoBlob(dataURI) {
                var byteString = atob(dataURI.split(',')[1]);
                var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]
                var ab = new ArrayBuffer(byteString.length);
                var ia = new Uint8Array(ab);
                for (var i = 0; i < byteString.length; i++) {
                    ia[i] = byteString.charCodeAt(i);
                }
                var blob = new Blob([ab], {type: mimeString});
                return blob;
            },
            clear(){
                var _this = this;
                _this.$refs.signature.clear();
            },
            undo(){
                var _this = this;
                _this.$refs.signature.undo();
            },
            save(){
                var vm = this;
                var png = vm.$refs.signature.save();
                var data = new FormData()
                data.append('file', vm.dataURItoBlob(png), 'file.png')
                data.append('photo', vm.$root.store.state.user.file)
                axios.post('/api/users/sign', data)
                    .then(function (response) {
                        vm.$message({message: response.statusText, type: 'success'})
                        vm.isDisabled = false
                        vm.dialogVisible = false
                        vm.changeSignature = true
                        vm.$root.store.state.user.file = response.data.file
                    })
                    .catch(function (error) {
                        console.log(error)
                        if (error) {
                            if(error.response.data.errors && error.response.data.message) {
                                vm.$message({message: error.response.data.message, type: 'error'})
                            }

                        }
                        vm.isDisabled = false
                    });
            },
        }

    }
</script>
