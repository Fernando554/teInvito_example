@extends('layouts.view')
@section('content')
    @livewire('page-builder')
    @livewireScripts
@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $('#body').summernote();
  });
</script>
@endsection