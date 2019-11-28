@extends('layouts.admin')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-10 ">
			<h1 class="row justify-content-md-center">Edit Product</h1>
			<div class="card p-3" style="width: 100%;">
				<form method="POST" action="{{ route('admin.products.update', $product->id) }}">
					@csrf
					@method('PATCH')

					<div class="form-group row">
						<label for="id" class="col-md-4 col-form-label text-md-right">{{ __('id') }}</label>

						<div class="col-md-6">
							<input id="id" type="text" class="form-control @error('name') is-invalid @enderror" name="id" value="{{ $product->id }}" disabled>
						</div>
					</div>

					<div class="form-group row">
						<label for="restaurant_id" class="col-md-4 col-form-label text-md-right">{{ __('restaurant id') }}</label>

						<div class="col-md-6">
							<input id="restaurant_id" type="text" class="form-control @error('restaurant_id') is-invalid @enderror" name="restaurant_id" value="{{ $product->restaurant_id }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

						<div class="col-md-6">
							<input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="category" class="col-md-4 col-form-label text-md-right">{{ __('category') }}</label>

						<div class="col-md-6">
							<select class="form-control" name="category" required value>
								<option value="0" @if ($product->category === 0) {{ "selected" }}@endif>drinks</option>
								<option value="1" @if ($product->category === 1) {{ "selected" }}@endif>sides</option>
								<option value="2" @if ($product->category === 2) {{ "selected" }}@endif>main</option>

							</select>
							@error('category')
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
