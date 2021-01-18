@extends('layouts.app')

@section('content')

Implicit Callback.
<script>
(function () {
    var hash = window.location.hash;
    console.log(hash);
})();
</script>

@endsection