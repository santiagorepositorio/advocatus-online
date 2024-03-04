<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        body {
            background-image: url(data:image/png;base64,{{ $imageData }});
            background-size: cover;
            background-position: center center;
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
        }

        .certificate {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 64px;
            margin-bottom: 10px;
            color: #333;
            text-align: center;
        }

        .info {
            margin-top: 34px;
            /* Movido 4 espacios más abajo */
            color: #2a2a2a;
        }

        .info p {
            margin: 5px 0;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
        }

        @page {
            size: landscape;
            margin: 20px;
        }
    </style>

</head>

<body>
    <div class="certificate">
        <div class="header">
            <br>
            <br>
            <div class="title">CERTIFICADO</div>
            <strong style="font-size: 24px; display: block; text-align: center; margin-top: 16px; font-family: Arial, sans-serif; text-transform: uppercase; background-image: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet); -webkit-background-clip: text; color: transparent; font-weight: bold;">{{ $courses->category->name }}</strong>
            <strong style="font-size: 20px; display: block; text-align: center; margin-top: 40px;">EL PRESENTE CERTIFICA LA PARTICIPACION DE:</strong>
        </div>         
        
        <div class="info">
            <strong style="font-size: 40px; display: block; text-align: center; margin-top: 4px;">{{ $user->name }}</strong>
            <br> 
            <p style="font-size: 18px; display: block; text-align: center; margin-top: 4px;">Por haber participado del Evento: <strong>{{ $courses->title }}
            </strong>, con una carga de <strong>
                @if ($courses->certificate)
                @if ($courses->certificate->carga)
                    {{ $courses->certificate->carga }}
                @else
                    NO TIENE ASIGNADO LA CARGA HORARIA
                @endif
            @else
            NO TIENE ASIGNADO LA CARGA HORARIA
            @endif</strong>.
            </p>
        </div>
        <div style="position: absolute; bottom: 28px; right: 28px;">
            <div style="background-color: black; display: inline-block; padding: 1px; border: 2px; border-radius: 5px;">
                <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR"
                    style="border: 5px solid white; border-radius: 5px;">
            </div>
        </div>
    </div>
</body>

</html>
