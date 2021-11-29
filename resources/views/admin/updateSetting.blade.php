@extends('layouts.adminLayout')

@section('title', 'Edit Setting')

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Setting page</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Setting Page</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                  method="post" enctype="multipart/form-data"
                                  action={{route('settingUpdate', ['id'=> $data->id])}} >
                                @CSRF
                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general"
                                           role="tab" aria-controls="general" aria-selected="true">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#smtpemail"
                                           role="tab" aria-controls="smtpemail" aria-selected="false">SmtpEmail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#socialmedia"
                                           role="tab" aria-controls="socialmedia" aria-selected="false">Social
                                            Media</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#aboutus"
                                           role="tab" aria-controls="aboutus" aria-selected="false">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                           role="tab" aria-controls="contact" aria-selected="false">Contact Page</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Title <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="title" value="{{$data->title}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Keywords
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="keywords" value="{{$data->keywords}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">description
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="description" value="{{$data->description}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Company
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="company" value={{$data->company}}>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Address
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="address" value="{{$data->address}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Phone <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="phone" value="{{$data->phone}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Fax <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="fax"
                                                       value="{{$data->fax}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">email <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="email" value="{{$data->email}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span
                                                    class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="form-control" name="status">
                                                    <option value={{$data->status}} selected>{{$data->status}}</option>
                                                    <option
                                                        value={{($data->status == 'True') ? "False" : "True"}} >{{($data->status == 'True') ? "False" : "True"}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="smtpemail" role="tabpanel"
                                         aria-labelledby="smtpemail-tab">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">smtpserver
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="smtpserver" value="{{$data->smtpserver}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">smtpemail
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="smtpemail" value="{{$data->smtpemail}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">smtppassword
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="first-name" required="required"
                                                       class="form-control "
                                                       name="smtppassword" value="{{$data->smtppassword}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">smtpport
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="number" id="first-name" required="required"
                                                       class="form-control "
                                                       name="smtpport" value="{{$data->smtpport}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="socialmedia" role="tabpanel"
                                         aria-labelledby="socialmedia-tab">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Facebook
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="facebook" value="{{$data->facebook}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Instagram
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="instagram" value="{{$data->instagram}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Twitter
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="twitter" value="{{$data->twitter}}">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Youtube
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="youtube" value="{{$data->youtube}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="aboutus" role="tabpanel"
                                         aria-labelledby="aboutus-tab">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">About Us
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <textarea id="summernote1" name="aboutus">{{$data->aboutus}}</textarea>
                                                <script>
                                                    $('#summernote1').summernote({
                                                        placeholder: 'Hello Bootstrap 4',
                                                        tabsize: 2,
                                                        height: 100
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">References
                                                <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <textarea id="summernote2"
                                                          name="references">{{$data->references}}</textarea>
                                                <script>
                                                    $('#summernote2').summernote({
                                                        placeholder: 'Hello Bootstrap 4',
                                                        tabsize: 2,
                                                        height: 100
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                         aria-labelledby="contact-tab">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Contact
                                                <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" required="required"
                                                       class="form-control "
                                                       name="contact" value="{{$data->contact}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
