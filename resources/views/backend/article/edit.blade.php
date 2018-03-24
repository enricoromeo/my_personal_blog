@extends('backend.master.layout')

@section('title') Modifica Articolo @endsection

@section('breadcrumb') Articoli > Modifica @endsection

@section('content')
    <p>Usa il form di seguito per modificare l'articolo scelto.</p>

    @if(count($errors->all()) > 0)
        <div class="alert alert-danger" role="alert">
            <p><b>Attenzione!</b></p>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif


    <form enctype="multipart/form-data" action="" method="post">
        <p>
          <img src={{ asset('uploads/images') . "/" . $article->post_image }} style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px; ">

          <h3>Immagine Post</h3>

          <label>Aggiorna Immagine Post</label>
          <input type="file" name="postimage">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <br><br><br><br>
          <hr>
       </p>

        <p>
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$article->title}}" />
        </p>

        <p>
            <label for="description">Descrizione:</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{$article->body}}</textarea>
        </p>

        <p>
            <label for="categories">Categorie:</label>
            <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach($categories as $category)
                    <option id="category{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </p>

        <hr/>

        <div class="row">
            <div class="col-md-6">
                <p>
                    <label for="is_published">Stato:</label>
                    <select name="is_published" id="is_published" class="form-control">
                        <option value="0">Bozza</option>
                        <option value="1">Pubblicato</option>
                    </select>
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <label for="published_at">Data di Pubblicazione:</label>
                    <input class="form-control" type="text" name="published_at" id="published_at" value="{{ date('d/m/Y H:i', strtotime($article->published_at)) }}" placeholder="gg/mm/aaaa oo:mm" />
                </p>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-md-6">
                <p>
                    <label for="metakeys">Meta Keys:</label>
                    <input type="text" class="form-control" name="metakeys" id="metadkeys" value="{{ $article->meta_keys }}" />
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <label for="metadescription">Meta Description:</label>
                    <input type="text" class="form-control" name="metadescription" id="metadescription" value="{{ $article->meta_description }}" />
                </p>
            </div>
        </div>

        <hr/>

        <p><button class="btn btn-success form-control">Salva Modifiche</button></p>

    </form>

    <!--<script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>-->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=your_API_key"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script>
        tinymce.init({
            selector:'textarea#body',
            plugins: 'image, code, textcolor, codesample',
            toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });

        $(document).ready(function(){
            $("#categories").select2();

            $('#is_published').val('{{ $article->is_published }}');
            $("#categories").val({{ $article->categories->pluck('id') }}).trigger('change');
        });
    </script>


@endsection
