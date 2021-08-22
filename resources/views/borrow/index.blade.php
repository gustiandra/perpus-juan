@extends('layouts.app')
@section('content')


<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Buku</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped  text-center">
      <thead>
      <tr>
        <th>No.</th>
        <th>Murid</th>
        <th>Kelas</th>
        <th>Buku</th>
        <th>Kode Buku</th>
        <th>#</th>        
      </tr>
      </thead>
      <tbody>
        @foreach ($borrows as $row)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{ $row->student->name }}</td>
          <td>{{ $row->student->kelas->name }}</td>
          <td>{{ $row->bookcode->book->title }}</td>
          <td>{{ $row->bookcode->code }}</td>
          <td>
              <button class="btn btn-primary">Pengembalian Buku</button>
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
    
@endpush