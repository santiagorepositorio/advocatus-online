<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        body {
            /* Elimina los márgenes predeterminados */
            margin: 0;
            padding: 0;
            /* Establece la imagen de fondo en la página completa */
            background-image: url(data:image/png;base64,{{ $imageData }});
            /* Ajusta la posición y tamaño de la imagen */
            background-size: 100%; /* Ajusta la imagen al 120% del tamaño original */
            background-position: center center;
            /* Agrega márgenes para mantener la relación de aspecto */
            margin-top: 0mm; /* Ajusta según sea necesario */
            margin-bottom: 0mm; /* Ajusta según sea necesario */
            margin-left: 0mm; /* Ajusta según sea necesario */
            margin-right: 0mm; /* Ajusta según sea necesario */
            /* Evita que la imagen de fondo se imprima en el PDF */
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            font-family: 'Arial', sans-serif; /* Tipo de letra predeterminado */
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
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .certificate-info {
            font-size: 18px;
            color: #2a2a2a;
            text-align: center;
            margin-top: 30px;
        }

        .certificate-info p {
            margin: 5px 0;
        }

        /* Estilos para el código QR */
        .qr-code {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
            border: 5px solid white;
            border-radius: 5px;
        }
    </style>

</head>
<body>
    <div class="certificate">
        <div class="header">
            <div class="title">CERTIFICADO</div>
            <div class="subtitle">Por la presente se certifica:</div>
        </div>
        
        <div class="certificate-info">
            <p><strong>Nombre:</strong> <span style="font-size: 24px;">{{ $user->name }}</span></p>
            <p>Por haber participado de Curso/Taller: <strong> {{ $courses->title }}</strong> con una carga de 50 horas.</p>
            <!-- Otros datos del curso -->
        </div>

        <!-- Código QR -->
        <div class="qr-code">
            <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR">
        </div>
    </div>
</body>
</html>