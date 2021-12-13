@extends('admin.index')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Modificar publicación</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
                <li class="breadcrumb-item active">Edición</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
@if($post->photos->count()>0)
<div class="card card-primary">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($post->photos as $photo)
                    <div class="col-md-2">
                        <form action="{{route('admin.photos.destroy', $photo)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-xs btn-danger position-absolute">
                                <i class="fas fa-times"></i>
                            </button>
                            <img src="{{url($photo->url)}}" alt="" class="img-fluid">
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edición del post</h3>
    </div>
    <div class="card-body">
        <form action="{{route('admin.posts.update', $post)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid':''}}" name="title" value="{{old('title', $post->title)}}">
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Fecha de publicación:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input {{$errors->has('published_at') ? 'is-invalid':''}}" value="{{old('published_at',$post->published_at ? $post->published_at->format('m/d/Y'):null)}}" data-target="#reservationdate" name="published_at" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Contenido</label>
                        <textarea id="summernote" class="form-control" name="body">
                        {{old('body', $post->body)}}
                        </textarea>
                        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Extracto</label>
                                <textarea class="form-control {{$errors->has('excerpt') ? 'is-invalid':''}}" name="excerpt" id="" cols="30" rows="4" maxlength="300" placeholder="Lo más importante">{{old('excerpt', $post->excerpt)}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Categoria</label>
                            <select name="category_id" class="form-control" required="required">
                                @foreach ($categories as $category)
                                <option {{old('category_id', $post->category_id)==$category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <div class="dropzone"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Etiquetas</label>
                            <select class="select form-control" multiple="multiple" name="tags[]" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                                @foreach ($tags as $tag)
                                <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </div>
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
<!-- summernote -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!--Dropzone -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
<!-- InputMask -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<!--Dropzone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        autoclose: true,
        format: 'L'
    });
    $('#summernote').summernote({
        height: 150
    });
    $('.select').select2();
    var myDropzone = new Dropzone('.dropzone', {
        acceptedFiles: 'image/*',
        url: '{{url("/admin/posts/{$post->id}/photos")}}',
        maxFilesieze: 2,
        paramName: 'photo',
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        },
        dictDefaultMessage: 'Arrastra las imagenes aquí para subirlas'
    });
    myDropzone.on('error', function(file, res) {
        //console.log(res.errors.photo[0]);
        $('.dz-error-message:last > span').text(res.errors.photo[0]);
    });
    Dropzone.autoDiscover = false;
</script>
@endpush
@endsection