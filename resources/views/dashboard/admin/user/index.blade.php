
@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                         Telco All User 
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <h4>All </h4>
                        <a href="#" class="btn btn-info btn-sm m-1 create_btn" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalCreate"><i class="fa fa-plus"></i> Create</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $item)
                                        
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->user_role }}</td>
                                            <td>
                                                <div class="d-flex justify-content-end flex-wrap">
                                                <a href="#" class="btn btn-primary btn-sm m-1 update_btn" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalUpdate" data-update="{{$item}}"><i class="fa fa-pencil"></i> Update</a>
                                                <a onclick="return confirm('Are you sure?')" href="{{ route('admin_user_delete',['id'=>$item->id]) }}" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center w-100 pt-3 pb-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- Container-fluid starts -->
    <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalCreateLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCreateLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal body -->
                    <form id="contact_create_form" action="{{ route('admin_user_store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control input_val" placeholder="username" required/>     
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control input_val" placeholder="email" required/>     
                            </div>
 
                            <div class="form-group mb-3">
                                <label for="user_role">User Role:</label>
                                <select id="user_role" name="user_role" class="form-control">
                                    @foreach ($user_roles as  $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control input_val" placeholder="password" required/>     
                            </div>
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <div class="form-group mb-3">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                            <div class="form-group mb-3">
                                <button type='submit' class="btn btn-success">Submit</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalUpdate" tabindex="-1" aria-labelledby="exampleModalUpdateLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalUpdateLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <form id="contact_create_form" action="{{ route('admin_user_update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="update_username" class="form-control input_val" placeholder="username" required/>     
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="update_email" class="form-control input_val" placeholder="email" required/>     
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_role">User Role:</label>
                        <select id="update_user_role" name="user_role" class="form-control">
                            @foreach ($user_roles as  $item)
                            <option value="{{$item->name}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control input_val" placeholder="password" />     
                    </div>
                    <div class="form-group mb-3 d-none">
                        <input type="text" name="id" id="update_id" class="form-control input_val" placeholder="username" required/>     
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="form-group mb-3">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="form-group mb-3">
                        <button type='submit' class="btn btn-success">Submit</button>
                    </div>
                
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@push("pjs")
       <script>
       $(function(){
           
           $('.update_btn').on("click",function(){
            var data=$(this).data('update');
            update_username.value=data.username;
            update_user_role.value=data.user_role;
            update_email.value=data.email;
            update_id.value=data.id;
           });
       }); 
    </script>
@endpush
