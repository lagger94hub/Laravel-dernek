<div class="site-navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @php
                        $parentMenus = \App\Http\Controllers\HomeController::menuList();
                    @endphp

                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav mr-auto">

                            @foreach ($parentMenus as $parentMenu)
                                @if (!count($parentMenu->children))
                                    <li class="nav-item"><a class="nav-link" href="{{route('menucontent',['id' => $parentMenu->id, 'title' => $parentMenu->title])}}">{{$parentMenu->title}}</a></li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a href="" class="nav-link dropdown-toggle"
                                           data-toggle="dropdown">{{$parentMenu->title}} <i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            @include('home.menuTree', ['subMenus' => $parentMenu->children])
                                        </ul>

                                    </li>

                                @endif

                            @endforeach

                            <li class="nav-item"><a class='nav-link' href="{{route("references")}}">References</a></li>
                            <li class="nav-item"><a class='nav-link' href="{{route("faq")}}">FAQ</a></li>
                            <li class="nav-item"><a class='nav-link' href="{{route("contact")}}">Contact</a></li>
                            <li class="nav-item"><a class='nav-link' href="{{route("about")}}">About Us</a></li>



                        </ul>
                    </div>
                </nav>
            </div>
            <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="nav-search">

            <form action="{{route('getContent')}}" method='POST' id="my-form">
                @csrf
                @livewire('search')
                <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
            @livewireScripts

        </div>
{{--            <span id="search"><i class="fa fa-search"></i></span>--}}

        <div class="search-block" style="display: none;">
            <label for="search-field" class="w-100 mb-0">
                <input type="text" class="form-control" id="search-field"
                       placeholder="Type what you want and enter">
            </label>
            <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->
</div>
