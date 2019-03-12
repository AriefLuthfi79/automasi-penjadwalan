var Days = {
	Init: function() {
		Days.registerEventListeners();
	},

	registerEventListeners: function() {
		$(document).on('click', '.update-day', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			Days.populateEditFields(id);
		})
	},

	populateEditFields: function(id) {
		$.ajax({
			type: 'get',
			url: '/days/' + id,
			success: function(response) {
				$form = $(document).find('#day-update-form');
				$form.find('[name=code_day]').val(response.code_day);
				$form.find('[name=name]').val(response.name);
				$form.attr('action', 'days/update/' + id);

				$('#editModal').modal('show');
			}
		});
	}
}

Days.Init();