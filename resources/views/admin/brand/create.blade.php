@extends('admin/layouts.master')
@section('title', 'Create Brand')
@section('body')
@include('admin.message')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.brand') }}</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <form id="demo-form2" method="post" action="{{route('brand.store')}}" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
              {{ csrf_field() }}     

              <div class="row">
                <div class="col-md-6">
                  <label for="code">{{ __('adminstaticword.code') }}:<sup class="redstar">*</sup></label>
                  <input type="text" class="form-control" name="code" id="code" placeholder="Enter bike brand code" value="">
                </div>          
              </div>
              <br>

              <div class="row">
                  <div class="col-md-6">
                    <label for="name">{{ __('adminstaticword.brandname') }}:<sup class="redstar">*</sup></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter bike brand name" value="">
                    {{-- <div id="brandList"></div> --}}
                  </div>      
                  {{-- {{ csrf_field() }}     --}}
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label for="slug">{{ __('adminstaticword.slug') }}:</sup></label>
                  <input type="text" class="form-control" name="slug" placeholder="slug bike brand name" id="slug" value="">
                  </div>          
              </div>
              <br>
        
              <div class="row">
                  <div class="col-md-6">
                    <label for="description">{{ __('adminstaticword.description') }}:</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter bike Description" value="">
                  </div> 
              </div>
              <br>         

              <div class="row">
                <div class="col-md-6">
                  <input type="submit" class="btn btn-info" value="Save">
                  <a href="{{route('brand.index')}}" class="btn btn-primary">Back</a>
                </div> 
              </div>
              <br>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
    {{-- slug --}}
@section('js_slug_page')
<script>
        $(document).ready(function(){
            $('#name').keyup(function(e){
                var str = $('#name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#slug').val(str);
                $('#slug').attr('placeholder', str);
            });
        });        
    </script>   
  @endsection
  {{-- /slug --}}

  {{-- autocomplete --}}  
  {{-- <script>
    $(document).ready(function(){
      $('#name').keyup(function(){
        var query = $(this).val();
        if(query !='')
        {
          var _token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{ route('brand.fetch') }}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data)
            {
              $('#brandList').fadeIn();
              $('#brandList').html(data);
            }
          });
        }
      });
    });
  </script> --}}

  {{-- <script>  
    $(document).ready(function(){  
         $('#name').keyup(function(){  
              var query = $(this).val();  
              if(query != '')  
              {  
                   $.ajax({  
                        url:"brand.php",  /////
                        method:"POST",  
                        data:{query:query},  
                        success:function(data)  
                        {  
                             $('#brandList').fadeIn();  
                             $('#brandList').html(data);  
                        }  
                   });  
              }  
         });  
         $(document).on('click', 'li', function(){  
              $('#name').val($(this).text());  
              $('#brandList').fadeOut();  
         });  
    });  
    </script>   --}}

  {{-- /autocomplete --}}
  
  @endsection