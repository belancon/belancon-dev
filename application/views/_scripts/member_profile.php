<script type="text/javascript">
$(document).ready(function() {
	$('#photo').change(function(e) {		
		var formData = new FormData($('#form-change-picture')[0]);

		$.ajax({
			url: $('#form-change-picture').attr("action"),
			type: 'POST',
			dataType: 'json',
			data: formData,
			async: false,
			success: function(data) {
				if (data.status === true) {
					$('#img-profile').attr("src", data.path);
					$('#filename').val(data.filename);
				} else {
					alert(data.message);
				}
			},
			cache: false,
			contentType: false,
			processData: false
		});
	});
});
</script>