<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @php
            $user_id = Auth::id(); // Assuming you have authentication and can get the user's ID
            $user_type = 'App\\Models\\User'; // Assuming the user model class is 'App\Models\User'

            $notifications = App\Models\Notification::where('notifiable_id', $user_id)
                ->where('notifiable_type', $user_type)
                ->orderBy('created_at', 'desc')
                ->get();
        @endphp
        @foreach ($notifications as $notification)
    @if (is_null($notification->read_at))
        <span class="badge badge-danger badge-counter">{{ $notifications->whereNull('read_at')->count() }}</span>
    @endif
@endforeach



    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        @foreach ($notifications as $notification)
        <a class="dropdown-item d-flex align-items-center mark-as-read" href="{{ route('parcel.list') }}">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="small text-gray-500">{{ $notification->created_at->format('M d, Y H:i A') }}</div>
                <span class="font-weight-bold">{{ $notification->data }}</span>
            </div>
        </a>
        @endforeach
        <a class="dropdown-item text-center small text-black-500" href="{{ route('ClearAll') }}">Clear All Notifications</a>
    </div>
</li>


<!-- Include jQuery library if not already included -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Add a click event handler to the link
        $('#alertsDropdown').on('click', function(event) {
            event.preventDefault(); // Prevent the default behavior of the link

            // Make an AJAX request to the 'MarkAsRead' route
            $.get('{{ route('MarkAsRead') }}', function(data) {

            });
            $('#alertsDropdown .badge-counter').hide();
        });
    });
</script>
