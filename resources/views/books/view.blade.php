@extends('layouts.app')
@section('css')
	<style>
		h3{
			margin-top: 0px;
		}
		hr {
			border-bottom: 1px solid #DBDBDB !important;
		}
		.bookinfo-container{
			font-size: 19px;
			line-height: 24px;
		}
	</style>
@endsection
@section('content')
	<div class="container bookinfo-container">
		<div class="col-md-8">
			<div class="col-md-12">
				<h2>{{ $book->name }}</h2>
				<p><span>Univeristy: </span> {{ $book->university->name }}</p>
				@if($book->price)
				<p><span>Price: </span> {{ $book->price }} AUD</p>
				@else
				<p>Sold for free</p>
				@endif
			</div>
			<div class="col-md-12">
				<hr>
			</div>
			<div class="col-md-4">
				<h3>Contact</h3>
			</div>
			<hr>
			<div class="col-md-8">
				<div><p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $book->user->name }}</p></div>
				@if($book->phone)
				<div><p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ $book->phone }}</p></div>
				@endif
				@if($book->email)
				<div><p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ $book->email }}</p></div>
				@endif
			</div>
			<div class="col-md-12">
				<hr>
			</div>
			<div class="col-md-4">
				<h3>Description</h3>
			</div>
			<div class="col-md-8">
				{{ $book->description}}
			</div>
		</div>
		<div class="col-md-4">
			@if(json_decode($book->images)->url)
			<img src="{{ json_decode($book->images)->url}}" alt="" style="width: 100%;
    height: auto;">
			@else
			<img src="" alt="" style="  width: 100%;
    height: auto;">
    		@endif
		</div>
	</div>
@endsection
