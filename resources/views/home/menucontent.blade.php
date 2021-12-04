@php
    $setting = \App\Http\Controllers\HomeController::getSettings();
@endphp

@extends('layouts.main_layout')
@section('title', $setting->company.'-MenuContent')
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
                                    <li class="breadcrumb-item active" aria-current="page">{{\App\Http\Controllers\admin\MenuController::getParentsTree($menu, $menu->title)}}</li>
                                </ol>
                            </nav>
                        </div>

                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->
    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">
                @foreach($dataList as $data)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                            <img style="width: 400px;height: 220px" loading="lazy" class="w-100" src="{{Storage::url($data->image)}}" alt="service-image">
                        </div>
                        <div class="d-flex" >
                            <div class="ts-service-info" style="margin-left:0 !important;">
                                <h3 class="service-box-title"><a href="service-single.html">{{$data->title}}</a></h3>
                                <p>{{$data->description}}</p>
                                <a href="{{route('contentVisit', ['id' => $data->id, 'title' => $data->title])}}" class="btn btn-primary">Continue Reading</a>
                            </div>
                        </div>
                    </div><!-- Service1 end -->
                </div><!-- Col 1 end -->
                @endforeach
            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection
