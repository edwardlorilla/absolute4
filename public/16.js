webpackJsonp([16],{435:function(t,e,a){var s=a(36)(a(843),a(844),!1,null,null,null);t.exports=s.exports},825:function(t,e,a){var s=a(36)(a(828),a(829),!1,function(t){a(826)},"data-v-e5612fa0",null);t.exports=s.exports},826:function(t,e,a){var s=a(827);"string"==typeof s&&(s=[[t.i,s,""]]),s.locals&&(t.exports=s.locals);a(96)("2a95ebb2",s,!0,{})},827:function(t,e,a){(t.exports=a(30)(!1)).push([t.i,".jbtn-file[data-v-e5612fa0]{cursor:pointer;position:relative;overflow:hidden}.jbtn-file input[type=file][data-v-e5612fa0]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;text-align:right;filter:alpha(opacity=0);opacity:0;outline:none;cursor:inherit;display:block}",""])},828:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"upload-button",props:{selectedCallback:Function,title:String,multipleupload:{type:Boolean,default:!1},api:String,nameupload:String},methods:{fileSelected:function(t){var e=this,a=new FormData;a.append("file",t.target.files[0]),a.append("_id",e.$root.store.state.user.id),e.$root.store.state.user.photo&&(a.append("photo",_.toString(e.$root.store.state.user.photo.file)),a.append("photo_id",_.toString(e.$root.store.state.user.photo.id))),axios.post(e.api,a).then(function(t){console.log(t.data),e.$root.store.state.user.photo=t.data}).catch(function(t){console.log(t)})}}}},829:function(t,e){t.exports={render:function(){var t=this.$createElement,e=this._self._c||t;return e("form",{ref:"form",attrs:{method:"post",enctype:"multipart/form-data"}},[e("div",{staticClass:"btn btn-primary jbtn-file",staticStyle:{"margin-top":"10px"}},[this._v("\n        "+this._s(this.title)+"\n        "),e("input",{ref:"inputFile",attrs:{type:"file",name:this.nameupload,multiple:this.multipleupload},on:{input:this.fileSelected}})])])},staticRenderFns:[]}},843:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s,r=a(825),i=(s=r)&&s.__esModule?s:{default:s};e.default={components:{UploadButton:i.default},data:function(){return{dataToggle:"edit"}},computed:{filterRoute:function(){var t=_.map([{to:"profile.edit",name:"Profile",roles:["superadministrator","administrator","doctor","customer"]},{to:"setting.index",name:"Setting",roles:["superadministrator"]},{to:"change.password",name:"Change Password",roles:["superadministrator","administrator","doctor","customer"]},{to:"profile.signature",name:"Signature",roles:["superadministrator"]}],function(t){var e=_.filter(t.roles,function(t){return-1!==window.Laravel.permissions.indexOf(t)});return _.isEmpty(e)?null:t});return _.compact(t)},user_$:function(){return this.$root.store.state.user}}}},844:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"row"},[a("div",{staticClass:"col-md-3"},[a("div",{staticClass:"card card-primary card-outline"},[a("div",{staticClass:"card-body box-profile"},[a("div",{staticClass:"text-center"},[a("img",{staticClass:"profile-user-img img-fluid img-circle",attrs:{src:t.user_$.photo?"/storage/images/"+t.user_$.photo.file:"/storage/avatar.png",alt:"avatar"}})]),t._v(" "),a("p",{staticClass:"text-center"},[a("upload-button",{attrs:{api:"/api/uploads",title:"Upload"}})],1),t._v(" "),a("h3",{staticClass:"profile-username text-center"},[t._v(t._s(t.user_$.name))]),t._v(" "),t._l(t.$root.store.state.user.roles,function(e){return a("p",{staticClass:"text-muted text-center"},[t._v("\n                    "+t._s(e.display_name))])})],2)]),t._v(" "),a("div",{staticClass:"card card-primary"},[t._m(0),t._v(" "),a("div",{staticClass:"card-body"},[t._m(1),t._v(" "),a("p",{staticClass:"text-muted"},[t._v("\n                    "+t._s(t.$root.store.state.user.email)+"\n                ")]),t._v(" "),a("hr"),t._v(" "),t._m(2),t._v(" "),a("p",{staticClass:"text-muted"},[t._v(t._s(t.$root.store.state.user.address))]),t._v(" "),a("hr")])])]),t._v(" "),a("div",{staticClass:"col-md-9"},[a("div",{staticClass:"card"},[a("div",{staticClass:"card-header p-2"},[a("ul",{staticClass:"nav nav-pills"},t._l(t.filterRoute,function(e,s){return a("li",{key:s,staticClass:"nav-item"},[a("router-link",{staticClass:"nav-link",attrs:{to:{name:e.to}}},[t._v(t._s(e.name)+"\n                        ")])],1)}))]),t._v(" "),a("div",{staticClass:"card-body"},[a("div",[a("router-view")],1)])])])])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"card-header"},[e("h3",{staticClass:"card-title"},[this._v("About Me")])])},function(){var t=this.$createElement,e=this._self._c||t;return e("strong",[e("i",{staticClass:"fa fa-book mr-1"}),this._v(" Email")])},function(){var t=this.$createElement,e=this._self._c||t;return e("strong",[e("i",{staticClass:"fa fa-map-marker mr-1"}),this._v(" Location")])}]}}});