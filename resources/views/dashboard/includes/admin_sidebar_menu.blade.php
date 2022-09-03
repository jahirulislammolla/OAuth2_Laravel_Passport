<ul class="sidebar-menu">

    <li>
        <a href="/dashboard/admin" class="sidebar-header">
            <i class="icon-desktop"></i><span> Home</span>
        </a>
    </li>

    {{-- <li>
        <a href="javascript:void(0)" class="sidebar-header">
            <i class="icon-blackboard"></i> <span>Website Information</span>
            <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('editor_basic_information_index')}}"><i class="fa fa-angle-right"></i>Basic Info</a></li>
            <li><a href="{{route('editor_page_information_index')}}"><i class="fa fa-angle-right"></i>Page Info</a></li>
            <li><a href="{{route('editor_page_image_index')}}"><i class="fa fa-angle-right"></i>Image Info</a></li>
        </ul>
    </li> --}}
    <li>
        <a href="{{route('admin_user_get')}}" class="sidebar-header">
            <i class="icon-user"></i> <span>All User</span> 
        </a>
    </li>
    <li>
        <a href="{{route('admin_user_role_get')}}" class="sidebar-header">
            <i class="icon-lock"></i> <span>User Role</span> 
        </a>
    </li>
    <li>
        <a href="{{route('admin_role_permission_get')}}" class="sidebar-header">
            <i class="icon-unlock"></i> <span>Role Permission</span> 
        </a>
    </li>
    <li>
        <a href="{{route('admin_outlet_get')}}" class="sidebar-header">
            <i class="icon-blackboard"></i> <span>Outlet</span> 
        </a>
    </li>
</ul>
