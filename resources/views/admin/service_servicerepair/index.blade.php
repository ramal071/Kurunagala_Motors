@extends('admin/layouts.master')
@section('title', 'Service For Job')
@section('body')

<section class="content">
  @include('admin.message')

  <div class="box-header with-border">
    <h3 class="box-title">{{ __('adminstaticword.serviceforjob') }}</h3>
  </div>
  

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                
                <tr>
                  
                  <th>{{__('adminstaticword.code') }}</th>
                  <th>{{ __('adminstaticword.registernumber') }}</th>
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
                        <td>{{ $b->customervehicle->register_number}}</td>
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