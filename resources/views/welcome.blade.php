<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .carousel-item img {
            width: 100%;
            max-height: 80vh; /* Establece la altura máxima como el 80% de la altura visible del viewport */
            object-fit: cover; /* Escala y recorta la imagen para que se ajuste al contenedor */
        }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- 
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Título</div>
                <div class="card-body text-center text-wrap">
                    <p class="collapse show" id="collapseText">
                        When creating and developing startups, using a UI kit to bootstrap your companies website can be an extremely efficient way to save time, money, and runway. UI kits are a great way to jumpstart your next startup website, but finding the perfect kit that matches your exact needs can sometimes be a tedious task. To help save you some time, we’ve rounded up the top 10 UI kits for startup websites, all of which are totally free!
                    </p>
                    <a href="#collapseText" class="btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="collapseText">Leer más</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="https://assets.xboxservices.com/assets/e4/30/e4304c2b-0e62-4e66-8c17-dfaabeb96b44.jpg?n=224099_Super-Hero-1400_Hero_1920x1080.jpg" alt="Imagen" class="img-fluid" style="max-width: 400px; height: 400px;">
        </div>
    </div>
</div> -->
<!--
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://elcomercio.pe/resizer/gj5JbwxkmqRAa4HSpfOHEIUBf7k=/580x330/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/6FUBT6XQXNHHNFOMCHIT7I34NA.jpg" class="d-block w-100" alt="Imagen 1">
            <div class="carousel-caption">
                <h1>Título</h1>
                <p>Contenido</p>
                <small>Subcontenido</small>
                <br>
                <a href="#" class="btn btn-primary">Botón</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2023/06/transformers-rise-7680x4320-11402-scaled.jpg?fit=2560%2C1440&quality=50&strip=all&ssl=1" class="d-block w-100" alt="Imagen 2">
            <div class="carousel-caption">
                <h1>Otro Título</h1>
                <p>Otro Contenido</p>
                <small>Otro Subcontenido</small>
                <br>
                <a href="#" class="btn btn-primary">Otro Botón</a>
            </div>
        </div>
    </div>-->

    

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <!-- Imágenes de fondo -->
    <div class="carousel-inner">
        <!-- Primera diapositiva -->
        <div class="carousel-item active">
            <img src="https://elcomercio.pe/resizer/gj5JbwxkmqRAa4HSpfOHEIUBf7k=/580x330/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/6FUBT6XQXNHHNFOMCHIT7I34NA.jpg" class="d-block w-100" alt="Imagen 1">
            <div class="carousel-caption">
                <h1 class="display-1">Título</h1>
                <p class="lead">Contenido</p>
                <small>Subcontenido</small>
                <br>
                <a href="#" class="btn btn-primary btn-lg">Botón</a>
            </div>
        </div>
        <!-- Segunda diapositiva -->
        <div class="carousel-item">
            <img src="https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2023/06/transformers-rise-7680x4320-11402-scaled.jpg?fit=2560%2C1440&quality=50&strip=all&ssl=1" class="d-block w-100" alt="Imagen 2">
            <div class="carousel-caption">
                <h1 class="display-1">Otro Título</h1>
                <p class="lead">Otro Contenido</p>
                <small>Otro Subcontenido</small>
                <br>
                <a href="#" class="btn btn-primary btn-lg">Otro Botón</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2023/06/transformers-rise-7680x4320-11402-scaled.jpg?fit=2560%2C1440&quality=50&strip=all&ssl=1" class="d-block w-100" alt="Imagen 2">
            <div class="carousel-caption">
                <h1 class="display-1">Otro Título</h1>
                <p class="lead">Otro Contenido</p>
                <small>Otro Subcontenido</small>
                <br>
                <a href="#" class="btn btn-primary btn-lg">Otro Botón</a>
            </div>
        </div>
        <!-- Agrega más diapositivas según sea necesario -->
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>