@extends('emails.master')

@section('content')
    <tr>
        <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;">
            <table border="0" cellpadding="0" cellspacing="0" class="brdBottomPadd-two" id="templateContainer" width="100%" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;border-bottom: 1px solid #f0f0f0;border-top: 1px solid #e2e2e2;border-left: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-radius: 4px 4px 0 0;background-clip: padding-box;border-spacing: 0;border-collapse: collapse!important;">
                <tr>
                    <td class="bodyContent" valign="top" mc:edit="welcomeEdit-02" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 3.143em;padding-right: 3.5em;padding-left: 3.5em;padding-bottom: .857em;text-align: left;">
                        <p style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #545454;display: block;font-family: Helvetica;font-size: 16px;line-height: 1.5em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;">Hi {{$user->full_name}},</p>

                        <h1 style="color: #2e2e2e;display: block;font-family: Helvetica;font-size: 26px;line-height: 1.385em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;"><strong>Greetings from Passionpredict, Thank you for joining our community for gamblers.</strong></h1>

                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;">Your account has been successfully created and activated! Enjoy our daily accurate football, tennis, basketball predictions.
                        </h3>

                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;">Get connected, Follow your interest and share ideas on Gamblers Page without any restriction.
                        </h3>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;">
            <!-- BEGIN BODY // -->

            <table border="0" cellpadding="0" cellspacing="0" id="templateContainerMiddleBtm" width="100%" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;border-left: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-bottom: 1px solid #e2e2e2;border-radius: 0 0 4px 4px;background-clip: padding-box;border-spacing: 0;border-collapse: collapse!important;">
                <tr>
                    <td class="bodyContent" valign="top" mc:edit="welcomeEdit-11" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 3.143em;padding-right: 3.5em;padding-left: 3.5em;padding-bottom: 2em;text-align: left;">
                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;"><strong>Once again, thank you</strong></h3>

                        <a class="blue-btn" href="{{route('/login)}}" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #FFFFFF;text-decoration: none;background: #5098ea;display: inline-block;border-top: 10px solid #5098ea;border-bottom: 10px solid #5098ea;border-left: 20px solid #5098ea;border-right: 20px solid #5098ea;font-size: 14px;margin-top: 1.0em;border-radius: 3px 3px 3px 3px;background-clip: padding-box;"><strong>LOGIN HERE</strong></a>
                    </td>
                </tr>
            </table><!-- // END BODY -->
        </td>
    </tr>
@endsection