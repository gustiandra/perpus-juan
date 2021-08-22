@extends('layouts.app')
@section('content')
<a href="{{route('student.create')}}" title="Tambah Murid" class="btn btn-success mb-4">
  <i class="fas fa-plus"></i> Tambah Murid
</a>
<!-- Modal Tambah Murid -->


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
        <th class="col-2">NISN</th>
        <th class="col-1">Kelas</th>
        <th class="col-1">No. Absen</th>
        <th class="col-2">Tahun</th>
        <th class="col-2"></th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($students as $row)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{$row->name}}</td>
          <td>{{$row->nisn}}</td>
          <td>{{$row->kelas->name}}</td>
          <td>{{$row->no_absen}}</td>
          <td>{{$row->year}}</td>
          <td class="text-center">
            <a  href="{{route('student.edit', $row)}}" title="Ubah Murid" class="d-inline btn btn-primary btn-sm mr-1">
              <i class="fas fa-edit"></i>
            </a>
            <button type="button" title="Hapus Murid" onclick="deleteConfirm('deleteForm{{ $row->id }}', '{{ $row->name }}')" class="d-inline btn btn-danger btn-sm ">
            <form action="{{route('student.destroy', $row->id)}}" method="POST"  class="d-inline" id="deleteForm{{ $row->id }}">
              @csrf
              @method('delete')
            </form>
              <i class="fas fa-trash"></i>
            </button>

          </td>
        </tr>
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
  });
</script>

<script src="{{asset('vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<script>              
    window.deleteConfirm = function(formId, name)
    {
        Swal.fire({
            icon: 'warning',
            text: `Hapus Data Murid ${name}?`,
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
    
@endpush