webpackJsonp([12],{439:function(t,e,o){var i=o(36)(o(853),o(854),!1,function(t){o(851)},null,null);t.exports=i.exports},825:function(t,e,o){var i=o(36)(o(828),o(829),!1,function(t){o(826)},"data-v-e5612fa0",null);t.exports=i.exports},826:function(t,e,o){var i=o(827);"string"==typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);o(96)("2a95ebb2",i,!0,{})},827:function(t,e,o){(t.exports=o(30)(!1)).push([t.i,".jbtn-file[data-v-e5612fa0]{cursor:pointer;position:relative;overflow:hidden}.jbtn-file input[type=file][data-v-e5612fa0]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;text-align:right;filter:alpha(opacity=0);opacity:0;outline:none;cursor:inherit;display:block}",""])},828:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"upload-button",props:{selectedCallback:Function,title:String,multipleupload:{type:Boolean,default:!1},api:String,nameupload:String},methods:{fileSelected:function(t){var e=this,o=new FormData;o.append("file",t.target.files[0]),o.append("_id",e.$root.store.state.user.id),e.$root.store.state.user.photo&&(o.append("photo",_.toString(e.$root.store.state.user.photo.file)),o.append("photo_id",_.toString(e.$root.store.state.user.photo.id))),axios.post(e.api,o).then(function(t){console.log(t.data),e.$root.store.state.user.photo=t.data}).catch(function(t){console.log(t)})}}}},829:function(t,e){t.exports={render:function(){var t=this.$createElement,e=this._self._c||t;return e("form",{ref:"form",attrs:{method:"post",enctype:"multipart/form-data"}},[e("div",{staticClass:"btn btn-primary jbtn-file",staticStyle:{"margin-top":"10px"}},[this._v("\n        "+this._s(this.title)+"\n        "),e("input",{ref:"inputFile",attrs:{type:"file",name:this.nameupload,multiple:this.multipleupload},on:{input:this.fileSelected}})])])},staticRenderFns:[]}},851:function(t,e,o){var i=o(852);"string"==typeof i&&(i=[[t.i,i,""]]),i.locals&&(t.exports=i.locals);o(96)("5cf965db",i,!0,{})},852:function(t,e,o){(t.exports=o(30)(!1)).push([t.i,".yum-file{cursor:pointer;position:relative;overflow:hidden}.yum-file input[type=file]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;text-align:right;filter:alpha(opacity=0);opacity:0;outline:none;cursor:inherit;display:block}",""])},853:function(t,e,o){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i,s=o(825),a=(i=s)&&i.__esModule?i:{default:i};e.default={components:{UploadButton:a.default},data:function(){return{setting_d:[]}},beforeRouteEnter:function(t,e,o){axios.get("/api/settings/1").then(function(t){o(function(e){return e.setData(t.data)})})},beforeRouteUpdate:function(t,e,o){var i=this;axios.get("/api/settings/1").then(function(t){i.setData(t.data),o()})},methods:{setData:function(t){this.setting_d=t},form_m:function(){var t=this,e=new FormData(t.$refs.form);axios.post("/api/settings",e).then(function(e){t.$root.store.dispatch("settingChange",e.data)})}}}},854:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,o=t._self._c||e;return t.setting_d?o("form",{ref:"form",staticClass:"form-horizontal",on:{submit:function(e){return e.preventDefault(),t.form_m(e)}}},[o("div",{staticClass:"form-group"},[o("div",{staticClass:"text-center"},[o("img",{staticClass:"profile-user-img img-fluid img-circle",attrs:{src:t.$root.store.state.setting.photo?"/storage/images/"+t.$root.store.state.setting.photo.file:"/storage/AdminLTELogo.png",alt:"avatar"}})])]),t._v(" "),o("div",{staticClass:"form-group"},[o("label",{staticClass:"col-sm-2 control-label",attrs:{for:"inputName"}},[t._v("Name")]),t._v(" "),o("div",{staticClass:"col-sm-10"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.setting_d.name,expression:"setting_d.name"}],staticClass:"form-control",attrs:{type:"text",name:"name",placeholder:"Name"},domProps:{value:t.setting_d.name},on:{input:function(e){e.target.composing||t.$set(t.setting_d,"name",e.target.value)}}})])]),t._v(" "),t._m(0),t._v(" "),t._m(1)]):t._e()},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"form-group"},[e("label",{staticClass:"col-sm-2 control-label",attrs:{for:"upload"}},[this._v("Upload")]),this._v(" "),e("div",{staticClass:"col-sm-10"},[e("div",{staticClass:"btn btn-primary yum-file"},[this._v("\n                Upload Logo\n                "),e("input",{attrs:{name:"file",type:"file"}})])])])},function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"form-group"},[e("div",{staticClass:"col-sm-offset-2 col-sm-10"},[e("input",{staticClass:"btn btn-danger",attrs:{type:"submit"}})])])}]}}});