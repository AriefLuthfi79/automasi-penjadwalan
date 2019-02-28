@extends('layouts.app')

@section('title')
	Area
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
						@if(count($areas))
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Code</th>
										<th scope="col">Name Area</th>
										<th scope="col">Capacity</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($areas as $area)
										<tr scope="row">
											<td>{{ $loop->iteration }}</td>
											<td>{{ $area->code_area }}</td>
											<td>{{ $area->name }}</td>
											<td>{{ $area->capacity }}</td>
											<td>
												<button class="btn btn-link update-area" data-toggle="modal" data-id="{{ $area->id }}">
													<i class="fa fa-pencil"></i> Edit
												</button> | 
												<a href="{{ route('areas.destroy', $area->id) }}" class="btn btn-link">
													<i class="fa fa-trash"></i> Delete
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<p class="text-center text-danger">No areas available</p>
						@endif
					</div>
				</div>
			</div>

			<!-- Modal -->
			@include('areas.modals')
			<!-- End Modal -->

		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/areas.js') }}" defer></script>
@endsection