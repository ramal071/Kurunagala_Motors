@extends('theme.master')
@section('title', 'Contact Us')
@section('content')

@include('admin.message')


<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.contactus')) }}</h1>
    </div>
</section>

<br>

<section>
    <div class="container">
        <form class="contact-form" method="post" action="{{ route('contact.send') }}">
            @csrf                      
                <div class="row">
                    <div class="col-md-6">
                        <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Name">
                    </div>
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                    </div>
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <input name="phone" type="text" class="form-control" id="phone" required="required" placeholder="  phone">
                    </div>
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <input name="phone" type="text" class="form-control" id="phone" required="required" placeholder="  phone">
                    </div>
                    </div>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Message"></textarea>
                    </div>
                    </div>
                <br>
                
            </div>

            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <div class="text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-send">Send </button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection