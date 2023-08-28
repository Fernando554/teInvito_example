<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <!-- Imágenes de fondo -->
    <div class="carousel-inner">
        <!-- Primera diapositiva -->
        <div class="carousel-item active">
            <img src="https://elcomercio.pe/resizer/gj5JbwxkmqRAa4HSpfOHEIUBf7k=/580x330/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/6FUBT6XQXNHHNFOMCHIT7I34NA.jpg" class="d-block w-100" alt="Imagen 1">
            <div class="carousel-caption">
               <input wire:model="title" class="form-control">
                <textarea wire:model="content" class="form-control"></textarea>
                <textarea wire:model="subcontent" class="form-control"></textarea>
                <button wire:click="saveChanges" class="btn btn-primary">Guardar</button>
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
