@extends('dashboard_page.index')
@section('navitem')
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="staff">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParcel"
            aria-expanded="true" aria-controls="collapseParcel">
            <i class="fas fa-box"></i>
            <span>Parcel Management</span>
        </a>
        <div id="collapseParcel" class="collapse" aria-labelledby="headingParcel" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Parcel Component</h6>
                <a class="collapse-item" href="{{ route('AddParcel') }}">Add Parcel</a>
                <a class="collapse-item" href="{{ route('Userparcel.list') }}">List of Parcel</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReview"
            aria-expanded="true" aria-controls="collapseReview">
            <i class="fa fa-star"></i>
            <span>Review and Rating</span>
        </a>
        <div id="collapseReview" class="collapse" aria-labelledby="headingReview" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Component Review</h6>
                <a class="collapse-item" href="{{ route('review.list') }}">List of Review and Rating</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedback"
            aria-expanded="true" aria-controls="collapseFeedback">
            <i class="fa fa-comments"></i>
            <span>Feedback</span>
        </a>
        <div id="collapseFeedback" class="collapse" aria-labelledby="headingFeedback" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Component Feedback</h6>
                <a class="collapse-item" href="{{ route('Feedbackstaff.list') }}">List of Feedback</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnnouncement"
            aria-expanded="true" aria-controls="collapseAnnouncement">
            <i class="fa fa-bullhorn"></i>
            <span>Announcement</span>
        </a>
        <div id="collapseAnnouncement" class="collapse" aria-labelledby="headingAnnouncement" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Component Announcement</h6>
                <a class="collapse-item" href="{{ route('Annoucenment') }}">Created Announcement</a>
                <a class="collapse-item" href="{{ route('announcement.post') }}">List of Announcement</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('userlist') }}">
            <i class="fa fa-user-friends"></i>
            <span>List of user</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport"
            aria-expanded="true" aria-controls="collapseReport">
            <i class="fas fa-chart-bar"></i>
            <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingReport" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Component Report</h6>
                <a class="collapse-item" href="{{ route('userlist.report') }}">List of User</a>
                <a class="collapse-item" href="{{ route('parcellist.report') }}">List of Parcel</a>
                <a class="collapse-item" href="{{ route('parcelCollectedlist.report') }}">List of Parcel Collected</a>
                <a class="collapse-item" href="{{ route('Feedbacklist.report') }}">List of Feedback</a>
                <a class="collapse-item" href="{{ route('Reviewlist.report') }}">List of Review</a>
            </div>
        </div>
    </li>
@endsection()
@section('navNotify')
        @include('dashboard_page.staff.notification')
    @endsection
