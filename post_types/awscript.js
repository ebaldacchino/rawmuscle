jQuery(function ($) {
	$('body').on('click', '.stripper_upload_image_button', function (e) {
		e.preventDefault();

		var button = $(this),
			stripper_uploader = wp
				.media({
					title: 'Secondary image',
					library: {
						uploadedTo: wp.media.view.settings.post.id,
						type: 'image',
					},
					button: {
						text: 'Use this image',
					},
					multiple: false,
				})
				.on('select', function () {
					var attachment = stripper_uploader
						.state()
						.get('selection')
						.first()
						.toJSON();
					$('#_stripper_custom_image').val(attachment.url);
				})
				.open();
	});
});
