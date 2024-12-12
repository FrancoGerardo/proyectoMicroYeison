<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        // Inicializa Pusher
        document.addEventListener("DOMContentLoaded", function() {
            var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                encrypted: true
            });

            // Suscripción al canal
            var channel = pusher.subscribe('notify-channel');

            // Evento de escucha
            channel.bind('App\\Events\\Notify', function(data) {

                var mensaje = document.getElementById('mensaje');
                if (mensaje) {
                    mensaje.textContent = data.message;
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "5000"
                    };
                    toastr.success(data
                        .message);
                }


                /* 
                    // Usar toastr para mostrar la notificación
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "5000"
                    };
                    toastr.success(data
                    .message); // Puedes usar toastr.info, toastr.warning, toastr.error dependiendo del tipo de mensaje

                    */
            });
        });
    </script>
</head>

<body>
    <div class="card">
        <div class="card-body shadow-lg">
            <h1>APP EN TIEMPO REAL</h1>
            <p id="mensaje"></p>
        </div>
    </div>
</body>

</html>
