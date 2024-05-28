

@section('content')

<div class="container">
    <div class="row">
       <div class="col-12">
        <div class="container">
            <div class="row flex-nowrap py-5" style="margin-top: 150px">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light" >
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline text-dark">Menu</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{ route('my-orders') }}" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">My Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Account Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col mx-3">
                   @yield('table_content')
                </div>
            </div>
        </div>
       </div>
    </div>
</div>

@endsection