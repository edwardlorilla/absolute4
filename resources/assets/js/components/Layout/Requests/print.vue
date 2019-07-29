<template>
    <div>
        <div class="card">
            <h5 class="card-header">
                <el-button size="mini" type="info" @click="PrintElem('#y_request')">Print </el-button>
            </h5>
        </div>
        <div id="y_request"  class="WordSection1">

            <table class="report-container MsoTableGrid" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt">
                <thead class="report-header ">
                <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
                    <td width="719" colspan="15" valign="top" style="width:539.5pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,sans-serif">REQUISITION AND ISSUE SLIP</span></b></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-family:&quot;Arial&quot;,sans-serif">City
  Government of Davao</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-family:&quot;Arial&quot;,sans-serif">LGU</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:1">
                    <td width="151" colspan="2" valign="top" style="width:113.35pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Division:{{form.division_id ? form.division.name : ''}}</span></p>
                    </td>
                    <td width="269" colspan="5" valign="top" style="width:201.9pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Responsibility</span></p>
                    </td>
                    <td width="135" colspan="4" valign="top" style="width:101.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">RIS No.:</span></p>
                    </td>
                    <td width="164" colspan="4" valign="top" style="width:122.8pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Date: {{form.request_date}}</span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:2">
                    <td width="151" colspan="2" valign="top" style="width:113.35pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Office: </span></p>
                    </td>
                    <td width="269" colspan="5" valign="top" style="width:201.9pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Code: {{form.division_id ? form.division.station : ''}}</span></p>
                    </td>
                    <td width="135" colspan="4" valign="top" style="width:101.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">SAI No.:</span></p>
                    </td>
                    <td width="164" colspan="4" valign="top" style="width:122.8pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Date: {{form.request_date}}</span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:3">
                    <td width="719" colspan="15" valign="top" style="width:539.5pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Source:</span><span style="font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:4">
                    <td width="495" colspan="9" valign="top" style="width:371.05pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Requisition</span></b></p>
                    </td>
                    <td width="225" colspan="6" valign="top" style="width:168.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Issuance</span></b></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:5">
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Stock No.</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Unit</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="206" colspan="3" valign="top" style="width:154.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Description</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">QTY</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="45" colspan="2" valign="top" style="width:33.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Unit Cost</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="51" valign="top" style="width:38.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Total Cost</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">QTY</span></p>
                    </td>
                    <td width="52" colspan="3" valign="top" style="width:38.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Unit Cost</span></p>
                    </td>
                    <td width="52" valign="top" style="width:39.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Total Cost</span></p>
                    </td>
                    <td width="79" valign="top" style="width:59.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Remarks</span></p>
                    </td>
                </tr>
                </thead>
                <tbody class="report-content">
                <tr v-if="form.transactions" v-for="transaction in form.transactions" style="mso-yfti-irow:6">
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.po_number}}</span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.product.category_id ? transaction.product.category.name : ''}}</span></p>
                    </td>
                    <td width="206" colspan="3" valign="top" style="width:154.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.product.medicine_id ? transaction.product.medicine.name : ''}}</span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.data.ref_quantity}}</span></p>
                    </td>
                    <td width="45" colspan="2" valign="top" style="width:33.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.product_id ? transaction.product.unit_cost : ''}}</span></p>
                    </td>
                    <td width="51" valign="top" style="width:38.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.product_id ? (transaction.out_quantity) * transaction.product.unit_cost : ''}}</span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.quantity}}</span></p>
                    </td>
                    <td width="52" colspan="3" valign="top" style="width:38.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.product_id ? transaction.product.unit_cost : ''}}</span></p>
                    </td>
                    <td width="52" valign="top" style="width:39.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">{{transaction.product_id ?  transaction.quantity * transaction.product.unit_cost : ''}}</span></p>
                    </td>
                    <td width="79" valign="top" style="width:59.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">dispatch</span></p>
                    </td>
                </tr>
                <tr v-for="row in iterateRow" style="mso-yfti-irow:6">
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp</span></p>
                    </td>
                    <td width="206" colspan="3" valign="top" style="width:154.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="45" colspan="2" valign="top" style="width:33.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="51" valign="top" style="width:38.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="52" colspan="3" valign="top" style="width:38.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="52" valign="top" style="width:39.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="79" valign="top" style="width:59.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                </tbody>
                <tfoot class="report-footer">
                <tr style="mso-yfti-irow:7">
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="206" colspan="3" valign="top" style="width:154.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="45" colspan="2" valign="top" style="width:33.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="51" valign="top" style="width:38.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Total</span></b><b style="mso-bidi-font-weight:normal"><span style="font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></b></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">{{balanceQuantity}}</span></p>
                    </td>
                    <td width="52" colspan="3" valign="top" style="width:38.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">

                    </td>
                    <td width="52" valign="top" style="width:39.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">

                    </td>
                    <td width="79" valign="top" style="width:59.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:8;height:22.5pt">
                    <td width="719" colspan="15" valign="top" style="width:539.5pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.5pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Purpose: _______________________________________________________________________________________</span><u><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></u></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:9;height:12.0pt">
                    <td width="96" rowspan="4" valign="top" style="width:71.95pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Signature:</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span class="SpellE"><span style="font-size:10.0pt;mso-bidi-font-size:
  11.0pt;font-family:&quot;Arial&quot;,sans-serif">PrintedName</span></span><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">:</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Designation:</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif">Date:</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="87" colspan="2" rowspan="4" valign="top" style="width:65.3pt;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></b></p>
                    </td>
                    <td width="90" valign="top" style="width:67.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Requested by:</span></b></p>
                    </td>
                    <td width="222" colspan="5" valign="top" style="width:166.55pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Approved by:</span></b></p>
                    </td>
                    <td width="93" colspan="3" valign="top" style="width:69.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Issued by:</span></b></p>
                    </td>
                    <td width="132" colspan="3" valign="top" style="width:98.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b style="mso-bidi-font-weight:normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Received by:</span></b></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:10;height:11.55pt">
                    <td width="90" valign="top" style="width:67.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="222" colspan="5" valign="top" style="width:166.55pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="93" colspan="3" valign="top" style="width:69.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="132" colspan="3" valign="top" style="width:98.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:11;height:21.75pt">
                    <td width="90" valign="top" style="width:67.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="222" colspan="5" valign="top" style="width:166.55pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Josephine J.
  Villafuerte/Esmeralda <span class="SpellE">Villarreiz</span></span></p>
                    </td>
                    <td width="93" colspan="3" valign="top" style="width:69.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Roy <span class="SpellE">Enoc</span></span></p>
                    </td>
                    <td width="132" colspan="3" valign="top" style="width:98.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <tr style="mso-yfti-irow:12;mso-yfti-lastrow:yes;height:25.5pt">
                    <td width="90" valign="top" style="width:67.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="222" colspan="5" valign="top" style="width:166.55pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">City Health
  Officer/PSO-Designate</span><span style="font-size:12.0pt;mso-bidi-font-size:
  11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="93" colspan="3" valign="top" style="width:69.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif">Supply Div.</span><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:&quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                    <td width="132" colspan="3" valign="top" style="width:98.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
  &quot;Arial&quot;,sans-serif"></span></p>
                    </td>
                </tr>
                <!--[if !supportMisalignedColumns]-->
                <tr height="0">
                    <td width="96" style="border:none"></td>
                    <td width="55" style="border:none"></td>
                    <td width="30" style="border:none"></td>
                    <td width="90" style="border:none"></td>
                    <td width="74" style="border:none"></td>
                    <td width="42" style="border:none"></td>
                    <td width="21" style="border:none"></td>
                    <td width="24" style="border:none"></td>
                    <td width="51" style="border:none"></td>
                    <td width="42" style="border:none"></td>
                    <td width="19" style="border:none"></td>
                    <td width="32" style="border:none"></td>
                    <td width="1" style="border:none"></td>
                    <td width="52" style="border:none"></td>
                    <td width="79" style="border:none"></td>
                </tr>
                <!--[endif]-->
                </tfoot>
              </table>

            <p class="MsoNormal"><span style="font-size:12.0pt;mso-bidi-font-size:11.0pt;
