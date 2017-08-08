<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ URL::asset('js/jquery.min.js') }}"><\/script>')</script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="{{ URL::asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ URL::asset('js/holder.min.js') }}"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})
</script>