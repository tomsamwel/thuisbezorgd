@extends('layouts.admin')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-auto mt-4">
			<div class="card" style="width: 100%;">
				<img class="card-img-top" src="{{asset('storage/'.$restaurant->photo)}}" alt="{{$restaurant->name}} photo" >
				<div class="card-body">
					<h5 class="card-title">{{$restaurant->name}} - {{ $restaurant->IsOpen ? "Open" : "Closed" }}</h5>
					<a href="{{route('products.create', 'restaurant_id='.$restaurant->id)}}">
						<button type="button" class="btn btn-outline-info">Add product</button>
					</a>
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
	@foreach ($categories as $name => $c)
		<hr/>
		<h4 class="row justify-content-md-center">{{ $name }}</h4>
		<div class="row">

			@foreach ($c as $p)
				<div class="col-md-4 mt-4">
					<div class="card" style="width: 100%;">
						<img class="card-img-top" src="{{asset('storage/'.$p->photo)}}" alt="{{$p->name}} photo" >
						<div class="card-body">
							<h5 class="card-title">{{$p->name}}</h5>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">{{$p->eurprice}}</li>
							@if (Auth::id() == $restaurant->user_id)
								<form class="delete" method="POST" action="{{ route('products.destroy', $p->id) }}">
									@csrf
									@method('DELETE')
									<li class="list-group-item">
										<a href="{{route('products.edit', $p->id)}}">
											<button type="button" class="btn btn-outline-info">edit</button>
										</a>
										<button type="submit" class="btn btn-outline-danger">Remove</button>
									</li>
								</form>
							@endif

						</ul>
					</div>
				</div>
			@endforeach
		</div>
	@endforeach

</div>
@endsection
