@auth
<div class="sidebar sidebar-left">

    <div class="widget">
        <h3 class="widget-title">User Panel</h3>
        <ul class="arrow nav nav-tabs">
            <li><a href="{{route("profile")}}">My Profile</a></li>
            <li><a href="{{route('public_profile', ['id' => Auth::user()->id])}}">My Public Profile</a></li>
            <li><a href="{{route('myreview')}}">My Reviews</a></li>
            <li><a href="{{route('logout')}}">Log Out</a></li>
            <li><a href="{{route('user_content')}}">My content</a></li>
            <li><a href="{{route('user_payment')}}">My payment</a></li>
            @php
             $userRoles = Auth::user()->roles->pluck('name');
            @endphp
            @if ($userRoles->contains('admin'))
                <li><a href="{{route('adminHome')}}">Admin panel</a></li>
            @endif

        </ul>
    </div><!-- Categories end -->


</div><!-- Sidebar end -->
@endauth
