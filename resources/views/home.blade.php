@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h1><span style="color:#163a63 !important;font-weight: 700">Unibooks</span> find your textbook or every book sold like 'new again'</h1>
		</div>
	</div>
	<div class="row">
			<searchbox></searchbox>
	</div>
	<div class="row">
		<tabs></tabs>
	</div>
</div>
@endsection
