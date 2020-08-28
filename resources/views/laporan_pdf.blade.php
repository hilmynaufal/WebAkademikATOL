<!DOCTYPE html>
<html>
<head>
	<title>PDF Print</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
.column1 {
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row1:after {
	
  content: "";
  display: table;
  clear: both;
}	
	</style>
	<center>
		<h5>RAPOR SEMESTER GANJIL TAHUN PELAJARAN {{ $tahun[0]->tahun_pelajaran }}</h5>
	</center>

	<div class="row1">
		<div class="column1"><center>
			<p>Nama Peserta Didik : {{ $siswa[0]->nama_siswa }}</p>
			<p>NISN : {{ $siswa[0]->nisn }}</p>
			<p>Kelas : {{ $siswa[0]->nama_kelas }}</p>
			</center>
		</div>
		<div class="column1">
			<center>
			<p>Semester : {{ $semester[0]->semester }}</p>
			<p>Tahun Pelajaran : {{ $tahun[0]->tahun_pelajaran }}</p>
			</center>
		</div>
	</div>
	<hr>
	<br>
	<h6>CAPAIAN KOMPETENSI</h6>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th colspan="2">MATA PELAJARAN</th>
				<th>Angka</th>
				<th>Predikat</th>
				<th>Lulus</th>
			</tr>
		</thead>
		<tbody>
			@foreach($nilai as $val)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{$val->nama_pelajaran}}</td>
				<td>{{$val->na}}</td>
				<td>{{$val->predikat}}</td>
				<td>{{$val->kelulusan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>