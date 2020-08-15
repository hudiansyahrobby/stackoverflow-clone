{{-- @extends('layouts.app') --}}
@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <form method="post" action="/question/{{ $question->id }}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        placeholder="title" name="title"
                        value="{{ old('title', $question->title) }}">
                </div>
                <div class="form-group">
                    <label for="content">Question</label>
                    {{-- <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="question" name="content"></textarea> --}}
                    <textarea class="description"
                        name="description">{{ old('description', $question->content) }}</textarea>
                    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
                    <script>
                        tinymce.init({
                            selector: 'textarea.description',
                            width: 900,
                            height: 300
                        });

                    </script>
                </div>
                <div class="form-group">
                    <label for="title">Tags</label>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags"
                        placeholder="tags" name="tags"
                        value="{{ old('tags', implode(',', $tags_name)) }}">
                </div>

                <button type="submit" class="btn btn-primary">Edit Question</button>
            </form>
        </div>
    </div>
</div>
@endsection
