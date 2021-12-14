@php
    $setting = \App\Http\Controllers\HomeController::getSettings();
@endphp

@extends('layouts.main_layout')
@section('title', $setting->company.'-Contact')
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
                            <p class="banner-title" style="font-size: 1rem">Contact</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
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

                <div class="col-lg-6 mb-5 mb-lg-0 order-0 order-lg-1">
                    <div class="post">
                        {!! $setting->contact !!}
                    </div><!-- 1st post end -->
                </div>


            </div><!-- Main row end -->
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0 order-0 order-lg-1">
                    <h3 class="column-title">We love to hear</h3>
                    <!-- contact form works with formspree.io  -->
                    <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
                    @include('home._message')
                    <form id="contact-form" action="{{route('homemessage')}}" method="POST" role="form">
                        @csrf
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input class="form-control form-control-name" name="name" id="name" placeholder=""
                                           type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control form-control-email" name="email" id="email"
                                           placeholder="" type="email"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control form-control-email" name="phone" id="phone"
                                           placeholder="" type="text"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input class="form-control form-control-subject" name="subject" id="subject"
                                           placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control form-control-message" name="message" id="message"
                                              placeholder="" rows="7"
                                              required></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <input class="form-control form-control-subject" name="note" id="note"
                                           placeholder="" required>
                                </div>
                            </div>
                            <div class="text-right"><br>
                                <button class="btn btn-primary solid blank" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
