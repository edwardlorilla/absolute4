webpackJsonp([33],{1032:function(e,t,a){var r=a(1033);"string"==typeof r&&(r=[[e.i,r,""]]),r.locals&&(e.exports=r.locals);a(96)("164f6e9a",r,!0,{})},1033:function(e,t,a){(e.exports=a(30)(!1)).push([e.i,".el-table .warning-row{background:oldlace}.el-table .success-row{background:#f0f8ff}.el-input-group__prepend{background-color:#fff}",""])},1034:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=function(){return function(e,t){if(Array.isArray(e))return e;if(Symbol.iterator in Object(e))return function(e,t){var a=[],r=!0,s=!1,n=void 0;try{for(var i,o=e[Symbol.iterator]();!(r=(i=o.next()).done)&&(a.push(i.value),!t||a.length!==t);r=!0);}catch(e){s=!0,n=e}finally{try{!r&&o.return&&o.return()}finally{if(s)throw n}}return a}(e,t);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),s=function(e,t,a){axios.get(""+e,{params:t}).then(function(e){a(null,{data:e.data,page:t})}).catch(function(e){e&&a(e,e.response)})};t.default={data:function(){return{errors:[],supplies:[],supply:{},product:{},date_delivered:"",po_number:"",pr_number:"",expiry_date:"",quantity_per:"",quantity:0,unit_cost:0,units:[],unit:{},dispensing_unit:{},dispensing_units:[],isAddDispensingUnit:!1,isAddSource:!1,isAddProduct:!1,isAddUnit:!1,unit_id:"",unit_name:"",dispensing_unit_id:"",source_select:"",sources:[],source_name:"",num1:1,filters:[{value:"",search_prop:"id"},{value:"",search_prop:"id"},{value:"",search_prop:"id"}],dialogMessage:{title:"",message:""},dialogVisible:!1,actionCol:{label:"Action",props:{align:"center"}},isDisabled:!1,query:{page:1,column:"id",direction:"desc",per_page:15,search_column:"all",search_operator:"like",search_input:""},operators:{equal:"=",not_equal:"<>",less_than:"<",greater_than:">",less_than_or_equal_to:"<=",greater_than_or_equal_to:">=",in:"IN",like:"LIKE"},columns:[{}],sortKey:"",sortOrders:{},data:[],meta:{},links:{first:null,last:null,next:null,prev:null},error:null,filterKey:"",loading:!1,_numberLoad:0,users:[],tableProps:{rowClassName:function(e){var t=e.row;e.rowIndex;return"OUT"==t.type?"warning-row":"success-row"}}}},computed:{unitCost:function(){return this.quantity&&this.unit_cost?parseFloat(this.quantity)*parseFloat(this.unit_cost):0},nextPage:function(){if(this.meta&&this.meta.current_page!==this.meta.last_page){return this.meta.current_page+1}},prevPage:function(){if(this.meta&&1!==this.meta.current_page){return this.meta.current_page-1}},paginatonCount:function(){if(this.meta){var e=this.meta;return"Displaying "+e.current_page+" of "+e.last_page+" rows"}}},beforeRouteEnter:function(e,t,a){e.params.id?s("/api/"+e.meta.url+"/"+e.params.id,e.query,function(e,t){a(function(a){return a.setData(e,t)})}):a()},beforeRouteUpdate:function(e,t,a){var r=this;e.params.id?s("/api/"+e.meta.url+"/"+e.params.id,e.query,function(e,t){r.setData(e,t),a()}):a()},methods:{unit_m:function(e){return axios.post("/api/units",e)},addUnit:function(){var e=this;e.isDisabled=!0,e.errors=[],e.unit_m({name:e.unit_name}).then(function(t){e.$message({message:t.statusText,type:"success"}),e.units=[],e.isDisabled=!1,e.isAddUnit=!1}).catch(function(t){t.response.data.errors&&t.response.data.message&&e.$message({message:t.response.data.message,type:"error"}),e.isDisabled=!1})},search_unit:function(e){var t=this;""!==e?(t.loading=!0,t.onSearchUnit(e,t)):(t.loading=!1,t.units=[])},search_dispensing_unit:function(e){var t=this;""!==e?(t.loading=!0,t.onSearchDispensingUnit(e,t)):(t.loading=!1,t.dispensing_units=[])},getUnit:function(e){return axios.get("/api/search/units?search="+e)},onSearchDispensingUnit:_.debounce(function(e,t){t.getUnit(e).then(function(e){t.loading=!1,t.dispensing_units=e.data.map(function(e){return{value:e,label:e.name}})}).catch(function(){t.loading=!1})},350),onSearchUnit:_.debounce(function(e,t){t.getUnit(e).then(function(e){t.loading=!1,t.units=e.data.map(function(e){return{value:e,label:e.name}})}).catch(function(){t.loading=!1})},350),addSource:function(){var e=this;e.isDisabled=!0,axios.post("/api/sources",{name:e.source_name}).then(function(t){e.sources=[{value:t.data,label:t.data.name}],e.source_select=t.data.id,e.$message({message:t.statusText,type:"success"}),e.isAddSource=!1,e.isDisabled=!1}).catch(function(t){t.response&&t.response.data.errors&&t.response.data.message&&(e.errors=t.response.data.errors,e.$message({message:t.response.data.message,type:"error"})),e.isAddDivision=!1,e.isDisabled=!1})},search_source:function(e){var t=this;""!==e?(t.loading=!0,t.onSearchSource(e,t)):(t.loading=!1,t.sources=[])},onSearchSource:_.debounce(function(e,t){axios.get("/api/search/sources?search="+e).then(function(e){t.loading=!1,t.sources=e.data.map(function(e){return{value:e,label:e.name}})}).catch(function(){t.loading=!1})},350),clearTypeHandleChange:function(){vm.filters[2].value=""},onSave:function(){var e=this,t={po_number:e.po_number,pr_number:e.pr_number,date_delivered:e.date_delivered,source_id:e.source_select,unit:e.unit_id,dispensing_unit:e.dispensing_unit_id,data:e.supplies};e.errors=[],axios.post("/api/supplies/purchase-order?supply_id="+e.$route.params.id,t).then(function(t){var a=t.data;a.type=0===t.type?"OUT":"IN",e.data.push(a),e.$message({message:t.statusText,type:"success"}),e.supplies=[],e.$root.store.dispatch("loadNotification")}).catch(function(t){t.response.data.errors&&t.response.data.message?(e.errors=t.response.data.errors,e.$message({message:t.response.data.message,type:"error"})):t.response&&e.$message({message:t.response.statusText,type:"error"}),e.supplies=[],e.loading=!1})},onSubmit:function(){var e=this,t=new FormData(e.$refs.form),a={},s=!0,n=!1,i=void 0;try{for(var o,u=t.entries()[Symbol.iterator]();!(s=(o=u.next()).done);s=!0){var l=r(o.value,2),c=l[0],d=l[1];a[c]=d}}catch(e){n=!0,i=e}finally{try{!s&&u.return&&u.return()}finally{if(n)throw i}}e.$route.params.id&&(a.id=e.$route.params.id),a.quantity_per=e.quantity_per,a.supply_id=e.supply_id,a.quantity=e.quantity,a.unit_cost=e.unit_cost,e.supplies.push(a),e.onSave()},sortBy:function(e){this.sortKey=e,this.sortOrders[e]=-1*this.sortOrders[e]},loadData:_.debounce(function(e){var t=this;t.loading=!0;var a=_.clone(t.$route.query);"sort"===e.type&&(a.column=e.sort.prop,a.direction="ascending"==e.sort.order?"asc":"desc"),"init"!=e.type?("page"===e.type&&(a.page=e.page,a.per_page=e.pageSize),"filter"!==e.type||_.isEmpty(t.filters[0].value)?"filter"!==e.type||_.isEmpty(t.filters[1].value)?"filter"!==e.type||_.isEmpty(t.filters[2].value)?(delete a.user_id,delete a.search_input):a.type=t.filters[2].value.toString():a.user_id=t.filters[1].value.toString():(a.search_column=t.query.search_column,a.search_operator=t.query.search_operator,a.search_input=t.filters[0].value),_.isEmpty(t.filters[2].value)&&delete a.type,t.$router.push({path:""+t.$route.path,query:a},function(){t.loading=!1,""==a.search_input&&(delete a.search_input,t.filters[1].value="")},function(){t.loading=!1})):t.loading=!1},500),setData:function(e,t){var a=this;if(e)404===e.response.status&&a.$router.push({name:"error.not-found",params:{0:"/"}}),a.error=e.toString();else{a.data=_.map(t.data.model.data,function(e){return e.type=0==e.type?"OUT":"IN",e});var r=_.map(a.data,function(e){return e.user});a.supply=t.data.supply,a.users=_.compact(_.uniqBy(r,"id")),a.links.first_page_url=t.data.model.first_page_url,a.links.last_page_url=t.data.model.last_page_url,a.links.prev_page_url=t.data.model.prev_page_url,a.links.next_page_url=t.data.model.next_page_url,a.meta.current_page=t.data.model.current_page,a.meta.from=t.data.model.from,a.meta.last_page=t.data.model.last_page,a.query.per_page=_.parseInt(t.data.model.per_page),a.meta.to=t.data.model.to,a.meta.total=t.data.model.total,a.columns=t.data.columns,t.page.search_input&&(a.filters[0].value=t.page.search_input),a.filters[0].search_prop=a.search_column}}}}},1035:function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("div",{staticClass:"row"},[a("div",{staticClass:"col-6"},[a("div",{staticClass:"card"},[a("div",{staticClass:"card-header"},[e._v("\n                    Purchase Order Detail\n                ")]),e._v(" "),a("div",{staticClass:"card-body"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col"},[a("div",{staticClass:"form-group has-feedback"},[a("label",{attrs:{for:"po_number"}},[e._v("PO Number")]),e._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:e.po_number,expression:"po_number"}],staticClass:"form-control form-control-sm",class:e.errors.po_number?"is-invalid":"",attrs:{required:"",type:"text",id:"po_number",name:"po_number",placeholder:"po_number"},domProps:{value:e.po_number},on:{input:function(t){t.target.composing||(e.po_number=t.target.value)}}}),e._v(" "),e._l(e.errors.po_number,function(t){return e.errors.po_number?a("span",{staticClass:"invalid-feedback",attrs:{role:"alert"}},[a("strong",[e._v(e._s(t))])]):e._e()})],2),e._v(" "),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"date_delivered"}},[e._v("Date Delivered")]),e._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:e.date_delivered,expression:"date_delivered"}],staticClass:"form-control form-control-sm",class:e.errors.date_delivered?"is-invalid":"",attrs:{required:"",type:"date",id:"date_delivered",name:"date_delivered",placeholder:"Date Delivered"},domProps:{value:e.date_delivered},on:{input:function(t){t.target.composing||(e.date_delivered=t.target.value)}}}),e._v(" "),e._l(e.errors.date_delivered,function(t){return e.errors.date_delivered?a("span",{staticClass:"invalid-feedback",attrs:{role:"alert"}},[a("strong",[e._v(e._s(t))])]):e._e()})],2),e._v(" "),a("div",{staticClass:"el-form-item",class:e.errors.source_id?"is-error is-required":""},[a("div",{staticClass:"row"},[e._m(0),e._v(" "),a("div",{staticClass:"col-sm text-right"},[e.isAddSource?e._e():a("button",{staticClass:"btn btn-sm btn-link",attrs:{type:"button"},on:{click:function(t){e.isAddSource=!e.isAddSource}}},[e._v("Add Source\n                                        ")])])]),e._v(" "),a("div",{staticClass:"el-form-item__content"},[e.isAddSource?a("div",[a("div",{staticClass:"input-group input-group-sm"},[a("input",{directives:[{name:"model",rawName:"v-model",value:e.source_name,expression:"source_name"}],staticClass:"form-control",attrs:{type:"text"},domProps:{value:e.source_name},on:{input:function(t){t.target.composing||(e.source_name=t.target.value)}}}),e._v(" "),a("span",{staticClass:"input-group-append"},[a("button",{staticClass:"btn btn-success",attrs:{type:"button"},on:{click:e.addSource}},[e._v("Create Source")]),e._v(" "),a("button",{staticClass:"btn btn-default",attrs:{type:"button"},on:{click:function(t){e.isAddSource=!1}}},[e._v("Cancel")])])])]):a("el-select",{staticStyle:{width:"100%"},attrs:{size:"small",disabled:e.isDisabled,filterable:"",remote:"",required:"",placeholder:"Enter Source of Fund Name","remote-method":e.search_source,loading:e.loading},model:{value:e.source_select,callback:function(t){e.source_select=t},expression:"source_select"}},e._l(e.sources,function(e,t){return a("el-option",{key:t,attrs:{label:e.label,value:e.value.id}})})),e._v(" "),e._l(e.errors.source_id,function(t){return e.errors.source_id?a("div",{staticClass:"el-form-item__error"},[e._v("\n                                        "+e._s(t)+"\n                                    ")]):e._e()})],2)])])])])])]),e._v(" "),a("div",{staticClass:"col-6"},[a("form",{ref:"form",on:{submit:function(t){return t.preventDefault(),e.onSubmit(t)}}},[a("div",{staticClass:"card"},[a("div",{staticClass:"card-header"},[e._v("\n                        Supply Information\n                    ")]),e._v(" "),a("div",{staticClass:"card-body"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col"},[a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"quantity"}},[e._v("Quantity Delivered")]),e._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:e.quantity,expression:"quantity"}],staticClass:"form-control form-control-sm",attrs:{min:"1",required:"",type:"number",id:"quantity",name:"quantity",placeholder:"Quantity"},domProps:{value:e.quantity},on:{input:function(t){t.target.composing||(e.quantity=t.target.value)}}})])])])]),e._v(" "),a("div",{staticClass:"card-footer"},[a("button",{staticClass:"btn btn-primary mb-2",attrs:{disabled:!(e.source_select&&e.quantity>0&&e.po_number&&e.date_delivered),type:"submit"}},[e._v("Check in\n                        ")])])])])])]),e._v(" "),e.data?a("div",{staticClass:"dv"},[a("div",{staticClass:"dv-header"},[a("div",{staticClass:"dv-header-title"},[e._v("\n                "+e._s(e.supply.name)+"\n            ")])]),e._v(" "),e.nextPage||e.prevPage||!e.nextPage||!e.prevPage||e.meta?a("data-tables-server",{attrs:{data:e.data,"action-col":e.actionCol,total:e.meta.total,filters:e.filters,"pagination-props":{background:!0,pageSize:e.query.per_page,pageSizes:[e.query.per_page,10,20,30]},"page-size":e.query.per_page,"current-page":e.meta.current_page,"table-props":e.tableProps,loading:e.loading},on:{"query-change":e.loadData}},e._l(e.columns,function(e){return a("el-table-column",{key:e.id,attrs:{prop:e.id,label:e.name,sortable:"custom"}})})):e._e()],1):e._e(),e._v(" "),a("div",{staticStyle:{"margin-bottom":"10px"}})])},staticRenderFns:[function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"col-sm"},[t("label",{attrs:{for:"source"}},[this._v("Source")])])}]}},810:function(e,t,a){var r=a(36)(a(1034),a(1035),!1,function(e){a(1032)},null,null);e.exports=r.exports}});