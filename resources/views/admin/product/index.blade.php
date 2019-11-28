@extends('layouts.admin')


@section('content')

<div class="container ">
		<div class="row justify-content-md-center">
			<div class="col-md-12">
				<h3>All Products</h3>
				<table class="table table-md table-hover table-striped">
					<thead class="thead-dark">
						<tr>
							<th class="">ID</th>
							<th class="">restaurant ID</th>
							<th class="">name</th>
							<th class="">price</th>
							<th class="">category</th>
							<th class=""></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td>{{$product->restaurant_id}}</td>
							<td>{{$product->name}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->category}}</td>
							<td>

								<form class="delete" method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
								@csrf
								@method('DELETE')
									<div class="btn-group">
										<a href="{{route("admin.products.edit", $product->id)}}" class="btn btn-sm btn-primary">Edit </a>
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
	<div class="row justify-content-md-center"> {{ $products->links() }}</div>
</div>
@endsection
