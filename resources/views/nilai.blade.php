@extends('home')



@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-paperclip mr-2"></i>NILAI</h3><hr>
   <label>Cari Siswa: </label>
    <select id="nama">
     <option selected disabled value="">-- Nama Siswa --</option>
      @foreach ($siswa as $val)
       <option value="{{$val->Nisn}}">{{$val->nama_siswa}}</option>
            
         @endforeach
     </select>
     <a href="/nilai" id="btnCari" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Cari</a>
     <br>
     <br>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th style="display:none" scope="col">NISN</th>
      <th scope="col">Nama</th>
      <th style="display:none" scope="col">Pelajaran</th>
      <th scope="col">Pelajaran</th>
      <th scope="col">UTS</th>
      <th scope="col">UAS</th>
      <th scope="col">Nilai Akhir</th>
      <th scope="col">Kelulusan</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($nilai as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td style="display:none">{{ $val->Nisn }}</td>
      <td>{{ $val->nama_siswa }}</td>
      <td style="display:none">{{ $val->kode_pelajaran }}</td>
      <td>{{ $val->nama_pelajaran }}</td>
      <td>{{ $val->uts}}</td>
      <td>{{ $val->uas}}</td>
      <td>{{ $val->na}}</td>
      <td>{{ $val->hm}}</td>

        
          <td><a class="fas fa-edit bg-warning p-2 text-white rounded edit-modal-click" data-Nisn="{{ $val->Nisn }}" data-kode-pelajaran="{{ $val->kode_pelajaran }}">EDIT</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $val->Nisn }}', '{{ $val->kode_pelajaran }}')"" data-target="#DeleteModal" class="fas fa-trash bg-danger p-2 text-white rounded">DELETE</a></td>

    </tr>
    @endforeach



  </tbody>
</table>

</div>

<div class="modal fade" id="CreateModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/nilai/tambah" method="post">
              @csrf
                <div class="form-group">
                  <label>Nama Siswa</label>
                    <select class="form-control form-control-md" name="Nisn">
                      <option selected disabled value="">-- Nama Siswa --</option>
                        @foreach ($siswa as $val)
                         <option value="{{$val->Nisn}}">{{$val->nama_siswa}}</option>
                        @endforeach
                      </select>      
                  </div>

                <div class="form-group">
                  <label>Nama Pelajaran</label>
                    <select class="form-control form-control-md" name="kode_pelajaran">
                      <option selected disabled value="">-- Nama Pelajaran --</option>
                        @foreach ($pelajaran as $val)
                         <option value="{{$val->kode_pelajaran}}">{{$val->nama_pelajaran}}</option>
                        @endforeach
                      </select>      
                  </div>
                  <div class="form-group">
                  <label>Nilai UTS</label>
            <input type="number" name="uts" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Nilai UAS</label>
            <input type="number" name="uas" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Nilai Akhir</label>
            <input type="number" name="na" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Lulus</label>
                 <select class="form-control form-control-md" name="hm">
                      <option selected disabled value="">-- Kelulusan --</option>
                         <option value="T">Tidak Lulus</option>
                         <option value="L">Lulus</option>
                      </select>
          </div>
          <div class="modal-footer">  
        <button type="submit" class="btn btn-success" data-dissmis="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/nilai/update" method="post">
              @csrf
              <div class="form-group" hidden>
                  <label>NISN</label>
            <input type="text" name="OldNisn" id="edit-Nisn" class="form-control">      
          </div>
                <div class="form-group">
                  <label>Nama Siswa</label>
                    <select class="form-control form-control-md" id="edit-nama_siswa" name="Nisn">
                      <option selected disabled value="">-- Nama Siswa --</option>
                        @foreach ($siswa as $val)
                         <option value="{{$val->Nisn}}">{{$val->nama_siswa}}</option>
                        @endforeach
                      </select>      
                  </div>
                  <div class="form-group" hidden>
                  <label>Kode Pelajaran</label>
            <input type="text" name="Oldkode_pelajaran" id="edit-kode_pelajaran" class="form-control">      
          </div>
                <div class="form-group">
                  <label>Nama Pelajaran</label>
                    <select class="form-control form-control-md" id="edit-nama_pelajaran" name="kode_pelajaran">
                      <option selected disabled value="">-- Nama Pelajaran --</option>
                        @foreach ($pelajaran as $val)
                         <option value="{{$val->kode_pelajaran}}">{{$val->nama_pelajaran}}</option>
                        @endforeach
                      </select>      
                  </div>
                  <div class="form-group">
                  <label>Nilai UTS</label>
            <input type="number" name="uts" id="edit-uts" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Nilai UAS</label>
            <input type="number" name="uas" id="edit-uas" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Nilai Akhir</label>
            <input type="number" name="na" id="edit-na" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Lulus</label>
                 <select class="form-control form-control-md" id="edit-hm" name="hm">
                      <option selected disabled value="">-- Kelulusan --</option>
                         <option value="T">Tidak Lulus</option>
                         <option value="L">Lulus</option>
                      </select>
          </div>
          <div class="modal-footer">  
        <button type="submit" class="btn btn-success" data-dissmis="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="get">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('GET') }}
                 <p class="text-center">Anda Yakin Ingin Menghapus User Ini? ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

  var $id;

  $('#nama').on('change', function() {
    $id = this.value;
    $('#btnCari').prop("href", "/nilai/" + $id);
  })

  $(document).on("click", ".edit-modal-click", function () {
    var nisn = $(this).attr('data-Nisn');
    var kode_pelajaran = $(this).attr('data-kode-pelajaran');
    var rowCells = $(this).closest("tr").children(); 
    var uts = rowCells.eq(5).text();
    var uas = rowCells.eq(6).text();
    var na = rowCells.eq(7).text();
    var hm = rowCells.eq(8).text();
    $('#edit-Nisn').val(nisn);
    $('#edit-kode_pelajaran').val(kode_pelajaran);
    $('#edit-nama_siswa').val(nisn);
    $('#edit-nama_pelajaran').val(kode_pelajaran);
    $('#edit-uts').val(uts);
    $('#edit-uas').val(uas);
    $('#edit-na').val(na);
    $('#edit-hm').val(hm);
    $('#EditModal').modal('show');
    });


  function deleteData(id, id2) {
         var id = id;
         var id2 = id2;
         var url = "nilai/hapus/id/pelajaran/id2";
         url = url.replace('id', id);
         url = url.replace('id2', id2);
         $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
         $("#deleteForm").submit();
  }
</script>

@endsection