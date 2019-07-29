webpackJsonp([47],{443:function(e,t,a){var r=a(36)(a(874),a(875),!1,null,null,null);e.exports=r.exports},874:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=function(e,t,a){axios.get("/api/"+e,{params:t}).then(function(e){a(null,{data:e.data,page:t})}).catch(function(e){a(e,e.response.data)})};t.default={data:function(){var e=this;return{filters:[{value:"",search_prop:"id"},{value:"",search_prop:"id"}],dialogMessage:{title:"",message:""},dialogVisible:!1,actionCol:{label:"Action",props:{align:"center"},buttons:[{props:{type:"info",size:"mini",icon:"el-icon-printer"},handler:function(t){var a=e;a.$router.push({name:a.$route.meta.title.toLowerCase()+".print",params:{id:t.id,row:t}})},label:"Print"},{handler:function(t){var a=e;a.dialogMessage={title:"Delete",message:"Are you sure to delete "+t.id+"?",row:t},a.dialogVisible=!0},label:"Delete"}]},query:{page:1,column:"id",direction:"desc",per_page:15,search_column:"all",search_operator:"like",search_input:""},operators:{equal:"=",not_equal:"<>",less_than:"<",greater_than:">",less_than_or_equal_to:"<=",greater_than_or_equal_to:">=",in:"IN",like:"LIKE"},columns:[{}],sortKey:"",sortOrders:{},data:[],meta:{},links:{first:null,last:null,next:null,prev:null},error:null,filterKey:"",loading:!1,_numberLoad:0,users:[]}},computed:{filteredData:function(){var e=this.sortKey,t=this.filterKey&&this.filterKey.toLowerCase(),a=this.sortOrders[e]||1,r=this.data;return t&&(r=r.filter(function(e){return Object.keys(e).some(function(a){return String(e[a]).toLowerCase().indexOf(t)>-1})})),e&&(r=r.slice().sort(function(t,r){return((t=t[e])===(r=r[e])?0:t>r?1:-1)*a})),r},nextPage:function(){if(this.meta&&this.meta.current_page!==this.meta.last_page){return this.meta.current_page+1}},prevPage:function(){if(this.meta&&1!==this.meta.current_page){return this.meta.current_page-1}},paginatonCount:function(){if(this.meta){var e=this.meta;return"Displaying "+e.current_page+" of "+e.last_page+" rows"}}},filters:{capitalize:function(e){return e.charAt(0).toUpperCase()+e.slice(1)}},beforeRouteEnter:function(e,t,a){r(e.meta.url,e.query,function(e,t){a(function(a){return a.setData(e,t)})})},beforeRouteUpdate:function(e,t,a){var l=this;r(e.meta.url,e.query,function(e,t){l.setData(e,t),a()})},methods:{_delete:function(e){var t=this;e&&(t.loading=!0,axios.delete("/api/"+t.$route.meta.url+"/"+e.id).then(function(a){t.data.splice(t.data.indexOf(e),1),t.loading=!1,t.dialogVisible=!1,t.dialogMessage={title:"",message:"",row:{}},t.$message({message:a.statusText,type:"success"})}).catch(function(e){t.$message({message:e.statusText,type:"warning"}),t.loading=!1}))},handleClose:function(e){this.$confirm("Are you sure to close this dialog?").then(function(t){e()}).catch(function(e){})},_create:function(){this.$router.push({name:this.$route.meta.title.toLowerCase()+".create"})},sortBy:function(e){this.sortKey=e,this.sortOrders[e]=-1*this.sortOrders[e]},loadData:_.debounce(function(e){var t=this;t.loading=!0;var a=_.clone(t.$route.query);"sort"===e.type&&(a.column=e.sort.prop,a.direction="ascending"==e.sort.order?"asc":"desc"),"init"!=e.type?("page"===e.type&&(a.page=e.page,a.per_page=e.pageSize),"filter"!==e.type||_.isEmpty(t.filters[0].value)?"filter"!==e.type||_.isEmpty(t.filters[1].value)?(delete a.user_id,delete a.search_input):a.user_id=t.filters[1].value.toString():(a.search_column=t.query.search_column,a.search_operator=t.query.search_operator,a.search_input=t.filters[0].value),t.$router.push({path:""+t.$route.path,query:a},function(){t.loading=!1,""==a.search_input&&(delete a.search_input,t.filters[1].value="")},function(){t.loading=!1})):t.loading=!1},500),setData:function(e,t){var a=this;if(e)404===e.response.status&&a.$router.push({name:"error.not-found",params:{0:"/"}}),a.error=e.toString();else{a.data=t.data.model.data;var r=_.map(t.data.model.data,function(e){return e.user});a.users=_.uniqBy(r,"id"),a.links.first_page_url=t.data.model.first_page_url,a.links.last_page_url=t.data.model.last_page_url,a.links.prev_page_url=t.data.model.prev_page_url,a.links.next_page_url=t.data.model.next_page_url,a.meta.current_page=t.data.model.current_page,a.meta.from=t.data.model.from,a.meta.last_page=t.data.model.last_page,a.query.per_page=_.parseInt(t.data.model.per_page),a.meta.to=t.data.model.to,a.meta.total=t.data.model.total,a.columns=t.data.columns,t.page.search_input&&(a.filters[0].value=t.page.search_input),a.filters[0].search_prop=a.search_column}}}}},875:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return e.data?a("div",{staticClass:"dv"},[a("div",{staticClass:"dv-header"},[a("div",{staticClass:"dv-header-title"},[a("el-button",{attrs:{type:"primary"},on:{click:e._create}},[e._v("Create Request Medicine")])],1),e._v(" "),a("div",{staticClass:"dv-header-columns"},[a("span",{staticClass:"dv-header-pre"},[e._v("Search: ")]),e._v(" "),a("el-select",{attrs:{placeholder:"Select"},model:{value:e.query.search_column,callback:function(t){e.$set(e.query,"search_column",t)},expression:"query.search_column"}},[a("el-option",{attrs:{label:"All",value:"all"}}),e._v(" "),e._l(e.columns,function(e,t){return a("el-option",{key:t,attrs:{label:e.name,value:e.id}})})],2)],1),e._v(" "),a("div",{staticClass:"dv-header-operators"},[a("el-select",{attrs:{placeholder:"Select"},model:{value:e.query.search_operator,callback:function(t){e.$set(e.query,"search_operator",t)},expression:"query.search_operator"}},e._l(e.operators,function(e,t){return a("el-option",{key:t,attrs:{label:e,value:t}})}))],1),e._v(" "),a("div",{staticClass:"dv-header-search"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-lg-6"},[a("el-input",{attrs:{placeholder:"Search"},on:{keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13,t.key,"Enter")?e.loadData(t):null}},model:{value:e.filters[0].value,callback:function(t){e.$set(e.filters[0],"value",t)},expression:"filters[0].value"}})],1),e._v(" "),a("div",{staticClass:"col-lg-6"},[a("el-select",{attrs:{clearable:"",placeholder:"Select Users",multiple:"multiple"},model:{value:e.filters[1].value,callback:function(t){e.$set(e.filters[1],"value",t)},expression:"filters[1].value"}},e._l(e.users,function(e,t,r){return a("el-option",{key:r,attrs:{label:e.name,value:e.id}})}))],1)])])]),e._v(" "),a("el-dialog",{attrs:{"show-close":!1,title:e.dialogMessage.title,visible:e.dialogVisible,width:"30%","before-close":e.handleClose},on:{"update:visible":function(t){e.dialogVisible=t}}},[a("span",[e._v(e._s(e.dialogMessage.message))]),e._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{disabled:e.loading},on:{click:function(t){e.dialogVisible=!1}}},[e._v("Cancel")]),e._v(" "),a("el-button",{attrs:{loading:e.loading,type:"primary"},on:{click:function(t){e._delete(e.dialogMessage.row)}}},[e._v("Confirm")])],1)]),e._v(" "),e.nextPage||e.prevPage||!e.nextPage||!e.prevPage||e.meta?a("data-tables-server",{attrs:{data:e.filteredData,"action-col":e.actionCol,total:e.meta.total,filters:e.filters,"pagination-props":{background:!0,pageSize:e.query.per_page,pageSizes:[e.query.per_page,10,20,30]},"page-size":e.query.per_page,"current-page":e.meta.current_page,stripe:"",loading:e.loading},on:{"query-change":e.loadData}},[a("el-table-column",{attrs:{type:"expand"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-table",{staticStyle:{width:"100%"},attrs:{data:t.row.transactions}},[a("el-table-column",{attrs:{prop:"po_number",label:"Stock No."}}),e._v(" "),a("el-table-column",{attrs:{prop:"product.medicine.name",label:"Product Name"}}),e._v(" "),a("el-table-column",{attrs:{prop:"out_quantity",label:"Quantity"}})],1)]}}])}),e._v(" "),e._l(e.columns,function(e){return a("el-table-column",{key:e.id,attrs:{prop:e.id,label:e.name,sortable:"custom"}})})],2):e._e()],1):e._e()},staticRenderFns:[]}}});