@extends('layouts.app')
@section('content')
<button type="button" title="Tambah Kelas" class="btn btn-success mb-4" data-toggle="modal" data-target="#modalTambah">
  <i class="fas fa-plus"></i> Tambah Murid
</button>
<!-- Modal Tambah Murid -->
<div class="modal fade" id="modalTambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Murid</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('student.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama</label>
            <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? ''}}">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <select class="form-control " name="class">
                @foreach ($classes as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Sub Kelas</label>
            <select class="form-control " name="subclass">
                @foreach ($subclasses as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
          <div class="form-group">
            <label>Tahun</label>
            <input type="number"  name="year" class="form-control @error('name') is-invalid @enderror" value="{{old('year') ??  ''}}">
            @error('year')
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
    <h3 class="card-title">Data Murid</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th class="col-1">No.</th>
        <th class="col-3">Nama</th>
        <th class="col-2">Kelas</th>
        <th class="col-2">Sub Kelas</th>
        <th class="col-2">Tahun</th>
        <th class="col-2"></th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($students as $row)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{$row->name}}</td>
          <td>{{$row->kelas->name}}</td>
          <td>{{$row->subkelas->name}}</td>
          <td>{{$row->year}}</td>
          <td>
            <button type="button" title="Ubah Murid" class="d-inline btn btn-primary btn-sm " data-toggle="modal" data-target="#modal{{$row->id}}">
              <i class="fas fa-edit"></i>
            </button>
            <form action="{{route('student.destroy', $row->id)}}" method="POST"  class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" title="Hapus Murid" onclick="return confirm('Apakah yakin menghapus murid ini?')" class="d-inline btn btn-danger btn-sm ">
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
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Murid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('student.update', $row->id)}}" method="POST">
                  @csrf
                  @method('put')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $row->name ?? ''}}">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select class="form-control " name="class">
                        @foreach ($classes as $item)
                        <option value="{{$item->id}}" @if ($item->id == $row->class) {{'selected'}} @endif>{{$item->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Sub Kelas</label>
                    <select class="form-control " name="subclass">
                        @foreach ($subclasses as $item)
                        <option value="{{$item->id}}" @if ($item->id == $row->subclass) {{'selected'}} @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number"  name="year" class="form-control @error('name') is-invalid @enderror" value="{{old('year')  ?? $row->year ??  ''}}">
                    @error('year')
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

{{-- @push('select2css')
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
@endpush --}}

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
{{-- <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script> --}}
    
@endpush