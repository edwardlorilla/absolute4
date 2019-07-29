<template>
    <div v-if="data" class="dv">
        <div class="dv-header">
            <div class="dv-header-title">
                <el-button size="mini" type="info" v-print="'#y_request'">Print </el-button>
            </div>
        </div>
        <div id="y_request" class=WordSection1>

            <div align=center>

                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=768
                       style='width:575.75pt;border-collapse:collapse;border:none;mso-border-alt:
solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
                    <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
                        <td width=612 colspan=10 valign=top style='width:458.75pt;border:none;
border-bottom:solid windowtext 1.0pt;mso-border-bottom-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:12.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=156 colspan=3 style='width:117.0pt;border:none;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:9.0pt;font-family:"Arial",sans-serif'>Stock
No: {{supply.supply_id}}
                            <p></p></span></p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:1'>
                        <td width=768 colspan=13 valign=top style='width:575.75pt;border:solid windowtext 1.0pt;
border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:12.0pt;
font-family:"Arial",sans-serif'>SUPPLIES LEDGER CARD
                            <p></p></span></p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:2'>
                        <td width=432 colspan=6 valign=top style='width:323.75pt;border:solid windowtext 1.0pt;
border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'>Item: {{supply.name}}</p>
                        </td>
                        <td width=336 colspan=7 valign=top style='width:3.5in;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'>Code: {{supply.code ? supply.code : ''}}</p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:3'>
                        <td width=432 colspan=6 valign=top style='width:323.75pt;border:solid windowtext 1.0pt;
border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'>Description: {{supply.description}}</p>
                        </td>
                        <td width=336 colspan=7 valign=top style='width:3.5in;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'>Unit: {{supply.unit_id ? supply.unit.name : ''}}</p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:4'>
                        <td width=59 rowspan=2 style='width:44.6pt;border:solid windowtext 1.0pt;
border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='font-size:8.0pt;margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'>Date: {{$moment(supply.updated_at).format('MM-DD-YY')}}</p>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'>
                            <p>&nbsp;</p></p>
                        </td>
                        <td width=174 colspan=2 valign=top style='width:130.2pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'>Reference</p>
                        </td>
                        <td width=199 colspan=3 valign=top style='width:148.95pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'>RECEIPTS</p>
                        </td>
                        <td width=174 colspan=3 valign=top style='width:130.5pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'>ISSUES</p>
                        </td>
                        <td width=162 colspan=4 valign=top style='width:121.5pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'>BALANCES</p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:5'>
                        <td width=51 valign=top style='width:37.95pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:8.0pt;
font-family:"Arial",sans-serif'>RIV/PO
                            {{supply.po}}</span></p>
                        </td>
                        <td width=123 valign=top style='width:92.25pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:8.0pt;
font-family:"Arial",sans-serif'>From Whom received or to whom issued
                            <p></p></span></p>
                        </td>
                        <td width=49 valign=top style='width:36.45pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>Qty
                            <p></p></span></p>
                        </td>
                        <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>Unit Cost
                            <p></p></span></p>
                        </td>
                        <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:9.0pt'>Total Cost
                            <p></p></span></p>
                        </td>
                        <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:8.0pt;
font-family:"Arial",sans-serif'>Qty
                            <p></p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Unit Cost
                            <p></p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Total
Cost
                            <p></p></span></p>
                        </td>
                        <td width=36 colspan=2 valign=top style='width:27.0pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Qty
                            <p></p></span></p>
                        </td>
                        <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Unit
Cost
                            <p></p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Total
Cost
                            <p></p></span></p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:6;height:.1in'>
                        <td width=233 colspan=3 rowspan=2 style='width:174.8pt;border:solid windowtext 1.0pt;
