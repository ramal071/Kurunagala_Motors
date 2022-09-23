@extends('theme.master')
@section('title', 'About Us')
@section('content')

<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">About Us</h1>
    </div>
</section>

<div class="container">
    <div class="row">
      <div class="col-xs-12 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            A value added service package that is offered to meet all your hybrid demand, whatever it maybe. The basic service offering, it meets all your typical automotive needs effective.
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            We are Sri Lanka’s best automobile care specialists  with state-of- the-art service centers located across the country. Each center is extremely committed to providing our clients with the very best services.
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            kurunagala motors is the Honda-powered marketing agency. Main service types are fiber, paint, body wash, spare parts and repair. <br>
              Phone : 071 123 4567, +9471 987 6543 
              <br>
              email : info@kmmoters.com, kmmoters@gmail.com
               <br>
              Address : Kurunagala Motors, galenbidunuwewa, Anuradhapura.
               <br>
          </div>
          <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            Kurunegala Motors garage is located in Galenbidunuwewa, Anuradhapura area. Currently that garagehandles documents and information by manual system using papers. The garage which has only 12 
            employees. Main service types are fiber, paint, body wash, spare parts and repair. kurunagala motors is the Honda-powered marketing agency.
          </div>
        </div>
      </div>
    </div>
</div>

</section>
@endsection