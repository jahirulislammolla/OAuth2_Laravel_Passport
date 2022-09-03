
@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Courses
                        {{-- <small>Universal Admin panel</small> --}}
                    </h3>
                </div>
                <div class="col-lg-6">
                    {{-- <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Sample Page</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card height-equal equal-height-lg">
                    <div class="blog-box blog-grid text-center">
                        <img src="{{ asset('') }}uploads/course/web-app.jpg" class="img-fluid top-radius-blog" alt="">
                        <div class="blog-details-main">
                            {{-- <ul class="blog-social">
                                <li class="digits">9 April 2021</li>
                                <li class="digits">by: Admin</li>
                                <li class="digits">0 Hits</li>
                            </ul> --}}
                            <hr>
                            <h6 class="blog-bottom-details">Web full stack development</h6>
                            <div class="d-flex justify-content-center pb-3">
                                <a href="" class="btn btn-sm btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Container-fluid starts -->
@endsection