line-height:107%;font-family:&quot;Arial&quot;,sans-serif"></span></p>

        </div>
    </div>
</template>
<style>
    table.report-container {
        page-break-after: always;
    }

    thead.report-header {
        display: table-header-group;
    }

    tfoot.report-footer {
        display: table-footer-group;
    }
</style>

<script>
    const getData = (url, page, callback) => {
        axios
            .get(`/api/${url}`, {params: page})
            .then(response => {
                callback(null, {data: response.data, page: page});
            }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {
        data() {
            return {
                form: {
                    transactions: []
                },
                iterateRow: 27,
                row: 27,
                balanceQuantity: 0
            }
        },
        computed:{
            differenceResult: function differenceResult() {
                var vm = this;
                return vm.iterateRow - vm.form.data.supplies.length > 0 ? vm.iterateRow - vm.form.data.supplies.length : 0;
            }
        },
        beforeRouteEnter(to, from, next) {
            if (to.params.id) {
                getData(`${to.meta.url}/` + to.params.id, to.query, (err, data) => {
                    next(vm => vm.setData(err, data));
                });
            } else {
                next()
            }
        },
        beforeRouteUpdate(to, from, next) {
            var vm = this

            if (to.params.id) {
                getData(`${to.meta.url}/` + to.params.id, to.query, (err, data) => {
                    vm.setData(vm.setData(err, data))
                    next()
                });
            }
        },
        methods: {
            setData(err, data) {
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {
                    vm.form = data.data
                    vm.balanceQuantity = vm.form ?  _.reduce(vm.form.transactions, function (sum, item) {
                        return sum + (item.quantity );

                    }, 0) : 0
                }
            },
            PrintElem(elem) {
                this.Popup($(elem).html());
            },
            Popup(data) {
                var mywindow = window.open('', 'REQUISITION AND ISSUE SLIP');
                mywindow.document.write('<html><head><title>REQUISITION AND ISSUE SLIP</title>');
                mywindow.document.write('<style>.MsoChpDefault,div.MsoNormal,li.MsoNormal,p.MsoNormal{font-family:Calibri,sans-serif}<style> @font-face{font-family:"Cambria Math";panose-1:2 4 5 3 5 4 6 3 2 4}@font-face{font-family:Calibri;panose-1:2 15 5 2 2 2 4 3 2 4}div.MsoNormal,li.MsoNormal,p.MsoNormal{line-height:107%;font-size:11pt;margin:0 0 8pt}@page WordSection1{size:8.5in 11in;margin:.5in .5in .5in .5in}div.WordSection1{page:WordSection1}</style>');
                mywindow.document.write('</head><body >');
                mywindow.document.write(data);
                mywindow.document.write('</body></html>');

                mywindow.print();
                mywindow.close();

                return true;
            }
        }
    }
</script>