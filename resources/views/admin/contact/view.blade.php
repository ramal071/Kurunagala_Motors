@extends('admin/layouts.master')
@section('title', 'View Message - Contact Us')
@section('body')
@include('admin.message')

<section class="content">
    @include('admin.message')
    <div class="row">
      <div class="col-md-12">
          <div class="box box-primary">
                 <div class="box-header with-border">
                <h3 class="box-title">{{ __('adminstaticword.message') }}</h3>
                 </div>
                <div class="panel-body">
                    <div class="mailbox-read-info">
                      <h3>{{ $contact->name }}</h3>
                      <h5>{{ $contact->email }}
                         <h5>{{ __('adminstaticword.phone') }}: {{ $contact->phone }}
                        <span class="mailbox-read-time pull-right">{{ date('jS F Y', strtotime($contact->created_at)) }}</span></h5>
                  </div>
                        <div class="box-body">
                      <div class="mailbox-read-message">
                          <p>{{ $contact->message }}</p>
                      </div>
                  </div>
                  <a href="{{ route('contact.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
  </section>
  @endsection
