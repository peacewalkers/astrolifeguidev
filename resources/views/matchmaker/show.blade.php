@extends('layouts.dashboard', ['title' => __('Horoscope')])

@section('content')

    <div class="container-fluid mt--7 databox">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $horoscopes->reptype }} Report Request</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="" class="btn btn-sm btn-primary">Add Horoscope</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                    </div>
                    <div class="card-footer py-4">
                            <div class="horoscope.info">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Name</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->name }}</div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Requested Report</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->reptype }}</div>
                                    </div>
                                </div>
                                <!-- /.report-dashboard-item -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Email</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->email }}</div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Phone Number</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->phone }}</div>
                                    </div>
                                </div>
                                <!-- /.report-dashboard-item -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Submitted By </div>
                                        <div class="report-dashboard-number">{{ $horoscopes->user->name }}</div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Submitted on</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->created_at }}</div>
                                    </div>
                                </div>
                                <!-- /.report-dashboard-item -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Gender</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->gender }}</div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Date Of Birth</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->dob }}</div>
                                    </div>
                                </div>
                                <!-- /.report-dashboard-item -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Time of Birth</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->tob }}</div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                    <div class="form-group col-md-6">
                                        <div class="report-dashboard-label">Place of Birth</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->pob }}</div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                </div>
                                <!-- /.flex-container -->
                                <!-- /.row -->

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="report-dashboard-label">Comments</div>
                                        <div class="report-dashboard-number">{{ $horoscopes->comments }}<span class="percentage-unit"></span></div>
                                    </div>
                                    <!-- /.report-dashboard-item -->
                                </div></div>
                            <!-- /.report-dashboard -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
