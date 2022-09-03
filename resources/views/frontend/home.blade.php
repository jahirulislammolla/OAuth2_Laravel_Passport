@php
    $page=[
        "seo"=>'telco',
        'description'=>"telco",
        'title'=>"Telco Ltd.",
        'image'=>"/assets/img/telco2.png",
        ];
@endphp
@extends('frontend.layouts.frontend',['title'=>'Telco Ltd.',$page])
@section("content")
    @php
        // dd($website_info);
    @endphp
@endsection


