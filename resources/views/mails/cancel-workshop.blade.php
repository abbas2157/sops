<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Important Update: {{ $workshop->title ?? 'No Title' }} Cancellation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        @media screen {
            @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 400;
            src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
            }
            @font-face {
            font-family: 'Source Sans Pro';
            font-style: normal;
            font-weight: 700;
            src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
            }
        }
        body,
        table,
        td,
        a {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        table,
        td {
            mso-table-rspace: 0pt;
            mso-table-lspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }
        a[x-apple-data-detectors] {
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: none !important;
        }
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
        body {
            width: 100% !important;
            height: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        table {
            border-collapse: collapse !important;
        }
        a {
            color: #1a82e2;
        }
        img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
        }
    </style>
</head>
<body style="background-color: #e9ecef;">
    <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
        Important Update: {{ $workshop->title ?? 'No Title' }} Cancellation
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" bgcolor="#e9ecef">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 36px 24px;">
                            <a href="https://sops.pk" target="_blank" style="display: inline-block;">
                                <img src="https://sops.pk/wp-content/uploads/2021/09/SOPS_Logo-1.png" alt="Logo" border="0" width="150" style="display: block; width: 150px; max-width: 150px; min-width: 48px;">
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#e9ecef">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
                            <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Dear {{ $user->name ?? ''}},</h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#e9ecef">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            @if ($workshop->type == 'Online')
                                <p style="margin: 0;"> We regret to inform you that the <b>{{ $workshop->title ?? 'No Title' }}</b> scheduled for {{ date('M d, Y',strtotime($workshop->workshop_date)) }} has been cancelled due to unforeseen circumstances.</p>
                                <br>
                                <p>We sincerely apologize for any inconvenience this may cause and appreciate your understanding. If you have already paid for the workshop, a full refund will be processed shortly.</p>
                                <p>Please stay tuned for future workshops, and feel free to reach out if you have any questions</p>
                            @else
                                <p style="margin: 0;">We are sorry to inform you that the <b>{{ $workshop->title ?? 'No Title' }}</b> scheduled for {{ date('M d, Y',strtotime($workshop->workshop_date)) }} at {{ date('M d, Y',strtotime($workshop->address)) }} has been cancelled due to unforeseen circumstances.</p>
                                <br />
                                <p>We apologize for any inconvenience this may cause and appreciate your understanding. If you have already paid for the workshop, a full refund will be processed shortly.</p>
                                <p>We look forward to seeing you there!</p>
                            @endif
                            <br />
                            <p style="margin: 0;"> All the best, <br />
                            The School of Professioal Skills Team </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="padding: 36px 24px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
