<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="{{ route('areas.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">New Area</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Code</label>
								<input type="text" name="code_area" class="form-control" placeholder="Code Area">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Name Area</label>
								<input type="text" name="name" class="form-control" placeholder="Name Area">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Capacity</label>
								<input type="number" name="capacity" class="form-control" placeholder="Capacity">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Save Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="POST" id="area-update-form">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">New Area</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Code Area</label>
								<input type="text" name="code_area" class="form-control" placeholder="Code Area">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Name Area</label>
								<input type="text" name="name" class="form-control" placeholder="Name Area">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Capacity</label>
								<input type="number" name="capacity" class="form-control" placeholder="Capacity">
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Update Changes</button>
				</div>
			</div>
		</form>
	</div>
</div>