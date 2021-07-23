@extends('layout.master')

@section('title','Mingalar par');

@section('content')
	<div class="container">
		<h1>Name is {{$name}} and location is {{$location}}</h1>	
		<div class="btn btn-danger">primary button</div>
	</div>
@endsection