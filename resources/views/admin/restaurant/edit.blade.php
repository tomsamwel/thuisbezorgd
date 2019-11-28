@extends('layouts.admin')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-10 ">
			<h1 class="row justify-content-md-center">Edit Restaurant</h1>
			<div class="card p-3" style="width: 100%;">
				<form method="POST" action="{{ route('admin.restaurants.update', $restaurant->id) }}">
					@csrf
					@method('PATCH')

					<div class="form-group row">
						<label for="id" class="col-md-4 col-form-label text-md-right">{{ __('id') }}</label>

						<div class="col-md-6">
							<input id="id" type="text" class="form-control @error('name') is-invalid @enderror" name="id" value="{{ $restaurant->id }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('owner_id') }}</label>

						<div class="col-md-6">
							<input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ $restaurant->user_id }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $restaurant->name }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="kvk" class="col-md-4 col-form-label text-md-right">{{ __('Kvk') }}</label>

						<div class="col-md-6">
							<input id="kvk" type="text" class="form-control @error('kvk') is-invalid @enderror" name="kvk" value="{{ $restaurant->kvk }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

						<div class="col-md-6">
							<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $restaurant->address }}" autofocus>
						</div>
					</div>


					<div class="form-group row">
						<label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('zipcode') }}</label>

						<div class="col-md-6">
							<input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $restaurant->zipcode }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

						<div class="col-md-6">
							<input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $restaurant->city }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

						<div class="col-md-6">
							<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $restaurant->phone }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

						<div class="col-md-6">
							<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $restaurant->email }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="open" class="col-md-4 col-form-label text-md-right">{{ __('open') }}</label>

						<div class="col-md-6">
							<input id="open" type="text" class="form-control @error('open') is-invalid @enderror" name="open" value="{{ $restaurant->open }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="close" class="col-md-4 col-form-label text-md-right">{{ __('close') }}</label>

						<div class="col-md-6">
							<input id="close" type="text" class="form-control @error('close') is-invalid @enderror" name="close" value="{{ $restaurant->close }}" autofocus>
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
		</div>
    </div>
</div>
@endsection
