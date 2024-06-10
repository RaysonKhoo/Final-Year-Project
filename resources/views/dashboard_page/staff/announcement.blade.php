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
                        <i class="fas fa-chart-bar"></i>
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
                        <i class="fa fa-comments"></i>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Announcement</div>
                <div class="card-body">
                    <form id= "announcement_form" method="POST" action="{{ route('announcement.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="published_at">Publication Date</label>
                            <input type="date" class="form-control" id="published_at" name="published_at">
                        </div>

                        <button type="submit" class="btn btn-primary">Create Announcement
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to format the current date as YYYY-MM-DD
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Get the current date
    const currentDate = new Date();

    // Set the current date as the default value in the input field
    document.getElementById('published_at').value = formatDate(currentDate);
</script>
@endsection

