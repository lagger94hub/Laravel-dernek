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
    <div id="banner-area" class="banner-area"
         style="background-image:url({{ asset('assets') }}/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <p class="banner-title" style="font-size: 1rem">User Profile</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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

                <div class="col-lg-2 order-1 order-lg-0">


                        @include('home._sideProfile')

                    </div><!-- Sidebar Col end -->
                <div class="col-lg-10 mb-5 mb-lg-0 order-0 order-lg-1">
                    <div class="post">
                        @include('home._message')
                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Content ID</th>
                                    <th>Paid Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>

                                </tr>
                                </thead>


                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$payment->user->name}}</td>
                                        <td>{{$payment->content_id}}</td>
                                        <td>{{$payment->payment}}</td>
                                        <td>{{$payment->created_at}}</td>
                                        <td>{{$payment->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div><!-- 1st post end -->


                </div>

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
