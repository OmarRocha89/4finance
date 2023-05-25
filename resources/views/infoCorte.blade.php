@extends('layouts.app')

@section('content')
<div class="px-4">

    <h1>Información de Cortes</h1>

                <info-corte v-bind:id="{{$id}}" ></info-corte>
</div>

@endsection


