@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <form method="post" action="/pertanyaan">
                @csrf
                <div class="form-group">
                    <label for="title"><h3>Bagaimana Cara Menyimpan Url Yang Mengandung Get ?</h3></label>
                    <label for="content"><h5><p>
                        Misal Kita Ingin Menyimpan https://myweb.kom/?nama=saya nah link tsb mau di simpan di URL GET bagaimana caranya ?</p></h5>
                    </label>
                    <label for="tags">
                        <button class="btn btn-primary btn-xs">#html</button>
                        <button class="btn btn-success btn-xs">#laravel</button>
                        <button class="btn btn-warning btn-xs">#others</button>
                    </label>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <div class="p-2">
                        <img class="direct-chat-img" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg')}}" alt="User Avatar" style="size: 10;margin-right:10px;">
                            <font style="font-size: 12px">@username ( <font style="color: blue"><b>21</b> contribution </font> )
                            <br/>Post : 20 Aug 2020
                            </font>
                    </div>
                    {{-- <div class="p-2 bg-warning">Flex item 2</div> --}}
                    <div class="p-2">
                          <button type="button" class="btn btn-primary btn-sm">
                            Likes <span class="badge badge-light">4</span>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm">
                            Dislikes <span class="badge badge-light">5</span>
                          </button>
                    </div>
                  </div>
                
                {{-- <button type="submit" class="btn btn-primary">Submit New Question</button> --}}
            </form>
        </div>
    </div>
     <button type="button" class="btn btn-primary btn-sm" style="margin-left: 20px">
        ANSWER
      </button>
    <div class="mt-3 ml-3">
        <div class="card p-3">
            <form method="post" action="/pertanyaan">
                @csrf
                <button type="button" class="btn btn-warning btn-sm">
                    BEST ANSWER
                  </button>
                <div class="form-group">
                    
                    <label for="content"><h5><p>
                        Coba cari di-search-engine untuk FizzBuzz. 
Sepertinya banyak untuk hal ini.</p></h5>

                    </label>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <div class="p-2">
                        <img class="direct-chat-img" src="{{ asset('/adminLTE/dist/img/user7-128x128.jpg')}}" alt="User Avatar" style="size: 10;margin-right:10px;">
                            <font style="font-size: 12px">@username ( <font style="color: blue"><b>21</b> contribution </font> )
                            <br/>Post : 20 Aug 2020
                            </font>
                    </div>
                    {{-- <div class="p-2 bg-warning">Flex item 2</div> --}}
                    <div class="p-2">
                          <button type="button" class="btn btn-primary btn-sm">
                            Likes <span class="badge badge-light">4</span>
                          </button>
                          <button type="button" class="btn btn-danger btn-sm">
                            Dislikes <span class="badge badge-light">4</span>
                          </button>
                    </div>
                  </div>
                
                {{-- <button type="submit" class="btn btn-primary">Submit New Question</button> --}}
            </form>
        </div>
    </div>
</div>
@endsection