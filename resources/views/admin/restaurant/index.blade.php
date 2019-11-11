@extends('layouts.app')

@section('content')
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
