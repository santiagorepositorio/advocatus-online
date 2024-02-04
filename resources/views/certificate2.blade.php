
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        body {
        /* Establece la imagen de fondo de todo*/
        background-image: url(data:image/png;base64,{{ $imageData }});
        /* Ajusta la posición y tamaño de la imagen */
        background-size: cover; /* O ajusta según tus necesidades */
        background-position: center center; /* O ajusta según tus necesidades */
        /* Evita que la imagen de fondo se imprima en el PDF */
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
            font-size: 36px;
            margin-bottom: 10px;
            color: #333; /* Color del título */
        }
        .subtitle {
            font-size: 24px;
            color: #666; /* Color del subtítulo */
        }
        .info {
            margin-top: 30px;
            color: #2a2a2a; /* Color de la información */
        }
        .info p {
            margin: 5px 0;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .qr-code img {
            width: 100px; /* Ajuste del tamaño del código QR */
            height: 100px;
        }
        @page {
            size: landscape; /* Formato horizontal */
            margin: 20px; /* Márgenes cortos */
        }
          /* Estilos para el código QR */
          .qr-code {
            display: block;
            text-align: center;
        }
        .qr-code img {
            max-width: 100%;
            height: auto;
        }
    </style>

</head>
<body>
    <div class="certificate " >
        <div class="header">
  
            <div class="title">CERTIFICADO</div>
            <div class="subtitle">Por la presente se certifica que:</div>
        </div>
       
        <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR">

        <div style="background-color: black; display: inline-block; padding: 2px; border: 10px;">
            <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR" style="border: 5px solid white; border-radius: 5px;">
        </div>
        <div style="position: absolute; bottom: 10px; right: 10px;">
            <div style="background-color: black; display: inline-block; padding: 2px; border: 10px;">
                <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="Código QR" style="border: 5px solid white; border-radius: 5px;">
            </div>
        </div>
      
        <div class="info">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
 
            <p>Por haber participado de Taller: <strong>Curso:</strong> {{ $courses->title }} con una carga de 50 horas.</p>
            <!-- Otros datos del curso -->
        </div>
        


    </div>
</body>
</html>

