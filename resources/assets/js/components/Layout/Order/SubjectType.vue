<template>
    <div>
        <span >{{subjectLabel}}</span>
    </div>
</template>
<script>
    export default{
        props:{
            subject:String,
            subjectRow:Object
        },
        computed:{
            subjectLabel(){
                var vm = this, label =""
                if(vm.subject == 'App\\Transaction'){
                    label = 'Add a new transaction'
                }else if(vm.subject == 'App\\Supply' && vm.subjectRow){
                    label = 'Add a new ' +(vm.subjectRow.type ? 'medicine ' : 'office ' )+'supply to ' + vm.subjectRow.name
                }else if(vm.subject == 'App\\PrintPurchaseOrder' && vm.subjectRow){
                    var data = typeof vm.subjectRow.data == 'string' ?  JSON.parse(vm.subjectRow.data) : vm.subjectRow.data
                    label = 'The ' +  data.division.name   + 'Division has been approved'
                }else if(vm.subject == "App\\Track" && vm.subjectRow){
                    var data = typeof vm.subjectRow.data == 'string' ?  JSON.parse(vm.subjectRow.data) : vm.subjectRow.data
                    label = data.division.name ? data.division.name + 'Division has been approved' : 'Add a new supply'
                }
                return label
            }
        }
    }
</script>
