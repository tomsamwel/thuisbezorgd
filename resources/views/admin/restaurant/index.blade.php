@extends('layouts.admin')

@section('content')
<div class="container ">
	<div class="row justify-content-md-center">
		<div class="col-md-12 ">
			<h3>All Restaurants</h3>
			<table class="table table-sm table-hover table-striped">
				<thead class="thead-dark">
					<tr>
						<th class="col">ID</th>
						<th class="col">Owner_id</th>
						<th class="col">kvk</th>
						<th class="col">name</th>
						<th class="col">address</th>
						<th class="col">zipcode</th>
						<th class="col">city</th>
						<th class="col">phone</th>
						<th class="col">email</th>
						<th class="col"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($restaurants as $restaurant)
					<tr>
						<td>{{$restaurant->id}}</td>
						<td>{{$restaurant->user_id}}</td>
						<td>{{$restaurant->kvk}}</td>
						<td>{{$restaurant->name}}</td>
						<td>{{$restaurant->address}}</td>
						<td>{{$restaurant->zipcode}}</td>
						<td>{{$restaurant->city}}</td>
						<td>{{$restaurant->phone}}</td>
						<td>{{$restaurant->email}}</td>
						<td>
							<form class="delete" method="POST" action="{{ route('admin.restaurants.destroy', $restaurant->id) }}">
							@csrf
							@method('DELETE')
								<div class="btn-group">
									<a href="{{route("restaurants.show", $restaurant->id)}}" class="btn btn-sm btn-success">View </a>
									<a href="{{route("admin.restaurants.edit", $restaurant->id)}}" class="btn btn-sm btn-primary">Edit </a>
									<button type="submit" class="btn btn-sm btn-danger">Remove</button>
								</div>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-auto "> {{ $restaurants->links() }}</div>

</div>

</div>
@endsection
