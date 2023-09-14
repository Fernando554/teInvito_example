<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if ($isEditing)
                        <input wire:model="title1" class="form-control">
                        <input wire:model="title2" class="form-control">
                    @else
                        {{ $title1 }}
                        {{ $title2 }}
                    @endif
                </div>
            </div>
            <div>
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
            </div> 
            <div>
                    @if ($isEditing)
                        <div wire:ignore>
                            <textarea id="body" wire:model="text" class="form-control"></textarea>
                        </div>
                    @else
                        {!! $text !!}
                    @endif
                </div>
            <div>
                @if ($isEditing)
                    <input wire:model="link" class="form-control">
                    <input wire:model="linkText" class="form-control">
                @else
                    <a href="{{$link}}" class="btn btn-primary">{{ $linkText }}</a>
                @endif    
            </div> 
        </div>
        <div class="col-md-4">
            @if ($isEditing)
                <input type="file" wire:model="Image">
            @else
                <img src="{{asset('/storage/app/public/' . $Image)}}" alt="Imagen" class="img-fluid" style="max-width: 400px; height: 400px;">
            @endif
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#body').summernote({
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('body', contents);
                }
            }
        });
    });
</script>
