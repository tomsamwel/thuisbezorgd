@extends('layouts.admin')

@section('content')
<div class="container ">
    <div class="row justify-content-md-center">
		<div class="col-md-12 "> <h3>All Users</h3></div>
			<table class="table table-hover table-striped" >
				<thead class="thead-dark">
					<tr>
						<th class="">ID</th>
						<th class="">Name</th>
						<th class="">Email</th>
						<th class="">Address</th>
						<th class="">zipcode</th>
						<th class="">city</th>
						<th class="">phone</th>
						<th class="">admin</th>
						<th class=""></th>

					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->address}}</td>
						<td>{{$user->zipcode}}</td>
						<td>{{$user->city}}</td>
						<td>{{$user->phone}}</td>
						<td>{{$user->is_admin ? "admin" : "-"}}</td>
						<td>
							<form class="delete" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
							@csrf
							@method('DELETE')
								<div class="btn-group">
									<a href="{{route("admin.users.edit", $user->id)}}" class="btn btn-sm btn-primary">Edit</a>
									<button type="submit" class="btn btn-sm btn-danger">Remove</button>
								</div>
							</form>
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>

        </div>
		<div class="col-md-auto "> {{ $users->links() }}</div>

    </div>

</div>
@endsection
