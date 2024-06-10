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
    <div class="row justify-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Parcel</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/ParcelSave">
                        @csrf
                        <div class="form-group row">
                            <label for="date_received" class="col-md-2 col-form-label">Date Received</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="date_received" name="date_received">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tracking_number" class="col-md-2 col-form-label">Tracking Number</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tracking_number" name="tracking_number">
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
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="room_number" class="col-md-2 col-form-label">Room Number</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="room_number" name="room_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-2 col-form-label">Phone Number</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="phone_number" name="phone_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="courier_name" class="col-md-2 col-form-label">Courier Name</label>
                            <div class="col-md-10">
                                <select id="courierDropdown" name="courier_name" class="form-control">
                                    <option value="">Select Courier</option>
                                    <option value="NinjaVan">NinjaVan</option>
                                    <option value="ShoppeXpress">ShoppeXpress</option>
                                    <option value="PosLaju">PosLaju</option>
                                    <option value="J&T">J&T</option>
                                    <option value="Other">Other</option>
                                    <!-- Add more courier options as needed -->
                                </select>
                                <div>
                                <input type="text" id="customCourier" name="custom_courier" class="form-control" style="display: none;" placeholder="Enter Courier Name">
                                </div>
                            </div>
                        </div>
                        <div style="float: right;">
                        <button type="submit" class="btn btn-primary">Add Parcel
                        </button>
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
<script>
    // Function to format the current date as YYYY-MM-DD
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${day}-${month}-${year}`;
    }

    // Get the current date
    const currentDate = new Date();

    // Set the current date as the default value in the input field
    document.getElementById('date_received').value = formatDate(currentDate);
</script>
<!-- resources/views/scan.blade.php -->
<script>
    document.addEventListener('keydown', function (event) {
        if (event.code === "Enter") {
            event.preventDefault();
            const barcodeInput = document.getElementById('barcode');
            const scannedBarcode = barcodeInput.value;

            if (scannedBarcode) {
                // Submit the scanned barcode to the server
                fetch('/scan', {
                    method: 'POST',
                    body: JSON.stringify({ tracking_number: scannedBarcode }),
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the server response, e.g., display results
                    console.log(data);
                });

                // Clear the input field for the next scan
                barcodeInput.value = '';
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/jsqr@0.1.8/dist/jsQR.js"></script>
<script>
    const videoElement = document.getElementById("qr-video");
    const scanButton = document.getElementById("scan_button");

    function startCamera() {
        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    videoElement.srcObject = stream;
                })
                .catch(function (error) {
                    console.error('Error accessing the camera:', error);
                });
        }
    }

    scanButton.addEventListener("click", function () {
        startCamera();
    });

    videoElement.addEventListener("play", function () {
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");
        const videoWidth = videoElement.width;
        const videoHeight = videoElement.height;
        canvas.width = videoWidth;
        canvas.height = videoHeight;

        function scanQRCode() {
            context.drawImage(videoElement, 0, 0, videoWidth, videoHeight);
            const imageData = context.getImageData(0, 0, videoWidth, videoHeight);
            const code = jsQR(imageData.data, imageData.width, imageData.height);

            if (code) {
                console.log("QR Code Data:", code.data);
                // Handle the QR code data here, e.g., update the input field with the scanned data.
                document.getElementById("tracking_number").value = code.data;
            }

            requestAnimationFrame(scanQRCode);
        }

        scanQRCode();
    });
</script>

@endsection

