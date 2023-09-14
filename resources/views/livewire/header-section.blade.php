<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    @if ($isEditing)
                        <input wire:model="title" class="form-control">
                        <label for="title">{{ $title }}</label>
                    @else
                        {{ $title }}
                    @endif
                </div>
                <div class="card-body text-center text-wrap">
                    @if ($isEditing)
                        <div wire:ignore>
                            <textarea id="body" wire:model="body" class="form-control"></textarea>
                        </div>
                    @else
                        {!! $body !!}
                    @endif
                    @if ($isEditing)
                        <input wire:model="link" class="form-control">
                        <input wire:model="linkText" class="form-control">
                    @else
                    <a href="{{$link}}" class="btn btn-primary">{{ $linkText }}</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if ($isEditing)
                <input type="file" wire:model="Image">
            @else
            <img src="{{asset('/storage/app/public/' . $Image)}}" alt="Imagen" class="img-fluid" style="max-width: 400px; height: 400px;">
            @endif
        </div>
        @if ($isEditing)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                </div>
                <div class="card-body text-center text-wrap">
                        {!! $body !!}
                        <a href="{{$link}}" class="btn btn-primary">{{ $linkText }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{asset('/storage/app/public/' . $Image)}}" alt="Imagen" class="img-fluid" style="max-width: 400px; height: 400px;">
        </div>
        @endif
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
