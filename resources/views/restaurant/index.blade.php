@extends('layouts.app')

@section('page-js-files')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stop

@section('page-style-files')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12"><h2>Search for a restaurant</h2></div>
        <div class="col-12">
            <div id="custom-search-input">
                <div class="input-group">
                    <input id="search" name="search" type="text" class="form-control" placeholder="Search" />
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="container ">
    <div class="row justify-content-md-center">
        <div class="col-md-auto "> <h3>All Restaurants</h3></div>
        <div class="row">
			@foreach ($restaurants as $r)
				<div class="col-md-4 mt-4">
					<div class="card" style="width: 100%;">
						<img class="card-img-top" src="{{asset('storage/'.$r->photo)}}" alt="{{$r->name}} photo" >
						<div class="card-body">
							<h5 class="card-title">{{$r->name}} - {{ $r->IsOpen ? "Open" : "Closed" }}</h5>

							<a href="{{route("restaurants.show", $r->id)}}" class="btn btn-primary">View restaurant</a>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">{{$r->city}}</li>
							<li class="list-group-item">{{$r->address}}</li>
							<li class="list-group-item">{{$r->phone}}</li>
							<li class="list-group-item">{{$r->email}}</li>
						</ul>
		            </div>
				</div>

			@endforeach
        </div>
		<div class="col-md-auto "> {{ $restaurants->links() }}</div>

    </div>

</div>
@endsection


@section('page-js-script')
<script type="text/javascript">

</script>
@stop
