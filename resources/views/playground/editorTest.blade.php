@extends('layouts.app')

@section('content')
<div id="app"></div>
<div class="container">
     <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>
</div>

<script>
    export default {
        name: 'app',
        data() {
            return {
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        }
    }
</script>
	@endsection