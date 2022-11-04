@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="page-sidebar-inner">
    <div class="row grid-margin">
        <div class="col-md-4">
            <div class="card card-white stats-widget-6 p-0 h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-4 pb-0">
                        <div>
                            <h4 class="fw-bolder">659.8k</h4>
                            <p class="mb-0">Active Users</p>
                        </div>
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-20.png') }}" alt="">
                    </div>
                    <img src="{{ asset('traders-assets/img/Path-2.png') }}" alt="">
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-xl-2 mb-4 mb-xl-0">
            <div class="card card-white stats-widget-1 h-100">
                <div class="card-body">
                    <span class="mb-2 d-block">Orders</span>
                    <h4 class="mb-3">2,76K</h4>
                    <img src="{{ asset('traders-assets/img/Chart.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 mb-4 mb-xl-0">
            <div class="card card-white stats-widget-1 h-100">
                <div class="card-body">
                    <span class="mb-2 d-block">Profit</span>
                    <h4 class="mb-3">6,24K</h4>
                    <img src="{{ asset('traders-assets/img/Chart-2.png') }}" alt="">
                </div>
            </div>
        </div> --}}
        <div class="col-md-12 col-xl-8">
            <div class="card card-white stats-widget-2 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Statistics</h4>
                        <span>Updated 1 month ago</span>
                    </div>
                    <div class="row row mt-5 mb-4">
                        <div class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center statistics-box">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('traders-assets/img/icons-1.png') }}" alt="">
                                </div>
                                <div class="flex-grow-1 ms-3 text-start">
                                    <h4>230K</h4>
                                    <span>Sales</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center statistics-box">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('traders-assets/img/icons-2.png') }}" alt="">
                                </div>
                                <div class="flex-grow-1 ms-3 text-start">
                                    <h4 class="h5 mb-1">8.549k</h4>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center statistics-box">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('traders-assets/img/icons-3.png') }}" alt="">
                                </div>
                                <div class="flex-grow-1 ms-3 text-start">
                                    <h4 class="h5 mb-1">1.423k</h4>
                                    <span>Products</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-center align-items-center statistics-box">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('traders-assets/img/icons-4.png') }}" alt="">
                                </div>
                                <div class="flex-grow-1 ms-3 text-start">
                                    <h4 class="h5 mb-1">$9745</h4>
                                    <span>Revenue</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-md-2">
            <div class="card card-white stats-widget-3 h-100 text-center">
                <div class="card-body">
                    <img class="mb-3" src="{{ asset('traders-assets/img/icons-5.png') }}" alt="">
                    <h4>36.9k</h4>
                    <span>Views</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-white stats-widget-3 h-100 text-center">
                <div class="card-body">
                    <img class="mb-3" src="{{ asset('traders-assets/img/icons-6.png') }}" alt="">
                    <h4>12k</h4>
                    <span>Comments</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-white stats-widget-3 h-100 text-center">
                <div class="card-body">
                    <img class="mb-3" src="{{ asset('traders-assets/img/icons-7.png') }}" alt="">
                    <h4>97.8k</h4>
                    <span>Orders</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-white stats-widget-3 h-100 text-center">
                <div class="card-body">
                    <img class="mb-3" src="{{ asset('traders-assets/img/icons-8.png') }}" alt="">
                    <h4>26.8</h4>
                    <span>Bookmarks</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-white stats-widget-3 h-100 text-center">
                <div class="card-body">
                    <img class="mb-3" src="{{ asset('traders-assets/img/icons-9.png') }}" alt="">
                    <h4>689</h4>
                    <span>Reviews</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-white stats-widget-3 h-100 text-center">
                <div class="card-body">
                    <img class="mb-3" src="{{ asset('traders-assets/img/icons-10.png') }}" alt="">
                    <h4>36.9k</h4>
                    <span>Views</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-md-3">
            <div class="card card-white stats-widget-4 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bolder">86%</h4>
                            <p class="mb-0">CPU Usage</p>
                        </div>
                        <img src="{{ asset('traders-assets/img/icons-11.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-white stats-widget-4 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bolder">1.2gb</h4>
                            <p class="mb-0">Memory Usage</p>
                        </div>
                        <img src="{{ asset('traders-assets/img/icons-12.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-white stats-widget-4 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bolder">0.1%</h4>
                            <p class="mb-0">Downtime Ratio</p>
                        </div>
                        <img src="{{ asset('traders-assets/img/icons-13.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-white stats-widget-4 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bolder">13</h4>
                            <p class="mb-0">CPU Usage</p>
                        </div>
                        <img src="{{ asset('traders-assets/img/icons-14.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-md-3">
            <div class="card card-white stats-widget-5 p-0 h-100">
                <div class="card-body p-0">
                    <div class="p-4 pb-0">
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-15.png') }}" alt="">
                        <h4 class="fw-bolder">92.6k</h4>
                        <p class="mb-0">Subscribers Gained</p>
                    </div>
                    <img src="{{ asset('traders-assets/img/Group 56.png') }}" alt="">
                </div>
            </div>
        </div>    
        <div class="col-md-3">
            <div class="card card-white stats-widget-5 p-0 h-100">
                <div class="card-body p-0">
                    <div class="p-4 pb-0">
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-16.png') }}" alt="">
                        <h4 class="fw-bolder">97.5k</h4>
                        <p class="mb-0">Revenue Generated</p>
                    </div>
                    <img src="{{ asset('traders-assets/img/Group 57.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-white stats-widget-5 p-0 h-100">
                <div class="card-body p-0">
                    <div class="p-4 pb-0">
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-17.png') }}" alt="">
                        <h4 class="fw-bolder">36%</h4>
                        <p class="mb-0">Quarterly Sales</p>
                    </div>
                    <img src="{{ asset('traders-assets/img/Group 58.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-white stats-widget-5 p-0 h-100">
                <div class="card-body p-0">
                    <div class="p-4 pb-0">
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-18.png') }}" alt="">
                        <h4 class="fw-bolder">38.4K</h4>
                        <p class="mb-0">Orders Received</p>
                    </div>
                    <img src="{{ asset('traders-assets/img/Group 59.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-md-4">
            <div class="card card-white stats-widget-6 p-0 h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-4 pb-0">
                        <div>
                            <h4 class="fw-bolder">78.9k</h4>
                            <p class="mb-0">Site Traffic</p>
                        </div>
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-19.png') }}" alt="">
                    </div>
                    <img src="{{ asset('traders-assets/img/Path-1.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-white stats-widget-6 p-0 h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-4 pb-0">
                        <div>
                            <h4 class="fw-bolder">659.8k</h4>
                            <p class="mb-0">Active Users</p>
                        </div>
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-20.png') }}" alt="">
                    </div>
                    <img src="{{ asset('traders-assets/img/Path-2.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-white stats-widget-6 p-0 h-100">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-4 pb-0">
                        <div>
                            <h4 class="fw-bolder">28.7k</h4>
                            <p class="mb-0">Newsletter</p>
                        </div>
                        <img class="mb-3" src="{{ asset('traders-assets/img/icons-21.png') }}" alt="">
                    </div>
                    <img src="{{ asset('traders-assets/img/Path-3.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-white stats-widget-7 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="fw-bolder mb-3">Earning</h4>
                        <span class="d-block">This Month</span>
                        <p>$4055.56</p>
                        <p class="mb-0">68.2% more earnings than last month.</p>
                        </div>
                        <img class="mb-3" src="{{ asset('traders-assets/img/Chart-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
