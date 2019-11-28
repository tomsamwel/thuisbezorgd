@extends('layouts.app')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-10 ">
			<h1 class="row justify-content-md-center">My orders</h1>

			@foreach ($orders as $order)
			<h4 class="row justify-content-md-center">{{ $order->restaurant->name }} at {{$order->created_at}}</h4>
			<table class="table table-hover table-striped" >
				<thead class="thead-dark">
					<tr>
						<th class="">Product ID</th>
						<th class="">Product</th>
						<th class="">Quantity</th>
						<th class="">Price per product</th>
						<th class="">Price</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($order->order_products as $order_product)
					<tr>
						<td>{{$order_product->product->id}}</td>
						<td>{{$order_product->product->name}}</td>
						<td>{{$order_product->quantity}}</td>
						<td>{{$order_product->eurprice}}</td>
						<td>€ {{number_format($order_product->quantity*$order_product->price/100,2)}}</td>
					</tr>
					@endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>total</td>
						<td>{{$order->total}}</td>
					</tr>
				</tbody>
			</table>
			@endforeach

		</div>
    </div>
</div>
@endsection
