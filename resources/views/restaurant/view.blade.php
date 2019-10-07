@extends('layouts.app')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-auto mt-4">
			<div class="card" style="width: 100%;">
				<img class="card-img-top" src="{{asset('storage/'.$restaurant->photo)}}" alt="{{$restaurant->name}} photo" >
				<div class="card-body">
					<h5 class="card-title">{{$restaurant->name}}</h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">{{$restaurant->city}}</li>
					<li class="list-group-item">{{$restaurant->address}}</li>
					<li class="list-group-item">{{$restaurant->phone}}</li>
					<li class="list-group-item">{{$restaurant->email}}</li>
				</ul>
            </div>
		</div>
    </div>
	<hr/>
	<h4>main courses</h4>
	<div class="row">

		@foreach ($main as $p)
			<div class="col-md-4 mt-4">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="{{asset('storage/'.$p->photo)}}" alt="{{$p->name}} photo" >
					<div class="card-body">
						<h5 class="card-title">{{$p->name}}</h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">{{$p->price}}</li>

					</ul>
				</div>
			</div>

		@endforeach
	</div>
	<hr/>
	<h4>sides</h4>
	<div class="row">

		@foreach ($sides as $p)
			<div class="col-md-4 mt-4">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="{{asset('storage/'.$p->photo)}}" alt="{{$p->name}} photo" >
					<div class="card-body">
						<h5 class="card-title">{{$p->name}}</h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">{{$p->price}}</li>

					</ul>
				</div>
			</div>

		@endforeach
	</div>
	<hr/>
	<h4>Drinks</h4>
	<div class="row">

		@foreach ($drinks as $p)
			<div class="col-md-4 mt-4">
				<div class="card" style="width: 100%;">
					<img class="card-img-top" src="{{asset('storage/'.$p->photo)}}" alt="{{$p->name}} photo" >
					<div class="card-body">
						<h5 class="card-title">{{$p->name}}</h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">{{$p->price}}</li>

					</ul>
				</div>
			</div>

		@endforeach
	</div>
</div>
@endsection
