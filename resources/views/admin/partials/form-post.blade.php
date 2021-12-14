<div class="modal fade" id="md-addpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear nuevo post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.posts.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Título</label>
                                <input type="text" required class="form-control {{$errors->has('title') ? 'is-invalid':''}}" name="title" value="{{old('title')}}">
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de publicación:</label>
                                <div class="input-group date" id="reservationdateC" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdateC" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input {{$errors->has('published_at') ? 'is-invalid':''}}" value="{{old('published_at')}}" data-target="#reservationdateC" name="published_at" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Contenido</label>
                                <textarea id="summernoteC" title="Captura el cuerpo" class="form-control" name="body">
                                {{old('body')}}
                                </textarea>
                                {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Extracto</label>
                                        <textarea required title="Extracto del post" class="form-control {{$errors->has('excerpt') ? 'is-invalid':''}}" name="excerpt" id="" cols="30" rows="2" maxlength="300" placeholder="Lo más importante">{{old('excerpt')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Contenido embebido (iframe)</label>
                                        <textarea id="editor" class="form-control" name="iframe" rows="2" placeholder="Ingresa contenido embebido de audio o vídeo">
                                        {{old('iframe', $post->iframe)}}
                                        </textarea>
                                        {!! $errors->first('iframe', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Categoria</label>
                                    <select name="category_id" class="form-control select" required data-placeholder="Selecciona una categoría" style="width: 100%;">
                                        <option value="">Selecciona ...</option>
                                        @foreach ($categories as $category)
                                        <option {{old('category_id')==$category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label>Etiquetas</label>
                            <select class="select form-control" required multiple="multiple" name="tags[]" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
                                @foreach ($tags as $tag)
                                <option {{ collect(old('tags'))->contains($tag->id) ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>