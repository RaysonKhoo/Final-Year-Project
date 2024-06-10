@extends('dashboard_page.index')
@if(Auth::user()->role === 'staff')
    @section('navitem')
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('staff') }}">
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
@elseif(Auth::user()->role === 'user')
    @section('navitem')
    <!-- Divider -->
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
                    <a class="nav-link" href="{{ route('edit_profile') }}">
                        <i class="fa fa-user-circle"></i>
                        <span>User Profile</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('parcel.list') }}">
                        <i class="fa fa-list-ul"></i>
                        <span>List of parcel</span></a>
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
                            <a class="collapse-item" href="{{ route('create.review') }}">To Review</a>
                            <a class="collapse-item" href="{{ route('edit.review') }}">My Review</a>
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
                            <a class="collapse-item" href="{{ route('Feedbackform') }}">Create Feedback</a>
                            <a class="collapse-item" href="{{ route('Feedback.list') }}">List of Feedback</a>
                        </div>
                    </div>
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
                            <a class="collapse-item" href="{{ route('Userparcellist.report') }}">List of Parcel</a>
                            <a class="collapse-item" href="{{ route('UserparcelCollectedlist.report') }}">List of Parcel Collected</a>
                            <a class="collapse-item" href="{{ route('UserFeedbacklist.report') }}">List of Feedback</a>
                            <a class="collapse-item" href="{{ route('UserReviewlist.report') }}">List of Review</a>
                        </div>
                    </div>
                </li>
    @endsection()
@endif
@section('navNotify')
        @include('dashboard_page.staff.notification')
    @endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Parcel Form </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="date_received" class="col-md-2 col-form-label">Date Received</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="date_received" name="date_received" value="{{ $parcel->date_received }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tracking_number" class="col-md-2 col-form-label">Tracking Number</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tracking_number" name="tracking_number" value="{{ $parcel->tracking_number }}">
                                    <div class="input-group-append">
                                        <button type="button" id="scan_button" class="btn btn-outline-secondary">
                                            <i class="fas fa-barcode"></i> Scan Barcode
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Receiver Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $parcel->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room_number" class="col-md-2 col-form-label">Room Number</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $parcel->room_number}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-2 col-form-label">Phone Number</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $parcel->phone_number }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="courier_name" class="col-md-2 col-form-label">Courier Name</label>
                            <div class="col-md-10">
                                <select id="courierDropdown" name="courier_name" class="form-control" value="{{ $parcel->courier_name }}">
                                    <option value="">Select Courier</option>
                                    <option value="NinjaVan" {{ $parcel->courier_name === 'NinjaVan' ? 'selected' : '' }}>NinjaVan</option>
                                    <option value="ShoppeXpress" {{ $parcel->courier_name === 'ShoppeXpress' ? 'selected' : '' }}>ShoppeXpress</option>
                                    <option value="PosLaju" {{ $parcel->courier_name === 'PosLaju' ? 'selected' : '' }}>PosLaju</option>
                                    <option value="J&T" {{ $parcel->courier_name === 'J&T' ? 'selected' : '' }}>J&T</option>
                                    <option value="Other" {{ $parcel->courier_name === 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <div>
                                <input type="text" id="customCourier" name="custom_courier" class="form-control" style="display: none;" placeholder="Enter Courier Name" value="{{ $parcel->courier_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-2 col-form-label">Phone Number</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $parcel->phone_number }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get references to the select dropdown and the custom courier input field
    const courierDropdown = document.getElementById('courierDropdown');
    const customCourierInput = document.getElementById('customCourier');

    // Add an event listener to the select dropdown
    courierDropdown.addEventListener('change', function () {
        // Check if the selected option is "Other"
        if (courierDropdown.value === 'Other') {
            // If "Other" is selected, display the custom courier input field
            customCourierInput.style.display = 'block';
        } else {
            // If any other option is selected, hide the custom courier input field
            customCourierInput.style.display = 'none';
        }
    });
</script>
@endsection()
