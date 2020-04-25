const Message = $('.message').data('message');

if (Message) {
	Swal.fire(
		Message,
		' ',
		'success')
}

// flash-dataerror
const Error_message = $('.error_message').data('error_message');

if (Error_message) {
	Swal.fire(
		Error_message,
		' ',
		'error')
}

// button-delete
$('.button-delete').on('click', function (e) {

	e.preventDefault();

	const href = $(this).attr('href');

	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
