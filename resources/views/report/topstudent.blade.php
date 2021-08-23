@extends('layouts.app')
@section('content')
<a href="{{route('top-student-pdf')}}" target="_blank" title="Ekspor PDF" class="btn btn-secondary mb-4">
  <i class="fas fa-print"></i> Ekspor PDF
</a>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Murid Teraktif</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
      <tr>
        <th class="col-1">No.</th>
        <th class="col-3">Nama</th>
        <th class="col-2">NISN</th>
        <th class="col-1">Kelas</th>
        <th class="col-1">No. Absen</th>
        <th class="col-2">Tahun</th>
        <th class="col-2">Total</th>
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
          <td>{{ $row->borrow_count }}</td>
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
    
@endpush