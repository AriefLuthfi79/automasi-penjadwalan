@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						{{ $title }}

						<button class="btn btn-primary float-right" data-toggle="modal" data-target="#myModalCenter">
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
											<form action="{{ route('days.destroy', $day->id) }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button class="btn btn-link">
													<i class="fa fa-trash"></i> Delete
												</button>
											</form>
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
			<div class="modal fade" id="myModalCenter" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			  	<form action="{{ route('days.store') }}" method="POST">
						{{ csrf_field() }}
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="modalTitle">New Day</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Code</label>
											<input type="text" name="code_day" class="form-control">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
								</div>
							</div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button class="btn btn-primary">Save changes</button>
				      </div>
			    	</div>
			    </form>
			  </div>
			</div>
			<!-- End Modal -->

		</div>
	</div>
@endsection