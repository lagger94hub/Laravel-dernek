<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('assets') }}/admin/images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        @auth
            <span>Welcome,</span>
            <h2>{{Auth::user()->name}}</h2>
        @endauth

    </div>
</div>
