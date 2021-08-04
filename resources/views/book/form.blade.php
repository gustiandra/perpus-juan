@extends('layouts.app')
@section('content')

    <div class="row ">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="{{route($url, $book ?? '' )}}" method="POST">
                        @csrf
                        @if (isset($book))
                            @method('put')
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $book->title ?? ''}}">
                                    @error('title')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text"  name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{old('isbn') ?? $book->isbn ?? ''}}">
                                    @error('isbn')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text"  name="author" class="form-control @error('author') is-invalid @enderror" value="{{old('author') ?? $book->author ?? ''}}">
                                    @error('author')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select class="form-control " name="class">
                                        @foreach ($categories as $row)
                                            <option value="{{$row->id}}" 
                                            @if (isset($book)) 
                                                @if ( $row->id == $book->category_id) {{"selected"}} @endif
                                            @endif  
                                            >{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text"  name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{old('publisher') ?? $book->publisher ?? ''}}">
                                    @error('publisher')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number"  name="qty" class="form-control @error('name') is-invalid @enderror" value="{{old('qty') ?? $book->qty ?? ''}}">
                                    @error('qty')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection