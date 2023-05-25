@extends('layouts.app')

@section('content')
<div class="px-4">

    <h1>Información de Clientes</h1>

                <datos-clientes v-bind:id="{{$id}}"></datos-clientes>
</div>

@endsection


  
    