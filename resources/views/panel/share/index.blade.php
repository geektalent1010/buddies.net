@extends('layouts.app', ['ACTIVE_TITLE' => 'SHARE', 'ROUTES' => [
  ['ROUTE' => 'studio.index', 'ACTIVE' => 'studio', 'ACTIVE_ROUTE' => $user->IsCompany()],
  // ['ROUTE' => 'share.index', 'ACTIVE' => 'share', 'ACTIVE_ROUTE' => $user->IsCompany()]
  ['ROUTE' => 'share.index', 'ACTIVE' => 'share', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'share'])

@section('title', __('- Share'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('plugin/slick/slick.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugin/slick/slick-theme.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" rel="stylesheet" />
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')
<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 share-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="link-title app-page-subtitle only-spacing">INVITE FRIENDS AND EARN CREDITS</div>
        <div class="link-address app-page-subtitle only-spacing">www.buddies.net/{{ $user->customer_id }}</div>
        <div class="d-flex justify-content-center align-items-center btn-section w-100 p-0 m-0 mt-30px">
            <a class="btn btn-primary copy-btn" onclick="copyLink(this,event)" attr_href="{{url('/')}}/{{ $user->customer_id }}">COPY LINK</a>
        </div>
        <div class="share-title app-page-subtitle only-spacing mb-30px">SHARE BUDDIES ON SOCIAL MEDIA</div>
        <div class="d-flex align-items-center justify-content-center social-icon-section p-0">
          <img class="social-icon" src="{{ asset('images/svg/Facebook.svg') }}" alt="facebook icon">
          <img class="social-icon" src="{{ asset('images/svg/LinkedIn.svg') }}" alt="LinkedIn icon">
          <img class="social-icon" src="{{ asset('images/svg/Insta.svg') }}" alt="facebook icon">
          <img class="social-icon" src="{{ asset('images/svg/Pinterest.svg') }}" alt="Pinterest icon">
          <img class="social-icon" src="{{ asset('images/svg/Twitter.svg') }}" alt="Twitter icon">
        </div>

        {{--@if (count($fileNames) > 0)
          @foreach($fileNames as $filename)
            <div class="image-slider-wrapper mt-3">
              <div class="each-panel">
                <a data-fancybox href="{{ asset($filename['src']) }}">
                  <img src="{{ asset($filename['src']) }}">
                </a>
                <div class="mt-4 px-3 w-100 d-flex justify-content-center">
                  <a class="btn btn-primary download-button" href="{{ asset($filename['src']) }}" download attr-filename="{{$filename['name']}}">Download</a>
                </div>
              </div>
            </div>
          @endforeach
        @endif--}}
				<p class="share-title app-page-subtitle only-spacing mb-30px">AD PACK 1</p>
				<div class="image-slider-wrapper">
					<div class="each-panel">
						<a href="javascript:;">
							<img src="{{ asset('images/AdPack1.png') }}">
						</a>
						<div class="px-3 w-100 d-flex justify-content-center mt-35px">
							<a class="btn btn-primary download-button" href="{{ asset('files/AdPack1.zip') }}" download>Download</a>
						</div>
					</div>
				</div>
				<p class="share-title app-page-subtitle only-spacing mb-30px">AD PACK 2</p>
				<div class="image-slider-wrapper">
					<div class="each-panel">
						<a href="javascript:;">
							<img src="{{ asset('images/AdPack2.png') }}">
						</a>
						<div class="px-3 w-100 d-flex justify-content-center mt-35px">
							<a class="btn btn-primary download-button" href="{{ asset('files/AdPack2.zip') }}" download>Download</a>
						</div>
					</div>
				</div>
				<p class="share-title app-page-subtitle only-spacing mb-30px">VIDEO PACK 1</p>
				<div class="image-slider-wrapper">
					<div class="each-panel">
						<a href="javascript:;">
							<img src="{{ asset('images/VideoPack1.png') }}">
						</a>
						<div class="mt-35px mb-35px px-3 w-100 d-flex justify-content-center">
							<a class="btn btn-primary download-button" href="{{ asset('files/VideoPack1.zip') }}" download>Download</a>
						</div>
					</div>
				</div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script src="{{ asset('plugin/slick/slick.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('.image-slider-wrapper').slick({
		  infinite: true,
		  slidesToShow: 1,
      draggable: true,
      arrows: false,
		  dots: false,
		  focusOnSelect: true,
		  responsive: [
		    // {
		    //   breakpoint: 1200,
		    //   settings: {
		    //     slidesToShow: 3
		    //   }
		    // },
		    // {
		    //   breakpoint: 968,
		    //   settings: {
		    //     slidesToShow: 3
		    //   }
		    // },
		    // {
		    //   breakpoint: 768,
		    //   settings: {
		    //     slidesToShow: 1
		    //   }
		    // },
		    // {
		    //   breakpoint: 480,
		    //   settings: {
		    //     slidesToShow: 1,
		    //   }
		    // }
		  ]
    });
		Fancybox.bind('[data-fancybox]', {
		  Toolbar: {
		    display: [
		      "close",
		    ],
		  },
		});
  });

  $(".download-action").click(function() {
    window.location.href = '{{ route('share.download') }}?filename=' + $(this).attr('attr-filename');
  });

  function copyLink(element, event) {
		event.preventDefault();
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val($(element).attr('attr_href')).select();
		document.execCommand("copy");
		$temp.remove();
		alert('Copied to Clipboard');
	}
</script>
@endsection
