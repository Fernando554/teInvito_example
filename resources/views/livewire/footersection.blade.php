<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        #location img{
            max-width: 100%;
        }
        #location{
            background-color: #FFE4B6;
            color: black;
        }
        .smaller-transparent-input {
            width: 150px; /* Ajusta el ancho según tus necesidades */
        }
        .bg-custom-color {
            background-color: #FFE4B6; /* Reemplaza "your-color" con el color deseado */
            /* Otros estilos si es necesario */
        }
    </style>
    <footer id="location">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 pt-2 pb-4 pt-4 text-center d-flex flex-column align-items-center justify-content-center">
                    <input wire:model="title1" type="text" placeholder="Texto" class="form-control smaller-transparent-input bg-custom-color">
                </h4>
                    <div>
                        <input wire:model="title2" type="text" class="form-control mt-2 bg-custom-color">
                    </div>
                    <div id="countdown" class="text-md-center mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <h1 id="days" class="display-1">
                                    <input wire:model="days" class="form-control text-black bg-custom-color">
                                </h1>
                                <h4 class="text-black">Días</h4>
                            </div>
                            <div class="col-md-3">
                                <h1 id="hours" class="display-1">
                                    <input wire:model="hours" class="form-control text-black bg-custom-color">
                                </h1>
                                <h4 class="text-black">Horas</h4>
                            </div>
                            <div class="col-md-3">
                                <h1 id="minutes" class="display-1">
                                    <input wire:model="minutes" class="form-control text-black bg-custom-color">
                                </h1>
                                <h4 class="text-black">Minutos</h4>
                            </div>
                            <div class="col-md-3">
                                <h1 id="seconds" class="display-1">
                                    <input wire:model="seconds" class="form-control text-black bg-custom-color">
                                </h1>
                                <h4 class="text-black">Segundos</h4>
                            </div>
                        </div>
                        <div>
                            <input wire:model="text" type="text" class="form-control mt-2 bg-custom-color">
                        </div>
                    </div>
                    <a wire:model="buttonText" href="https://www.google.com/maps/place/Café+Cafetzal/@19.6293735,-99.0314331,15z/data=!4m5!3m4!1s0x0:0x8c8516da97cae053!8m2!3d19.6293735!4d-99.0314331?hl=es-419"
                    class="btn btn-outline-black mt-4">Mas informacion</a>
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <img wire:model="imageSrc" src="https://www.gastrolabweb.com/u/fotografias/m/2021/5/17/f608x342-13334_43057_0.jpg" alt="location">
                </div>
            </div>
        </div>
    </footer>
    <div class="mt-3">
            <button wire:click="saveChanges" class="btn btn-primary">Guardar</button>
    </div>
</div>