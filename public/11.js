webpackJsonp([11],{797:function(e,t,a){var r=a(36)(a(986),a(993),!1,null,null,null);e.exports=r.exports},816:function(e,t,a){var r=a(36)(a(817),a(818),!1,null,null,null);e.exports=r.exports},817:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["data"]}},818:function(e,t){e.exports={render:function(){var e=this.$createElement,t=this._self._c||e;return t("el-table",{staticStyle:{width:"100%"},attrs:{data:this.data.products}},[t("el-table-column",{attrs:{prop:"name",label:"Product Name"}}),this._v(" "),t("el-table-column",{attrs:{prop:"out_quantity",label:"Quantity"}})],1)},staticRenderFns:[]}},819:function(e,t,a){var r=a(36)(a(820),a(821),!1,null,null,null);e.exports=r.exports},820:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["data"]}},821:function(e,t){e.exports={render:function(){var e=this.$createElement,t=this._self._c||e;return t("el-table",{staticStyle:{width:"100%"},attrs:{data:this.data.supplies}},[t("el-table-column",{attrs:{prop:"name",label:"Product Name"}}),this._v(" "),t("el-table-column",{attrs:{prop:"description",label:"Description"}}),this._v(" "),t("el-table-column",{attrs:{prop:"out_quantity",label:"Quantity"}}),this._v(" "),t("el-table-column",{attrs:{prop:"out_quantity",label:"Quantity"}})],1)},staticRenderFns:[]}},986:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=o(a(816)),l=o(a(819)),s=o(a(987)),n=o(a(990));function o(e){return e&&e.__esModule?e:{default:e}}var i=function(e,t,a){axios.get("/api/"+e,{params:t}).then(function(e){a(null,{data:e.data,page:t})}).catch(function(e){a(e,e.response.data)})};t.default={components:{"medical-request":r.default,"medical-supply":l.default,"supply-approved":s.default,"medicine-approved":n.default},data:function(){var e=this;return{filters:[{value:"",search_prop:"id"}],dialogMessage:{title:"",message:""},dialogVisible:!1,actionCol:{label:"Action",props:{align:"center"},buttons:[{props:{type:"success",icon:"el-icon-edit",size:"small"},handler:function(t){e.$router.push({name:"App\\Notifications\\Pending"===t.type?"pending.show":"pending.supply",params:{id:t.id}})},label:"Show"}]},query:{page:1,column:"id",direction:"desc",per_page:15,search_column:"all",search_operator:"like",search_input:""},operators:{equal:"=",not_equal:"<>",less_than:"<",greater_than:">",less_than_or_equal_to:"<=",greater_than_or_equal_to:">=",in:"IN",like:"LIKE"},columns:[{}],sortKey:"",sortOrders:{},data:[],meta:{},links:{first:null,last:null,next:null,prev:null},error:null,filterKey:"",loading:!1,_numberLoad:0}},computed:{filteredData:function(){var e=this.sortKey,t=this.filterKey&&this.filterKey.toLowerCase(),a=this.sortOrders[e]||1,r=this.data;return t&&(r=r.filter(function(e){return Object.keys(e).some(function(a){return String(e[a]).toLowerCase().indexOf(t)>-1})})),e&&(r=r.slice().sort(function(t,r){return((t=t[e])===(r=r[e])?0:t>r?1:-1)*a})),r},nextPage:function(){if(this.meta&&this.meta.current_page!==this.meta.last_page){return this.meta.current_page+1}},prevPage:function(){if(this.meta&&1!==this.meta.current_page){return this.meta.current_page-1}},paginatonCount:function(){if(this.meta){var e=this.meta;return"Displaying "+e.current_page+" of "+e.last_page+" rows"}}},filters:{capitalize:function(e){return e.charAt(0).toUpperCase()+e.slice(1)}},beforeRouteEnter:function(e,t,a){i(e.meta.url,e.query,function(e,t){a(function(a){return a.setData(e,t)})})},beforeRouteUpdate:function(e,t,a){var r=this;i(e.meta.url,e.query,function(e,t){r.setData(e,t),a()})},methods:{onPrint:function(e){this.$router.push({name:"view.medicine.print.request",params:{id:e}})},_delete:function(e){var t=this;e&&(t.loading=!0,axios.delete("/api/"+t.$route.meta.title.toLowerCase()+"/"+e.id).then(function(a){t.data.splice(t.data.indexOf(e),1),t.loading=!1,t.dialogVisible=!1,t.dialogMessage={title:"",message:"",row:{}},t.$message({message:a.statusText,type:"success"})}).catch(function(e){t.$message({message:e.statusText,type:"warning"}),t.loading=!1}))},handleClose:function(e){this.$confirm("Are you sure to close this dialog?").then(function(t){e()}).catch(function(e){})},_create:function(){this.$router.push({name:this.$route.meta.title.toLowerCase()+".create"})},sortBy:function(e){this.sortKey=e,this.sortOrders[e]=-1*this.sortOrders[e]},loadData:_.debounce(function(e){var t=this;t.loading=!0;var a=_.clone(t.$route.query);"sort"===e.type&&(a.column=e.sort.prop,a.direction="ascending"==e.sort.order?"asc":"desc"),"page"===e.type&&(a.page=e.page,a.per_page=e.pageSize),"init"!=e.type?("filter"===e.type&&0!=t.filters[0].value.length?(a.search_column=t.query.search_column,a.search_operator=t.query.search_operator,a.search_input=t.filters[0].value):delete a.search_input,t.$router.push({path:""+t.$route.path,query:a},function(){t.loading=!1},function(){t.loading=!1})):t.loading=!1},500),setData:function(e,t){var a=this,r=a.$root.store.state.notifications;e?(404===e.response.status&&a.$router.push({name:"error.not-found",params:{0:"/"}}),a.error=e.toString()):(a.data=r.data,a.links.first_page_url=r.first_page_url,a.links.last_page_url=r.last_page_url,a.links.prev_page_url=r.prev_page_url,a.links.next_page_url=r.next_page_url,a.meta.current_page=r.current_page,a.meta.from=r.from,a.meta.last_page=r.last_page,a.query.per_page=_.parseInt(r.per_page),a.meta.to=r.to,a.meta.total=r.total,a.columns=t.data.columns)}}}},987:function(e,t,a){var r=a(36)(a(988),a(989),!1,null,null,null);e.exports=r.exports},988:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["data"]}},989:function(e,t){e.exports={render:function(){var e=this.$createElement,t=this._self._c||e;return t("el-table",{staticStyle:{width:"100%"},attrs:{data:this.data.request}},[t("el-table-column",{attrs:{prop:"name",label:"Product Name"}}),this._v(" "),t("el-table-column",{attrs:{prop:"description",label:"Description"}}),this._v(" "),t("el-table-column",{attrs:{prop:"out_quantity",label:"Quantity"}})],1)},staticRenderFns:[]}},990:function(e,t,a){var r=a(36)(a(991),a(992),!1,null,null,null);e.exports=r.exports},991:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:["data"]}},992:function(e,t){e.exports={render:function(){var e=this.$createElement,t=this._self._c||e;return t("el-table",{staticStyle:{width:"100%"},attrs:{data:this.data.request}},[t("el-table-column",{attrs:{prop:"name",label:"Product Name"}}),this._v(" "),t("el-table-column",{attrs:{prop:"out_quantity",label:"Quantity"}}),this._v(" "),t("el-table-column",{attrs:{prop:"category_id",label:"Categories"}})],1)},staticRenderFns:[]}},993:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return e.data?a("div",{staticClass:"dv"},[a("div",{staticClass:"dv-header"},[a("div",{staticClass:"dv-header-columns"},[a("span",{staticClass:"dv-header-pre"},[e._v("Search: ")]),e._v(" "),a("el-select",{attrs:{placeholder:"Select"},model:{value:e.query.search_column,callback:function(t){e.$set(e.query,"search_column",t)},expression:"query.search_column"}},[a("el-option",{attrs:{label:"All",value:"all"}}),e._v(" "),e._l(e.columns,function(e,t){return a("el-option",{key:t,attrs:{label:e.name,value:e.id}})})],2)],1),e._v(" "),a("div",{staticClass:"dv-header-operators"},[a("el-select",{attrs:{placeholder:"Select"},model:{value:e.query.search_operator,callback:function(t){e.$set(e.query,"search_operator",t)},expression:"query.search_operator"}},e._l(e.operators,function(e,t){return a("el-option",{key:t,attrs:{label:e,value:t}})}))],1),e._v(" "),a("div",{staticClass:"dv-header-search"},[a("el-input",{attrs:{placeholder:"Search"},on:{keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13,t.key,"Enter")?e.loadData(t):null}},model:{value:e.filters[0].value,callback:function(t){e.$set(e.filters[0],"value",t)},expression:"filters[0].value"}})],1)]),e._v(" "),a("el-dialog",{attrs:{"show-close":!1,title:e.dialogMessage.title,visible:e.dialogVisible,width:"30%","before-close":e.handleClose},on:{"update:visible":function(t){e.dialogVisible=t}}},[a("span",[e._v(e._s(e.dialogMessage.message))]),e._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{disabled:e.loading},on:{click:function(t){e.dialogVisible=!1}}},[e._v("Cancel")]),e._v(" "),a("el-button",{attrs:{loading:e.loading,type:"primary"},on:{click:function(t){e._delete(e.dialogMessage.row)}}},[e._v("Confirm")])],1)]),e._v(" "),e.nextPage||e.prevPage||!e.nextPage||!e.prevPage||e.meta?a("data-tables-server",{attrs:{data:e.filteredData,total:e.meta.total,filters:e.filters,"pagination-props":{background:!0,pageSize:e.query.per_page,pageSizes:[e.query.per_page,10,20,30]},"page-size":e.query.per_page,"current-page":e.meta.current_page,loading:e.loading},on:{"query-change":e.loadData}},[a("el-table-column",{attrs:{type:"expand"},scopedSlots:e._u([{key:"default",fn:function(e){return[a(e.row.data.type,{tag:"component",attrs:{data:e.row.data}})]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"ID",prop:"notifiable_id"}}),e._v(" "),a("el-table-column",{attrs:{label:"Message",prop:"data.message"}}),e._v(" "),a("el-table-column",{attrs:{label:"Status",prop:"data.status"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tag",{attrs:{type:"pending"===t.row.data.status?"primary":"rejected"===t.row.data.status?"danger":"success"}},[e._v(e._s(t.row.data.status))])]}}])}),e._v(" "),a("el-table-column",{attrs:{label:"Updated At",prop:"updated_at"}})],1):e._e()],1):e._e()},staticRenderFns:[]}}});