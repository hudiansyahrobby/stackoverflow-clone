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
                        <a href="/tagQuestion/{{ $tag->id }}">
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

            @forelse($question->comments as $comment)
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">{{ $comment->user->name }}</span>
                        <span class="direct-chat-timestamp float-right">{{ date('d M, g:i a', strtotime($comment->updated_at)) }}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img"
                        src="{{ asset('/adminLTE/dist/img/user1-128x128.jpg') }}"
                        alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {{ $comment->content }}
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                        </form>
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
<<<<<<< HEAD
                <a href="/answer/{{ $answer->id }}/edit" class="btn btn-success btn-sm mr-1">
                    Update
                </a>
                <form action="/answer/{{ $answer->id }}/delete" method="post">
                    @csrf
                    @method('DELETE')
=======
                <a href="/answer/{{ $question->id }}/edit" class="btn btn-success btn-sm mr-1">
                    Update
                </a>
                <form action="/answer/delete" method="post">
>>>>>>> b716e244db8b4de488f0c0c0cfdcf202d671b39a
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </div>

<<<<<<< HEAD
           

            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                  <span class="direct-chat-name float-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" src="{{ asset('/adminLTE/dist/img/user1-128x128.jpg')}}" alt="Message User Image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Is this template really for free? That's unbelievable!
                  <form action="" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                </form>
                </div>
                <!-- /.direct-chat-text -->
                
              </div>
              <!-- /.direct-chat-msg -->

              <form action="#" method="post">
                <div class="input-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="comment" placeholder="Type comment" name="comment" value="{{old('comment')}}">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-primary">Comment</button>
                  </span>
                </div>
              </form>
=======
            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img"
                    src="{{ asset('/adminLTE/dist/img/user1-128x128.jpg') }}"
                    alt="Message User Image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                    </form>
                </div>
                <!-- /.direct-chat-text -->

            </div>
            <!-- /.direct-chat-msg -->

            <form action="#" method="post">
                <div class="input-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="comment"
                        placeholder="Type comment" name="comment" value="{{ old('comment') }}">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </span>
                </div>
            </form>
>>>>>>> b716e244db8b4de488f0c0c0cfdcf202d671b39a

        </div>
    </div>
</div>
@endsection
