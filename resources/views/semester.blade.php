@extends('test')

@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fa fa-paperclip mr-2"></i>SEMESTER</h3><hr>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fa fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Semester</th>
      <th scope="col">Semester</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($semester as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->id_semester }}</td>
      <td>{{ $val->semester}}</td>
        
          <td><a class="bg-warning p-2 text-white rounded edit-modal-click" data-id="{{ $val->id_semester }}">EDIT</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData('{{ $val->id_semester }}')" data-target="#DeleteModal" class="bg-danger p-2 text-white rounded">DELETE</td>

    </tr>
    @endforeach



  </tbody>
</table>
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <h5>Error Memasukan Data</h5>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
</div>

<div class="modal fade" id="CreateModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/semester/tambah" method="post">
              @csrf
                <div class="form-group">
                  <label>ID Semester</label>
                    <input type="text" name="id_semester" class="form-control">      
                  </div>

                 <div class="form-group">
                  <label>Semester</label>
            <input type="text" name="semester" class="form-control">      
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/semester/update" method="post">
              @csrf
                <div class="form-group">
                  <label>ID Semester</label>
                    <input type="text" name="id_semester" id="edit-id_semester" class="form-control">      
                  </div>

                 <div class="form-group">
                  <label>Semester</label>
            <input type="text" name="semester" id="edit-semester" class="form-control">      
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
     $("#edit-id_semester").val(id);
     $("#edit-semester").val(nama);
     $('#EditModal').modal('show');
    });


  function deleteData(id)
     {
         var id = id;
         var url = "semester/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>

@endsection