@extends('layouts.app')

@section('content')
<div class="px-4">

    <h1>Información de Operaciones</h1>

                <info-operaciones v-bind:id="{{$id}}"></info-operaciones>
</div>

@endsection


  
    