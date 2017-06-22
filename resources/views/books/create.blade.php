@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12">
					<h1>Hi, {{Auth::user()->name}}! Let's start list your book</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<create-book-form></create-book-form>
		</div>
	</div>

@endsection