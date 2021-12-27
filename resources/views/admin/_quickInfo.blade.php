<div class="profile clearfix">
    <div class="profile_pic">

        @if (Auth::user()->profile_photo_path)
            <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" alt="..." class="img-circle profile_img" style="padding: 1px">
        @endif
    </div>
    <div class="profile_info">
        @auth
            <span>Welcome,</span>
            <h2>{{Auth::user()->name}}</h2>
        @endauth

    </div>
</div>
