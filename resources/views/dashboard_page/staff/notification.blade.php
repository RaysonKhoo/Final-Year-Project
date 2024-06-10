<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        @php
                // Assuming you have authentication and can get the user's ID
            $user_type = 'App\\Models\\User'; // Assuming the user model class is 'App\Models\User'

            $notifications = App\Models\Notification::where('notifiable_type', $user_type)
                ->orderBy('read_at', 'desc')
                ->get();
        @endphp
        @foreach ($notifications as $notification)
        @php
        $now = now(); // Current date and time
        $expirationTime = 3; // 3 days
        $isExpired = $now->diffInDays($notification->read_at) > $expirationTime;
        @endphp

        @if($notification->read_at && !$isExpired)
            <span class="badge badge-danger badge-counter">{{ $notifications->whereNull('read_at')->count() }}</span>
        @else
            <!-- Your alternative display logic here -->
        @endif
        @endforeach

    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
            Notification Read Center
        </h6>

        @foreach ($notifications as $notification)
        @php
        $now = now(); // Current date and time
        $expirationTime = 3; // 3 days
        $isExpired = $now->diffInDays($notification->read_at) > $expirationTime;
        @endphp
        @if ($notification->read_at && !$isExpired)
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="img-profile rounded-circle" src="{{ asset('dashboard_page/img/undraw_profile.svg') }}">
                <div class="status-indicator bg-success"></div>
            </div>
            <div class="font-weight-bold">
                <div class="small text-gray-500">{{ \Carbon\Carbon::parse($notification->read_at)->format('M d, Y H:i A') }}</div>
                <div class="text">{{ $notification->data }}</div>
                <div class="small text-gray-500">
                @php
                    $user = App\Models\User::find($notification->notifiable_id);
                    echo $user ? $user->name : '';
                @endphp
            </div>
            </div>
        </a>
        @else
            <!-- Your alternative display logic here -->
        @endif
        @endforeach
    </div>
</li>

