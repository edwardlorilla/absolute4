webpackJsonp([6],{457:function(e,s,r){var t=r(36)(r(937),r(939),!1,null,null,null);e.exports=t.exports},937:function(e,s,r){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var t,a=r(938),o=(t=a)&&t.__esModule?t:{default:t};s.default={mixins:[o.default],data:function(){return{isAddUser:!1,form:{name:"",user_id:"",station:""},users:[],user:{name:"",email:"",address:"",password:"",confirm_password:"",roles:[3]},loading:!1,errors:{}}},methods:{onUserSubmit:function(){var e=this;this.$refs.user.validate(function(s){if(!s)return!1;axios.post("/api/users",e.user).then(function(s){e.users=[{value:s.data,label:s.data.name}],e.form.user_id=s.data.id,e.isAddUser=!1,e.user={name:"",email:"",address:"",password:"",confirm_password:"",roles:[3]}}).catch(function(s){s.response.data.errors&&s.response.data.errors&&s.response.data.message?(e.errors=s.response.data.errors,e.$message({message:s.response.data.message,type:"error"})):e.$message({message:s.statusText,type:"warning"}),e.isDisabled=!1})})},getUser:function(e){return axios.get("/api/search/users?search="+e)},search_user:function(e){var s=this;""!==e?(s.loading=!0,s.onSearchUser(e,s)):(s.loading=!1,s.units=[])},onSearchUser:_.debounce(function(e,s){s.getUser(e).then(function(e){s.loading=!1,s.users=e.data.map(function(e){return{value:e,label:e.name}})}).catch(function(){s.loading=!1})},350)}}},938:function(e,s,r){"use strict";Object.defineProperty(s,"__esModule",{value:!0}),s.default={data:function(){return{isDisabled:!1,labelPosition:"left",errors:[]}},beforeRouteEnter:function(e,s,r){e.params.id?axios.get("/api/"+e.meta.url+"/"+e.params.id).then(function(e){r(function(s){return s.setData(e.data)})}):r()},beforeRouteUpdate:function(e,s,r){var t=this;e.params.id?axios.get("/api/"+e.meta.url+"/"+e.params.id).then(function(e){t.setData(e.data),r()}):r()},methods:{onSubmit:function(){var e=this;e.isDisabled=!0,e.errors=[],axios.post("/api/"+e.$route.meta.url,e.form).then(function(s){e.$message({message:s.statusText,type:"success"}),e.isDisabled=!1}).catch(function(s){s.response.data.errors&&s.response.data.message&&(e.errors=s.response.data.errors,e.$message({message:s.response.data.message,type:"error"})),e.isDisabled=!1})},setData:function(e){this.form=e,e.packs||(this.form.packs={item_pack:"",item_type:"",sub_item:"",sub_item_type:""})}}}},939:function(e,s){e.exports={render:function(){var e=this,s=e.$createElement,r=e._self._c||s;return r("div",{staticClass:"row"},[r("div",{staticClass:"col"},[r("div",{staticClass:"card"},[r("div",{staticClass:"card-header"},[r("h5",{staticClass:"m-0"},[e._v(e._s(e.$route.meta.type)+" "+e._s(e.$route.meta.title))])]),e._v(" "),r("div",{staticClass:"card-body"},[r("el-form",{ref:"form",attrs:{"label-position":e.labelPosition,size:"small","label-width":"100px",model:e.form},nativeOn:{submit:function(s){return s.preventDefault(),e.onSubmit(s)}}},[r("el-form-item",{class:e.errors.name?"is-error is-required":"",attrs:{label:"Code"}},[r("el-input",{attrs:{required:""},model:{value:e.form.name,callback:function(s){e.$set(e.form,"name",s)},expression:"form.name"}}),e._v(" "),e._l(e.errors.name,function(s){return e.errors.name?r("div",{staticClass:"el-form-item__error"},[e._v("\n                              "+e._s(s)+"\n                          ")]):e._e()})],2),e._v(" "),r("el-form-item",{class:e.errors.station?"is-error is-required":"",attrs:{label:"Station"}},[r("el-input",{attrs:{required:""},model:{value:e.form.station,callback:function(s){e.$set(e.form,"station",s)},expression:"form.station"}}),e._v(" "),e._l(e.errors.station,function(s){return e.errors.station?r("div",{staticClass:"el-form-item__error"},[e._v("\n                              "+e._s(s)+"\n                          ")]):e._e()})],2),e._v(" "),r("el-form-item",{class:e.errors.supply_division?"is-error is-required":"",attrs:{label:"Head Of Office"}},[r("div",{staticClass:"row"},[r("div",{staticClass:"col-sm text-right"},[r("button",{staticClass:"btn btn-sm btn-link",attrs:{type:"button"},on:{click:function(s){e.isAddUser=!e.isAddUser}}},[e._v("Add User\n                                  ")])])]),e._v(" "),r("el-select",{staticStyle:{width:"100%"},attrs:{filterable:"",remote:"",size:"small","value-key":"id",required:"",placeholder:"Please a User keyword","remote-method":e.search_user,loading:e.loading},model:{value:e.form.user_id,callback:function(s){e.$set(e.form,"user_id",s)},expression:"form.user_id"}},e._l(e.users,function(s,t){return r("el-option",{key:s.value.id,staticStyle:{padding:"0px"},attrs:{label:s.label,value:s.value.id}},[r("div",{staticStyle:{padding:"0 20px"}},[r("span",{staticStyle:{float:"left"}},[e._v(e._s(s.label))]),e._v(" "),r("span",{staticStyle:{float:"right",color:"#8492a6","font-size":"13px"}},[e._v(e._s(s.value.email))])])])})),e._v(" "),r("div",[r("el-dialog",{attrs:{title:"Add User",visible:e.isAddUser},on:{"update:visible":function(s){e.isAddUser=s}}},[r("el-form",{ref:"user",attrs:{size:"small","label-width":"120px",model:e.user,"status-icon":""}},[r("el-form-item",{attrs:{label:"Name",prop:"name",rules:e.$root.validate.required}},[r("el-input",{attrs:{type:"text"},model:{value:e.user.name,callback:function(s){e.$set(e.user,"name",s)},expression:"user.name"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"Email",prop:"email",rules:e.$root.validate.required}},[r("el-input",{attrs:{type:"email"},model:{value:e.user.email,callback:function(s){e.$set(e.user,"email",s)},expression:"user.email"}})],1),e._v(" "),r("el-form-item",{attrs:{label:"Address",prop:"address",rules:e.$root.validate.required}},[r("el-input",{attrs:{type:"text"},model:{value:e.user.address,callback:function(s){e.$set(e.user,"address",s)},expression:"user.address"}})],1),e._v(" "),r("el-form-item",{class:e.errors.password?"is-error is-required":"",attrs:{label:"Password",prop:"password"}},[r("el-input",{attrs:{type:"password"},model:{value:e.user.password,callback:function(s){e.$set(e.user,"password",s)},expression:"user.password"}}),e._v(" "),e._l(e.errors.password,function(s){return e.errors.password?r("div",{staticClass:"el-form-item__error"},[e._v("\n                                              "+e._s(s)+"\n                                          ")]):e._e()})],2),e._v(" "),r("el-form-item",{class:e.errors.confirm_password?"is-error is-required":"",attrs:{label:"Confirm Password",prop:"confirm_password"}},[r("el-input",{attrs:{type:"password"},model:{value:e.user.confirm_password,callback:function(s){e.$set(e.user,"confirm_password",s)},expression:"user.confirm_password"}}),e._v(" "),e._l(e.errors.confirm_password,function(s){return e.errors.confirm_password?r("div",{staticClass:"el-form-item__error"},[e._v("\n                                              "+e._s(s)+"\n                                          ")]):e._e()})],2)],1),e._v(" "),r("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[r("el-button",{on:{click:function(s){e.isAddUser=!1}}},[e._v("Cancel")]),e._v(" "),r("el-button",{attrs:{type:"primary"},on:{click:e.onUserSubmit}},[e._v("Confirm")])],1)],1)],1),e._v(" "),e._l(e.errors.user_id,function(s){return e.errors.user_id?r("div",{staticClass:"el-form-item__error"},[e._v("\n                              "+e._s(s)+"\n                          ")]):e._e()})],2),e._v(" "),r("el-form-item",[r("el-button",{attrs:{type:"primary",loading:e.isDisabled},on:{click:e.onSubmit}},[e._v(e._s(e.$route.meta.type)+"\n                          ")]),e._v(" "),r("el-button",{on:{click:function(s){e.$router.push("/"+e.$route.meta.url)}}},[e._v("Cancel")])],1)],1)],1)])])])},staticRenderFns:[]}}});