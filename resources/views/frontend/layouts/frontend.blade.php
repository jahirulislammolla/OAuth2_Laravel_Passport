<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="robots" content="index, follow"/>
        <meta name="author" content="telco"/>
        <meta name="developer-company" content="telco"/>
        <meta name="Developer" content="Md. Jahirul Islam" />
        <meta name="Developer-Email" content="jahirul.iit5th@gmail.com" />
        <meta name="copyright" content="https://www.telco.com"/>
        <title></title>
        <!-- HTML Meta Tags -->
        <meta name="description" content="{{$page['description']}}">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="keywords" content="telco"/>
        <meta name="title" content="telco"/>
        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{url()->current()}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{$page['title']}}">
        <meta property="og:description" content="{{$page['description']}}">
        <meta property="og:image" content="{{URL::asset($page['image'])}}">
        <meta property="og:image:width" content="600" />
        <meta property="og:image:height" content="315" />
        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="https://www.telco.com">
        <meta property="twitter:url" content="{{url()->current()}}">
        <meta name="twitter:title" content="{{$page['title']}}">
        <meta name="twitter:description" content="{{$page['description']}}">
        <meta name="twitter:image" content="{{URL::asset($page['image'])}}">

        <!-- Meta Tags Generated via https://www.opengraph.xyz -->
      
        <link rel="icon" href="{{URL::asset('assets/img/telco2.png')}}"/>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/main_update.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">

        <script type='text/javascript' src="{{URL::asset('assets/js/jquery.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $.ajaxSetup({
                cache:false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            $( document ).ajaxStart(()=>$('.input_error').html(''));
            $( document ).ajaxSuccess((e,res)=>console.log((res.responseJSON && res.responseJSON) || res));
            $( document ).ajaxError(function( event, res ) {
                console.log(res.responseJSON.errors || res);
                let errors = res.responseJSON.errors;
                //console.log(errors);
                for (const key in errors) {
                    if (Object.hasOwnProperty.call(errors, key)) {
                        const element = errors[key];
                        if(element[0]){
                            //console.log(key,element[0]);
                            $(`.${key}_error`).html(element[0]);
                        }
                    }
                }
            });
        </script>
        @stack("css")
    </head>
    <body>
        <section id="main_menu" style="background-color: #3f6da0">
            <div class="header_bottom_div" id='header_bottom_div'>
                <div class="container-fluid ">

                    <div class="row nav-style">
                            <span class="col-md-3 offset-md-1" >
                                <img style="height: 56px; border-radius: unset;" src="{{URL::asset('assets/img/telco2.png')}}" alt="logo">
                            </span>
                            <nav class="navbar navbar-expand-lg custom-toggler col-md-3 offset-md-5">
                                <button id='navbar_button' class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <i id='change_icofont' class="fas fa-bars"></i>
                                </button>
                                <div class="collapse navbar-collapse navbar_mobile_css" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">	
                                        <li class="nav-item">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>	
                                        <li class="nav-item">
                                            <a class="nav-link" href="/outlet">Outlet</a>
                                        </li>	
                                        
                                    </ul>
                                </div>
                            </nav>
                    </div>
                </div>
            </div>
        </section>
        {{-- start page content --}}
        @yield("content")

        {{-- scroll --}}
        <a href="#" class="scroll_back">
            <div> 
                <i class="fas fa-chevron-up" aria-hidden="true">
                </i>
                <span>TOP</span>
            </div>
        </a>
        <footer id="copyright">
            <div class="container">
                <div class="row ">
                <div class="col-md-8 left_div"> Copyright ©{{ now()->year }} Telco Ltd. All Right Reversed.</div>
                <div class="col-md-4 right_div"> Powered by <a href="http://singularity.com" target="_blank" style="color:#00abff">Singularity Ltd.</a></div>
                </div>
            </div>
        </footer>


        {{-- end messenger --}}
        @stack('cjs')
        <script>
            
            $(function () {
                var offset_value=header_bottom_div.offsetTop + 41;
                $("#navbarSupportedContent").css('top',offset_value+'px');
                // back to top
                $(".scroll_back").click(function () {
                    $("html, body").animate(
                        {
                            scrollTop: 0,
                        },
                        1000
                    );
                });
                $(window).on("scroll", function () {
                    var scrolling = $(this).scrollTop();
                    if (scrolling > 500) {
                        $(".scroll_back").addClass("scroll_link");
                        $(".scroll_link").fadeIn(500);
                    } else if (scrolling > 200) {
                        $(".scroll_link").fadeOut(500);
                    }
                });
                $(window).on("load",function(){
                    var pathname=window.location.pathname;
                    $(`a[href="${window.location.pathname}"]`).addClass('active');
                    if(pathname.startsWith('/course'))
                    {
                        $('a[href="/all-course"]').addClass('active');
                    }
                    if(pathname=='/item-blog-page')
                    {
                        $('a[href="/blog"]').addClass('active');
                    }
                });
                $("#navbar_button").on('click',function(){
                    var cal=$("#change_icofont").attr("class");
                    if(cal=='fas fa-bars')
                    {
                        $("#change_icofont").removeClass("fas fa-bars");
                        $("#change_icofont").addClass("fas fa-times");
                    }
                    else{
                        $("#change_icofont").removeClass("fas fa-times");
                        $("#change_icofont").addClass("fas fa-bars");
                    }
                    // <i class="icofont-close-squared-alt"></i>
                });
            });
        </script>
    </body>

</html>
