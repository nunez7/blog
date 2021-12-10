@extends('admin.index')
@section('content')
<h1>Dashboard</h1>
<p>Usuario autenticado: {{auth()->user()->name}}</p>
@endsection