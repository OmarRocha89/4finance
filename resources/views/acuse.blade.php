@extends('layouts.app')

@section('content')
<div class="px-4">

<h1>información Acuse</h1>



<vista-acuse v-bind:id="'{{$id}}'" ></vista-acuse>

</div>

@endsection


  


