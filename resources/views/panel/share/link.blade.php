@extends('layouts.app', ['ACTIVE_TITLE' => 'SHARE', 'ROUTES' => [
  ['ROUTE' => 'studio.index', 'ACTIVE' => 'studio', 'ACTIVE_ROUTE' => $user->isCompany()],
  ['ROUTE' => 'share.link', 'ACTIVE' => 'link', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'share.index', 'ACTIVE' => 'share', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'link'])

@section('title', __('- Share'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')
<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 share-section">
    <div class="row justify-content-center m-0 p-0 py-3 w-100">
      <div class="col-md-6 p-0">
        <p class="link-text mt-4">The buddies community grows by sharing our enthusiasm with people we know.</p>
        <p class="link-text">Share the buddies platform with friends by sms, e-mail, online and on social media. As soon as someone signs up using your personal buddies link and activates their account after the trial period, you'll receive credits in your wallet.</p>
        <p class="link-text">Credits can be used for subscription and renewal fees, events, charities, and many local businesses on the buddies platform.</p>
        <p class="link-text">Together we care, together we share.</p>
        <p class="link-text my-5">Start collecting your credits today.</p>
        <p class="link-title">SHARE YOUR PERSONAL BUDDIES LINK</p>
        <div class="link-section py-4">
          <p class="link-address">www.buddies.net/{{ $user->customer_id }}</p>
        </div>
        <div class="d-flex justify-content-center align-items-center btn-section w-100 p-0 m-0 mt-4 mb-5">
            <a class="btn btn-primary copy-btn" onclick="copyLink(this,event)" attr_href="{{ url('/') }}/{{ $user->customer_id }}">COPY</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script type="text/javascript">
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
