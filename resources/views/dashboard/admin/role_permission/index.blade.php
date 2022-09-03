
@extends('dashboard.layouts.admin')
@section('contents')

    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        Role Permission
                        @php
                            $routeName = \Request::route()->getName();
                        @endphp
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->

    <!-- Container-fluid starts -->
    <div class="container" id="app">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="contact_create_form" action="{{ route('admin_role_permission_update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="name">Name:</label>
                                        <div class="form-group mb-3">
                                            <label for="user_role">User Role:</label>
                                            <select id="user_role" name="user_role" class="form-control" required> 
                                                <option value="">Select One</option>
                                                @foreach ($user_roles as  $item)
                                                <option value="{{$item->name}}" data-update="{{$item}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>   
                                    </div>
                                    <div class='form-control'>
                                        <div class="row">
                                            <page-list></page-list>
                                        </div>

                                    </div>
                                </div>
                        
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <div class="form-group mb-3">
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type='submit' class="btn btn-success">Submit</button>
                                    </div>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center w-100 pt-3 pb-3">
                    
                </div>
            </div>
        </div>

    </div>

@endsection
@push("cjs")

<script src="js/app.js"></script>

<script type="module">
const { createApp } = Vue;

createApp(
{
    data:{
        pagelist: []
    },
    mounted:function(){
        this.pageListData() 
  },
    methods: {
        pageListData:function(){
            axios.get('/')
            .then(response => (this.pagelist = response))
        }
    },
    component:{
        'page-list':{
            template:`<div class="col-md-6" v-for={ item in pagelist}>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">Check this custom checkbox</label>
                </div>
            </div>
            `
        }
    }
  }).mount('#app')

</script>

@endpush
