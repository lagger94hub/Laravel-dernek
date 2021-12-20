@php
    $setting = \App\Http\Controllers\HomeController::getSettings();
@endphp

@extends('layouts.main_layout')
@section('title', $setting->company.'-Payment')
@section('description')
    {{$setting->description}}
@endsection
@section('keywords')
    {{$setting->keywords}}
@endsection

@section('header-js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('body')
    <div id="banner-area" class="banner-area"
         style="background-image:url({{ asset('assets') }}/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <p class="banner-title" style="font-size: 1rem">Payment</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Payment</li>
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

                        <form id="contact-form " action="{{route('user_store_payment')}}" method="POST" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="error-container"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p style="font-size: 3rem">Total to be paid for the content: <span
                                                style="font-weight: bold">270 tl</span></p>
                                        <input type="hidden" name="payment" value="270">
                                    </div>
                                </div>
                                <hr>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Payment Details</h5>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Card Name</label>
                                        <input type='text' class="form-control form-control-subject" name="cardname"
                                               id="note"
                                               placeholder="Card Name & User Name" value="{{Auth::user()->name}}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type='number' class="form-control form-control-subject" name="cardnumber"
                                               id="note"
                                               placeholder="Card Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Exp Date</label>
                                        <input type='text' class="form-control form-control-subject" name="date"
                                               id="note"
                                               placeholder="Valid date mm/yy" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Secret code </label>
                                        <input type='text' class="form-control form-control-subject" name="key"
                                               id="note"
                                               placeholder="Secret Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type='hidden' name="content_id" value="{{$contentId}}">
                                    </div>
                                </div>
                                <div class="text-right"><br>
                                    <button class="btn btn-primary solid blank" type="submit">Pay for content</button>
                                </div>
                            </div>
                        </form>

                    </div><!-- 1st post end -->


                </div>

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
