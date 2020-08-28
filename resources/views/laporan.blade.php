@extends('test')

@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fa fa-paperclip mr-2"></i>LAPORAN</h3><hr>
   <label>Nama Siswa: </label>
    <select id="nama">
     <option selected disabled value="">-- Nama Siswa --</option>
      @foreach ($siswa as $val)
       <option value="{{$val->nisn}}">{{$val->nama_siswa}}</option>
            
         @endforeach
     </select>
     <br>
     <label id="labelTahun">Tahun Pelajaran: </label>
     <select id="tahun">
     <option selected disabled value="">-- Tahun Pelajaran --</option>
      @foreach ($tahun as $val)
       <option value="{{$val->id_tahun}}">{{$val->tahun_pelajaran}}</option>
            
         @endforeach
     </select><br>
     <label id="labelSemester">Semester: </label>
     <select id="semester">
     <option selected disabled value="">-- Semester --</option>
      @foreach ($semester as $val)
       <option value="{{$val->id_semester}}">{{$val->semester}}</option>
            
         @endforeach
     </select>
     <a href="laporan#" id="btnCari" class="btn btn-primary mr-3"><i class= "fa fa-print mr-2"></i></i>Cetak</a>
     <br>
     <br>
</div>
</div>

@endsection

@section('js')

<script type="text/javascript">
  
  var $nama;
  var $tahun;
  var $semester;

  $( document ).ready(function() {
    console.log( "ready!" );
    $('#labelTahun').hide();
    $('#tahun').hide();
    $('#labelSemester').hide();
    $('#semester').hide();
  });

  $('#nama').on('change', function() {
    $nama = this.value;
    $('#labelTahun').show();
    $('#tahun').show();
  })

  $('#tahun').on('change', function() {
    $tahun = this.value;
    $('#labelSemester').show();
    $('#semester').show();
  })

  $('#semester').on('change', function() {
    $semester = this.value;
    $('#labelSemester').show();
    $('#semester').show();
    $('#btnCari').prop("href", "/laporan/cetak_pdf/" + $nama + "/tahun/" + $tahun + "/semester/" + $semester);
  })

</script>

@endsection