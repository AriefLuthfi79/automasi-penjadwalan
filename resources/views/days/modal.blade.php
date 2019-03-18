<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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
								<input type="text" name="code_day" class="form-control" placeholder="Code Day">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Name day">
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
  	<form method="POST" id="day-update-form">
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
								<input type="text" name="code_day" class="form-control" placeholder="Code Day" id="code_day">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Name day" id="name">
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