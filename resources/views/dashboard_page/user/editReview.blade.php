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
        @include('dashboard_page.user.notification')
    @endsection
@section('main')

<div class="container">
    <h1 class="mb-7">My Review</h1>
    <div class="mt-5" id="review_content">
        @if ($reviewData->count() > 0)
            @foreach ($reviewData as $key => $review)
        <div class="row mb-3">
            <div class="col-sm-1">
                <div class="rounded-circle bg-danger text-white pt-2 pb-2">
                    <h3 class="text-center Uppercase">{{ $review->name[0] }}</h3>
                </div>
            </div>
            <div class="col-sm-11">
                <div class="card">
                    <div class="card-header"><b>{{ $review->name }}</b></div>
                    <div class="card-body">
                        @for ($star = 1; $star <= 5; $star++)
                            <i class="fas fa-star {{ $star <= $review->rating ? 'text-warning' : 'star-light' }} mr-1"></i>
                        @endfor
                        <br />
                        {{ $review->comment}}
                        <br>
                        @if($review->images)
                             <img src="{{$review->images }}" width="100px;" height="100px;">
                        @else
                        @endif
                    </div>
                    <div class="card-footer text-right" style="background: none; color:white;">
                        <div class="text-left" style="color: black">Tracking Number: {{ $review->parcel->tracking_number }}</div>
                        <button style="background: none; color:red; border-color:red; text-hover:none;" class="btn btn-link update-review-btn" data-toggle="modal" data-target="#reviewModal" data-parcels-id="{{ $review->id}}" style="border-radius: 5px">
                            Update
                        </button>
                        <form onsubmit="return confirmdeleted(event)" action="/Reviewdeleted/{{$review->id}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete
                            </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
            @else
                <p>No reviews available.</p>
        @endif
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#reviewModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var parcelId = button.data('parcels-id'); // Extract info from data-* attributes
            var form = $(this).find('form');
            // Update the action attribute of the form based on the parcel ID
            form.attr('action', '/updateReview/' + parcelId);

            // Update the value of the parcel_id input field
            form.find('#parcel_id').val(parcelId);
        });
    });
</script>
@if (isset($review))
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
        <form id="updatereviewForm" action="{{ route('update.review', ['id' => $review->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title">Update Review</h5>
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


  <!-- Include jQuery and assign it to a different variable -->
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
            $('#updatereviewForm').submit(function() {
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmdeleted(event)
    {
        event.preventDefault();

        Swal.fire({
            title: 'Confirm deteled your review?',
            text: "Deleted review cannot be return back",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            } else {
                swal('Not successful deleted');
            }
        });
    }
</script>





