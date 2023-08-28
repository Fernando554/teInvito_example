<footer class="footer bg-dark text-white mt-auto">
    <div class="container">
        <div class="row align-items-between">
            <!-- Columna 1 -->
            <div class="col-md-6 align-items-between justify-content-center">
                <h4 class="text-md-center">
                    <input wire:model="title1" class="form-control text-white bg-dark">
                </h4>
                <h1 class="text-md-center display-4" style="font-size: 36px;">
                    <input wire:model="title2" class="form-control text-white bg-dark">
                </h1>
                <div id="countdown" class="text-md-center">
                    <div class="row">
                        <div class="col-md-3">
                            <h1 id="days" class="display-1">
                                <input wire:model="days" class="form-control text-white bg-dark">
                            </h1>
                            <h4 class="text-white">Días</h4>
                        </div>
                        <div class="col-md-3">
                            <h1 id="hours" class="display-1">
                                <input wire:model="hours" class="form-control text-white bg-dark">
                            </h1>
                            <h4 class="text-white">Horas</h4>
                        </div>
                        <div class="col-md-3">
                            <h1 id="minutes" class="display-1">
                                <input wire:model="minutes" class="form-control text-white bg-dark">
                            </h1>
                            <h4 class="text-white">Minutos</h4>
                        </div>
                        <div class="col-md-3">
                            <h1 id="seconds" class="display-1">
                                <input wire:model="seconds" class="form-control text-white bg-dark">
                            </h1>
                            <h4 class="text-white">Segundos</h4>
                        </div>
                    </div>
                </div>
                <p class="text-md-center">
                    <input wire:model="text" class="form-control text-white bg-dark">
                </p>
                <div class="text-md-center">
                    <input wire:model="buttonText" class="btn btn-primary">
                </div>
            </div>
            <!-- Columna 2 -->
            <div class="align-items-between justify-content-center col-md-6">
                <!-- Columna de la imagen -->
                <div class="img-container">
                    <img src="{{ $this->previewImage() }}" class="card-img-top w-200 h-200" alt="imageSrc" style="max-width: 700px; height: 200px;">
                    <input type="file" wire:model="newImage" class="form-control text-white bg-dark"  @if (!$editing) style="display: none;" @endif>
                </div>
            </div>
        </div>
        <div class="text-md-center mt-2">
            <button wire:click="saveChanges" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</footer>