@extends('layout.master')

@section('title','Home')

@section('content')
	<div class="container">
		<div class="row">
			<h2>This is about page.</h2>
			<ul>
				@if(count($persons) > 0)
					@foreach ($persons as $person)
						<h2>{{$person}}</h2>
					@endforeach
		    	@else
		    		<h2>No Data in Array</h2>
		    	@endif	
			</ul>
			
		</div>
	</div>
@endsection