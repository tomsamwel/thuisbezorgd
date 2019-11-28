@extends('layouts.admin')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-10 ">
			<h1 class="row justify-content-md-center">Edit Profile</h1>
			<div class="card p-3" style="width: 100%;">
				<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
					@csrf
					@method('PATCH')
					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>



					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

						<div class="col-md-6">
							<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  $user->email }}" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

						<div class="col-md-6">
							<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{  $user->address }}" autofocus>

							@error('address')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('zipcode') }}</label>

						<div class="col-md-6">
							<input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{  $user->zipcode }}" autofocus>

							@error('zipcode')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

						<div class="col-md-6">
							<input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{  $user->city }}" autofocus>

							@error('city')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

						<div class="col-md-6">
							<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{  $user->phone }}" autofocus>

							@error('phone')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('is_admin') }}</label>

						<div class="col-md-6">
							<input id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="{{  $user->is_admin }}" autofocus>

							@error('is_admin')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>


					<div class="form-group row mb-0">
						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Save') }}
							</button>
						</div>
					</div>
				</form>
            </div>

			<h1 class="row justify-content-md-center">{{$user->name}}'s orders </h1>

			@foreach ($user->orders as $order)
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
