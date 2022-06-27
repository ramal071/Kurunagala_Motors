@extends('admin/layouts.master')
@section('title', 'Product For Job')
@section('body')

<section class="content">
  @include('admin.message')

  <div class="box-header with-border">
    <h3 class="box-title">{{ __('adminstaticword.productforjob') }}</h3>
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
                  <th>{{__('adminstaticword.starttime') }}</th>
                  <th>{{ __('adminstaticword.product') }}</th>
                  <th>{{ __('adminstaticword.sprice') }}</th>
                  <th>{{ __('adminstaticword.dprice') }}</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($servicerepair as $b)            
                    <tr>
                        <td>{{ $b->code}}</td>
                        <td>{{ $b->created_at}}</td>
                        <td>
                            @foreach ($b->stock as $s)
                            <li>
                                {{$s->product->brand->name}} {{$s->product->bike->name}} {{$s->product->name}}
                            </li>
                            @endforeach
                        </td>  

                        <td>
                          @foreach ($b->stock as $s)
                          <li>
                              {{$s->sellingprice}}
                          </li>
                          @endforeach
                      </td>  

                      <td>
                        @foreach ($b->stock as $s)
                        <li>
                            {{$s->dealerprice}}
                        </li>
                        @endforeach
                    </td>  
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
