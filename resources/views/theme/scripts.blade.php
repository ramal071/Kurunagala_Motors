<script src="{{ url('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>

<script src="{{ url('js/jquery-2.min.js') }}"></script> <!-- jquery library js -->
<script src="{{ url('js/bootstrap.bundle.js') }}"></script> <!-- bootstrap js -->

{{-- <script src="{{ url('vendor/popup/jquery.magnific-popup.min.js')}}"></script> <!-- popup js--> --}}
<script src="{{ url('vendor/navigation/menumaker.js') }}"></script> <!-- navigation js--> 
{{-- <script src="{{ url('vendor/mailchimp/jquery.ajaxchimp.js') }}"></script> <!-- mail chimp js -->  --}}
{{-- <script src="{{ url('js/theme.js') }}"></script> <!-- custom js --> --}}
{{-- <script src="{{ url('js/jquery.owl-filter.js') }}"></script> <!-- filter js -->  --}}
<script src="{{ url('js/fontawesome-iconpicker.js')}}"></script><!-- iconpicker js -->
{{-- <script src="{{ url('js/tinymce.min.js')}}"></script> --}}
<script src="{{ url('js/select2.min.js') }}"></script> <!-- select2 -->
<script src="{{ url('js/custom-js.js')}}"></script>


{{-- <script src="{{ url('js/jquery.lazy.min.js') }}"></script> --}}
{{-- <script src="{{ url('js/jquery.lazy.plugins.min.js') }}"></script> --}}

{{-- <link href="{{ url('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css"> --}}
<script src="{{ url('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js')}}"></script>




<script src="{{url('admin/dist/js/adminlte.min.js')}}"></script> <!-- AdminLTE for demo purposes -->
<script src="{{url('admin/dist/js/demo.js')}}"></script>
<script src="{{ URL::asset('admin/bower_components/PACE/pace.min.js') }}"></script> 



@yield('custom-script')