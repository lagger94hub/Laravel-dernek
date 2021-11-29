<header id="header" class="header-one">
    <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="{{route("root")}}">
                            <img loading="lazy" src="{{ asset('assets') }}/images/logo.png" alt="Constra">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Call Us</p>
                                        <p class="info-box-subtitle"><a
                                                href="#">{{$setting->phone == null ? "" : $setting->phone}}</a></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Email Us</p>
                                        @if($setting->email != null)
                                            <p class="info-box-subtitle"><a
                                                    href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                                            </p>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            @auth
                                <li class="last">
                                    <div class="info-box last">
                                        <div class="info-box-content">
                                            <p class="info-box-title">Hello!</p>
                                            <p class="info-box-subtitle">{{Auth::user()->name}}</p>

                                        </div>

                                    </div>
                                </li>

                                <li class="header-get-a-quote">
                                    <div class="nav-item dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Profile <i class="fas fa-user"></i>
                                        </button>
                                        <div class="dropdown-menu ramiCustome" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" style="" href="{{route("profile")}}">Manage Profile</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-get-a-quote">
                                    <a class="btn btn-primary" href="{{route("logout")}}">Logout</a>

                                </li>

                            @else
                                <li class="header-get-a-quote">
                                    <a class="btn btn-primary" href="{{route("login")}}">LogIn</a>
                                    <a class="btn btn-primary" href="/register">SignUP</a>
                                </li>

                            @endauth
                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>

@include("home._nav")

<!--/ Navigation end -->
</header>
<!--/ Header end -->
