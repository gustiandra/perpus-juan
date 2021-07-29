@extends('layouts.app')
@section('content')
<div class="row">    
    <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="card ">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Data Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form role="form">                                             
                            <div class="form-group increment">
                            <label for="">Kelas</label>
                            <div class="input-group">
                                <input type="text" name="name[]" class="form-control is-invalid" placeholder="1">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary btn-add"><i class="fas fa-plus-square"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="clone invisible">
                            <div class="input-group mt-2">
                                <input type="text" name="name[]" class="form-control" placeholder="1">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-danger btn-remove"><i class="fas fa-minus-square"></i></button>
                                </div>
                            </div>
                        </div>                           
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Data Sub Kelas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                                                                    
                        <div class="form-group increment2">
                        <label for="">Sub Kelas</label>
                        <div class="input-group">
                            <input type="text" name="name2[]" class="form-control is-invalid" placeholder="A">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-primary btn-add2"><i class="fas fa-plus-square"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="clone invisible invisible1">
                        <div class="input-group mt-2">
                            <input type="text" name="name2[]" class="form-control" placeholder="A">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-danger btn-remove2"><i class="fas fa-minus-square"></i></button>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                </div>
            </form>
            </div>
            
            <!-- /.card-body -->
        </div>
        <!-- /.card -->         
    </div>
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <div class="card ">
            
            <!-- /.card-body -->
        </div>
        <!-- /.card -->         
    </div>
    
</div>
@endsection
@push('script')
    <script>        

        jQuery(document).ready(function () {
            jQuery(".btn-add").click(function () {
                let markup = jQuery(".invisible").html();
                jQuery(".increment").append(markup);
            });
            jQuery("body").on("click", ".btn-remove", function () {
                jQuery(this).parents(".input-group").remove();
            })
        })

        jQuery(document).ready(function () {
            jQuery(".btn-add2").click(function () {
                let markup = jQuery(".invisible1").html();
                jQuery(".increment2").append(markup);
            });
            jQuery("body").on("click", ".btn-remove2", function () {
                jQuery(this).parents(".input-group").remove();
            })
        })
    </script>
@endpush