@extends('home')

@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-paperclip mr-2"></i>GURU</h3><hr>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nip</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kelas Wali</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($guru as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->Nip }}</td>
      <td>{{ $val->nama_guru}}</td>
      <td>{{ $val->jk}}</td>
      <td>{{ $val->tanggal_lahir}}</td>
      <td>{{ $val->alamat}}</td>
      <td>{{ $val->kelas_wali}}</td>
        
          <td><a class="fas fa-edit bg-warning p-2 text-white rounded edit-modal-click" data-id="{{ $val->Nip }}">EDIT</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData({{$val->Nip}})" data-target="#DeleteModal" class="fas fa-trash bg-danger p-2 text-white rounded">DELETE</td>

    </tr>
    @endforeach



  </tbody>
</table>

</div>

<div class="modal fade" id="CreateModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/guru/tambah" method="post">
              @csrf
                <div class="form-group">
                  <label>Nip</label>
                    <input type="text" name="Nip" class="form-control">      
                  </div>

                 <div class="form-group">
                  <label>Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Jenis Kelamin</label>
            <select class="form-control form-control-sm" name="jenis_kelamin">
              <option selected disabled value="">-- Please Select --</option>
              <option value="L">L</option>
              <option value="P">P</option>
            </select>  
          </div>
          <div class="form-group">
                  <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control">
          </div>
          <div class="form-group">
                  <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
          </div>
          <div class="form-group">
                  <label>Kelas Wali</label>
            <input type="text" name="kelas_wali" class="form-control">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/guru/update" method="post">
              @csrf
                <div class="form-group">
                  <label>Nip</label>
                    <input type="text" name="Nip" class="form-control" id="edit-Nip" readonly>      
                  </div>

                 <div class="form-group">
                  <label>Nama Guru</label>
            <input type="text" name="nama_guru" id="edit-nama_guru" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Jenis Kelamin</label>
            <select class="form-control form-control-sm" name="jenis_kelamin" id="edit-jenis_kelamin">
              <option selected disabled value="">-- Please Select --</option>
              <option value="L">L</option>
              <option value="P">P</option>
            </select>  
          </div>
          <div class="form-group">
                  <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control" id="edit-tanggal_lahir">
          </div>
          <div class="form-group">
                  <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" id="edit-alamat">
          </div>
          <div class="form-group">
                  <label>Kelas Wali</label>
            <input type="text" name="kelas_wali" class="form-control" id="edit-kelas_wali">
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
  $(document).on("click", ".edit-modal-click", function () {
    var id = $(this).attr('data-id');
    var rowCells = $(this).closest("tr").children(); 
    var nama = rowCells.eq(2).text();
    var jenis_kelamin = rowCells.eq(3).text();
    var tanggal_lahir = rowCells.eq(4).text();
    var alamat = rowCells.eq(5).text();
    var kelas_wali = rowCells.eq(6).text();
     $("#edit-Nip").val(id);
     $("#edit-nama_guru").val(nama);
     $("#edit-jenis_kelamin").val(jenis_kelamin).change();     
     $("#edit-tanggal_lahir").val(tanggal_lahir);
     $("#edit-alamat").val(alamat);
     $("#edit-kelas_wali").val(kelas_wali);
     $('#EditModal').modal('show');
    });


  function deleteData(id)
     {
         var id = id;
         var url = "pelajaran/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>

@endsection