@extends('layouts.table')
@section('content')
<a href="{{route('studentclass.create')}}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Tambah Kelas</a>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Kelas</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>Kelas</th>
        <th>ss</th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($classes as $class)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{$class->name}}</td>
          <td>Edit</td>
        </tr>
        @endforeach        
      </tbody>      
    </table>
  </div>
  <!-- /.card-body -->
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Sub Kelas</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>Sub Kelas</th>
        <th>as</th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($sub_classes as $sub_class)
            <tr>              
              <td>{{$loop->iteration}}</td>
              <td>{{$sub_class->name}}</td>
              <td>Edit</td>
            </tr>
        @endforeach 
        <tr>
          <td></td>
        </tr>
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