@extends('layouts.app')
@section('content')

    <div class="row ">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="{{route($url, $student ?? '' )}}" method="POST">
                        @csrf
                        @if (isset($student))
                            @method('put')
                        @endif
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $student->name ?? ''}}">
                                    @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text"  name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{old('nisn') ?? $student->nisn ?? ''}}">
                                    @error('nisn')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <select class="form-control " name="class">
                                        @foreach ($classes as $row)
                                            <option value="{{$row->id}}" 
                                            @if (isset($student)) 
                                                @if ( $row->id == $student->class) {{"selected"}} @endif
                                            @endif  
                                            >{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>No. Absen</label>
                                    <input type="number"  name="no_absen" class="form-control @error('no_absen') is-invalid @enderror" value="{{old('no_absen') ?? $student->no_absen ?? ''}}">
                                    @error('no_absen')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number"  name="year" class="form-control @error('name') is-invalid @enderror" value="{{old('year') ?? $student->year ?? ''}}">
                                    @error('year')
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