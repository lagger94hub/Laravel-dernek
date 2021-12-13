@extends('layouts.adminLayout')

@section('title', 'admin panel Messages page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Messages Page</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Messages Page</h2>
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
                            <div class="card-box table-responsive">
                                @include('home._message')
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Content</th>
                                        <th>Subject</th>
                                        <th>Review</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($dataList as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->user->name}}</td>

                                            <td><a href="{{route('contentVisit', ['id' =>$item->content->id, 'title' => $item->content->title])}}"
                                                   target="_blank">{{$item->content->title}}</a></td>

                                            <td>{{$item->subject}}</td>
                                            <td>{{$item->review}}</td>
                                            <td>{{$item->rate}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <a onclick="return !window.open(this.href,'','top=50 left=100 width=1000,height=900')"
                                                   href={{route('reviewEdit', ['id'=>$item->id])}} ><i
                                                        class="fas fa-edit"></i></a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
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
@endsection

