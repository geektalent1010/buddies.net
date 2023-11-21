<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#04246b"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BUDDIES') }} @yield('title')</title>

    <!-- ================= Favicons ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{ asset('images/Favicon.png') }}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/Favicon180x180.png') }}">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/Favicon96x96.png') }}">
    <!-- Standard iPad Touch Icon--> 
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/Favicon96x96.png') }}">
    <!-- Standard iPhone Touch Icon--> 
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/Favicon32x32.png') }}">

    <!--Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('images/Favicon16x16.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap_4.1.3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/bootstrap-toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- BEGIN PAGE LEVEL STYLES -->
    @yield('PAGE_LEVEL_STYLES')
    <!-- END PAGE LEVEL STYLES -->

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap_4.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap-toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugin/combodate-1.0.7/combodate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/compress_image.js') }}"></script>
    <script>
      window._asset = '{{ asset('') }}';
      var desktopSrcArray = [
                            'videos/Video01H.mp4',
                            'videos/Video02H.mp4',
                            'videos/Video03H.mp4',
                            'videos/Video04H.mp4',
                            'videos/Video05H.mp4',
                            'videos/Video06H.mp4',
                            'videos/Video07H.mp4',
                            'videos/Video08H.mp4',
                            'videos/Video09H.mp4',
                            'videos/Video10H.mp4',
                            'videos/Video11H.mp4',
                            'videos/Video12H.mp4',
                            'videos/Video13H.mp4',
                            'videos/Video14H.mp4',
                            'videos/Video15H.mp4',
                            'videos/Video16H.mp4',
                            'videos/Video17H.mp4',
                            'videos/Video18H.mp4',
                            'videos/Video19H.mp4',
                            'videos/Video20H.mp4',
                            'videos/Video21H.mp4',
                            'videos/Video22H.mp4',
                            'videos/Video23H.mp4',
                            'videos/Video24H.mp4',
                            'videos/Video25H.mp4',
                            'videos/Video26H.mp4',
                            'videos/Video27H.mp4',
                            'videos/Video28H.mp4',
                            'videos/Video29H.mp4',
                            'videos/Video30H.mp4',
                            'videos/Video31H.mp4',
                            'videos/Video32H.mp4',
                            'videos/Video33H.mp4',
                            'videos/Video34H.mp4',
                            'videos/Video35H.mp4',
                            'videos/Video36H.mp4',
                            'videos/Video37H.mp4',
                            'videos/Video38H.mp4',
                            'videos/Video39H.mp4',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            ''
                          ];
      var desktopPosterArray = [
                            'images/screenshot/video01H.jpg',
                            'images/screenshot/video02H.jpg',
                            'images/screenshot/video03H.jpg',
                            'images/screenshot/video04H.jpg',
                            'images/screenshot/video05H.jpg',
                            'images/screenshot/video06H.jpg',
                            'images/screenshot/video07H.jpg',
                            'images/screenshot/video08H.jpg',
                            'images/screenshot/video09H.jpg',
                            'images/screenshot/video10H.jpg',
                            'images/screenshot/video11H.jpg',
                            'images/screenshot/video12H.jpg',
                            'images/screenshot/video13H.jpg',
                            'images/screenshot/video14H.jpg',
                            'images/screenshot/video15H.jpg',
                            'images/screenshot/video16H.jpg',
                            'images/screenshot/video17H.jpg',
                            'images/screenshot/video18H.jpg',
                            'images/screenshot/video19H.jpg',
                            'images/screenshot/video20H.jpg',
                            'images/screenshot/video21H.jpg',
                            'images/screenshot/video22H.jpg',
                            'images/screenshot/video23H.jpg',
                            'images/screenshot/video24H.jpg',
                            'images/screenshot/video25H.jpg',
                            'images/screenshot/video26H.jpg',
                            'images/screenshot/video27H.jpg',
                            'images/screenshot/video28H.jpg',
                            'images/screenshot/video29H.jpg',
                            'images/screenshot/video30H.jpg',
                            'images/screenshot/video31H.jpg',
                            'images/screenshot/video32H.jpg',
                            'images/screenshot/video33H.jpg',
                            'images/screenshot/video34H.jpg',
                            'images/screenshot/video35H.jpg',
                            'images/screenshot/video36H.jpg',
                            'images/screenshot/video37H.jpg',
                            'images/screenshot/video38H.jpg',
                            'images/screenshot/video39H.jpg',
                            'images/screenshot/IMG01H.jpg',
                            'images/screenshot/IMG02H.jpg',
                            'images/screenshot/IMG03H.jpg',
                            'images/screenshot/IMG04H.jpg',
                            'images/screenshot/IMG05H.jpg',
                            'images/screenshot/IMG06H.jpg',
                            'images/screenshot/IMG07H.jpg',
                            'images/screenshot/IMG08H.jpg',
                            'images/screenshot/IMG09H.jpg',
                            'images/screenshot/IMG10H.jpg',
                            'images/screenshot/IMG11H.jpg',
                            'images/screenshot/IMG12H.jpg',
                            'images/screenshot/IMG13H.jpg',
                            'images/screenshot/IMG14H.jpg',
                            'images/screenshot/IMG15H.jpg',
                            'images/screenshot/IMG16H.jpg',
                            'images/screenshot/IMG17H.jpg',
                            'images/screenshot/IMG18H.jpg',
                            'images/screenshot/IMG19H.jpg',
                            'images/screenshot/IMG20H.jpg',
                            'images/screenshot/IMG21H.jpg',
                            'images/screenshot/IMG22H.jpg',
                            'images/screenshot/IMG23H.jpg',
                            'images/screenshot/IMG24H.jpg',
                            'images/screenshot/IMG25H.jpg',
                            'images/screenshot/IMG26H.jpg',
                            'images/screenshot/IMG27H.jpg',
                            'images/screenshot/IMG28H.jpg'
                          ];
      var MobileSrcArray = [
                            'videos/Video01V.mp4',
                            'videos/Video02V.mp4',
                            'videos/Video03V.mp4',
                            'videos/Video04V.mp4',
                            'videos/Video05V.mp4',
                            'videos/Video06V.mp4',
                            'videos/Video07V.mp4',
                            'videos/Video08V.mp4',
                            'videos/Video09V.mp4',
                            'videos/Video10V.mp4',
                            'videos/Video11V.mp4',
                            'videos/Video12V.mp4',
                            'videos/Video13V.mp4',
                            'videos/Video14V.mp4',
                            'videos/Video15V.mp4',
                            'videos/Video16V.mp4',
                            'videos/Video17V.mp4',
                            'videos/Video18V.mp4',
                            'videos/Video19V.mp4',
                            'videos/Video20V.mp4',
                            'videos/Video21V.mp4',
                            'videos/Video22V.mp4',
                            'videos/Video23V.mp4',
                            'videos/Video24V.mp4',
                            'videos/Video25V.mp4',
                            'videos/Video26V.mp4',
                            'videos/Video27V.mp4',
                            'videos/Video28V.mp4',
                            'videos/Video29V.mp4',
                            'videos/Video30V.mp4',
                            'videos/Video31V.mp4',
                            'videos/Video32V.mp4',
                            'videos/Video33V.mp4',
                            'videos/Video34V.mp4',
                            'videos/Video35V.mp4',
                            'videos/Video36V.mp4',
                            'videos/Video37V.mp4',
                            'videos/Video38V.mp4',
                            'videos/Video39V.mp4',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            ''
                          ];
      var MobilePosterArray = [
                            'images/screenshot/video01V.jpg',
                            'images/screenshot/video02V.jpg',
                            'images/screenshot/video03V.jpg',
                            'images/screenshot/video04V.jpg',
                            'images/screenshot/video05V.jpg',
                            'images/screenshot/video06V.jpg',
                            'images/screenshot/video07V.jpg',
                            'images/screenshot/video08V.jpg',
                            'images/screenshot/video09V.jpg',
                            'images/screenshot/video10V.jpg',
                            'images/screenshot/video11V.jpg',
                            'images/screenshot/video12V.jpg',
                            'images/screenshot/video13V.jpg',
                            'images/screenshot/video14V.jpg',
                            'images/screenshot/video15V.jpg',
                            'images/screenshot/video16V.jpg',
                            'images/screenshot/video17V.jpg',
                            'images/screenshot/video18V.jpg',
                            'images/screenshot/video19V.jpg',
                            'images/screenshot/video20V.jpg',
                            'images/screenshot/video21V.jpg',
                            'images/screenshot/video22V.jpg',
                            'images/screenshot/video23V.jpg',
                            'images/screenshot/video24V.jpg',
                            'images/screenshot/video25V.jpg',
                            'images/screenshot/video26V.jpg',
                            'images/screenshot/video27V.jpg',
                            'images/screenshot/video28V.jpg',
                            'images/screenshot/video29V.jpg',
                            'images/screenshot/video30V.jpg',
                            'images/screenshot/video31V.jpg',
                            'images/screenshot/video32V.jpg',
                            'images/screenshot/video33V.jpg',
                            'images/screenshot/video34V.jpg',
                            'images/screenshot/video35V.jpg',
                            'images/screenshot/video36V.jpg',
                            'images/screenshot/video37V.jpg',
                            'images/screenshot/video38V.jpg',
                            'images/screenshot/video39V.jpg',
                            'images/screenshot/IMG01V.jpg',
                            'images/screenshot/IMG02V.jpg',
                            'images/screenshot/IMG03V.jpg',
                            'images/screenshot/IMG04V.jpg',
                            'images/screenshot/IMG05V.jpg',
                            'images/screenshot/IMG06V.jpg',
                            'images/screenshot/IMG07V.jpg',
                            'images/screenshot/IMG08V.jpg',
                            'images/screenshot/IMG09V.jpg',
                            'images/screenshot/IMG10V.jpg',
                            'images/screenshot/IMG11V.jpg',
                            'images/screenshot/IMG12V.jpg',
                            'images/screenshot/IMG13V.jpg',
                            'images/screenshot/IMG14V.jpg',
                            'images/screenshot/IMG15V.jpg',
                            'images/screenshot/IMG16V.jpg',
                            'images/screenshot/IMG17V.jpg',
                            'images/screenshot/IMG18V.jpg',
                            'images/screenshot/IMG19V.jpg',
                            'images/screenshot/IMG20V.jpg',
                            'images/screenshot/IMG21V.jpg',
                            'images/screenshot/IMG22V.jpg',
                            'images/screenshot/IMG23V.jpg',
                            'images/screenshot/IMG24V.jpg',
                            'images/screenshot/IMG25V.jpg',
                            'images/screenshot/IMG26V.jpg',
                            'images/screenshot/IMG27V.jpg',
                            'images/screenshot/IMG28V.jpg'
                          ];
        var srcIndex = localStorage.getItem('srcIndex')|0;
        if (srcIndex > 67) srcIndex = 0;
    </script>
</head>
<body>
    <script>
        var backgroundImage = '{{ asset('') }}' + desktopPosterArray[srcIndex]
        // document.body.style.backgroundImage = `url(${backgroundImage})`  //changing bg image
        document.body.style.backgroundColor = '#04246b' //changing bg color
    </script>

    @include('_includes.navbar')

    <!-- BEGIN PAGE START SECTION -->
    @yield('PAGE_START')
    <!-- END PAGE START SECTION -->
    <img class="main-img">
    <img class="main-img-mobile">
    <video autoplay muted loop class="wave-video-section" playsinline>
      <source type="video/mp4">
    </video>
    <video autoplay muted loop class="wave-video-section-mobile" playsinline>
      <source type="video/mp4">
    </video>
    <script>
      document.querySelector('.main-img').src = '{{ asset('') }}' + desktopPosterArray[srcIndex];
      document.querySelector('.main-img-mobile').src = '{{ asset('') }}' + MobilePosterArray[srcIndex];
  </script>
    
    @yield('PAGE_CONTENT')

    <!-- BEGIN PAGE END SECTION -->
    @yield('PAGE_END')
    <!-- END PAGE END SECTION -->
    
    @include('_includes.footer')

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @yield('PAGE_LEVEL_SCRIPTS')
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">

      $('#searchKey').on('keyup', function () {
        var searchKey = $(this).val().trim().toLowerCase();
        $('.search-item').each(function() {
          var fullName = $(this).attr('attr-fullname');
          if (fullName) {
            if (fullName.toLowerCase().includes(searchKey)) {
              $(this).removeClass('d-none');
            } else {
              if(!$(this).hasClass('d-none')) {
                  $(this).addClass('d-none');
              }
            }
          }
        })
        $('.member-item').each(function() {
          var fullName = $(this).attr('attr-fullname');
          if (fullName) {
            if (fullName.toLowerCase().includes(searchKey)) {
              $(this).removeClass('d-none');
            } else {
              if(!$(this).hasClass('d-none')) {
                  $(this).addClass('d-none');
              }
            }
          }
        })
      });

      $('.search-icon-section').on('click', function () {
        if ($('#searchKey').val() == undefined) {
          return;
        }
        var searchKey = $('#searchKey').val().trim().toLowerCase();
        $('.member-item').each(function() {
          var fullName = $(this).attr('attr-fullname');
          if (fullName) {
            if (fullName.toLowerCase().includes(searchKey)) {
              $(this).removeClass('d-none');
            } else {
              if(!$(this).hasClass('d-none')) {
                  $(this).addClass('d-none');
              }
            }
          }
        })
      });
      
      updateVideoSource();
      
      function mainImageHidden() {
        document.querySelector('.main-img').style.display='none';
      }

      function mainImageMobileHidden() {
        document.querySelector('.main-img-mobile').style.display='none';
      }

      function updateVideoSource() {
        document.querySelector('.main-img').src = '{{ asset('') }}' + desktopPosterArray[srcIndex] + '?' + '{{time()}}';
        document.querySelector('.main-img-mobile').src = '{{ asset('') }}' + MobilePosterArray[srcIndex] + '?' + '{{time()}}';

        const mediaQuery = window.matchMedia('(max-width: 575.98px)');

        mainImageHidden();
        mainImageMobileHidden();
        
        const video = document.querySelector('.wave-video-section');
        if (!video) return;
        if (!desktopSrcArray[srcIndex]) {
          if (!mediaQuery.matches) {
            document.querySelector('.main-img').style.display='block';
          } 
          video.removeEventListener('canplaythrough', mainImageHidden);
          video.style.display = 'none';
        } else {
          video.poster = '{{ asset('') }}' + desktopPosterArray[srcIndex] + '?' + '{{time()}}';
          video.querySelector('source').src = '{{ asset('') }}' + desktopSrcArray[srcIndex];
          
          video.load();
          // When the video has finished loading
          video.addEventListener('canplaythrough', mainImageHidden);
          video.style.display = 'block';
        }

        const video_mobile = document.querySelector('.wave-video-section-mobile');
        if (!video_mobile) return;
        if (!MobileSrcArray[srcIndex]) {
          if (mediaQuery.matches) {
            document.querySelector('.main-img-mobile').style.display='block';
          } 
          video_mobile.querySelector('source').src = '';
          video_mobile.removeEventListener('canplaythrough', mainImageMobileHidden);
          video_mobile.style.display = 'none';
        } else {
          video_mobile.poster = '{{ asset('') }}' + MobilePosterArray[srcIndex] + '?' + '{{time()}}';
          video_mobile.querySelector('source').src = '{{ asset('') }}' + MobileSrcArray[srcIndex];
          
          video_mobile.load();
          // When the video has finished loading
          video_mobile.addEventListener('canplaythrough', mainImageMobileHidden);
          video_mobile.style.display = 'none';
        }
      }

      $(document).ready(function() {
        const element = document.querySelector('.main-bg');
        element.style.background = 'none';
      })
    </script>


    @if ($message = Session::get('success'))
    <script>
      toastr['success']('{{ $message }}', 'Success');
      $('.update-success').removeClass('d-none');
      setTimeout(function() {
          $('.update-success').addClass('d-none');
      }, 3000);
    </script>
    @endif

    @if ($message = Session::get('error'))
    <script>toastr['error']('{{ $message }}', 'Error')</script>
    @endif
</body>
</html>
