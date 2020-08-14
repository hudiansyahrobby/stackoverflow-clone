@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
        @forelse($user->questions as $key => $question)
        <div class="card p-3">
            <div class="form-group">
                <label for="title">
                    <h3>{{ $question->title }}</h3>
                </label>
                <br>
                <label for="content">
                    <h5>
                        {!! $question->content !!}
                    </h5>
                </label>
                <br>
                <label for="tags">
                    <button class="btn btn-primary btn-xs">#html</button>
                    <button class="btn btn-success btn-xs">#laravel</button>
                    <button class="btn btn-warning btn-xs">#others</button>
                </label>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <div class="p-2">
                    <img class="direct-chat-img" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}" alt="User Avatar" style="size: 10;margin-right:10px;">
                    <font style="font-size: 12px">{{ $question->user->name }} ( <font style="color: blue">
                            <b>{{ $question->user->reputation->point }}</b> contribution
                        </font> )
                        <br />Post :
                        {{ date('d M Y', strtotime($question->created_at)) }}
                    </font>
                </div>
                <div class="p-2">
                    <button type="button" class="btn btn-primary btn-sm">
                        Likes <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm">
                        Dislikes <span class="badge badge-light">5</span>
                    </button>
                </div>
            </div>
            <div class="d-flex">
                <a href="/question/{{$question->id}}" class="btn btn-warning btn-sm">
                    View
                </a>
                <a href="/question/{{$question->id}}/edit" class="btn btn-success btn-sm mx-1">
                    Update
                </a>
                <form action="/question/{{$question->id}}/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </div>

        </div>
        @empty
        <tr>
            <td colspan="4" align='center'>
                Tidak Ada Pertanyaan
            </td>
        </tr>
        @endforelse

    </div>

</div>



@endsection