@extends('layouts.app')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-10 ">
			<h1 class="row justify-content-md-center">Edit Profile</h1>
			<div class="card p-3" style="width: 100%;">
				<form method="POST" action="{{ route('users.update', $user->id) }}">
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
