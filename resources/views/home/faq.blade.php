@php
    $setting = \App\Http\Controllers\HomeController::getSettings();
@endphp

@extends('layouts.main_layout')
@section('title', $setting->company.'- FAQ')
@section('description')
    {{$setting->description}}
@endsection
@section('keywords')
    {{$setting->keywords}}
@endsection

@section('header-js')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#accordion").accordion();
        });
    </script>
@endsection

@section('body')
    <div id="banner-area" class="banner-area"
         style="background-image:url({{ asset('assets') }}/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <p class="banner-title" style="font-size: 1rem">FAQ</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
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

                <div class="col-lg-12 mb-5 mb-lg-0 order-0 order-lg-1">
                    <div class="post">
                        <div id="accordion">
                        @foreach($dataList as $item)
                                <h3>{{$item->question}}</h3>
                                <div>
                                    <p>{!!$item->answer !!}</p>
                                </div>
                        @endforeach
                        </div>
                    </div><!-- 1st post end -->


                </div>

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
