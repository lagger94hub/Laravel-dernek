@php
    $setting = \App\Http\Controllers\HomeController::getSettings();
@endphp

@extends('layouts.main_layout')
@section('title', $setting->company.'-About us')
@section('description')
    {{$setting->description}}
@endsection
@section('keywords')
    {{$setting->keywords}}
@endsection

@section('body')
    <div id="banner-area" class="banner-area"
         style="background-image:url({{ asset('assets') }}/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center" style="font-size: 1.25rem">
                                    <li class="breadcrumb-item"><a href="{{route('root')}}">Home</a></li>
                                    <li class="breadcrumb-item active"
                                        aria-current="page">{{\App\Http\Controllers\admin\MenuController::getParentsTree($data, $data->title)}}</li>
                                </ol>
                            </nav>
                        </div>

                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mb-5 mb-lg-0">

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <div class="container ">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-width: 900px;margin: auto">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators" style="margin: auto !important;">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        @foreach ($images as $image)
                                            <li data-target="#myCarousel" data-slide-to=""></li>
                                        @endforeach

                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="{{Storage::url($data->image)}}" alt="Los Angeles"
                                                 style="height: 450px;width: 100%">
                                        </div>
                                        @foreach($images as $image)
                                            <div class="item ">
                                                <img src="{{Storage::url($image->image)}}" alt="Los Angeles"
                                                     style="height: 450px;width: 100%">
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            {{--                            <img loading="lazy" src="{{Storage::url($data->image)}}" class="img-fluid" alt="post-image">--}}
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-cat">
                                         <i class="far fa-folder-open"></i><a
                                            href="#"> {{\App\Http\Controllers\admin\MenuController::getParentsTree($menu, $menu->title)}}</a>
                                    </span>
                                    <span class="post-meta-date"><i
                                            class="far fa-calendar"></i> {{$data->updated_at}}</span>
                                    @php
                                     $avrgreview = \App\Http\Controllers\HomeController::avrgreview($data->id);
                                     $countreview = \App\Http\Controllers\HomeController::countreview($data->id);

                                    @endphp
                                    <div class="content-rating">
                                        <i style="color: orange !important;" class="@if($avrgreview<1) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($avrgreview<2) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($avrgreview<3) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($avrgreview<4) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($avrgreview<5) far @else fa @endif fa-star"></i>
                                        <a href="#rami-rating">{{$countreview}} Review(s) {{$avrgreview}}/ Add review </a>

                                    </div>

                                </div>
                                <h2 class="entry-title">
                                    {{$data->title}}
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <p>{!! $data->detail !!}</p>
                            </div>


                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                </div><!-- Content Col end -->


            </div>
            <div class="row">
                <div id="rami-rating" class="col-lg-12 mb-5 mb-lg-0">
                    @livewire('review', ['id' => $data->id])
                    @livewireScripts

                </div>
            </div><!-- Main row end -->

            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div id="comments" class="comments-area">
                        <h3 class="comments-heading">{{$countreview}} Review(s)</h3>

                        <ul class="comments-list">
                            @foreach($reviews as $review)
                            <li>
                                <div class="comment d-flex">

                                    <div class="content-rating" style="margin-right: 10px;">
                                        <i style="color: orange !important;" class="@if($review->rate<1) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($review->rate<2) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($review->rate<3) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($review->rate<4) far @else fa @endif fa-star"></i>
                                        <i style="color: orange !important;" class="@if($review->rate<5) far @else fa @endif fa-star"></i>
                                    </div>
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author mr-3">{{$review->user->name}}</span>
                                            <span class="comment-date float-right">{{$review->created_at}}</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>{{$review->review}}</p>
                                        </div>
                                    </div>
                                </div><!-- Comments end -->
                            </li><!-- Comments-list li end -->
                            @endforeach
                        </ul><!-- Comments-list ul end -->
                    </div>
                </div>
                </div>

        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection
