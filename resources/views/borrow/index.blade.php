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
            <button type="button" onclick="confirm('confirm{{ $row->id }}', '{{ $row->student->name }}', '{{ $row->bookcode->book->title }}', '{{ $row->bookcode->code }}')" class="btn btn-primary">
                Pengembalian Buku
            </button>
            <form action="{{route('borrow.update', $row->id)}}" method="POST" class="d-inline" id="confirm{{ $row->id }}">
              @csrf
              @method('put')
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
    window.confirm = function(formId, name, title, code)
    {
        Swal.fire({
            icon: 'question',
            titleText: 'Pengembalian Buku ?',
            text: ``,
            html: `Pastikan semua data benar.<br>
                    Murid: <b>${name}</b><br>
                    Judul: <b>${title}</b><br>
                    Kode: <b>${code}</b><br>
                    `,
            showCancelButton: true,
            confirmButtonText: 'Ya, data sudah benar',
            confirmButtonColor: '#3085d6',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
@endpush