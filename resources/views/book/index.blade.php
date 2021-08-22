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
    <table id="example1" class="table table-bordered table-striped  text-center">
      <thead>
      <tr>
        <th class="col-1">No.</th>
        <th class="col-3">Judul</th>
        <th class="col-2">ISBN</th>
        <th class="col-2">Penulis</th>
        <th class="col-1">Penerbit</th>
        <th class="col-1">Kategori</th>
        <th class="col-2">#</th>        
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
            <button type="button" title="Detail Buku"  class=" btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modalDetail{{$row->id}}">
              <i class="fas fa-eye"></i>
            </button>
            <!-- Modal Detail Buku -->
            <div class="modal fade" id="modalDetail{{$row->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-body">
                        <h4>{{ $row->title }}</h4>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="detail{{ $row->id }}-tab" data-toggle="tab" href="#detail{{ $row->id }}" role="tab" aria-controls="detail{{ $row->id }}" aria-selected="true">Detail</a>
                                <a class="nav-link" id="bookcode{{ $row->id }}-tab" data-toggle="tab" href="#bookcode{{ $row->id }}" role="tab" aria-controls="bookcode{{ $row->id }}" aria-selected="false">Kode Buku</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="detail{{ $row->id }}" role="tabpanel" aria-labelledby="detail{{ $row->id }}">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="row text-left">
                                            <div class="col-3">
                                                <p class="card-text">Judul</p>
                                            </div>
                                            <div class="col-9">
                                                <p class="card-text">: &nbsp; {{ $row->title }}</p>
                                            </div>
                                            <div class="col-3">
                                                <p class="card-text">ISBN</p>
                                            </div>
                                            <div class="col-9">
                                                <p class="card-text">: &nbsp; {{ $row->isbn }}</p>
                                            </div>
                                            <div class="col-3">
                                                <p class="card-text">Penulis</p>
                                            </div>
                                            <div class="col-9">
                                                <p class="card-text">: &nbsp; {{ $row->author }}</p>
                                            </div>
                                            <div class="col-3">
                                                <p class="card-text">Kategori</p>
                                            </div>
                                            <div class="col-9">
                                                <p class="card-text">: &nbsp; {{ $row->category->name }}</p>
                                            </div>
                                            <div class="col-3">
                                                <p class="card-text">Deskripsi</p>
                                            </div>
                                            <div class="col-9">
                                                <p class="card-text">: &nbsp; {{ $row->description }}</p>
                                            </div>
                                            <div class="col-3">
                                                <p class="card-text">Jumlah</p>
                                            </div>
                                            <div class="col-9">
                                                <p class="card-text">: &nbsp; {{ count($row->bookcode) }}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bookcode{{ $row->id }}" role="tabpanel" aria-labelledby="bookcode{{ $row->id }}">
                                <div class="row mt-4 mb-4">
                                    <div class="col-12 text-left">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCreateBookCode">
                                            <i class="fas fa-plus"></i> Tambah Buku(Kode Buku)
                                        </button>
                                        <!-- Modal Tambah Kode Buku -->
                                        <div class="modal fade" id="modalCreateBookCode" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5>Tambah Kode Buku</h5>
                                                    <form action="{{route('book-code.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $row->id }}" name="book_id">
                                                    <div class="form-group">
                                                        <input type="text"  name="code" class="form-control">
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

                                    </div>
                                </div>
                                <table class="w-100">
                                    <thead >
                                        <tr style="background: none">
                                            <th>No.</th>
                                            <th>Kode Buku</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($row->bookcode as $bookcode)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bookcode->code }}</td>
                                            <td>
                                                <button type="button" title="Ubah Kode Buku" data-toggle="modal" data-target="#modalBookCodeEdit{{$bookcode->id}}" class=" btn btn-primary btn-sm ">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <!-- Modal Ubah Kode Buku -->
                                                <div class="modal fade" id="modalBookCodeEdit{{$bookcode->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5>Ubah Kode Buku</h5>
                                                            <form action="{{route('book-code.update', $bookcode->id)}}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-group">
                                                                <input type="text"  name="code" class="form-control" value="{{ $bookcode->code}}">
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
                                                <form action="{{route('book-code.destroy', $bookcode->id)}}" method="POST"  class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" title="Hapus Kode Buku" onclick="return confirm('Apakah yakin menghapus kode buku ini?')" class=" btn btn-danger btn-sm ">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <a  href="{{route('book.edit', $row)}}" title="Ubah Buku" class="d-inline btn btn-primary btn-sm mr-1">
              <i class="fas fa-pen"></i>
            </a>
            <form action="{{route('book.destroy', $row->id)}}" method="POST"  class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" title="Hapus Buku" onclick="return confirm('Apakah yakin menghapus buku ini?')" class=" btn btn-danger btn-sm ">
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