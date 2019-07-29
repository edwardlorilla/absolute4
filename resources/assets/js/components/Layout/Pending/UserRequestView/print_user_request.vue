<template>
    <div>
        <div class="card">
            <h5 class="card-header">
                <el-button size="mini" type="info" @click="PrintElem('#y_request')">Print</el-button>
            </h5>
        </div>
        <div  id="y_request" class="WordSection1">

            <p class="MsoNormal">&nbsp;</p>

            <table v-if="data.supplier" class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border:none">
                <thead class="report-header ">
                <tr>
                    <td colspan="14" valign="top" style="border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-family:&quot;Arial&quot;,sans-serif">REQUISITION
  AND ISSUE SLIP</span></b></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-family:&quot;Arial&quot;,sans-serif">City
  Government of Davao</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-family:&quot;Arial&quot;,sans-serif">LGU</span></p>
                    </td>
                </tr>
                <tr>
                    <td width="151" colspan="2" valign="top" style="width:113.35pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Division: {{data.division ? data.division.name : ''}}
  </span></p>
                    </td>
                    <td width="256" colspan="4" valign="top" style="width:192.05pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Responsibility: </span></p>
                    </td>
                    <td width="159" colspan="4" valign="top" style="width:119.6pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">RIS
  No.:</span></p>
                    </td>
                    <td width="177" colspan="4" valign="top" style="width:132.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Date: {{$moment().format('MM-DD-YY')}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td width="151" colspan="2" valign="top" style="width:113.35pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Office:</span></p>
                    </td>
                    <td width="256" colspan="4" valign="top" style="width:192.05pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Code</span></p>
                    </td>
                    <td width="159" colspan="4" valign="top" style="width:119.6pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">SAI
  No.:</span></p>
                    </td>
                    <td width="177" colspan="4" valign="top" style="width:132.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Date: {{$moment().format('MM-DD-YY')}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td width="743" colspan="14" valign="top" style="width:557.45pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Source: {{data.supplier.name}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td width="516" colspan="8" valign="top" style="width:387.25pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Requisition</span></b></p>
                    </td>
                    <td width="227" colspan="6" valign="top" style="width:170.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Issuance</span></b></p>
                    </td>
                </tr>

                <tr>
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Stock No.</span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Unit</span></p>
                    </td>
                    <td width="188" colspan="2" valign="top" style="width:140.65pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Description</span></p>
                    </td>
                    <td width="48" valign="top" style="width:35.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">QTY</span></p>
                    </td>
                    <td width="44" colspan="2" valign="top" style="width:32.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Unit Cost</span></p>
                    </td>
                    <td width="86" valign="top" style="width:64.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Total Cost</span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">QTY</span></p>
                    </td>
                    <td width="55" colspan="3" valign="top" style="width:41.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Unit Cost</span></p>
                    </td>
                    <td width="51" valign="top" style="width:38.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Total Cost</span></p>
                    </td>
                    <td width="79" valign="top" style="width:59.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Remarks</span></p>
                    </td>
                </tr>
                </thead>
                <tbody class="report-content">
                <tr v-for ="(item, index) in data.supplies">
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{index + 1}}</span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.unit_id ? item.unit.name : ''}}</span></p>
                    </td>
                    <td width="188" colspan="2" valign="top" style="width:140.65pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.description ? item.description : '' }}</span></p>
                    </td>
                    <td width="48" valign="top" style="width:35.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.quantity}}</span></p>
                    </td>
                    <td width="44" colspan="2" valign="top" style="width:32.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.unit_cost}}</span></p>
                    </td>
                    <td width="86" valign="top" style="width:64.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.unit_cost * item.quantity}}</span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.amount}}</span></p>
                    </td>
                    <td width="55" colspan="3" valign="top" style="width:41.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.unit_cost}}</span></p>
                    </td>
                    <td width="51" valign="top" style="width:38.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">{{item.amount * item.unit_cost}}</span></p>
                    </td>
                    <td width="79" valign="top" style="width:59.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">dispatched</span></p>
                    </td>
                </tr>
                <tr>
                    <td width="96" valign="top" style="width:71.95pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="55" valign="top" style="width:41.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="188" colspan="2" valign="top" style="width:140.65pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="48" valign="top" style="width:35.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="44" colspan="2" valign="top" style="width:32.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="86" valign="top" style="width:64.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="42" valign="top" style="width:31.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="55" colspan="3" valign="top" style="width:41.45pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Total: {{balanceQuantity}}</span></b></p>
                    </td>
                    <td width="51" valign="top" style="width:38.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                    <td width="79" valign="top" style="width:59.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    </td>
                </tr>

                </tbody>
            <tfoot class="report-footer">
            <tr style="height:22.5pt">
                <td width="743" colspan="14" valign="top" style="width:557.45pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:22.5pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Purpose:
  _______________________________________________________________________________________</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:12.0pt">
                <td width="96" rowspan="4" valign="top" style="width:71.95pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Signature:</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">PrintedName:</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Designation:</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Date:</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
                <td width="77" colspan="2" rowspan="4" valign="top" style="width:57.45pt;border-top:
  none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                </td>
                <td width="166" valign="top" style="width:124.6pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Requested by:</span></b></p>
                </td>
                <td width="178" colspan="4" valign="top" style="width:133.25pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Approved by:</span></b></p>
                </td>
                <td width="82" colspan="3" valign="top" style="width:61.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Issued by:</span></b></p>
                </td>
                <td width="145" colspan="3" valign="top" style="width:108.5pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:12.0pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Received by:</span></b></p>
                </td>
            </tr>
            <tr style="height:11.55pt">
                <td width="166" valign="top" style="width:124.6pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
                <td width="178" colspan="4" valign="top" style="width:133.25pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
                <td width="82" colspan="3" valign="top" style="width:61.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
                <td width="145" colspan="3" valign="top" style="width:108.5pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:11.55pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:21.75pt">
                <td width="166" valign="top" style="width:124.6pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
                <td width="178" colspan="4" valign="top" style="width:133.25pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Josephine J. Villafuerte/Esmeralda Villarreiz</span></p>
                </td>
                <td width="82" colspan="3" valign="top" style="width:61.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Roy Enoc</span></p>
                </td>
                <td width="145" colspan="3" valign="top" style="width:108.5pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:21.75pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:25.5pt">
                <td width="166" valign="top" style="width:124.6pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
                <td width="178" colspan="4" valign="top" style="width:133.25pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">City Health Officer/PSO-Designate</span></p>
                </td>
                <td width="82" colspan="3" valign="top" style="width:61.7pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                    <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Supply Div.</span></p>
                </td>
                <td width="145" colspan="3" valign="top" style="width:108.5pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:25.5pt">
                    <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                </td>
            </tr>
            <tr height="0">
                <td width="96" style="border:none"></td>
                <td width="55" style="border:none"></td>
                <td width="21" style="border:none"></td>
                <td width="166" style="border:none"></td>
                <td width="48" style="border:none"></td>
                <td width="21" style="border:none"></td>
                <td width="23" style="border:none"></td>
                <td width="86" style="border:none"></td>
                <td width="42" style="border:none"></td>
                <td width="8" style="border:none"></td>
                <td width="32" style="border:none"></td>
                <td width="15" style="border:none"></td>
                <td width="51" style="border:none"></td>
                <td width="79" style="border:none"></td>
            </tr>
            </tfoot>
            </table>
            <p class="MsoNormal"><span style="font-size:12.0pt;line-height:107%;font-family:
