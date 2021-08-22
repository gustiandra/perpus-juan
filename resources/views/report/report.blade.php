@extends('layouts.app')
@section('content')
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
        <th >Kode</th>
        <th >Kategori</th>
        <th >Murid</th>
        <th >Kelas</th>
        <th >Dipinjam</th>
        <th >Dikembalikan</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($reports as $row)
        <tr>          
          <td>{{$loop->iteration}}</td>
          <td>{{$row->bookcode->book->title}}</td>
          <td>{{$row->bookcode->code}}</td>
          <td>{{$row->bookcode->book->category->name}}</td>
          <td>{{$row->student->name}}</td>
          <td>{{$row->student->kelas->name}}</td>
          <td>{{date_format($row->created_at, 'Y-n-j')}}</td>
          <td>
              @if ($row->returned_at != null)
              {{ date('Y-n-j', strtotime($row->returned_at)) }}

              @else 
                {{ 'Belum' }}
              @endif
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