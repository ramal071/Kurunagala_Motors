@extends('admin/layouts.master')
@section('title', 'View Pay sheet')
@section('body')
@include('admin.message')


<section class="content">
  <div class="row">
      <div class="col-xs-12">
          <div class="box box-primary"> 
            <div class="box-header with-border">
                <h3 class="box-title">{{__('adminstaticword.salary') }}</h3>
                <a href="{{ route('salary.create') }}" class="btn btn-info btn-sm">+ {{__('adminstaticword.salary') }}</a>        
                </div>

            {{--  --}}

            <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title></title>
                    <style>
                        body{
                            background-color: #F6F6F6; 
                            margin: 0;
                            padding: 0;
                        }
                        h1,h2,h3,h4,h5,h6{
                            margin: 0;
                            padding: 0;
                        }
                        p{
                            margin: 0;
                            padding: 0;
                        }
                        .container{
                            width: 80%;
                            margin-right: auto;
                            margin-left: auto;
                        }
                        .brand-section{
                        background-color: #0d1033;
                        padding: 10px 40px;
                        }
                        .logo{
                            width: 50%;
                        }

                        .row{
                            display: flex;
                            flex-wrap: wrap;
                        }
                        .col-6{
                            width: 50%;
                            flex: 0 0 auto;
                        }
                        .text-white{
                            color: #fff;
                        }
                        .company-details{
                            float: right;
                            text-align: right;
                        }
                        .body-section{
                            padding: 16px;
                            border: 1px solid gray;
                        }
                        .heading{
                            font-size: 20px;
                            margin-bottom: 08px;
                        }
                        .sub-heading{
                            color: #262626;
                            margin-bottom: 05px;
                        }
                        table{
                            background-color: #fff;
                            width: 100%;
                            border-collapse: collapse;
                        }
                        table thead tr{
                            border: 1px solid #111;
                            background-color: #f2f2f2;
                        }
                        table td {
                            vertical-align: middle !important;
                            text-align: center;
                        }
                        table th, table td {
                            padding-top: 08px;
                            padding-bottom: 08px;
                        }
                        .table-bordered{
                            box-shadow: 0px 0px 5px 0.5px gray;
                        }
                        .table-bordered td, .table-bordered th {
                            border: 1px solid #dee2e6;
                        }
                        .text-right{
                            text-align: end;
                        }
                        .w-20{
                            width: 20%;
                        }
                        .float-right{
                            float: right;
                        }
                    </style>
                </head>
                <body>

                    <div class="container">
                        <div class="brand-section">
                            <div class="row">
                                <div class="col-6">
                                <img src="{{ url('images/logo/'.$gsetting->logo) }}" width="200" height="70px" style="max-height: 80px;">
                                </div>
                                
                                <div class="col-6">
                                    <div class="company-details">
                                        <p class="text-white">61/B</p>
                                        <p class="text-white">Galenbidunuwewa, Anuradhapura</p>
                                        <p class="text-white">+94 71 709 7116</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="body-section">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="heading">{{__('adminstaticword.job') }}: {{ $salary->slip_id}}</h2>
                                    <p class="sub-heading">Pay Sheet - {{ \Carbon\Carbon::now()->year}}/{{ \Carbon\Carbon::now()->format('M')}}  </p>
                                    <p class="sub-heading">{{__('adminstaticword.address') }}: {{ $salary->employee->address}}</h2>
                                </div>
                                <div class="col-6">
                                    <p class="sub-heading">{{__('adminstaticword.name') }}: {{ $salary->employee->name}}</td>
                                    <p class="sub-heading">{{__('adminstaticword.nickname') }}: {{ $salary->employee->nick_name}}</td>
                                        <p class="sub-heading">{{__('adminstaticword.phone') }}: {{ $salary->employee->phone}}</td>
                                </div>
                            </div>
                        </div>

                        <div class="body-section">
                            <h3 class="heading">Salary Details</h3>
                            <br>
                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{__('adminstaticword.worked_days') }}</th>
                                        <th>{{__('adminstaticword.basic_salary') }}</th>
                                        <th>{{__('adminstaticword.half_salary') }}</th>                                  
                                        <th>{{__('adminstaticword.loan_amount') }}</th>
                                        <th>{{__('adminstaticword.full_leave') }}</th>
                                        <th>{{__('adminstaticword.half_days') }}</th>  
                                        <th>{{__('adminstaticword.job_amount') }}</th>
                                        <th>{{__('adminstaticword.allowance') }}</th>                                      
                                        <th></th>  
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{ $salary->worked_days}}</td>
                                    <td>{{ $salary->employee->basic_salary}}</td>
                                    <td>{{ $salary->employee->half_salary}}</td>
                                    <td>{{ $salary->loan_amount}}</td>
                                    <td>{{ $salary->full_leave}}</td>
                                    <td>{{ $salary->half_days}}</td>
                                    <td>{{ $salary->job_amount}}</td>
                                    <td>{{ $salary->allowance}}</td>
                                    </tr>  
                                </tbody>
                            </table>
                            <br>
                           

                            <p class="heading">{{__('adminstaticword.total_salary') }} (Rs.): {{ $salary->total_salary}} </p>
                        </div>     
                    </div>   
                </body>
             </html>
            {{--  --}}
          </div>
      </div>
  </div>
</section>


@endsection