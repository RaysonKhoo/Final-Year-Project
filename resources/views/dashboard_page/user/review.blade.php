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
<style>
    .progress-label-left {
        float: left; /* Place it on the left */
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right; /* Place it on the right */
        margin-left: 0.3em;
        line-height: 1em;
    }
    .star-light{
        color: #e9ecef;
    }

</style>
<div class="container">
    <h1 class="mb-7">Review & Rating</h1>
    <div class="card">
        <div class="card-header">Hostel Parcel</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h1 class="text-warning mt-4 mb-4">
                        <b><span id="average_rating">{{ number_format($averageRating, 1) }}</span> / 5</b>
                    </h1>
                    <div class="mb-3">
                        @for ($star = 1; $star <= 5; $star++)
                            @if ($star <= $averageRating)
                                <i class="fas fa-star text-warning mr-1 main_star"></i>
                            @else
                                @if ($star - 0.5 <= round($averageRating * 2) / 2)
                                    <i class="fas fa-star-half-alt text-warning mr-1 main_star half-fill"></i>
                                @else
                                    <i class="fas fa-star star-light mr-1 main_star"></i>
                                @endif
                            @endif
                        @endfor
                    </div>
                    <h3><span id="total_review">{{ count($userRatings) }}</span> Review</h3>
                </div>
                <div class="col-sm-8">
                    @for ($i = 5; $i >= 1; $i--)
                        <p>
                            <div class="progress-label-left"><b>{{ $i }}</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress-label-right">(<span id="total_{{ $i }}_star_review">{{ $ratingCounts["$i"] }}</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="{{ $ratingCounts["$i"] }}" aria-valuemin="0" aria-valuemax="{{ count($userRatings) }}" style="width: {{ $ratingCounts["$i"] / count($userRatings) * 100 }}%;" id="{{ $i }}_star_progress"></div>
                            </div>
                        </p>
                    @endfor
                </div>
            </div>
        </div>
    </div>
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
                    <div class="card-footer text-right">On {{ $review->created_at->format('l, jS F, Y h:i:s A') }}</div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>No reviews available.</p>
@endif
    </div>
</div>
@endsection()