&quot;Arial&quot;,sans-serif">&nbsp;</span></p>

        </div>
    </div>
</template>

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
        name: "print_user_request",
        data(){
          return{
              type: '',
              data: {
                  supplies: {
                      category:{
                          name: ''
                      },
                      medicine: {
                          name: ''
                      },
                      package:{
                          name: ''
                      },
                      unit:{
                          name: ''
                      }
                  }
              },
              iterateRow: 27,
              row: 27,
              balanceQuantity: 0
          }
        },
        beforeRouteEnter(to, from, next) {
            getData('user/notification/' + to.params.id + '/print', to.query, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate(to, from, next) {
            getData('user/notification/' + to.params.id + '/print', to.query, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods:{
            setData(err, data) {
                console.log(data.data.data)
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {

                    vm.data = typeof data.data.data.item === 'string' ? JSON.parse(data.data.data.item) : data.data.data.item
                    vm.type = data.data.data.type
                    vm.balanceQuantity = _.reduce(vm.data.supplies, function (sum, item) {
                        return sum + (item.amount * (item.unit_cost ? item.unit_cost : 0));

                    }, 0)
                }
            },
            PrintElem(elem) {
                this.Popup($(elem).html());
            },
            Popup(data) {
                var mywindow = window.open('', 'Purchase Order');
                mywindow.document.write('<html><head><title>Purchase Order</title>');
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

<style scoped>

</style>