<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets') }}/admin/images/favicon.ico" type="image/ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <!-- Bootstrap -->
    <link href="{{ asset('assets') }}/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets') }}/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets') }}/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets') }}/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets') }}/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets') }}/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets') }}/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets') }}/admin/build/css/custom.min.css" rel="stylesheet">
    <title>{{$user->name}}</title>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User Details</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
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
                            @include('home._review')
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                  method="post" action={{route('admin_user_store_role', ['id'=> $user->id])}}>
                                @CSRF
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table  table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Data</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>image</td>
                                            <td>
                                                @if ($user->profile_photo_path)
                                                    <img src="{{Storage::url($user->profile_photo_path)}}" alt="" height="250" width="250">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{$user->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$user->name}}</td>

                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$user->email}}</td>

                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$user->phone}}</td>

                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$user->address}}</td>

                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>{{$user->created_at}}</td>

                                        </tr>
                                        <tr>
                                            <td>Roles</td>
                                            <td>@foreach($user->roles as $role)
                                                    {{$role->name}}
                                                    <a href="{{route('admin_user_delete_role', ['userid' => $user->id, 'roleid' => $role->id])}}"><i class="fas fa-trash-alt"></i></a>
                                                    <br>
                                                @endforeach</td>

                                        </tr>
                                        <tr>
                                            <td>Add Role</td>
                                            <td><select name="roleid" id="">
                                                    @foreach($roles as $role)
                                                        @if(!($user->roles->contains($role)))
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select> <br> <button type="submit" class="btn btn-success" style="margin-top: 20px; padding: .5rem">Add Role</button>
                                            </td>

                                        </tr>


                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="item form-group">
                                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets') }}/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script
        src="{{ asset('assets') }}/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script
        src="{{ asset('assets') }}/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/admin/vendors/pdfmake/build/vfs_fonts.js"></script>

