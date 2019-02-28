var Areas = {
	Init: function() {
		Areas.registerEventListeners();
	},

	registerEventListeners: function() {
		$(document).on('click', '.update-area', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			Areas.populateEditFields(id);
		});
	},

	populateEditFields: function(id) {
		$.ajax({
			type: 'get',
			url: '/areas/' + id,
			success: function(response) {
				$form = $(document).find('#area-update-form');
				$form.find('[name=code_area]').val(response.code_area);
				$form.find('[name=name]').val(response.name);
				$form.find('[name=capacity]').val(response.capacity);
				$form.attr('action', 'areas/update/' + id);

				$('#editModal').modal('show');
			}
		});
	}
}

Areas.Init();