<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?= $title; ?></title>
    <style>
        body {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            max-width: 500px;

        }

        a.active {
            color:#ccc;
        }

        .image {
            padding: 15px 0 15px 0;
        }
        .content {
            font-size: 16px;
        }

        .content p {
            margin: 25px 0;
            color: #fff;
        }

        p {
            color: #eee;
            font-size: 14px;
        }

        .footer {
            font-size: 14px;
            color: #888888;
            font-style: italic;
            padding-bottom: 10px;
        }

        .button {
            -webkit-text-size-adjust: none;
            border-radius: 4px;
            align-self: center;
            align-items: center;
            color: #fff !important;
            padding: 10px;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
        }


        .button-blue {
            background-color: rgb(0, 103, 254, 1);
            border-bottom: 8px solid rgb(0, 103, 254, 1);
            border-left: 18px solid rgb(0, 103, 254, 1);
            border-right: 18px solid rgb(0, 103, 254, 1);
            border-top: 8px solid rgb(0, 103, 254, 1);
        }

        .footer p {
            margin: 0 0 2px 0;
        }
    </style>
</head>

<body>
    <table align="center" role="presentation" border="0" cellpadding="0" width="100%" cellspacing="0">
        <tr bgcolor="#2B2B2B">
            <td align="center" class="image">
                <img width="100" src="/storage/image/logo.png">
            </td>
        </tr>
        <tr bgcolor="#1A1919">
            <td style="padding: 10px 30px 20px 30px">
                <div class="content">
                    <?= $v->section("content"); ?>
                    <p>Atenciosamente, <?= CONF_SITE_NAME; ?> !</p>
                </div>
                <div style="border-top: 1px solid #ccc ;padding-top: 5px"></div>
                <p>Se você estiver tendo problemas para clicar no botão "<?= $button ?>",copie e cole a URL abaixo em seu navegador:
                    <span style="color:#8e8efff2"><?= $confirm_link; ?></span>
                </p>
            </td>
        </tr>
        <tr bgcolor="#2B2B2B">
            <td style="padding: 10px 30px;">
                <div class="footer">
                    <p><?= CONF_SITE_NAME; ?> - <?= CONF_SITE_TITLE; ?></p>
                    <p><?= CONF_SITE_ADDR_STREET; ?>
                        , <?= CONF_SITE_ADDR_NUMBER; ?><?= (CONF_SITE_ADDR_COMPLEMENT ? ", " . CONF_SITE_ADDR_COMPLEMENT : ""); ?></p>
                    <p><?= CONF_SITE_ADDR_CITY; ?>/<?= CONF_SITE_ADDR_STATE; ?> - <?= CONF_SITE_ADDR_ZIPCODE; ?></p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>