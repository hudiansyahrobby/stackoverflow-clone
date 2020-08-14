{{-- @extends('layouts.app') --}}
@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <form method="post" action="/question/1">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="content">Question</label>
                    {{-- <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="question" name="content"></textarea> --}}
                    <textarea class="description" name="description"></textarea>
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
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" placeholder="title" name="title" value="{{old('tags')}}">
                </div>

                <button type="submit" class="btn btn-primary">Submit New Question</button>
            </form>
        </div>
    </div>
</div>
@endsection