<!Doctype html>
<html>

<head>
    <title>Approved Business Head</title>
</head>

<body>
    <div style="width:744px;background-color: #f2f2f2;padding-top: 12px;padding-bottom: 15px;">
        <table style="width: 700px;margin-right: auto;margin-left: auto;">
            <tr>
                <td colspan="2"
                    style="background-color: #f2f2f2;text-align: center;border-top-left-radius: 3px;border-top-right-radius: 3px;">
                    <img src="https://ct-hiring.mobbsr.in/assets/images/am.jpg" style="max-width:238px;margin-left: 6px;margin-bottom: 13px;">
                </td>
            </tr>
        </table>
        <table
            style="width: 700px;margin-right: auto;margin-left: auto;position: relative;top: -4px;background-color: #f9f9f9;padding-bottom: 16px;">
            <tr>
                <td colspan="2">
                    <p
                        style="font-family: verdana;text-align: left;font-size: 14px;margin: 0px;color: #484546;line-height: 140%;word-wrap: break-word;padding-top: 6px;padding-left: 12px;font-weight:600;">
                        Dear {{$fname}} {{$lname}},</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    @php
                        $create=App\Models\User::where('id','=',$createby)->get();
                    @endphp
                    
                    <p style="font-family: verdana;text-align: left;font-size: 12px;margin: 0px;color: #484546;line-height: 140%;margin-top: 0px;word-wrap: break-word;padding-top: 6px;padding-left: 12px;">
                        The following client is created by <span style="font-weight:600;">{{$create[0]->name}}</span>.
                    </p>
                </td>
            </tr>
        </table>
        <table
            style="width: 700px;margin-right: auto;margin-left: auto;position: relative;top: -4px;background-color: #f9f9f9;padding-bottom: 16px;">
            <tr>
                <td colspan="2">
                    <p
                        style="font-family: verdana;text-align: left;font-size: 12px;margin: 0px;color: #484546;line-height: 140%;margin-top: 10px;word-wrap: break-word;padding-top: 6px;padding-left: 12px;">
                        Please check the details below.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p
                        style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; margin-left: 12px; padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;">
                        Client Name</p>
                </td>
                <td>
                    <p
                        style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;">
                        {{$nameclient}}
                    </p>
                </td>
                <td>
                    <p
                        style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px;padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;">
                        Location</p>
                </td>
                <td>
                    @php
                        $location=App\Models\city::where('id','=',$cityname)->get();
                    @endphp
                    
                    <p style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;margin-right: 12px;">
                        {{$location[0]->name}}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p
                        style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; margin-left: 12px; padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;">
                        CRM</p>
                </td>
                <td>
                    @php
                        $crm=json_decode($crmid);
                        $count=count($crm);
                    @endphp
                    @for ($i=0;$i<$count;$i++)
                        @php
                        $crmname=App\Models\User::where('id','=',$crm[$i])->get();
                        @endphp
                    
                        <p style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;">
                            {{$crmname[0]->name}}
                        </p>
                    @endfor
                    
                </td>
                <td>
                    <p
                        style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px;padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;">
                        Created By</p>
                </td>
                <td>
                    @php
                        $create=App\Models\User::where('id','=',$createby)->get();
                    @endphp
                    <p
                        style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px; padding-bottom: 6px; background-color: #f2f2f2;margin-right: 12px;">
                        {{$create[0]->name}}
                    </p>
                </td>
            </tr>
        </table>
        <table
            style="width: 700px;margin-right: auto;margin-left: auto;position: relative;background-color: #f9f9f9;padding-bottom: 16px;margin-top: 5px;padding-top: 10px;">
            <tr>
                <td colspan="2">
                    <p
                        style="font-family: verdana;text-align: left;font-size: 13px;margin: 0px;color: #b4aeae;line-height: 140%;margin-bottom: 3px;word-wrap: break-word;padding-top: 0px;padding-left: 12px;">
                        If you have any comments or questions don’t hesitate to reach us at <br />
                        <a href="mailto:hiring@career-tree.in">hiring@career-tree.in</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p
                        style="font-family: verdana;text-align: left;font-size: 13px;margin: 0px;color: #5d5b5b;line-height: 140%;margin-top:8px;margin-bottom: 3px;word-wrap: break-word;padding-top: 0px;padding-left: 12px;">
                        Thanks,</p>
                    <p
                        style="font-family: verdana;text-align: left;font-size: 13px;margin: 0px;color: #5d5b5b;line-height: 140%;margin-bottom: 3px;word-wrap: break-word;padding-top: 0px;padding-left: 12px;">
                        Team CTHiring</p>
                </td>
            </tr>
        </table>
        <table style="width: 700px;margin-right: auto;margin-left: auto;position: relative;top: -4px;">
            <tr>
                <td style="border-bottom-left-radius:2px;border-bottom-right-radius:2px;background-color: #222222;">
                    <p
                        style="font-family: verdana;text-align: center;font-size: 12px;margin: 0px;color: #ffffff;line-height: 140%;margin-bottom: 12px;margin-top: 12px;word-wrap: break-word;padding-top: 0px;padding-left: 12px;">
                        &copy; CTHiring. All Right Reserved.
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>