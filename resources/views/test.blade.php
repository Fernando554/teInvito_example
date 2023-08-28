@foreach ($invitation->invitation_component as $invi)
    <div>
        <h1>{{ $invi->component->model_type}}</h1>
        @foreach ($invi->component->component_data as $data)
            <div>
                <p>{{ $data->value }}</p>
            </div>
        @endforeach
    </div>
@endforeach