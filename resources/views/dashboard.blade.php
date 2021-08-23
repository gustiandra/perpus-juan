@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
        <div class="inner">
        <h3>{{ count($books) }}</h3>
        <p>Buku</p>
        </div>
        <div class="icon">
        <i class="fas fa-book"></i>
        </div>
        <a href="#" id="btn-buku" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-light">
        <div class="inner">
        <h3>{{ count($students) }}</h3>
        <p>Murid</p>
        </div>
        <div class="icon">
        <i class="fas fa-graduation-cap"></i>
        </div>
        <a href="#" id="btn-murid" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ count($borrows) }}</h3>
        <p>Buku Sedang Dipinjam</p>
        </div>
        <div class="icon">
        <i class="fas fa-handshake"></i>
        </div>
        <a href="#" id="btn-pinjam" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>          
</div>

{{-- BUKU --}}
<div class="display-none" id="buku">
    <div class="row" >
        <div class="col-12">
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
                                                            <button type="button" title="Hapus Kode Buku" onclick="deleteConfirmCode('deleteCode{{ $bookcode->id }}', '{{ $bookcode->code }}')" class=" btn btn-danger btn-sm ">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                            <form action="{{route('book-code.destroy', $bookcode->id)}}" method="POST"  class="d-inline" id="deleteCode{{ $bookcode->id }}">
                                                                @csrf
                                                                @method('delete')
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
                        <button type="button" title="Hapus Buku" onclick="deleteConfirmBook('deleteBook{{ $row->id }}', '{{ $row->title }}')" class=" btn btn-danger btn-sm ">
                        <i class="fas fa-trash"></i>
                        </button>
                        <form action="{{route('book.destroy', $row->id)}}" method="POST"  class="d-inline" id="deleteBook{{ $row->id }}">
                        @csrf
                        @method('delete')
                        </form>
                    </td>
                    </tr>
                    
                    @endforeach        
                </tbody>      
                </table>
            </div>
            <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
{{-- END BUKU --}}    

{{-- STUDENT --}}
<div class="display-none" id="murid" data-aos="fade-right">
    <div class="row" >
        <div class="col-12">
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
                <table id="example2" class="table table-bordered table-striped">
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
                        <button type="button" title="Hapus Murid" onclick="deleteStudent('deleteStudent{{ $row->id }}', '{{ $row->name }}')" class="d-inline btn btn-danger btn-sm ">
                        <form action="{{route('student.destroy', $row->id)}}" method="POST"  class="d-inline" id="deleteStudent{{ $row->id }}">
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
        </div>
    </div>
</div>
{{-- END STUDENT --}}

{{-- PINJAM BUKU --}}
<div class="display-none" id="pinjam" data-aos="fade-right">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped  text-center">
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
        </div>
    </div>
</div>
{{-- END PINJAM BUKU --}}

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
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });      
  });
</script>
<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    });      
  });
</script>

<script src="{{asset('vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<script>              
    window.deleteConfirmBook = function(formId, name)
    {
        Swal.fire({
            icon: 'warning',
            text: `Hapus Data Buku ${name}?`,
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
    window.deleteConfirmCode = function(formId, name)
    {
        Swal.fire({
            icon: 'warning',
            text: `Hapus Data Kode Buku ${name}?`,
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#e3342f',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }

    window.deleteStudent = function(formId, name)
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
    

<script>
    $(document).ready(function(){
		$('#btn-buku').click(function(){
			$('#buku').toggleClass('display-none');
			$('#murid').addClass('display-none');
			$('#pinjam').addClass('display-none');
		});	
		$('#btn-murid').click(function(){
			$('#murid').toggleClass('display-none');
            $('#pinjam').addClass('display-none');
            $('#buku').addClass('display-none');
		});	
		$('#btn-pinjam').click(function(){
			$('#pinjam').toggleClass('display-none');
            $('#buku').addClass('display-none');
            $('#murid').addClass('display-none');
		});	
 
	});
</script>

@endpush
