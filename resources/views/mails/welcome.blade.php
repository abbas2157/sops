<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome Email</title>
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
        A Welcome email SOPS - School of Professional Skills
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
                <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Hi {{ $data->name ?? ''}},</h1>
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
                    <p style="margin: 0;">Thank you for registering your interest in joining the School of Professional Skills (SOPS) community. We’re here to help you on your journey to a fulfilling career.
                    </p>
                    <br>
                    <h1 style="margin: 0; font-size: 20px; font-weight: 600; letter-spacing: -1px; line-height: 48px;">What should I do next?</h1>
                    <p style="margin: 0;">The Intro Module, is a series of steps that gives you the best introduction to technical skill of your interest and professional development skills.</p>
                    <br>
                    <p style="margin: 0;">Your account is almost ready. Just verify your email address to complete the setup process. </p>
                    <br>
                    <a href="{{ url('verify-account', $data->uuid) }}" target="_blank"style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px;text-align: center; background-color: #19255b; color: #ffffff; text-decoration: none; border-radius: 6px;">Verify Account</a>
                    <br /><br />
                    <p style="margin: 0;"> After verification, you can login at following link: </p>
                    <p style="margin: 0;"> <strong>Login Page </strong> : <a href="{{ route('login') }}"> {{ route('login') }} </a> </p>
                    <p style="margin: 0;"> <strong> Email </strong> : <a href="mail:{{ $data->email }}"> {{ $data->email }} </a> </p>
                    <br>
                    <h1 style="margin: 0; font-size: 20px; font-weight: 600; letter-spacing: -1px; line-height: 48px;">How much time will the Intro Module take?</h1>
                    <p style="margin: 0;">You should dedicate 20-40 hours of study time to the Intro Module.</p>
                    <br />
                    <p style="margin: 0;">It is a self-study module, and you will receive guidance from industry professionals through free two hour workshops scheduled from time to time and communicated through website, social media and email.</p><br>
                    <p style="margin: 0;">After completing the Intro Module, you will be eligible to proceed to the Fundamentals Module. Similarly, upon finishing the Fundamentals Module, you will qualify for the Full Skill Development Module. Passing each module is mandatory to move on to the next one. The Intro Module is self-paced, allowing you multiple attempts to pass and advance to the Fundamentals Module. However, if the Fundamentals Module and Full Skill Development Module are Zoom-based, you will have two chances to pass each. If you do not succeed after these attempts, you will need to re-enroll.</p><br>
                    <p style="margin: 0;">Our teaching and learning framework has already proven successful with many of our graduates, who have gone on to have thriving careers in the industry. Many of them were previously unaware of even the basics.</p><br>
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
