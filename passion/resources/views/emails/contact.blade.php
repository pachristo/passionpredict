@extends('emails.master')

@section('content')
    <tr>
        <td align="center" valign="top" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;">
            <table border="0" cellpadding="0" cellspacing="0" class="brdBottomPadd-two" id="templateContainer" width="100%" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;border-bottom: 1px solid #f0f0f0;border-top: 1px solid #e2e2e2;border-left: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-radius: 4px 4px 0 0;background-clip: padding-box;border-spacing: 0;border-collapse: collapse!important;">
                <tr>
                    <td class="bodyContent" valign="top" mc:edit="welcomeEdit-02" style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;mso-table-lspace: 0;mso-table-rspace: 0;color: #505050;font-family: Helvetica;font-size: 14px;line-height: 150%;padding-top: 3.143em;padding-right: 3.5em;padding-left: 3.5em;padding-bottom: .857em;text-align: left;">
                        <p style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;color: #545454;display: block;font-family: Helvetica;font-size: 16px;line-height: 1.5em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;">Hello Victor,</p>

                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;">You've got a new message from {{$data['name']}}</h3>
                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;"><strong>Email: </strong> {{$data['email']}}</h3>
                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;"><strong>Phone: </strong> {{$data['phone']}}</h3>
                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;"><strong>Message: </strong> {{$data['message']}}</h3>
                        <h3 style="color: #545454;display: block;font-family: Helvetica;font-size: 18px;line-height: 1.444em;font-style: normal;font-weight: 400;letter-spacing: normal;margin-top: 0;margin-right: 0;margin-bottom: 15px;margin-left: 0;text-align: left;"><strong>Date & Time: </strong> {{\Carbon\Carbon::now()->format('l d F, Y h:ia')}}</h3>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection