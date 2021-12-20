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

                    <div class="sidebar sidebar-left">

                        <div class="widget">
                            <h3 class="widget-title">User Panel</h3>
                            <ul class="arrow nav nav-tabs">
                                <li><a href="#">My Profile</a></li>
                                <li><a href="{{route('myreview')}}">My Reviews</a></li>
                                <li><a href="{{route('logout')}}">Log Out</a></li>
                                <li><a href="{{route('user_content')}}">My content</a></li>
                                <li><a href="{{route('user_payment')}}">My payment</a></li>

                            </ul>
                        </div><!-- Categories end -->


                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->
                <div class="col-lg-10 mb-5 mb-lg-0 order-0 order-lg-1">
                    <div class="post">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action={{route('user_store_content')}} >
                                @CSRF
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Menu <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="menu_id">
                                            @foreach($menus as $menu)
                                                <option value={{$menu->id}}>{{\App\Http\Controllers\admin\MenuController::getParentsTree($menu, $menu->title)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="title"  class="form-control " name="title">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="keywords">Keywords <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="keywords"  class="form-control " name="keywords">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="description"  class="form-control " name="description">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" id="image"  class="form-control " name="image">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="type">Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="type"  class="form-control " name="type">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="detail">Detail <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="summernote" name="detail"></textarea>
                                        <script>
                                            $('#summernote').summernote({
                                                placeholder: 'Hello Bootstrap 4',
                                                tabsize: 2,
                                                height: 100
                                            });
                                        </script>
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>

                            </form>
                    </div><!-- 1st post end -->


                </div>

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
