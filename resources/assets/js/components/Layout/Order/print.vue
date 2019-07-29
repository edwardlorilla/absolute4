<template>
    <div>
        <div class="card">
            <h5 class="card-header">
                <el-button size="mini" type="info" @click="PrintElem('#y_request')">Print </el-button>
            </h5>
        </div>
        <div id="y_request" class="WordSection1">

            <table v-if="data.supplier" class="report-container MsoNormalTable" border="1" cellspacing="0"
                   cellpadding="0" width="752"
                   style="width:564.25pt;border-collapse:collapse;border:none">
                <thead class="report-header ">
                <tr style="height:33.3pt">
                    <td width="752" colspan="8" valign="top" style="width:564.25pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:33.3pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">PURCHASE ORDER</span></b></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">City Government of Davao</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">LGU</span></p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="374" colspan="4" valign="top" style="width:280.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;Supplier: {{data.supplier ? data.supplier.name : ''}}</span></b>
                        </p>
                    </td>
                    <td width="378" colspan="4" valign="top" style="width:283.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">P.O No.: {{po_number ? po_number : ''}}</span></b>
                        </p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="374" colspan="4" valign="top" style="width:280.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal">
                            <b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Address: {{data.supplier ? data.supplier.address : ''}}</span></b>
                        </p>
                    </td>
                    <td width="378" colspan="4" valign="top" style="width:283.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">P.R {{pr_number ? pr_number : ''}}
  No.</span></b></p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="374" colspan="4" valign="top" style="width:280.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Mode
  of Procurement:</span></b></p>
                    </td>
                    <td width="378" colspan="4" valign="top" style="width:283.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Date: {{$moment().format('MM-DD-YY')}}</span></b>
                        </p>
                    </td>
                </tr>
                <tr style="height:9.4pt">
                    <td width="752" colspan="8" valign="top" style="width:564.25pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:9.4pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:9.0pt;font-family:&quot;Arial&quot;,sans-serif">Gentlemen:
  Please furnish this office the following articles subject to the terms and
  conditions contained herein.</span></p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="374" colspan="4" valign="top" style="width:280.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Place
  of Delivery:</span></p>
                    </td>
                    <td width="378" colspan="4" valign="top" style="width:283.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Delivery
  Term:</span></p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="374" colspan="4" valign="top" style="width:280.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Date of
  Delivery:&nbsp; </span></p>
                    </td>
                    <td width="378" colspan="4" valign="top" style="width:283.4pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Payment
  Term:</span></p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="43" valign="top" style="width:32.55pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">No.</span></b></p>
                    </td>
                    <td width="58" valign="top" style="width:43.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Unit</span></b></p>
                    </td>
                    <td width="51" valign="top" style="width:38.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Qty</span></b></p>
                    </td>
                    <td width="420" colspan="3" valign="top" style="width:314.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Description</span></b></p>
                    </td>
                    <td width="102" valign="top" style="width:76.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Unit
  Cost</span></b></p>
                    </td>
                    <td width="78" valign="top" style="width:58.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Amount</span></b></p>
                    </td>
                </tr>
                </thead>
                <tbody class="report-content">

                <tr v-for="(item, index) in data.supplies" style="height:10.85pt">
                    <td width="43" valign="top" style="width:32.55pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">{{index + 1}}</span></b></p>
                    </td>
                    <td width="58" valign="top" style="width:43.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:normal"><b>
                            <span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;{{item.unit_id ? item.unit.name : ''}}</span></b>
                        </p>
                    </td>
                    <td width="51" valign="top" style="width:38.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;{{item.amount ? item.amount : ''}}</span></b>
                        </p>
                    </td>
                    <td width="420" colspan="3" valign="top" style="width:314.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">{{`${type == 'created_purchase_order_product' ? item.medicine ? 'Medicine:' + item.medicine.name: '' : item.name }, ${item.description ? item.description : (item.category_id ? item.category.name: '')}`}} {{`${type == 'created_purchase_order_product' ? 'Dosage:' +item.dosage  + (item.medication ? ', Medication: '+ item.medication : '') + (item.package_id ?  ', Form: '+ item.package.name : '') : ''} `}}</span></b>
                        </p>
                    </td>
                    <td width="102" valign="top" style="width:76.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">{{item.unit_cost}}</span></b></p>
                    </td>
                    <td width="78" valign="top" style="width:58.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">{{item.quantity && item.unit_cost ? item.quantity * item.unit_cost : 0}}</span></b>
                        </p>
                    </td>
                </tr>
                <tr style="height:10.85pt">
                    <td width="43" valign="top" style="width:32.55pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="58" valign="top" style="width:43.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="51" valign="top" style="width:38.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="420" colspan="3" valign="top" style="width:314.75pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="102" valign="top" style="width:76.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="78" valign="top" style="width:58.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:10.85pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">{{balanceQuantity}}</span></b></p>
                    </td>
                </tr>


                </tbody>
                <tfoot class="report-footer">
                <tr style="height:78.95pt">
                    <td width="376" colspan="5" valign="top" style="width:282.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:78.95pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">Page 1 of 3</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="376" colspan="3" valign="top" style="width:282.1pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:78.95pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Certified Correct</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <div style="border:none;border-top:solid windowtext 1.0pt;padding:1.0pt 0in 0in 0in">
                            <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal;border:none;padding:0in"><span
                                    style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">City Health Officer</span>
                            </p>
                        </div>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                </tr>
                <tr style="height:32.6pt">
                    <td width="752" colspan="8" valign="top" style="width:564.25pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:32.6pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">In case
  of failure to make the full delivery within time specified above, a penalty
  of one-tenth(1/10) of one percent for everyday of delay shall be imposed.</span></p>
                    </td>
                </tr>
                <tr style="height:58.9pt">
                    <td width="376" colspan="5" valign="top" style="width:282.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:58.9pt">
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Conforme</span></b></p>
                        <p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal"><b><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <div style="border:none;border-top:solid windowtext 1.0pt;padding:1.0pt 0in 0in 0in">
                            <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal;border:none;padding:0in"><span
                                    style="font-size:10.0pt;font-family:&quot;Arial&quot;,sans-serif">Signature over
  printed name</span></p>
                        </div>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><b><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">&nbsp;</span></b></p>
                    </td>
                    <td width="376" colspan="3" valign="top" style="width:282.15pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:58.9pt">
                        <p class="MsoNormal"><span style="font-size:10.0pt;line-height:107%;font-family:
  &quot;Arial&quot;,sans-serif">&nbsp;Very truly yours,</span></p>
                        <p class="MsoNormal"><span style="font-size:10.0pt;line-height:107%;font-family:
  &quot;Arial&quot;,sans-serif">&nbsp;</span></p>
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal"><span style="font-size:10.0pt;
  font-family:&quot;Arial&quot;,sans-serif">City Mayor</span></p>
                    </td>
                </tr>
                <tr style="height:58.9pt">
                    <td width="752" colspan="8" valign="top" style="width:564.25pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:58.9pt">
                        <p class="MsoNormal"><span style="font-size:9.0pt;line-height:107%;font-family:
  &quot;Arial&quot;,sans-serif">In case of negotiation Purchase pursuant to Section
  369(a) of RA 7160. This portion must be accomplished</span></p>
                        <p class="MsoNormal"><span style="font-size:9.0pt;line-height:107%;font-family:
  &quot;Arial&quot;,sans-serif">Approved per Sanggunian Res No.
  _______________________________________________________________</span></p>
                        <p class="MsoNormal"><span style="font-size:10.0pt;line-height:107%;font-family:
  &quot;Arial&quot;,sans-serif">Certified Correct ________________________________ Date:
  ________________________________</span></p>
                        <p class="MsoNormal"><span style="font-size:10.0pt;line-height:107%;font-family:
  &quot;Arial&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Secretary to the
  Sanggunian</span></p>
                    </td>
                </tr>
                <tr height="0">
                    <td width="43" style="border:none"></td>
                    <td width="58" style="border:none"></td>
                    <td width="51" style="border:none"></td>
                    <td width="222" style="border:none"></td>
                    <td width="2" style="border:none"></td>
                    <td width="196" style="border:none"></td>
                    <td width="102" style="border:none"></td>
                    <td width="78" style="border:none"></td>
                </tr>
                </tfoot>
            </table>

            <p class="MsoNormal">&nbsp;</p>

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
    import whiteSpace from './whiteSpace'

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
        components: {
            whiteSpace
        },
        name: "print",
        data() {
            return {
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
            getData('orders/' + to.params.id, to.query, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate(to, from, next) {
            getData('orders/' + to.params.id, to.query, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        computed: {},
        methods: {
            setData(err, data) {
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {

                    vm.po_number = data.data.po_number
                    vm.pr_number = data.data.pr_number
                    vm.data = typeof data.data.subject.data === 'string' ? JSON.parse(data.data.subject.data) : data.data.subject.data
                    vm.type = data.data.type
                    vm.balanceQuantity = _.reduce(vm.data.supplies, function (sum, item) {
                        return sum + (item.quantity * (item.unit_cost ? item.unit_cost : 0));

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
