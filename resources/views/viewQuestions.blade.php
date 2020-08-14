@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <div class="form-group">
                <div>
                    <label for="title">
                        <h3>{{ $question->title }}</h3>
                    </label>
                    <a href="/question/{{ $question->id }}/edit" class="btn btn-warning btn-sm float-right">Edit</a>
                </div>
                <label for="content">
                    <h5>
                        {!! $question->content !!}
                    </h5>
                </label>
                <br>
                <label for="tags">
                    @forelse($question->tags as $tag)
                        <button class="btn btn-primary">#{{ $tag->name }}</button>
                    @empty
                        <p>Tidak ada tags</p>
                    @endforelse
                </label>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <div class="p-2">
                    <img class="direct-chat-img"
                        src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}"
                        alt="User Avatar" style="size: 10;margin-right:10px;">
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
        </div>
    </div>
    <a href="/answer/{{ $question->id }}" type="button" class="btn btn-primary btn-sm" style="margin-left: 20px">
        ANSWER
    </a>
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <div class="d-flex mb-1">
                <button type="button" class="btn btn-warning btn-sm">
                    BEST ANSWER
                </button>
            </div>

            <div class="form-group">

                <label for="content">
                    <h5>
                        <p>
                            Coba cari di-search-engine untuk FizzBuzz.
                            Sepertinya banyak untuk hal ini.</p>
                    </h5>

                </label>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <div class="p-2">
                    <img class="direct-chat-img"
                        src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}"
                        alt="User Avatar" style="size: 10;margin-right:10px;">
                    <font style="font-size: 12px">@username ( <font style="color: blue"><b>21</b> contribution
                        </font> )
                        <br />Post : 20 Aug 2020
                    </font>
                </div>

                <div class="p-2">
                    <button type="button" class="btn btn-primary btn-sm">
                        Likes <span class="badge badge-light">4</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm">
                        Dislikes <span class="badge badge-light">4</span>
                    </button>

                </div>
            </div>

            <div class="d-flex">
                <a href="/answer/{{ $question->id }}/edit" class="btn btn-success btn-sm mr-1">
                    Update
                </a>
                <form action="/answer/delete" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
