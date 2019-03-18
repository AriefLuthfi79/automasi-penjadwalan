var Students = {
	Init: function() {
		Students.registerEventListeners();
	},

	registerEventListeners: function() {
		$(document).on('click', '.update-student', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			Students.populateEditFields(id);
		});
	},

	populateEditFields: function(id) {
		$.ajax({
			type: 'get',
			url: '/students/' + id,
			success: function(response) {
				$form = $(document).find('#student-update-form');
				$form.find('[name=name]').val(response.name);
				$form.find('[name=divisi]').val(response.divisi);
				$form.find('[name=surname]').val(response.surname);
				$form.attr('action', 'students/update/' + id);
				
				$('#editModal').modal('show');
			}
		});
	}
}

Students.Init();