@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				Created! click <a href="{{ route('book.show',['book' => $bookId]) }}">here</a>here to view your book
			</div>
		</div>
	</div>

@endsection