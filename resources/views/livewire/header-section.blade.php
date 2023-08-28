<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if ($isEditing)
                        <input wire:model="title" class="form-control">
                    @else
                        {{ $title }}
                    @endif
                </div>
                <div class="card-body text-center text-wrap">
                    @if ($isEditing)
                        <textarea wire:model="body" class="form-control"></textarea>
                    @else
                        {{ $body }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="https://assets.xboxservices.com/assets/e4/30/e4304c2b-0e62-4e66-8c17-dfaabeb96b44.jpg?n=224099_Super-Hero-1400_Hero_1920x1080.jpg" alt="Imagen" class="img-fluid" style="max-width: 400px; height: 400px;">
        </div>
        <div class="mt-3">
            @if ($isEditing)
                <button wire:click="saveChanges" class="btn btn-primary">Guardar</button>
            @else
                <button wire:click="toggleEditMode" class="btn btn-secondary">Editar</button>
            @endif
        </div>
    </div>
</div>