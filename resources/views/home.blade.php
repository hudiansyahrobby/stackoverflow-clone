{{-- @extends('layouts.app') --}}
@extends('adminlte.master')

@section('content')
<div class="container-fluid">

    <!-- content here -->
    <div class="row" style="padding:10px;">
        @forelse($questions as $key => $question)
            <div class="col-lg-4">
                <!-- Widget: user widget style 2 -->
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-warning">
                        <span>{{ $question->title }}</span>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <div class="widget-user-image" style="padding:10px">
                                    <img class="img-circle elevation-2"
                                        src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}"
                                        alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <div style="margin-left:100px;margin-bottom:20px;">
                                    <span>{{ $question->user->name }}</span>
                                    <br />
                                    <span>{{ date('d M Y, g:i a', strtotime($question->updated_at)) }}</span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div style="padding:10px;text-align:center;">
                                    @forelse($question->tags as $tag)
                                        <a href="/tag/{{ $tag->id }}/{{ $tag->name }}">
                                            <button class="btn btn-primary">#{{ $tag->name }}</button>
                                        </a>
                                    @empty
                                        <p>Tidak ada tags</p>
                                    @endforelse
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Answer <span class="float-right badge bg-primary">{{ count($question->answers) }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Vote <span class="float-right badge bg-info">
                                        {{ $question->votes->where('upvote', 1)->count() - $question->votes->where('downvote', 1)->count() }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <center>
                                    <a href="/question/{{ $question->id }}" class="nav-link">Views</a>
                                </center>
                            </li>
                        </ul>
                    </div>
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
    <!-- end content -->
</div>
@endsection
