<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--[if mso]><style type="text/css">body, table, td, a { font-family: Arial, Helvetica, sans-serif !important; }</style><![endif]-->
</head>

<body style="font-family: Helvetica, Arial, sans-serif; margin: 0px; padding: 0px; background-color: #ffffff;">
    <table role="presentation"
        style="width: 100%; border-collapse: collapse; border: 0px; border-spacing: 0px; font-family: Arial, Helvetica, sans-serif; background-color: rgb(239, 239, 239);">
        <tbody>
            <tr>
                <td align="center" style="padding: 1rem 2rem; vertical-align: top; width: 100%;">
                    <table role="presentation"
                        style="max-width: 600px; border-collapse: collapse; border: 0px; border-spacing: 0px; text-align: left;">
                        <tbody>
                            <tr>
                                <td style="padding: 40px 0px 0px;">
                                    <div style="text-align: left;">
                                        <div style="padding-bottom: 20px;"><img
                                                src="{{ Storage::url('images/ofppt_logo.png') }}" alt="OFPPT">
                                        </div>
                                    </div>
                                    <div style="padding: 20px; background-color: rgb(255, 255, 255);">
                                        <div style="color: rgb(0, 0, 0); text-align: left;">
                                            
                                            <p style="padding-bottom: 16px"> Click Pour Telecharger l'emploi du temps:
                                                <a href="{{route('downloadTimeTable')}}"
                                                    class="btn btn-primary">Telecharger</a>
                                            </p>
                                            <p style="padding-bottom: 16px">OFPPT</p>
                                        </div>
                                    </div>
                                    <div style="padding-top: 20px; color: rgb(153, 153, 153); text-align: center;">
                                        {{-- <p style="padding-bottom: 16px">Made with ♥ in Paris</p> --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
