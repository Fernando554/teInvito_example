<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-12">
            <input type="text" wire:model="title" class="form-control justify-content-center text-center">
        </div>
        @foreach($images as $index => $image)
            <div class="col-md-4">
                <div class="card text-center">
                    <img src="{{ $this->previewImage($index) }}" class="card-img-top w-200 h-200" alt="Imagen {{ $index + 1 }}">
                    <div class="card-body">
                        <input type="text" wire:model="texts.{{ $index }}" class="form-control">
                        @if ($isEditing)
                            <input type="file" wire:model="newImages.{{ $index }}">
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-3">
            <button wire:click="saveChanges" class="btn btn-primary">Guardar</button>
    </div>
</div>
