@if ($invitation->invitationComponent)
    @foreach ($invitation->invitationComponent as $invi)
        <div>
            <h1>{{ $invi->component->model_type }}</h1>
            @foreach ($invi->component->componentData as $data)
                <div>
                    <p>{{ $data->value }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
@else
    <p>No hay datos en la relación invitation_component.</p>
@endif