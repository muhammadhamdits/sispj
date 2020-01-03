<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/chartist/css/chartist-custom.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/toastr/toastr.min.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}"> -->
	<!-- GOOGLE FONTS -->
	<link href="{{ url('assets/font/source_sans_pro.css') }}" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ url('assets/img/favicon.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		@yield('navbar')
		@yield('sidebar')
		<!-- MAIN -->
		@yield('main')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Copyright &copy2019 <a href="#">Integer'8</a></p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ url('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ url('assets/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ url('assets/vendor/toastr/toastr.min.js') }}"></script>
	<script src="{{ url('assets/scripts/klorofil-common.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
	function remove(id) {
		const swalWithBootstrapButtons = Swal.mixin({
			buttonsStyling: true
		});

		swalWithBootstrapButtons.fire({
		title: 'Anda yakin menghapus data ini?',
		text: "Data akan terhapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya!',
		cancelButtonText: 'Tidak!',
		reverseButtons: false
		}).then((result) => {
			if (result.value) {
				$('#data-'+id).submit();
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				swalWithBootstrapButtons.fire({
				title: 'Dibatalkan',
				text: 'Data tidak jadi dihapus :)',
				icon: 'error',
				timer: 1000,
				showConfirmButton: false
				})
			}
		})
    }
	</script>
</body>

</html>
