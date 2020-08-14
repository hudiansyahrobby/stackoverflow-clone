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
                                <img class="img-circle elevation-2" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg') }}" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <div style="margin-left:100px;margin-bottom:20px;">
                                <span>{{ $question->user->name }}</span>
                                <br />
                                <span>{{ date('d M Y', strtotime($question->created_at)) }}</span>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div style="padding:10px;text-align:center;">
                                @forelse ($question->tags as $tag)
                                    <button class="btn btn-primary">#{{ $tag->name }}</button>
                                @empty
                                    <p>Tidak ada tags</p>
                                @endforelse
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Comments <span class="float-right badge bg-primary">21</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Likes <span class="float-right badge bg-info">10</span>
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