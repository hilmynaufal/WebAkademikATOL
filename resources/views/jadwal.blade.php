@extends('test')

@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fa fa-paperclip mr-2"></i>JADWAL</h3><hr>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fa fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kelas</th>
      <th scope="col">Pelajaran</th>
      <th scope="col">Pengajar</th>
      <th scope="col">Hari</th>
      <th scope="col">Waktu</th>
      <th scope="col">Lama Pelajaran</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($jadwal as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->id_kelas }}</td>
      <td>{{ $val->nama_pelajaran }}</td>
      <td>{{ $val->nama_guru }}</td>
      <td>{{ $val->hari }}</td>
      <td>{{ $val->waktu }}</td>
      <td>{{ $val->lama }}</td>

          <td><a class="bg-warning p-2 text-white rounded edit-modal-click" data-Nip="{{ $val->nip }}" data-kode_pelajaran="{{ $val->kode_pelajaran }}" data-id="{{ $val->Id_jdwl }}">EDIT</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $val->Id_jdwl }})" data-target="#DeleteModal" class="bg-danger p-2 text-white rounded">DELETE</a></td>

    </tr>
    @endforeach



  </tbody>
</table>

</div>

<div class="modal fade" id="CreateModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/jadwal/tambah" method="post">
              @csrf
                <div class="form-group">
                  <label>Nama Pengajar</label>
                    <select class="form-control form-control-md" name="nip">
                      <option selected disabled value="">-- Nama Guru --</option>
                        @foreach ($guru as $val)
                         <option value="{{$val->nip}}">{{$val->nama_guru}}</option>
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
            <label>Kelas</label>
              <select class="form-control form-control-md" name="kelas">
                <option selected disabled value="">-- Pilih Kelas --</option>
                  @foreach ($kelas as $val)
                   <option value="{{$val->id_kelas}}">{{$val->nama_kelas}}</option>
                  @endforeach
                </select>      
            </div>
          <div class="form-group">
                  <label>Hari</label>
            <input type="text" name="hari" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Waktu</label>
            <input type="text" name="waktu" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Lama Pengajaran</label>
            <input type="text"name="lama" class="form-control">      
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/jadwal/update" method="post">
              @csrf
              <div class="form-group" hidden>
                  <label>ID Jadwal</label>
            <input type="text" name="Id_jdwl" class="form-control" id="edit-id">      
          </div>
                <div class="form-group">
                  <label>Nama Pengajar</label>
                    <select class="form-control form-control-md" name="nip" id="edit-Nip">
                      <option selected disabled value="">-- Nama Guru --</option>
                        @foreach ($guru as $val)
                         <option value="{{$val->nip}}">{{$val->nama_guru}}</option>
                        @endforeach
                      </select>      
                  </div>

                <div class="form-group">
                  <label>Nama Pelajaran</label>
                    <select class="form-control form-control-md" name="kode_pelajaran" id="edit-kode_pelajaran">
                      <option selected disabled value="">-- Nama Pelajaran --</option>
                        @foreach ($pelajaran as $val)
                         <option value="{{$val->kode_pelajaran}}">{{$val->nama_pelajaran}}</option>
                        @endforeach
                      </select>      
                  </div>
            <div class="form-group">
             <label>Kelas</label>
              <select class="form-control form-control-md" name="kelas" id="edit-kelas">
                <option selected disabled value="">-- Pilih Kelas --</option>
                  @foreach ($kelas as $val)
                   <option value="{{$val->id_kelas}}">{{$val->nama_kelas}}</option>
                  @endforeach
                </select>      
            </div>
          <div class="form-group">
                  <label>Hari</label>
            <input type="text" name="hari" class="form-control" id="edit-hari">      
          </div>
          <div class="form-group">
                  <label>Waktu</label>
            <input type="text" id="edit-waktu" name="waktu" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Lama Pengajaran</label>
            <input type="text" id="edit-lama" name="lama" class="form-control">      
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
    var nip = $(this).attr('data-Nip');
    var kode_pelajaran = $(this).attr('data-kode_pelajaran');
    var rowCells = $(this).closest("tr").children(); 
    var kelas = rowCells.eq(1).text();
    var hari = rowCells.eq(4).text();
    var waktu = rowCells.eq(5).text();
    var lama = rowCells.eq(6).text();
    
     $("#edit-id").val(id);
     $("#edit-Nip").val(nip);
     $("#edit-kode_pelajaran").val(kode_pelajaran);
     $("#edit-kelas").val(kelas);
     $("#edit-hari").val(hari);
     $("#edit-waktu").val(waktu);
     $("#edit-lama").val(lama);
     $('#EditModal').modal('show');
    });


  function deleteData(id)
     {
         var id = id;
         var url = "jadwal/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>

@endsection