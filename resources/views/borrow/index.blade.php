@extends('layouts.app')
@section('content')

    <div class="row ">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('borrow.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="">Murid</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        @foreach ($categories as $row)
                                            <option value="{{$row->id}}" 
                                            @if (isset($book)) 
                                                @if ( $row->id == $book->category_id) {{"selected"}} @endif
                                            @endif  
                                            >
                                            {{$row->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                     @error('category_id')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection