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
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4" style="color: black">List of Feedback <i class="fa fa-comments"></i></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive" style=" margin-bottom: 20px;">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>content</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                            <th>Reply Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($Feedback)
                        @foreach ( $Feedback as $info )
                        <tr>
                            <td>{{ $info->id }}</td>
                            <td>{{ $info->name }}</td>
                            <td>{{ $info->email }}</td>
                            <td>{{ $info->subject }}</td>
                            <td>{{ $info->content }}</td>
                            <td>{{ $info->phone_number }}</td>
                            <td>{{ $info->created_at}}</td>
                            <td>{{ $info->reply }}</td>
                            <td>
                                <button class="btn btn-primary reply-btn" data-toggle="modal" data-target="#replyModal" data-feedback-id="{{ $info->id }}" style="border-radius: 5px">Reply</button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="8">No feedback found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
</div>
</div>
<!-- Include SweetAlert2 for modal dialogs -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

    function validateAndSubmitFeedback(event) {
        event.preventDefault(); // Prevent the form from submitting

        const replyMessage = document.getElementById('reply').value;
        if (replyMessage.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Reply message cannot be empty!'
            });
        } else {
            $('#replyForm').submit();// Submit the form if the reply message is not empty
        }
    }

</script>

<script>
    $(document).ready(function () {
        $('#replyModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var feedbackId = button.data('feedback-id'); // Extract info from data-* attributes
            var form = $(this).find('form');

            // Update the action attribute of the form based on the feedback ID
            form.attr('action', '/feedbackreply/' + feedbackId);

            // Update the value of the feedback_id input field
            form.find('#feedback_id').val(feedbackId);
        });
    });
</script>
@if (isset($info))
<!-- User Feedback Reply Form -->
<div class="modal form" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Begin Reply Form -->
            <form id="replyForm" action="{{ route('Feedback.reply', ['id' => $info->id]) }}" method="POST">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <!-- Modal Title -->
                    <h5 class="modal-title" id="replyLabel">Reply Feedback</h5>
                    <!-- Close Button -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <!-- Close Icon -->
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <input type="" name="feedback_id" id="feedback_id" value="{{ $info->id }}">

                    <!-- Text Area for Your Reply -->
                    <div class="form-group">
                        <label for="reply">Reply Message</label>
                        <textarea class="form-control" id="reply" name="reply"></textarea>
                        @error('reply')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Cancel Button -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <!-- Submit Button -->
                    <button type="button" class="btn btn-primary" onclick="validateAndSubmitFeedback(event)">Submit
                    </button>
                </div>
            </form>
            <!-- End Reply Form -->
        </div>
    </div>
</div>
@endif
@endsection()
