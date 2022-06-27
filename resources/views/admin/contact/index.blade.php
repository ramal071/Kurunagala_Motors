@extends('admin/layouts.master')
@section('title', 'All Message - Contact Us')
@section('body')
@include('admin.message')

<section class="content">
    @include('admin.message')
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ __('adminstaticword.contactus') }}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                
                  <tr>
                    <th>{{ __('adminstaticword.name') }}</th>
                    <th>{{ __('adminstaticword.phone') }}</th>
                    <th>{{ __('adminstaticword.message') }}</th>
                    <th>{{ __('adminstaticword.time') }}</th>
                    <th>{{ __('adminstaticword.view') }}</th>
                    <th>{{ __('adminstaticword.delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $key=>$contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>
                                <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-info btn-sm"><i class="material-icons">view</i></a>
                            </td>

                            <td>
                                <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $contact->id }}').submit();
                                }else {
                                    event.preventDefault();
                                        }"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>

@endsection
