@extends('layouts.view')
@section('content')
    @livewire('page-builder-index')
    @livewireScripts
@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $('#body').summernote();
  });
</script>
@endsection