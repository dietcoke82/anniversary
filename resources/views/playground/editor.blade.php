@extends('layouts.app')

@section('content')
<!--<script type="text/javascript" src="http://localhost/content/ckeditor/ckeditor.js"></script>-->

    <div class="container">
        <form method="POST" action="/playground/editorInsert" name="editorInfo">

            <div class="form-group">
        
                @csrf
                <textarea id="content" name="content" class="ckeditor">
                </textarea>
            </div>
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                                    SAVEEEEEEEEEEEEEEEEEEEEEE
                </button>

            </div>

         
        </form>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('content', {
                height : 500
            });

        </script>
    </div>
@endsection
