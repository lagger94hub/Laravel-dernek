@foreach($subMenus as $subMenu)
    @if (!count($subMenu->children))
        <li><a href="{{route('menucontent', ['id' => $subMenu->id, 'title' => $subMenu->title])}}">{{$subMenu->title}}</a></li>
    @else
        <li class="dropdown-submenu"><a  href="" class="dropdown-toggle" data-toggle="dropdown">{{$subMenu->title}}</a>
        <ul class="dropdown-menu" role="menu">
            @include('home.menuTree', ['subMenus' => $subMenu->children])
        </ul>
        </li>

    @endif
@endforeach



