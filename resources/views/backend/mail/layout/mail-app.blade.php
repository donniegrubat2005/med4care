<div style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;color:#74787e;height:100%;line-height:1.4;margin:0;width:100%!important;word-break:break-word">
    <table width="100%" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#f5f8fa;margin:0;padding:0;width:100%">
        <tbody>
            <tr>
                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                    <table width="100%" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;margin:0;padding:0;width:100%">
                        <tbody>
                            @include('backend.mail.mail-header')
                            <tr>
                                <td width="100%" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;border-bottom:1px solid #edeff2;border-top:1px solid #edeff2;margin:0;padding:0;width:100%">
                                    <table width="570" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;background-color:#ffffff;margin:0 auto;padding:0;width:570px">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;padding:35px">
                                                    <h1 style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#2f3133;font-size:19px;font-weight:bold;margin-top:0;text-align:left">
                                                        Hello!
                                                    </h1>

                                                    @yield('mail-content')

                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                        Thank you for using our application!
                                                    </p>
                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                        Regards, <br>{{app_name()}}
                                                    </p>
                                                    <table width="100%" cellspacing="0" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-top:1px solid #edeff2;margin-top:25px;padding-top:25px">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                                                    <p style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#74787e;line-height:1.5em;margin-top:0;text-align:left;font-size:12px">
                                                                        If you’re having trouble finding our application, copy and paste the URL below into your web browser:
                                                                        <a href="http://staging.med4care.online/" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;color:#3869d4"
                                                                            target="_blank"> 
                                                                          http://staging.med4care.online/
                                                                        </a>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @include('backend.mail.mail-footer')
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>