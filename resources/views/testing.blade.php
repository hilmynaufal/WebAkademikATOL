<html>
	<body>
		<select id="comboBox">
			@foreach($siswa as $val)
			<option value="{{ $val->nisn }}" data-nama="{{ $val->nama_siswa }}">{{ $val->nisn }}</option>
			@endforeach
		</select>
		<br>
		<input type="text" id="textField">
	</body>

	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

	<script type="text/javascript">
		var $nisn;
		var $nama;
		$('#comboBox').on('change', function() {
			$nisn = this.value;
			$nama = $(this).find(':selected').attr('data-nama');
			$('#textField').val($nama);
		});
	</script>
</html>