<div class="banner-carousel banner-carousel-1 mb-0">
    @foreach($slider as $item)
    <div class="banner-carousel-item" style="background-image:url({{Storage::url($item->image)}})">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-left">
                        <h3 class="slide-sub-title" data-animation-in="slideInRight" style="color: #ffc107">{{$item->title}}</h3>
                        <h2 class="slide-title" data-animation-in="slideInLeft">{{$item->description}}</h2>
                        <p data-animation-in="slideInRight" style="opacity: 0;" class="">
                            <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="slider btn btn-primary border" tabindex="-1">Visit Content</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
