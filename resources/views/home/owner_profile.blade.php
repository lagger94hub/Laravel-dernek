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
</head>
<body style="min-height: 100vh; background-color: white">

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title" style="background-color: orange; color: black">
                <div class="title_left" style="width: 100%">
                    <h3 style="width: 100%; text-align: center">Owner Details</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if ($owner->isEmpty())
                                <h1>Oops looks like the owner are not sharing their profile at the moment !!</h1>
                            @else
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="post" >
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
                                                    @if ($owner[0]->image)
                                                        <img src="{{Storage::url($owner[0]->image)}}" alt="" height="250" width="250">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{$owner[0]->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number</td>
                                                <td>{{$owner[0]->phone}}</td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            @endif


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
</body>
</html>
