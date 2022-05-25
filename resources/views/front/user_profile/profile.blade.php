@extends('theme.master')
@section('title', 'Profile')
@section('content')

@include('admin.message')

<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.userprofile')) }}</h1>
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container">
        {{-- <form action="{{ route('user.profile_update',$user->id) }}" method="POST" enctype="multipart/form-data"> --}}
        	{{ csrf_field() }}
            {{ method_field('PUT') }}


    </div>
</section>