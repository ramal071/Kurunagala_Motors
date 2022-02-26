<script src="{{ url('js/jquery-2.min.js') }}"></script> <!-- jquery library js -->
<script src="{{ url('js/bootstrap.bundle.js') }}"></script> <!-- bootstrap js -->
<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<script src="{{ url('vendor/owl/js/owl.carousel.min.js') }}"></script> <!-- owl carousel js -->	
<script src="{{ url('vendor/smoothscroll/smooth-scroll.js') }}"></script> <!-- smooth scroll js -->
<script src="{{ url('vendor/popup/jquery.magnific-popup.min.js')}}"></script> <!-- popup js-->
<script src="{{ url('vendor/navigation/menumaker.js') }}"></script> <!-- navigation js--> 
<script src="{{ url('vendor/mailchimp/jquery.ajaxchimp.js') }}"></script> <!-- mail chimp js --> 
<script src="{{ url('vendor/protip/protip.js') }}"></script> <!-- protip js -->
<script src="{{ url('js/theme.js') }}"></script> <!-- custom js -->
<script src="{{ url('js/jquery.owl-filter.js') }}"></script> <!-- filter js --> 
<script src="{{ url('js/fontawesome-iconpicker.js')}}"></script><!-- iconpicker js -->
<script src="{{ url('js/tinymce.min.js')}}"></script>
<script src="{{ url('js/protip.js') }}"></script> <!-- protip js -->
<script src="{{ url('js/select2.min.js') }}"></script> <!-- select2 -->
<script src="{{ URL::asset('js/pace.min.js') }}"></script>
<script src="{{ url('js/custom-js.js')}}"></script>

<script src="{{ asset('js/share.js') }}"></script>

{{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}}
<script src="{{ url('js/sweetalert2@9.js')}}"></script>

{{-- <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gsetting->google_ana }}"></script>
  --}}
<script src="{{ asset('js/venom-button.min.js') }}"></script>

<script src="{{ url('js/jquery.lazy.min.js') }}"></script>
<script src="{{ url('js/jquery.lazy.plugins.min.js') }}"></script>
<script src="{{ url('js/dropzone.js')}}"></script>
<script src="{{ url('js/perfect-scrollbar.js')}}"></script>
<!-- XZOOM JQUERY PLUGIN  -->
<script type="text/javascript" src="{{ url('js/xzoom.min.js')}}"></script>


<script>
  $(function(){

    "use strict";

    $('.lazy').lazy({

        effect: "fadeIn",
        effectTime: 1000,
        scrollDirection: 'both',
        threshold: 0

    });

  });
</script>



<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

</script>



<script>
    $('.prime-cat').on('click',function(){

        var url = $(this).data('url');

        location.href = url;

    });

    $('.sub-cate').on('click',function(){

        var url = $(this).data('url');

        location.href = url;

    });

    $('.child-cate').on('click',function(){

        var url = $(this).data('url');

        location.href = url;

    });
</script>




@yield('custom-script')