@extends('layouts.app')

@section('title')
	Day
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
						@if (count($days))
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Code</th>
										<th scope="col">Name</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($days as $day)
									<tr scope="row">
										<td>{{ $loop->iteration }}</td>
										<td>{{ $day->code_day }}</td>
										<td>{{ $day->name }}</td>
										<td>
											<button class="btn btn-link update-day" data-toggle="modal" data-id="{{ $day->id }}">
												<i class="fa fa-pencil"></i> Edit
											</button> | 
											<a class="btn btn-link" href="{{ route('days.destroy', $day->id) }}">
												<i class="fa fa-trash"></i> Delete
											</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						@else
							<p class="text-center text-danger">No days available</p>
						@endif
					</div>
				</div>
			</div>

			<!-- Modal -->
			@include('days.modal')
			<!-- End Modal -->

		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/days.js') }}" defer></script>
@endsection