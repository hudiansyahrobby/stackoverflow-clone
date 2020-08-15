{{-- @extends('layouts.app') --}}
@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <form method="post" action="/answer/update">
                @csrf
                <div class="form-group">
                    <label for="content">Answer</label>
                    {{-- <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="answer" name="content"></textarea> --}}
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

                <button type="submit" class="btn btn-primary">Update Answer</button>
            </form>
        </div>
    </div>
</div>
@endsection