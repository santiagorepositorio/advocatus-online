<html>

<head>
    <title>Whatsapp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="style.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/whatsapp/style.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        function abrirChat() {
            window.location.href = "chat.html";
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            {{-- LADO IZQUIERDO --}}
            <div class="col-3">

                {{-- NAV BAR DE USUARIO --}}

                <div class="row wa-navbar">                    

                    <div class="col-10">
                        <img src="{{ Auth::user()->profile_photo_url }}"
                            class="user-image img-circle elevation-2 rounded-circle" alt="{{ Auth::user()->name }}">
                        <span class="d-none d-md-inline">
                            {{ Auth::user()->name }}
                        </span>
                    </div>
                    {{-- MENU --}}
                    <div class="col-2">
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="large material-icons wa-icon">more_vert</i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Perfil</a>

                                <a class="dropdown-item" href="#">Plantillas</a>
                                <a class="dropdown-item" href="#">Enviar Mensajes</a>
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Salir del Chat</a>
                            </div>
                        </div>



                    </div>
                </div>

                {{-- BUSCARDOR --}}
                <div class="row">
                    <div class="col-12 wa-contatos">
                        <input class="form-control wa-input" placeholder="Buscar" />
                    </div>
                </div>
                {{-- CONTACTOS --}}
                @forelse($messages2 as $message)
                    <div class="row wa-item-chat" onClick="abrirChat()">
                        <div class="col-2">
                            <img src="{{ asset('assets/imgs/profile.png') }}" class="rounded-circle" />
                        </div>
                        <div class="col-8">
                            <b>{{ $message->wa_id }}</b><br />
                            <p class="wa-preview-message">{{ Str::limit($message->body, 30) }}</p>
                        </div>
                        <div class="col-2" style="text-align: right">
                            <span>{{ $message->created_at->format('H:i') }}</span>
                            <span class="badge badge-pill wa-badge">54</span>
                        </div>
                    </div>
                    <hr />
                @empty
                    <div class="row wa-item-chat">

                        <p class="wa-preview-message">NO HAT NUEVOS CHAT</p>

                    </div>
                    <hr />
                @endforelse

            </div>
            {{-- LADO DERECHO --}}
            <div class="col-9">
                <div class="wa-introducao">
                    <div class="offset-3 wa-card-introducao">
                        <br /><br /><br />
                        <img src="{{ asset('assets/imgs/introducao.jpg') }}" />
                        <br /><br />
                        <h1>Mantenha seu telefone conectado</h1><br />
                        <p>O WhatsApp Web conecta ao seu telefone para sincronizar suas mensagens. Para
                            diminuir o uso do seu plano de internet, conecte seu telefone a uma rede WiFi.</p>
                        <hr />
                        <p><span style="font-size: 18px;" class="fa fa-laptop"></span> O WhatsApp está disponível para
                            Windows. <a href="https://www.whatsapp.com/download" target="_blank">Obtenha-o aqui</a>.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
