@php
    $page=[
        "seo"=>'telco',
        'description'=>"telco",
        'title'=>"Telco Ltd.",
        'image'=>"/assets/img/telco.png",
        ];
@endphp
@extends('frontend.layouts.frontend',['title'=>'Telco Ltd.',$page])
@section('content')
    <section id='login_section'>
            <div class="col-lg-4 col-md-6 m-auto" style="border-radius:3px; border: 1px solid rgba(213, 164, 164, 0.708); margin-top:100px; margin-bottom:100px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="pt-2 mb-4 text-center">
                        <h2 class="text-center text-danger mt-2 mb-2">Login</h2>
                        <img src="/assets/img/user3.jpg" alt="user" >
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="input-group-text" id="basic-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" placeholder="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="input-group-text" id="basic-addon2" style="cursor: pointer;"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2 text-center">
                        <button type="submit" class="btn btn-danger">
                            {{ __('Submit') }}
                        </button>
                    </div>
                
                    <div class="pb-3 d-flex footer_login justify-content-between align-items-center">
                        <div class="form-check pl-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <small class="form-check-label" for="remember">
                                {{ __('Browser save') }}
                            </small>
                        </div>
                    </div>
                  </form>
        </div>
    </section>
@endsection
@push("cjs")
    <script>
        $(function(){
            $("#basic-addon2").on("click",function(){
                var type=$("#password").attr("type");
                if(type=='password')
                {
                    $("#basic-addon2").html('<i class="fa fa-eye" aria-hidden="true"></i>');
                    $("#password").attr("type",'text');
                }
                else{
                    $("#basic-addon2").html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
                    $("#password").attr("type",'password');
                }
            });
        });
    </script>
@endpush
