@extends('layouts.app')


@section('content')

<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-10 ">
			<h1 class="row justify-content-md-center">Edit product</h1>
			<div class="card p-3" style="width: 100%;">
				<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="form-group row">
						<label for="photo" class="col-md-4 col-form-label text-md-right">
							photo
						</label>

						<div class="col-md-6">
							<input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" >

							@error('photo')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

						<div class="col-md-6">
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" autofocus>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
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

					<div class="form-group row">
						<label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

						<div class="col-md-6">
							<input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" autofocus>

							@error('price')
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
