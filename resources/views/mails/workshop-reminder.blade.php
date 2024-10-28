<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @if($workshop->reminder_type == 24)
            Reminder: {{ $workshop->title ?? 'No Title' }} Tomorrow
        @else
            Last-Minute Reminder: {{ $workshop->title ?? 'No Title' }} Starts Soon 
        @endif
    </title>
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
        @if($workshop->reminder_type == 24)
            Reminder: {{ $workshop->title ?? 'No Title' }} Tomorrow
        @else
            Last-Minute Reminder: {{ $workshop->title ?? 'No Title' }} Starts Soon 
        @endif
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
                            @if($workshop->reminder_type == 24)
                                <p style="margin: 0;">This is a friendly reminder that you are registered for the <b>{{ $workshop->title ?? 'No Title' }}</b> by the School of Professional Skills tomorrow!</p>
                            @else
                                <p style="margin: 0;">This is a last-minute reminder that the <b>{{ $workshop->title ?? 'No Title' }}</b> by the School of Professional Skills starts in just one hour!</p>
                            @endif
                            <br>
                            <h3>Workshop Details:</h3>
                            <ul>
                                <li><b>Date : </b> {{ date('M d, Y',strtotime($workshop->workshop_date)) }}</li>
                                <li><b>Time : </b> {{ date('h:i:s A',strtotime($workshop->workshop_time)) }}</li>
                                @if($workshop->type == 'Online')
                                    <li><b>Platform : </b> Google Meet</li>
                                    <li><b>Meet Link : </b> <a href="{{ $workshop->workshop_link ?? '#' }}"> Join Workshop</a></li>
                                @else
                                    <li><b>Location : </b>{{ $workshop->address ?? 'No Address' }}</li>
                                @endif
                            </ul>
                            @if ($workshop->type == 'Online')
                                <p>If you have any questions or need assistance, feel free to reach out. We can't wait to see you online!</p>
                            @else
                                <p>Please bring a printed or soft copy of this email for entry. If you have any questions, don’t hesitate to reach out. We look forward to seeing you soon!</p>
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
