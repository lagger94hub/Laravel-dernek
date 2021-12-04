@php
    $setting = \App\Http\Controllers\HomeController::getSettings();
@endphp

@extends('layouts.main_layout')
@section('title', $setting->title)
@section('description')
{{$setting->description}}
@endsection
@section('keywords')
{{$setting->keywords}}
@endsection

@section('body')
    @include('home._slider')

    <section id="news" class="news">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="section-title">Work of Excellence</h2>
                    <h3 class="section-sub-title">Our Top articles</h3>
                </div>
            </div>
            <!--/ Title row end -->
            <div class="row">
                @foreach($top as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="latest-post">
                        <div class="latest-post-media">
                            <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="latest-post-img">
                                <img loading="lazy" class="img-fluid" src="{{Storage::url($item->image)}}" alt="img" style="width: 400px;height: 220px">
                            </a>
                        </div>
                        <div class="post-body">
                            <h4 class="post-title">
                                <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="d-inline-block">{{$item->description}}</a>
                            </h4>

                        </div>
                    </div><!-- Latest post end -->
                </div><!-- 1st post col end -->
                @endforeach
            </div>
            <!--/ Content row end -->
            <div class="row text-center">
                <div class="col-12">
                    <h3 class="section-sub-title">Our recent articles</h3>
                </div>
            </div>

            <div class="row">
                @foreach($recent as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="latest-post">
                            <div class="latest-post-media">
                                <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="latest-post-img">
                                    <img loading="lazy" class="img-fluid" src="{{Storage::url($item->image)}}" alt="img" style="width: 400px;height: 220px">
                                </a>
                            </div>
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="d-inline-block">{{$item->description}}</a>
                                </h4>

                            </div>
                        </div><!-- Latest post end -->
                    </div><!-- 1st post col end -->
                @endforeach
            </div>

            <div class="row text-center">
                <div class="col-12">
                    <h3 class="section-sub-title">Articles you maybe interested in</h3>
                </div>
            </div>

            <div class="row">
                @foreach($interesting as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="latest-post">
                            <div class="latest-post-media">
                                <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="latest-post-img">
                                    <img loading="lazy" class="img-fluid" src="{{Storage::url($item->image)}}" alt="img" style="width: 400px;height: 220px">
                                </a>
                            </div>
                            <div class="post-body">
                                <h4 class="post-title">
                                    <a href="{{route('contentVisit', ['id' => $item->id, 'title' => $item->title])}}" class="d-inline-block">{{$item->description}}</a>
                                </h4>

                            </div>
                        </div><!-- Latest post end -->
                    </div><!-- 1st post col end -->
                @endforeach
            </div>


        </div>
        <!--/ Container end -->
    </section>
    <!--/ News end -->
@endsection
