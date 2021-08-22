@extends('layouts.app')
@section('content')
<a href="{{route('book.create')}}" title="Tambah Buku" class="btn btn-success mb-4">
  <i class="fas fa-plus"></i> Tambah Buku
</a>
<!-- Modal Tambah Buku -->


<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Buku</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th class="col-1">No.</th>
        <th class="col-3">Judul</th>
        <th class="col-2">ISBN</th>
        <th class="col-2">Penulis</th>
        <th class="col-1">Penerbit</th>
        <th class="col-1">Kategori</th>
        <th class="col-2"></th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($books as $row)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{$row->title}}</td>
          <td>{{$row->isbn}}</td>
          <td>{{$row->author}}</td>
          <td>{{$row->publisher}}</td>
          <td>{{$row->category->name}}</td>
          <td class="text-center">
            <button type="button" title="Detail Buku"  class=" btn btn-warning btn-sm text-white">
              <i class="fas fa-eye"></i>
            </button>
            <a  href="{{route('student.edit', $row)}}" title="Ubah Buku" class="d-inline btn btn-primary btn-sm mr-1">
              <i class="fas fa-pen"></i>
            </a>
            <form action="{{route('student.destroy', $row->id)}}" method="POST"  class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" title="Hapus Buku" onclick="return confirm('Apakah yakin menghapus murid ini?')" class=" btn btn-danger btn-sm ">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
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
  });

</script>
{{-- <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script> --}}
    
@endpush