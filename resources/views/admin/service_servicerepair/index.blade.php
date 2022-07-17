@extends('admin/layouts.master')
@section('title', 'Service For Job')
@section('body')

<section class="content">
  @include('admin.message')

  <div class="box-header with-border">
    <h3 class="box-title">{{ __('adminstaticword.serviceforjob') }}</h3>
  </div>

  {{-- <form action="{{ route('service_servicerepair/search') }}" method="POST">
    @csrf
    <br>
    <div class="container">
      <div class="row">
        <div class="container-fluid">
          
          <div class="form-group row">
            <div class="col-md-4">
                <input type="date" name="fromDate" id="fromDate" class="form-control input-sm" placeholder="From Date"  />
            </div>
            <div class="col-md-4">
                <input type="date" name="toDate" id="toDate" class="form-control input-sm" placeholder="To Date"  />
            </div>
            <div class="col-md-4">
                <button type="submit" name="search" id="search" class="btn btn-primary">Search</button>
            </div>
        </div>

        </div>
      </div>
    </div>
  </form> --}}
  

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>{{__('adminstaticword.code') }}</th>
                  <th>{{__('adminstaticword.starttime') }}</th>
                  <th>{{ __('adminstaticword.service') }}</th>
                  <th>{{ __('adminstaticword.amount') }}</th>
              
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($servicerepair as $b)            
                    <tr>
                        <td>{{ $b->code}}</td>
                        <td>{{ $b->created_at}}</td>
                        <td>{{ $b->service->name}}</td>
                        <td>{{ $b->service->price}}</td>
                    </tr>      
                @endforeach
             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection