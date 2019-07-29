<template>
    <div class="dv">
        <div class="dv-header">
            <div class="dv-header-title">
                <el-button size="mini" type="info" v-print="'#y_request'">Print </el-button>
            </div>
        </div>
        <div id="y_request" class=WordSection1>
            <div align=center>
                <table class="MsoTableGrid report-container" border=1 cellspacing=0 cellpadding=0
                       style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt; mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
                    <thead class="report-header ">
                    <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
                        <td width=719 colspan=14
                            style='width:539.5pt;border:solid windowtext 1.0pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'>REQUISITION AND ISSUE SLIP
                            <p></p></b></p><p class=MsoNormal align=center
                                              style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:normal'>
                            <b style='mso-bidi-font-weight:normal'>City Government of Davao
                            <p></p></b></p><p class=MsoNormal align=center
                                              style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:normal'>
                            <b style='mso-bidi-font-weight:normal'>LGU </b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:1'>
                        <td width=198 colspan=4 valign=top
                            style='width:148.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
                                Division: {{data.division_id ? data.division.name : ''}}</p></td>
                        <td width=216 colspan=3 valign=top
                            style='width:2.25in;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
                                <span class=SpellE>Responsibility: {{data.responsibilities}} </span>:</p></td>
                        <td width=128 colspan=3 valign=top
                            style='width:95.75pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
                                RIS No. </p></td>
                        <td width=178 colspan=4 valign=top
                            style='width:133.5pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
                                Date: {{$moment(data.updated_at).format('MM-DD-YY')}}</p></td>
                    </tr>
                    <tr style='mso-yfti-irow:2'>
                        <td width=198 colspan=4 valign=top
                            style='width:148.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'>
                                Office: {{data.office}}</p></td>
                        <td width=216 colspan=3 valign=top
                            style='width:2.25in;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'>
                            <p>&nbsp;</p></p></td>
                        <td width=128 colspan=3 valign=top
                            style='width:95.75pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'>
                                SAI No </p></td>
                        <td width=178 colspan=4 valign=top
                            style='width:133.5pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'>
                                Date: {{$moment(data.updated_at).format('MM-DD-YY')}}</p></td>
                    </tr>
                    <tr style='mso-yfti-irow:3'>
                        <td width=719 colspan=14 valign=top
                            style='width:539.5pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; line-height:normal'>
                                Source: {{data.source_id ? data.source.name : ''}}</p></td>
                    </tr>
                    <tr style='mso-yfti-irow:4'>
                        <td width=414 colspan=7
                            style='width:310.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'>Requisitions </b></p></td>
                        <td width=306 colspan=7
                            style='width:229.25pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'>Issuance </b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:5'>
                        <td width=78 colspan=2
                            style='width:58.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Stock No.
                            <p></p></span></p></td>
                        <td width=42
                            style='width:31.2pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Unit
                            <p></p></span></p></td>
                        <td width=78
                            style='width:58.8pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Description
                            <p></p></span></p></td>
                        <td width=46
                            style='width:34.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>QTY
                            <p></p></span></p></td>
                        <td width=80
                            style='width:59.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Unit Cost
                            <p></p></span></p></td>
                        <td width=90
                            style='width:67.5pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Total Cost
                            <p></p></span></p></td>
                        <td width=63 colspan=2
                            style='width:47.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>QTY
                            <p></p></span></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Unit Cost
                            <p></p></span></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Total Cost
                            <p>{{balanceQuantity}}</p></span></p></td>
                        <td width=81
                            style='width:60.7pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>Remarks
                            <p></p></span></p></td>
                    </tr>
                    </thead>
                    <tfoot class="report-footer">
                    <tr style='mso-yfti-irow:7'>
                        <td width=78 colspan=2
                            style='width:58.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=42
                            style='width:31.2pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=78
                            style='width:58.8pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=46
                            style='width:34.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=80
                            style='width:59.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=90
                            style='width:67.5pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=63 colspan=2
                            style='width:47.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>Total:
                            <p></p></span></b></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{balanceQuantity}}
                            <p></p></span></p></td>
                        <td width=81
                            style='width:60.7pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:8'>
                        <td width=719 colspan=14
                            style='width:539.5pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:9'>
                        <td width=719 colspan=14
                            style='width:539.5pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:10'>
                        <td width=54
                            style='width:40.25pt;border:solid windowtext 1.0pt;border-top: none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=190 colspan=4
                            style='width:142.75pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>Requested By:
                            <p></p></span></b></p></td>
                        <td width=188 colspan=3
                            style='width:140.7pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>Approved By:
                            <p></p></span></b></p></td>
                        <td width=144 colspan=4
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>Issued By:
                            <p></p></span></b></p></td>
                        <td width=144 colspan=2
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>Received By:
                            <p></p></span></b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:11'>
                        <td width=54 rowspan=4
                            style='width:40.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=190 colspan=4
                            style='width:142.75pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=188 colspan=3
                            style='width:140.7pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=144 colspan=4
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=144 colspan=2
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:12;height:8.5pt'>
                        <td width=190 colspan=4
                            style='width:142.75pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>request
                            <p></p></span></b></p></td>
                        <td width=188 colspan=3
                            style='width:140.7pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>{{$root.store.state.user ? $root.store.state.user.name : ''}}
                            <p></p></span></b></p></td>
                        <td width=144 colspan=4
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>{{data.division_id ? data.division.supply_division : ''}}
                            <p></p></span></b></p></td>
                        <td width=144 colspan=2
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>{{data.location_id ? data.location.name : ''}}
                            <p></p></span></b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:13'>
                        <td width=190 colspan=4
                            style='width:142.75pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=188 colspan=3
                            style='width:140.7pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:8.0pt;font-family:"Arial",sans-serif'>City Health Office/PSO-Designate
                            <p></p></span></b></p></td>
                        <td width=144 colspan=4
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>Supply Division
                            <p></p></span></b></p></td>
                        <td width=144 colspan=2
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>title
                            <p></p></span></b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:14'>
                        <td width=190 colspan=4
                            style='width:142.75pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=188 colspan=3
                            style='width:140.7pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=144 colspan=4
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                        <td width=144 colspan=2
                            style='width:107.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></b></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:15;height:5.0pt'>
                        <td width=719 colspan=14 valign=top
                            style='width:539.5pt;border:none; padding:0in 5.4pt 0in 5.4pt;height:5.0pt'><p
                                class=MsoNormal align=center
                                style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                            <p>&nbsp;</p></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:16;height:5.0pt'>
                        <td width=719 colspan=14 valign=top
                            style='width:539.5pt;border:none; padding:0in 5.4pt 0in 5.4pt;height:5.0pt'><p
                                class=MsoNormal align=center
                                style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                            <p>&nbsp;</p></p></td>
                    </tr>
                    <tr style='mso-yfti-irow:17;mso-yfti-lastrow:yes;height:5.0pt'>
                        <td width=719 colspan=14 valign=top
                            style='width:539.5pt;border:none; padding:0in 5.4pt 0in 5.4pt;height:5.0pt'><p
                                class=MsoNormal align=center
                                style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                            <p>&nbsp;</p></p></td>
                    </tr>
                    <![if !supportMisalignedColumns]>
                    <tr height=0>
                        <td width=61 style='border:none'></td>
                        <td width=27 style='border:none'></td>
                        <td width=48 style='border:none'></td>
                        <td width=90 style='border:none'></td>
                        <td width=53 style='border:none'></td>
                        <td width=90 style='border:none'></td>
                        <td width=101 style='border:none'></td>
                        <td width=21 style='border:none'></td>
                        <td width=51 style='border:none'></td>
                        <td width=74 style='border:none'></td>
                        <td width=18 style='border:none'></td>
                        <td width=21 style='border:none'></td>
                        <td width=71 style='border:none'></td>
                        <td width=93 style='border:none'></td>
                    </tr>
                    <![endif]>
                    </tfoot>
                    <tbody class="report-content">
                    <tr v-for="item in data.supplies" style='mso-yfti-irow:6'>
                        <td width=78 colspan=2
                            style='width:58.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.supply_id}}
                            <p></p></span></p></td>
                        <td width=42
                            style='width:31.2pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.unit_id ? item.unit.name : ''}}
                            <p></p></span></p></td>
                        <td width=78
                            style='width:58.8pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.description}}
                            <p></p></span></p></td>
                        <td width=46
                            style='width:34.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.quantity}}
                            <p></p></span></p></td>
                        <td width=80
                            style='width:59.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.unit_cost}}
                            <p></p></span></p></td>
                        <td width=90
                            style='width:67.5pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.unit_cost ? item.unit_cost  * item.quantity : '' }}
                            <p></p></span></p></td>
                        <td width=63 colspan=2
                            style='width:47.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.tracks ? item.tracks[0].check : ''}}
                            <p></p></span></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.tracks ? item.unit_cost : ''}}
                            <p></p></span></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.tracks ? item.tracks[0].check *  item.unit_cost : ''}}
                            <p></p></span></p></td>
                        <td width=81
                            style='width:60.7pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>{{item.tracks ? item.tracks[0].remarks : ''}}
                            <p></p></span></p></td>
                    </tr>

                    <tr v-if="differenceResult" v-for="(item, index) in differenceResult" :key="index" style='mso-yfti-irow:7'>
                        <td width=78 colspan=2
                            style='width:58.25pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt; padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=42
                            style='width:31.2pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=78
                            style='width:58.8pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=46
                            style='width:34.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=80
                            style='width:59.75pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=90
                            style='width:67.5pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=63 colspan=2
                            style='width:47.15pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                <b style='mso-bidi-font-weight:normal'><span
                                        style='font-size:9.0pt;font-family:"Arial",sans-serif'>
                            <p></p></span></b></p></td>
                        <td width=81 colspan=2
                            style='width:60.7pt;border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt; mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p></p></span></p></td>
                        <td width=81
                            style='width:60.7pt;border-top:none;border-left:none;border-bottom: solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt: solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt: solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                            <p class=MsoNormal align=center
                               style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'>
                                    <span style='font-size:9.0pt; font-family:"Arial",sans-serif'>
                            <p>&nbsp;</p></span></p></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>
<style>
    p {
        margin: 0;
        padding: 0;
        border: 0;
        vertical-align: baseline
    }

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
    export default{
        data(){
            return {
                data: {
                    supplies:[]
                },
                iterateRow: 32,
                balanceQuantity: 0
            }
        },
        beforeRouteEnter (to, from, next) {
            getData('requisitions/print/' + to.params.id, to.query, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        beforeRouteUpdate (to, from, next) {
            getData('requisitions/print/' + to.params.id, to.query, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        computed:{
            differenceResult(){
                var vm = this
                return vm.data ? (vm.iterateRow - vm.data.supplies.length > 0 ?  vm.iterateRow - vm.data.supplies.length : 0) : null
            }
        },
        methods:{
            setData(err, data){
                var vm = this
                if (err) {

                    if (err.response.status === 404) {
                        vm.$router.push({name: 'error.not-found', params: {'0': '/'}})
                    }

                    vm.error = err.toString()
                } else {

                    vm.data = data.data
                    vm.balanceQuantity = _.reduce(vm.data.supplies, function(sum, item) {
                        return sum + (item.tracks[0].check *  (item.unit_cost ? item.unit_cost : 0 ));

                    }, 0)
                }
            }
        }
    }
</script>