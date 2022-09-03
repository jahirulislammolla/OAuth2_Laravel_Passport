<li class="onhover-dropdown">
    <a href="#!" class="txt-dark">
        <img class="align-self-center pull-right me-2" src="/contents/admin/assets/images/dashboard/notification.png" alt="header-notification">
        @if ($notifications->where('seen',0)->count())
            <span class="badge rounded-pill badge-primary notification">
                {{ $notifications->where('seen',0)->count() }}
            </span>
        @endif
    </a>
    <ul class="notification-dropdown onhover-show-div">
        <li>
            Notification
            <span class="badge rounded-pill badge-secondary text-white text-uppercase pull-right">
                {{ $notifications->where('seen',0)->count() }} New
            </span>
        </li>
        @foreach ($notifications->take(3) as $item)
            <li>
                <div class="d-flex">
                    <i class="flex-shrink-0 align-self-center notification-icon icofont icofont-recycle bg-success"></i>
                    <div>
                        <h6 class="mt-0">{{ $item->title }}</h6>
                        <p class="mb-0">{!! $item->description !!}</p>
                        <span>
                            <i class="icofont icofont-clock-time p-r-5"></i>
                            {{ $item->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </li>
        @endforeach

        <li class="text-center">
            Check
            <a href="#">all</a>
            notification
        </li>
    </ul>

</li>
