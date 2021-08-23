@extends('layouts.app')
@section('content')
<a href="{{route('top-book-pdf')}}" target="_blank" title="Ekspor PDF" class="btn btn-secondary mb-4">
  <i class="fas fa-print"></i> Ekspor PDF
</a>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Buku Favorit</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
      <tr>
        <th >No.</th>
        <th >Judul</th>
        <th >ISBN</th>
        <th >Penulis</th>
        <th >Penerbit</th>
        <th >Kategori</th>
        <th >Jumlah</th>
        <th >Dipinjam</th>
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
          <td>{{count($row->bookcode)}}</td>
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