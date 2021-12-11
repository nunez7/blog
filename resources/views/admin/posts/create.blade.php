@extends('admin.index')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Crear publicación</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear un nuevo post</h3>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Fecha de publicación:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="published_at" required />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Contenido</label>
                        <textarea class="form-control" name="body" id="" cols="30" rows="5" required placeholder="Ingresa el contenido completo de la publicación"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Extracto</label>
                        <textarea class="form-control" name="excerpt" id="" cols="30" rows="2" maxlength="300" required placeholder="Lo más importante"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('styles')
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@push('scripts')
<!-- InputMask -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- AdminLTE App -->
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
@endpush
@endsection