border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Balance Brought
Forward
                            <p></p></span></p>
                        </td>
                        <td width=49 valign=top style='width:36.45pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>
                            </span></p>
                        </td>
                        <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>
                           </span></p>
                        </td>
                        <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:9.0pt'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:8.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=36 colspan=2 valign=top style='width:27.0pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:.1in'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:7'>
                        <td width=49 valign=top style='width:36.45pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>
                            {{supply.quantity + balanceQuantity}}</span></p>
                        </td>
                        <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:9.0pt'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:8.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=36 colspan=2 valign=top style='width:27.0pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                    </tr>
                    <tr v-for="item in iterateData">
                        <td width=59 valign=top style='width:44.6pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            {{$moment(item.updated_at).format('MM-DD')}}</span></p>
                        </td>
                        <td width=51 valign=top style='width:37.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            <p></p></span></p>
                        </td>
                        <td width=123 valign=top style='width:92.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            {{item.receive_id && item.receive.location_id ? item.receive.location.name : '' }}</span></p>
                        </td>
                        <td width=49 valign=top style='width:36.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                           {{item.receive_id  ? item.receive.quantity : 0}}</span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>
                                <span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                                {{supply.unit_cost ? supply.unit_cost : ''}}
                                </span>
                            </p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                             {{supply.unit_cost ? item.check * supply.unit_cost : ''}}
                            </span></p>
                        </td>
                        <td width=36 colspan=2 valign=top style='width:27.0pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            {{item.balance }}</span></p>
                        </td>
                        <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            {{supply.unit_cost ? supply.unit_cost : ''}}
                            </span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>
                            {{supply.unit_cost ? item.balance * supply.unit_cost : ''}}
                        </p></span></p>
                        </td>
                    </tr>
                    <tr v-for="item in differenceResult">
                        <td width=59 valign=top style='width:44.6pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=51 valign=top style='width:37.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=123 valign=top style='width:92.25pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=49 valign=top style='width:36.45pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:9.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:9.0pt'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:8.0pt;
  font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=36 colspan=2 valign=top style='width:27.0pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p></p></span></p>
                        </td>
                        <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                    </tr>
                    <tr style='mso-yfti-irow:54;mso-yfti-lastrow:yes;height:7.6pt'>
                        <td width=233 colspan=3 style='width:174.8pt;border:solid windowtext 1.0pt;
border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>Balance
Carried Forward
                            <p></p></span></p>
                        </td>
                        <td width=49 valign=top style='width:36.45pt;border-top:none;border-left:
none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=78 valign=top style='width:58.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:9.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:9.0pt'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=42 valign=top style='width:31.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:8.0pt;
font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td  colspan=2 valign=top style='width:27.0pt;border-top:none;
border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            </span></p>
                        </td>
                        <td width=60 valign=top style='width:45.0pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                        <td width=66 valign=top style='width:49.5pt;border-top:none;border-left:none;
border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
normal'><span style='font-size:8.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p>
                        </td>
                    </tr>
                    <![if !supportMisalignedColumns]>
                    <tr height=0>
                        <td width=59 style='border:none'></td>
                        <td width=51 style='border:none'></td>
                        <td width=123 style='border:none'></td>
                        <td width=49 style='border:none'></td>
                        <td width=78 style='border:none'></td>
                        <td width=72 style='border:none'></td>
                        <td width=42 style='border:none'></td>
                        <td width=66 style='border:none'></td>
                        <td width=66 style='border:none'></td>
                        <td width=6 style='border:none'></td>
                        <td width=30 style='border:none'></td>
                        <td width=60 style='border:none'></td>
                        <td width=66 style='border:none'></td>
                    </tr>
                    <![endif]>
                </table>

            </div>

            <p class=MsoNormal>
            <p>&nbsp;</p></p>

            <p class=MsoNormal>
            <p>&nbsp;</p></p>

            <p class=MsoNormal>
            <p>&nbsp;</p>
            </p>

            <p class=MsoNormal style='tab-stops:382.5pt'><span style='mso-tab-count:1'>                                                                                                                                                                          </span>
            </p>

        </div>

    </div>


</template>
<style>
    p {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline
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
    export default{
        data(){
            return {
                data:[],
                supply: {},
                iterateRow: 48,
                balanceQuantity: 0
            }
        },
        computed:{
            iterateData(){
                var vm = this
                var supply = vm.supply.quantity + vm.balanceQuantity
                return _.map(vm.data, function(response){
                    supply -= response.receive_id  ? response.receive.quantity : 0
                    response['balance'] = supply
                    return response
                })
            },
            differenceResult(){
                var vm = this
                return vm.iterateRow - vm.data.length > 0 ?  vm.iterateRow - vm.data.length : 0
            }
        },
        beforeRouteEnter (to, from, next) {
            getData('tracks/print/' + to.params.id, to.query, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            getData('tracks/print/' + to.params.id, to.query, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            setData(err, data){
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {

                    vm.data = data.data.model.data;
                    vm.balanceQuantity = _.reduce(vm.data, function(sum, n) {
                        return sum + (n.receive_id  ? n.receive.quantity : 0);
                    }, 0)
                    vm.supply = data.data.supply;
                }
            }
        }
    }
</script>
