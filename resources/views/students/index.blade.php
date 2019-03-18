@extends('layouts.app')

@section('title')
	Student
@endsection

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						{{ $title }}

						<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
							<i class="fa fa-plus"></i> New
						</button>
					</div>

					<div class="card-body">
						@if (count($students))
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Divisi</th>
										<th scope="col">Surname</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($students as $student)
									<tr scope="row">
										<td>{{ $loop->iteration }}</td>
										<td>{{ $student->name }}</td>
										<td>{{ $student->divisi }}</td>
										<td>{{ $student->surname }}</td>
										<td>
											<button class="btn btn-link update-student" data-toggle="modal" data-id="{{ $student->id }}">
												<i class="fa fa-pencil"></i> Edit
											</button> |
											<a class="btn btn-link" href="{{ route('students.destroy', $student->id) }}">
												<i class="fa fa-trash"></i> Delete
											</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						@else
							<p class="text-center text-danger">No student available</p>
						@endif
					</div>
				</div>
			</div>

			{{-- Modal --}}

			@include('students.modal')
			
			{{-- End Modal --}}
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/students.js') }}" defer></script>
@endsection
