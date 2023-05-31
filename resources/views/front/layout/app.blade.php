<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8" />
      <title>MediService24</title>
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta property="og:title" content="" />
      <meta property="og:type" content="" />
      <meta property="og:url" content="" />
      <meta property="og:image" content="" />
      @include('front.layout.styles')
   </head>
   <body>
      <!-- Header  -->
      @include('front.layout.header')
      <!-- End Header  -->
      <main class="main">
         @yield('content')
      </main>
      @include('front.layout.footer')
      @include('front.layout.scripts')
      <!-- iziToast functionality code here -->
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <script>
         iziToast.error({
             title: '',
             position: 'topRight',
             message: '{{ $error }}',
         });
      </script>
      @endforeach
      @endif
      @if(session()->get('error'))
      <script>
         iziToast.error({
             title: '',
             position: 'topRight',
             message: '{{ session()->get('error') }}',
         });
      </script>
      @endif
      @if(session()->get('success'))
      <script>
         iziToast.success({
             title: '',
             position: 'topRight',
             message: '{{ session()->get('success') }}',
         });
      </script>
      @endif
      <!--// iziToast functionality code here -->
      <!-- Send Email by Ajax Request -->
      <script>
         (function($){
             $("form_subscribe_ajax").on('submit',function(e){
                 e.preventDefault();
                 $("#loader").show();
                 var form = this;
                 $.ajax({
                     url:$(form).attr('action'),
                     method:$(form).attr('method'),
                     data: new FormData(form),
                     processData:false,
                     dataType:'json',
                     contentType:false,
                     beforeSend:function(){
                         $(form).find('span.error-text').text('');
                     },
                     success:function(data)
                     {
                         $('#loader').hide();
                         if (data.code == 0) {
                             $.each(data.error_message,function(prefix,val){
                                 $(form).find('span.'+prefix+'_error').text(val[0]);
                             });
                         }
                         else if (data.code == 1) {
                             $(form)[0].reset();
                             iziToast.success({
                                 title:'',
                                 position:'topRight',
                                 message:data.success_message,
                             });
                         }
                     }
                 })
             })
         })(jQuery);
      </script>
      <div id="loader"></div>
      <!--// Send Email by Ajax Request -->
   </body>
</html>