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


<!-- Begin Page Content -->
<style>
    .icon-no-border {
        color: red;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h2 mb-4" style="color: black">List of User Parcel <i class="fas fa-box"></i></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >ID</th>
                            <th >Date Received</th>
                            <th >Receiver Name</th>
                            <th >Tracking Number</th>
                            <th >Room Number</th>
                            <th >Phone Number</th>
                            <th >Courier Name</th>
                            <th >Parcel Status</th>
                            <th >Date Selection</th>
                            <th >Time Selection</th>
                            <th >Action</th>
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
                            <td>
                            @if($data->selection_date)
                                {{ \Carbon\Carbon::parse($data->selection_date)->format('d-m-Y') }}
                            @else
                            @endif
                            </td>
                            <td>{{ $data->selection_time }}</td>
                            <td style="text-align: center;">
                                    <button type="button" class="btn btn-dark" style="border:0; background:none;" data-toggle="modal" data-target="#addPhotosModal" data-parcels-id="{{ $data->id }}" >
                                    <i class="fa fa-check" style="font-size:18px;  color:black;"></i>
                                    </button>
                                    <br>
                                    <form action="/reselectdatetime/{{ $data->id }}" method="post" class="d-inline" id="notify-form">
                                        @csrf
                                        <button class="btn btn-primary" style="border:0; background:none;">
                                            <i class="fas fa-bell" style="font-size:18px; color:black;"></i>
                                        </button>
                                    </div>
                                    </form>
                                    <form action="/Parceldeleted/{{ $data->id }}" method="post" class="d-inline" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-Danger" onclick="confirmDelete(event)" style="border:0; background:none;">
                                        <i class="fas fa-trash" style="font-size:18px; color:black;"></i>
                                    </button>
                                </div>
                                </form>
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
        $('#addPhotosModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var parcelID = button.data('parcels-id'); // Extract info from data-* attributes
            var form = $(this).find('form');

            // Update the action attribute of the form based on the feedback ID
            form.attr('action', '/ParcelReceived/' + parcelID);

            // Update the value of the feedback_id input field
            form.find('#parcel_id').val(parcelID);
        });
    });
</script>
@if (isset($data))
<!-- Modal -->
<div class="modal fade" id="addPhotosModal" tabindex="-1" role="dialog" aria-labelledby="addPhotosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="receivedForm" action="{{ route('store.collect.date', ['id' => $data->id]) }}" method="post" class="d-inline" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addPhotosModalLabel">Add Photos of Parcel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form elements for uploading photos here -->
                    <!-- Add your input fields for photo upload -->
                    <input type="" name="parcel_id" id="parcel_id" value="{{ $data->id }}">
                    <input type="file" name="photos" multiple>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload Photos</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection()
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(event) { // Corrected function name
        console.log('Function called');
        event.preventDefault();

        Swal.fire({
            title: 'Confirm delete your data?', // Corrected title
            text: "Deleted parcel record cannot be returned.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with your desired action, e.g., form submission
                // Example: event.target.submit();
                document.getElementById('delete-form').submit();
            } else {
                Swal.fire('Not successful deleted');
            }
        });
    }
</script>



