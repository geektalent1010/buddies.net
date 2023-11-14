@extends('layouts.app', ['ACTIVE_TITLE' => 'MORE'])

@section('title', __('- More'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')
<div class="main-bg d-flex align-items-center justify-content-center">
  <div class="row justify-content-center align-items-center m-0 p-0 w-100 col-md-6 streaming-section">
    <!-- <img class="extra-icon" src="{{ asset('images/svg/MoreHearts.svg') }}" alt="stream svg"> -->
    <div class="more-contents">
      <img class="main-icon" src="{{ asset('images/svg/Dating.svg') }}" alt="stream svg">
      <span class="header">THE MORE PROJECT</span>
      <span class="pt-4 desktop">We know that the world cannot be changed at once.<br>“If we can positively touch the lives of a few</br>so they can positively touch the lives of a few,</br>we are on the right path to serve the many!”</span>
      <span class="pt-4 mobile">We know that the world cannot be<br>changed at once. “If we can positively<br>touch the lives of a few so they can<br>positively touch the lives of a few, we<br>are on the right path to serve the<br>many!”</span>
      <span class="py-4 desktop">The <label>MORE PROJECT</label> is a community driven project<br>to provide <label>MORE</label> health, <label>MORE</label> education and <label>MORE</label> joy<br>to local people in need.</span>
      <span class="py-4 mobile">The <label>MORE PROJECT</label> is a community<br>driven project to provide <label>MORE</label> health,<br><label>MORE</label> education and <label>MORE</label> joy to local<br>people in need.</span>
      <span>WE ARE BETTER <label>TOGETHER</label><br>Stay tuned!</span>
    </div>    
  </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
