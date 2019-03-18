<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form action="{{ route('students.store') }}" method="POST">
			{{ csrf_field() }}
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalTitle">New Student</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Student Name">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Divisi</label>
								<input type="text" name="divisi" class="form-control" placeholder="Division name">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Surname</label>
								<input type="text" name="surname" class="form-control" placeholder="Surname">
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form method="POST" id="student-update-form">
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
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Student Name">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Divisi</label>
								<input type="text" name="divisi" class="form-control" placeholder="Division name">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Surname</label>
								<input type="text" name="surname" class="form-control" placeholder="Surname">
							</div>
						</div>
					</div>
				</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button class="btn btn-primary">Update changes</button>
	      </div>
    	</div>
    </form>
  </div>
</div>