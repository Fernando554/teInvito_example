<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-12">
            @if ($isEditing)
                <input wire:model="title" class="form-control justify-content-center text-center">
            @else
                <h2 class="text-center">{{ $title }}</h2>
            @endif
        </div>
        @foreach($images as $index => $image)
            <div class="col-md-4">
                <div class="card text-center">
                    @if ($isEditing || isset($newImages[$index]))
                        <input type="file" wire:model="newImages.{{ $index }}">
                    @else
                    <img src="{{ asset($image) }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        @if ($isEditing)
                        <div wire:ignore>
                            <textarea id="body{{ $index }}" wire:model="texts.{{ $index }}" class="form-control"></textarea>
                        </div>
                        @else
                            <p>{!! $texts[$index] !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        @foreach($images as $index => $image)
            $('#body{{ $index }}').summernote({
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set("texts.{{ $index }}", contents);
                    }
                }
            });
        @endforeach
    });
</script>
