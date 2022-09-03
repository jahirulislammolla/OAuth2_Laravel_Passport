<section id='subscirbe_section_div'>
    <div class="container">
        <div class="row col-lg-11 m-auto">
            <div class="col-md-6 img_div">
                <img src="/assets/img/smartphone.svg" alt="Tech Park English">
            </div>
            <div class="col-md-6 newsletter">
                <h5>Subscribe to receive regular updates on Our Products and Offers</h5>
                <form action="/" method="POST" id="email_form">
                    @csrf
                    <div class="form_div" id="email_div" style="display: block;">
                        <input type="email" class="form-control" placeholder="email" name="subscribe_email" required="">
                    </div>
                    <div id="display_alert" class="text-center subscribe_success" style="display: none;"></div> 
                    <div class="form_div">
                        <button class="btn btn-info" type="submit" id="subscribe">Subscribe</button>
                    </div>
                </form>

                <div class="other_social_link row">
                    <div class="social_link_outer_div">
                        <div class="social_link_inner_div">
                            @if (isset($website_info["fb_page_link"]))
                                @if (str_starts_with($website_info["fb_page_link"][1], 'http'))
                                <a href="{{$website_info['fb_page_link'][1]}}" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-facebook"></i> Facebook </a>
                                @else
                                <a href="http://{{$website_info['fb_page_link'][1]}}" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-facebook"></i> Facebook </a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="social_link_outer_div">
                        <div class="social_link_inner_div">
                            @if (isset($website_info["linkedin_account"]))
                                @if (str_starts_with($website_info["linkedin_account"][1], 'http'))
                                <a href="{{$website_info['linkedin_account'][1]}}" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-linkedin"></i> LinkedIn </a>
                                @else
                                <a href="http://{{$website_info['linkedin_account'][1]}}" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-linkedin"></i> LinkedIn </a>
                                @endif
                            @endif
                        </div>
                    </div>                    

                    <div class="social_link_outer_div">
                        <div class="social_link_inner_div">
                            @if (isset($website_info["twitter_account"]))
                                @if (str_starts_with($website_info["twitter_account"][1], 'http'))
                                <a href="{{$website_info['twitter_account'][1]}}" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-twitter"></i> Twitter </a>
                                @else
                                <a href="http://{{$website_info['twitter_account'][1]}}" target="_blank" rel="noopener noreferrer"><i
                                    class="fab fa-twitter"></i> Twitter </a>
                                @endif
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

