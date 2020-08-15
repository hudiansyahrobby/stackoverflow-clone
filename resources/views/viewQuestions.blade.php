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
                </div>
                <label for="content">
                    <h5>
                        {!! $question->content !!}
                    </h5>
                </label>
                <br>
                <label for="tags">
                    @forelse($question->tags as $tag)
                        <a href="/tag/{{ $tag->id }}/{{ $tag->name }}">
                            <button class="btn btn-primary">#{{ $tag->name }}</button>
                        </a>
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
                            <b>{{ $question->user->reputation->point }}</b> reputation
                        </font> )
                        <br />Post :
                        {{ date('d M Y, g:i a', strtotime($question->updated_at)) }}
                    </font>
                </div>
                <div class="p-2">
                    <a href="/upvote_question/{{ $question->id }}" type="button" class="btn btn-primary btn-sm">
                        Upvote <span
                            class="badge badge-light">{{ $question->votes->where('upvote', 1)->count() }}</span>
                    </a>
                    <a href="/downvote_question/{{ $question->id }}" type="button" class="btn btn-danger btn-sm">
                        Downvote <span
                            class="badge badge-light">{{ $question->votes->where('downvote', 1)->count() }}</span>
                    </a>
                </div>
            </div>

            @forelse($question->comments as $comment)
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">{{ $comment->user->name }}</span>
                        <span class="direct-chat-timestamp float-right">
                            {{ date('d M Y, g:i a', strtotime($comment->updated_at)) }}
                        </span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img"
                        src="{{ asset('/adminLTE/dist/img/user1-128x128.jpg') }}"
                        alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $comment->content }}
                        @if($comment->user_id == Auth::user()->id)
                            <form action="/comment/{{ $comment->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                            </form>
                        @endif
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            @empty
                <p>Belum ada komentar</p>
            @endforelse

            <!-- /.direct-chat-msg -->
            <form action="/commentQuestion/{{ $question->id }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="comment"
                        placeholder="Type comment" name="comment" value="{{ old('comment') }}">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </span>
                </div>
            </form>
            <br />
        </div>
    </div>
    <a href="/answer/{{ $question->id }}" type="button" class="btn btn-primary btn-sm" style="margin-left: 20px">
        ANSWER
    </a>

    @foreach($question->answers as $answer)
        @if ($answer->id == $question->best_answer_id)
            <div class="mt-3 ml-3">
                <div class="card p-3 bg-warning">

                    <div class="form-group">
                        <label for="content">
                            <h5>{!! $answer->content !!}</h5>
                        </label>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2">
                            <img class="direct-chat-img"
                                src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}"
                                alt="User Avatar" style="size: 10;margin-right:10px;">
                            <font style="font-size: 12px">{{ $answer->user->name }} ( <font style="color: blue">
                                    <b>{{ $answer->user->reputation->point }}</b> reputation
                                </font> )
                                <br />Post :
                                {{ date('d M Y, g:i a', strtotime($answer->updated_at)) }}
                            </font>
                        </div>

                        <div class="p-2">
                            <a href="/upvote_answer/{{ $answer->id }}" type="button" class="btn btn-primary btn-sm">
                                Upvote <span
                                    class="badge badge-light">{{ $answer->votes->where('upvote', 1)->count() }}</span>
                            </a>
                            <a href="/downvote_answer/{{ $answer->id }}" type="button" class="btn btn-danger btn-sm">
                                Downvote <span
                                    class="badge badge-light">{{ $answer->votes->where('downvote', 1)->count() }}</span>
                            </a>
                        </div>
                    </div>

                    @if($answer->user_id == Auth::user()->id)
                        <div class="d-flex">
                            <a href="/answer/{{ $answer->id }}/edit" class="btn btn-success btn-sm mr-1">
                                Update
                            </a>
                            <form action="/answer/{{ $answer->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </div>
                    @endif

                    @forelse($answer->comments as $comment)
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $comment->user->name }}</span>
                                <span class="direct-chat-timestamp float-right">
                                    {{ date('d M Y, g:i a', strtotime($comment->updated_at)) }}
                                </span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img"
                                src="{{ asset('/adminLTE/dist/img/user1-128x128.jpg') }}"
                                alt="Message User Image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $comment->content }}
                                @if($comment->user_id == Auth::user()->id)
                                    <form action="/comment/{{ $comment->id }}/delete" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                                    </form>
                                @endif
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    @empty
                        <p>Belum ada komentar</p>
                    @endforelse

                    <form action="/commentAnswer/{{ $answer->id }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="comment"
                                placeholder="Type comment" name="comment" value="{{ old('comment') }}">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        @endif

    @endforeach

    @forelse($question->answers as $answer)
        @if ($answer->id != $question->best_answer_id)
            <div class="mt-3 ml-3">
                <div class="card p-3">

                    @if($question->user_id != $answer->user_id
                        && $question->user_id == Auth::user()->id)
                        @if($question->best_answer_id != $answer->id)
                            <div class="d-flex mb-1">
                                <a href="/question/{{ $answer->id }}/best" type="button" class="btn btn-warning btn-sm">
                                    BEST ANSWER
                                </a>
                            </div>
                        @endif
                    @endif

                    <div class="form-group">
                        <label for="content">
                            <h5>{!! $answer->content !!}</h5>
                        </label>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="p-2">
                            <img class="direct-chat-img"
                                src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}"
                                alt="User Avatar" style="size: 10;margin-right:10px;">
                            <font style="font-size: 12px">{{ $answer->user->name }} ( <font style="color: blue">
                                    <b>{{ $answer->user->reputation->point }}</b> reputation
                                </font> )
                                <br />Post :
                                {{ date('d M Y, g:i a', strtotime($answer->updated_at)) }}
                            </font>
                        </div>

                        <div class="p-2">
                            <a href="/upvote_answer/{{ $answer->id }}" type="button" class="btn btn-primary btn-sm">
                                Upvote <span
                                    class="badge badge-light">{{ $answer->votes->where('upvote', 1)->count() }}</span>
                            </a>
                            <a href="/downvote_answer/{{ $answer->id }}" type="button" class="btn btn-danger btn-sm">
                                Downvote <span
                                    class="badge badge-light">{{ $answer->votes->where('downvote', 1)->count() }}</span>
                            </a>
                        </div>
                    </div>

                    @if($answer->user_id == Auth::user()->id)
                        <div class="d-flex">
                            <a href="/answer/{{ $answer->id }}/edit" class="btn btn-success btn-sm mr-1">
                                Update
                            </a>
                            <form action="/answer/{{ $answer->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </div>
                    @endif

                    @forelse($answer->comments as $comment)
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">{{ $comment->user->name }}</span>
                                <span class="direct-chat-timestamp float-right">
                                    {{ date('d M Y, g:i a', strtotime($comment->updated_at)) }}
                                </span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img class="direct-chat-img"
                                src="{{ asset('/adminLTE/dist/img/user1-128x128.jpg') }}"
                                alt="Message User Image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{ $comment->content }}
                                @if($comment->user_id == Auth::user()->id)
                                    <form action="/comment/{{ $comment->id }}/delete" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                                    </form>
                                @endif
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    @empty
                        <p>Belum ada komentar</p>
                    @endforelse

                    <form action="/commentAnswer/{{ $answer->id }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="comment"
                                placeholder="Type comment" name="comment" value="{{ old('comment') }}">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        @endif
    @empty
        <p>Belum ada jawaban</p>
    @endforelse

</div>
@endsection
