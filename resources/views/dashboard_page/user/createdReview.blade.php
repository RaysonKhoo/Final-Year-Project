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
                <a class="collapse-item" href="{{ route('Fparcellist.report') }}">List of Parcel</a>
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
        @include('dashboard_page.user.notification')
    @endsection
@section('main')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4" style="color: black">List of User Parcel <i class="fas fa-box"></i></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="none">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date Received</th>
                            <th>Name</th>
                            <th>Tracking Number</th>
                            <th>Room</th>
                            <th>Phone Number</th>
                            <th>Courier Name</th>
                            <th>Parcel Status</th>
                            <th>Collect Date</th>
                            <th>Photos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($parcel)
                        @foreach ( $parcel as $data )
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->date_received)->format('d-m-Y') }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->tracking_number}}</td>
                            <td>{{ $data->room_number }}</td>
                            <td>{{ $data->phone_number }}</td>
                            <td>{{ $data->courier_name}}</td>
                            <td>{{ $data->status}}</td>
                            <td>{{ \Carbon\Carbon::parse($data->collect_date)->format('d-m-Y') }}</td>
                            <td>
                                @if($data->photos)
                                <img src="{{ asset('picture/parcels/' . $data->photos) }}" width="100px;" height="100px;">
                               @else
                               @endif
                            </td>
                            <td>
                                <button class="btn btn-primary review-btn" data-toggle="modal" data-target="#reviewModal" data-parcels-id="{{ $data->id}}" style="background: none; border:none;"><i class='fas fa-pencil-alt' style="color: black"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8">No Parcel Record Found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#reviewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var parcelId = button.data('parcels-id'); // Extract info from data-* attributes
            var form = $(this).find('form');
            // Update the action attribute of the form based on the parcel ID
            form.attr('action', '/StoreRating/' + parcelId);

            // Update the value of the parcel_id input field
            form.find('#parcel_id').val(parcelId);
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var j = jQuery.noConflict(true);
    (function($) {
        $(document).ready(function () {
            let selectedRating = 0;
            // Event handler for when a star is clicked
            $('.submit_star').on('click', function () {
                const rating = $(this).data('rating');

                if (rating === selectedRating) {
                    // If the same star is clicked again, deselect it
                    selectedRating = 0;
                } else {
                    // Set the selected rating to the clicked star's rating
                    selectedRating = rating;
                }
                // Update star colors to reflect the selected rating
                $('.submit_star').removeClass('text-warning star-light');
                $('.submit_star').each(function () {
                    if ($(this).data('rating') <= selectedRating) {
                        $(this).addClass('text-warning');
                    } else {
                        $(this).addClass('star-light');
                    }
                });

                // Set the rating field in the form to the selected rating
                $('#rating').val(selectedRating);
            });

            // Event handler for form submission
            $('#reviewForm').submit(function() {
                // Check if a rating has been selected
                if (selectedRating === 0) {
                    // Prevent the form from being submitted and show an error message
                    alert('Please select a rating before submitting the form.');
                    return false;
                }
                // If a rating is selected, the form will be submitted with the selected rating.
            });
        });
    })(j);
</script>
@if (isset($data))
<div class="modal form" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
        @endif
        <form id="reviewForm" action="{{ route('store.review', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="reviewLabel">Submit Review</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                  <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                  <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                  <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                  <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                  <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="hidden" name="parcel_id" id="parcel_id" value="{{ $data->id }}">
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Enter Your Name" />
                </div>
                <div class="form-group">
                    <textarea name="comment" id="comment" class="form-control" placeholder="Type Review Here"></textarea>
                    <br>
                    <input type="file" name="images" multiple>
                </div>
                <input type="hidden" name="rating" id="rating" value="" />
            </div>
            <div class="modal-footer">
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" id="save_review">Submit
                </button>
            </div>
        </form>
      </div>
    </div>
</div>
@endif
@endsection()


