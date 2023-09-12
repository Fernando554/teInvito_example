@extends('layouts.view')
@section('content')
    @foreach($invitation->invitationComponent as $component)
       @livewire($component->component->model_type, ['data' => $component->component->componentDataOrder()])
    @endforeach
    @livewireScripts
@endsection
