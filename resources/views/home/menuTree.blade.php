@foreach($subMenus as $subMenu)
    @if (!count($subMenu->children))
        <li><a href="">{{$subMenu->title}}</a></li>
    @else
        <li class="dropdown-submenu"><a  href="" class="dropdown-toggle" data-toggle="dropdown">{{$subMenu->title}}</a>
        <ul class="dropdown-menu" role="menu">
            @include('home.menuTree', ['subMenus' => $subMenu->children])
        </ul>
        </li>

    @endif
@endforeach



