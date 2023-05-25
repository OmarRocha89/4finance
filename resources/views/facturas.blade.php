@extends('layouts.app')

@section('content')
<div class="px-4">

  <h1>facturas</h1>


  @isset($result)
  <div class="alert alert-success" role="alert">
    {{ $result }}
</div>
@endisset
 



                <todas-facturas></todas-facturas>
</div>

@endsection


  
    