@section('main')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Total Parcels Received -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('Userparcel.list') }}">
                            <div class="card border-left-primary shadow h-100 py-1">
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary" id="reportParcelArrived">Total Parcel Arrived</h6>
                                    <div class="dropdown no-arrow" id="arrived-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item common-dropdown-item" href="#" data-report="daily">By Day</a>
                                            <a class="dropdown-item common-dropdown-item" href="#" data-report="weekly">By Week</a>
                                            <a class="dropdown-item common-dropdown-item" href="#" data-report="monthly">By Month</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="parcelArrivedCount">{{ number_format(DB::table('Parcels')->count()) }}</div>
                                                </div>
                                                <div class="col">
                                                    @php
                                                    $OverallParcel = DB::table('parcels')->count();
                                                    $totalParcel = DB::table('parcels')->count();
                                                    $goal = $OverallParcel; // You can set a goal or total number as per your requirement
                                                    $percentage = ($totalParcel / $goal) * 100;
                                                @endphp
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: {{ $percentage }}%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100" id="percentageArrived"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x" style="color:black;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <!-- Total Parcels Collected -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary" id="reportTitle">Total Parcel Collected</h6>
                                    <div class="dropdown no-arrow" id="collected-dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item common-dropdown-item" href="#" data-interval="daily">By Day</a>
                                            <a class="dropdown-item common-dropdown-item" href="#" data-interval="weekly">By Week</a>
                                            <a class="dropdown-item common-dropdown-item" href="#" data-interval="monthly">By Month</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"  id="parcelCount">{{ number_format(DB::table('Parcels')->where('status','=','Collected')->count()) }}</div>
                                                </div>
                                                <div class="col">
                                                    @php
                                                    $OverallParcel = DB::table('parcels')->count();
                                                    $totalParcel = DB::table('parcels')->where('status','=','Collected')->count();
                                                    $goal = $OverallParcel; // You can set a goal or total number as per your requirement
                                                    $percentage = ($totalParcel / $goal) * 100;
                                                @endphp
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: {{ $percentage }}%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100" id="percentage"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Review Received -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Review Received</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format(DB::table('reviews')->count()) }}</div>
                                                </div>
                                                <div class="col">
                                                    @php
                                                    $totalReviews = DB::table('reviews')->count();
                                                    $goal = 100; // You can set a goal or total number as per your requirement
                                                    $percentage = ($totalReviews / $goal) * 100;
                                                @endphp
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: {{ $percentage }}%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-star fa-2x" style="color: yellow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Feedback Received -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Feedback Received</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format(DB::table('feedback')->count()) }}</div>
                                                </div>
                                                <div class="col">
                                                    @php
                                                    $totalFeedbacks = DB::table('feedback')->count();
                                                    $goal = 100; // You can set a goal or total number as per your requirement
                                                    $percentage = ($totalFeedbacks / $goal) * 100;
                                                @endphp
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: {{ $percentage }}%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->

                    <div class="row">
                        @php
                        $currentYearMonth = date('Y');
                        $parcels = \App\Models\Parcel::where('date_received', 'like', $currentYearMonth . '%')->get();

                        // Calculate total number of parcels for each month
                        $monthlyTotals = $parcels->groupBy(function ($parcel) {
                            return \Carbon\Carbon::parse($parcel->date_received)->format('M');
                        })->map->count();

                        // Prepare data for the chart
                        $labels = $monthlyTotals->keys()->toJson();
                        $data = $monthlyTotals->values()->toJson();
                        @endphp
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Parcel Arrived Record</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#" >By Day</a>
                                            <a class="dropdown-item" href="#" >By Week</a>
                                            <a class="dropdown-item" href="#" >By Month</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            // Fetch data from the "parcels" table
                        $parcels = \App\Models\Parcel::all();

                        // Create an array to store the courier names and total parcel count
                        $courierData = [];

                        foreach ($parcels as $parcel) {
                            $courierName = $parcel->courier_name;

                            // If the courier name is not in the array, add it with count 1
                            if (!isset($courierData[$courierName])) {
                                $courierData[$courierName] = 1;
                            } else {
                                // If the courier name is already in the array, increment the count
                                $courierData[$courierName]++;
                            }
                        }

                        // Convert the array into the format needed for the chart
                        $pieData = [
                            'labels' => array_keys($courierData),
                            'data' => array_values($courierData),
                        ];
                        @endphp
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Courier Name</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        @foreach($pieData['labels'] as $index => $label)
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-{{$index < 3 ? ['primary', 'success', 'info'][$index] : 'secondary'}}"></i>
                                                {{$label}}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
                                        <label for="ref_no">Enter Tracking Number</label>
                                        <div class="input-group col-sm-5">
                                            <input type="search" id="ref_no" name="ref_no" class="form-control form-control-sm" placeholder="Type the tracking number here">
                                            <div class="input-group-append">
                                                <button type="submit" id="track-btn" class="btn btn-sm btn-primary btn-gradient-primary">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>

                                </div>
                                <div id="result" class="mt-3 text-center">
                                    <!-- Tracking result will be displayed here -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('#track-btn').click(function () {
                                var trackingNumber = $('#ref_no').val();

                                $.ajax({
                                    type: 'GET',
                                    url: '{{ route('track.parcel') }}',
                                    data: {
                                        ref_no: trackingNumber
                                    },
                                    success: function (response) {
                                        $('#result').html('<p>Tracking Number ' + trackingNumber + ' : ' + response + '</p>');
                                    },
                                    error: function () {
                                        $('#result').html('<p>Error fetching tracking information.</p>');
                                    }
                                });
                            });
                        });
                    </script>
                    <!-- Include axios library -->
                    <script type="text/javascript">
                        var chartData = {
                            labels: {!! $labels !!},
                            data: {!! $data !!}
                        };
                        var pieData = <?php echo json_encode($pieData); ?>;
                        // ... (rest of your JavaScript code)
                    </script>
                    <!-- Add this script block to handle dropdown selection -->
                    <script>
                        // Add a JavaScript block to handle the dropdown selection
                        $(document).ready(function () {
                            $('#collected-dropdown .common-dropdown-item').on('click', function (e) {
                                e.preventDefault();
                                var interval = $(this).data('interval');

                                // Make an AJAX request to the backend route with the selected interval
                                $.ajax({
                                    url: '/api/parcels',
                                    type: 'GET',
                                    data: { interval: interval },
                                    success: function (data) {
                                        // Update the DOM with the new parcel data
                                        $('#parcelCount').text(data.totalParcel);
                                        var percentage = (data.totalParcel / data.goal) * 100;
                                        $('#percentage').css('width', percentage + '%');
                                        var title = getTitleByInterval(interval);
                                        $('#reportTitle').text(title);
                                    },
                                    error: function (error) {
                                        console.log(error);
                                    }
                                });
                            });
                            // Function to get the title based on the selected interval
                                function getTitleByInterval(interval) {
                                    if (interval === 'daily') {
                                        return "Today's Report";
                                    } else if (interval === 'weekly') {
                                        return "Weekly Report";
                                    } else if (interval === 'monthly') {
                                        return "Monthly Report";
                                    } else {
                                        return "Custom Report"; // Add more cases as needed
                                    }
                                }
                        });
                        </script>

                        <script>
                            // Add a JavaScript block to handle the dropdown selection
                            $(document).ready(function () {
                                $('#arrived-dropdown .common-dropdown-item').on('click', function (e) {
                                    e.preventDefault();
                                    var report = $(this).data('report');

                                    // Make an AJAX request to the backend route with the selected interval
                                    $.ajax({
                                        url: '/api/parcels/arrived',
                                        type: 'GET',
                                        data: { report: report },
                                        success: function (data) {
                                            // Update the DOM with the new parcel data
                                            $('#parcelArrivedCount').text(data.totalParcel);
                                            var percentage = (data.totalParcel / data.goal) * 100;
                                            $('#percentageArrived').css('width', percentage + '%');
                                            var title = getTitleByInterval(report);
                                            $('#reportParcelArrived').text(title);
                                        },
                                        error: function (error) {
                                            console.log(error);
                                        }
                                    });
                                });
                                // Function to get the title based on the selected interval
                                    function getTitleByInterval(report) {
                                        if (report === 'daily') {
                                            return "Today's Report";
                                        } else if (report === 'weekly') {
                                            return "Weekly Report";
                                        } else if (report === 'monthly') {
                                            return "Monthly Report";
                                        } else {
                                            return "Custom Report"; // Add more cases as needed
                                        }
                                    }
                            });
                            </script>


@endsection()

