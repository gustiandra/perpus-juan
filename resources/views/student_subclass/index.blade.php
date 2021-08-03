@extends('layouts.app')
@section('content')
<button type="button" title="Tambah Kelas" class="btn btn-success mb-4" data-toggle="modal" data-target="#modalTambah">
  <i class="fas fa-plus"></i> Tambah Sub Kelas
</button>
<!-- Modal Tambah Sub Kelas -->
<div class="modal fade" id="modalTambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Sub Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('studentsubclass.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label>Kelas</label>
            <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $row->name ?? ''}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Kelas</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th class="col-1">No.</th>
        <th class="col-9">Kelas</th>
        <th class="col-2"></th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($subClasses as $row)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{$row->name}}</td>
          <td>
            <button type="button" title="Ubah Kelas" class="d-inline btn btn-primary btn-sm " data-toggle="modal" data-target="#modal{{$row->id}}">
              <i class="fas fa-edit"></i>
            </button>
            <form action="{{route('studentsubclass.destroy', $row->id)}}" method="POST"  class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" title="Hapus Kelas" onclick="return confirm('Apakah yakin menghapus sub kelas ini?')" class="d-inline btn btn-danger btn-sm ">
            </form>
              <i class="fas fa-trash"></i>
            </button>

          </td>
        </tr>
        <!-- Modal Ubah Kelas -->
        <div class="modal fade" id="modal{{$row->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('studentsubclass.update', $row->id)}}" method="POST">
                  @csrf
                  @method('put')
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text"  name="name" class="form-control @error('class') is-invalid @enderror" value="{{old('name') ?? $row->name ?? ''}}">
                    @error('class')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
              </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
        @endforeach        
      </tbody>      
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection

@push('script')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });   
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });   
  });
</script>
@endpush