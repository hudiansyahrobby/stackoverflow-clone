{{-- @extends('layouts.app') --}}
@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <!-- <div class="row"> -->
        <div class="col-md-12 mt-2">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <!-- content here -->
        <div class="row" style="padding:10px;">
            <div class="col-lg-4">
              <!-- Widget: user widget style 2 -->
              <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                    <span>Bagaimana Cara Menyimpan Url Yang Mengandung Get ?</span>
                </div>
                <div class="card-footer p-0">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                        <div class="widget-user-image" style="padding:10px">
                            <img class="img-circle elevation-2" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <div style="margin-left:100px;margin-bottom:20px;">
                          <span>@username</span>
                          <br/>
                          <span>20 Aug 2020</span>
                          </div>
                    </li>
                    <li class="nav-item">
                        <div style="padding:10px;text-align:center;">
                            <button class="btn btn-primary">#html</button>
                            <button class="btn btn-success">#laravel</button>
                            <button class="btn btn-warning">#others</button>
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
                          <a href="#" class="nav-link">Views</a>
                    </center>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
                    <div class="col-lg-4">
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">
                            <span>Bagaimana Cara Menyimpan Url Yang Mengandung Get ?</span>
                        </div>
                        <div class="card-footer p-0">
                          <ul class="nav flex-column">
                            <li class="nav-item">
                                <div class="widget-user-image" style="padding:10px">
                                    <img class="img-circle elevation-2" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
                                  </div>
                                  <!-- /.widget-user-image -->
                                  <div style="margin-left:100px;margin-bottom:20px;">
                                  <span>@username</span>
                                  <br/>
                                  <span>20 Aug 2020</span>
                                  </div>
                            </li>
                            <li class="nav-item">
                                <div style="padding:10px;text-align:center;">
                                    <button class="btn btn-primary">#html</button>
                                    <button class="btn btn-success">#laravel</button>
                                    <button class="btn btn-warning">#others</button>
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
                                  <a href="#" class="nav-link">Views</a>
                            </center>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
  
                            <div class="col-lg-4">
                              <!-- Widget: user widget style 2 -->
                              <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-warning">
                                    <span>Bagaimana Cara Menyimpan Url Yang Mengandung Get ?</span>
                                </div>
                                <div class="card-footer p-0">
                                  <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <div class="widget-user-image" style="padding:10px">
                                            <img class="img-circle elevation-2" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
                                          </div>
                                          <!-- /.widget-user-image -->
                                          <div style="margin-left:100px;margin-bottom:20px;">
                                          <span>@username</span>
                                          <br/>
                                          <span>20 Aug 2020</span>
                                          </div>
                                    </li>
                                    <li class="nav-item">
                                        <div style="padding:10px;text-align:center;">
                                            <button class="btn btn-primary">#html</button>
                                            <button class="btn btn-success">#laravel</button>
                                            <button class="btn btn-warning">#others</button>
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
                                          <a href="#" class="nav-link">Views</a>
                                    </center>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <!-- /.widget-user -->
                            </div>
                        </div>
                                  <!-- /.row -->

        <!-- end content -->

</div>
@endsection
