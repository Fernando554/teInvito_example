<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <footer class="footer bg-dark text-white mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-md-center">Título 1</h4>
                    <h2 class="text-md-center display-4">Título 2</h2>
                    <div id="countdown" class="text-md-center">
                        <div class="countdown-item">
                            <div class="countdown-value" id="days">0</div>
                            <div class="countdown-label">días</div>
                        </div>
                    </div>
                    <div id="countdown" class="text-md-center">
                        <div class="countdown-item">
                            <div class="countdown-value" id="hours">0</div>
                            <div class="countdown-label">horas</div>
                        </div>
                    </div>
                    <div id="countdown" class="text-md-center">
                        <div class="countdown-item">
                            <div class="countdown-value" id="minutes">0</div>
                            <div class="countdown-label">minutos</div>
                        </div>
                    </div>
                    <div id="countdown" class="text-md-center">
                        <div class="countdown-item">
                            <div class="countdown-value" id="seconds">0</div>
                            <div class="countdown-label">segundos</div>
                        </div>
                    </div>
                    <p class="text-md-center">Texto descriptivo.</p>
                    <div class="text-md-center">
                        <a href="#" class="btn btn-primary">Suscríbete</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <img src="imagen.jpg" alt="Imagen" class="img-fluid float-md-end">
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#countdown').countdown('2023/12/31', function(event) {
                $('#days').html(event.strftime('%D'));
                $('#hours').html(event.strftime('%H'));
                $('#minutes').html(event.strftime('%M'));
                $('#seconds').html(event.strftime('%S'));
            });
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>