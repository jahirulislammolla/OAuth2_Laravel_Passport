<div class="sidebar-user text-center">
    <div>
        <img class="img-50 rounded-circle" src="{{ asset('contents/admin') }}/assets/images/user/1.jpg" alt="#">
    </div>
    <h6 class="mt-3 f-12">
        @if (Auth::user()->first_name && Auth::user()->last_name)
            {{ Auth::user()->first_name }}
            {{ Auth::user()->last_name }}
        @else
            {{ explode('@',Auth::user()->email)[0] }}
        @endif
    </h6>
</div>
