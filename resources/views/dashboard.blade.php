@extends('layouts.dashboard', [
'ACTIVE_TITLE' => 'DASHBOARD',
'ACTIVE_LOGOUT' => 'LOGOUT',
'ROUTES' => [['ROUTE' => 'dashboard', 'ACTIVE' => 'dashboard', 'ACTIVE_ROUTE' => true]],
'ACTIVE_PAGE' => 'dashboard'
])

@section('title', __('- Dashboard'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
.blinking {
  -webkit-animation: 1s blink ease infinite;
  -moz-animation: 1s blink ease infinite;
  -ms-animation: 1s blink ease infinite;
  -o-animation: 1s blink ease infinite;
  animation: 1s blink ease infinite;
}

@keyframes "blink" {

  from,
  to {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }
}

@-moz-keyframes blink {

  from,
  to {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }
}

@-webkit-keyframes "blink" {

  from,
  to {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }
}

@-ms-keyframes "blink" {

  from,
  to {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }
}

@-o-keyframes "blink" {

  from,
  to {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }
}
</style>
@endsection

@section('PAGE_START')
<script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>
@endsection

@section('PAGE_CONTENT')
<div class="main-bg d-flex align-items-center justify-content-center">
  <video autoplay muted loop class="wave-video-section" playsinline>
    <source type="video/mp4">
  </video>
  <video autoplay muted loop class="wave-video-section-mobile" playsinline>
    <source type="video/mp4">
  </video>
  <div class="row m-0 px-0 dashboard-section">
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('profile.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0"
                d="M40,0.1C20.7,0.1,5.1,15.7,5.1,35S20.7,69.9,40,69.9c19.3,0,34.9-15.6,34.9-34.9S59.3,0.1,40,0.1z M26.6,20.9
                            c3,0,5.4,2.9,5.4,6.4s-2.4,6.4-5.4,6.4s-5.4-2.9-5.4-6.4S23.6,20.9,26.6,20.9z M57.6,46.5c-3.7,5.6-10.2,9.2-17.6,9.2
                            c-7.4,0-13.8-3.6-17.6-9.2c-1.2-1.8,1.1-3.9,2.7-2.5c3.9,3.1,9.1,4.9,14.8,4.9c5.7,0,10.9-1.8,14.8-4.9
                            C56.5,42.7,58.7,44.8,57.6,46.5z M53.3,33.7c-3,0-5.4-2.9-5.4-6.4s2.4-6.4,5.4-6.4c3,0,5.4,2.9,5.4,6.4S56.3,33.7,53.3,33.7z" />
            </svg>
          </div>
          <span>PROFILE</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('connect.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st1" d="M64.6,0.1c-7.9,0-14.4,6.4-14.4,14.4c0,3.7,1.4,7.2,4,9.9L43.9,41.7c-1.2-0.3-2.5-0.5-3.7-0.5
                            c-1.3,0-2.5,0.2-3.8,0.5L25.8,24.3c2.5-2.7,3.9-6.2,3.9-9.8c0-7.9-6.4-14.4-14.4-14.4S1,6.5,1,14.5s6.4,14.4,14.4,14.4
                            c1.3,0,2.5-0.2,3.8-0.5l10.5,17.5c-2.5,2.7-3.9,6.2-3.9,9.8c0,7.9,6.4,14.4,14.4,14.4s14.4-6.4,14.4-14.4c0-3.7-1.4-7.2-4-9.9
                            l10.3-17.4c1.2,0.3,2.5,0.5,3.7,0.5c7.9,0,14.4-6.4,14.4-14.4S72.5,0.1,64.6,0.1z" />
            </svg>
          </div>
          <span>CONNECT</span>
        </div>
      </a>
      @if ($isNewRequests)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('buddies.index') }}">
        <div class="item">
          <div class="item-icon buddies-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 118 118"
              style="enable-background:new 0 0 118 118;" xml:space="preserve">
              <g>
                <g>
                  <circle class="st0" cx="35.4" cy="19.1" r="17.7" />
                  <circle class="st0" cx="83.1" cy="19.1" r="17.7" />
                  <path class="st0"
                    d="M39.6,73.1c-3.9-3.9-10.2-3.9-14.1,0s-3.9,10.2,0,14.1l26.5,26.5c3.9,3.9,10.2,3.9,14.1,0l33.7-33.9
                                    c8.8-8.8,8.8-23,0-31.7c-5-5-11.9-7.2-18.5-6.4c1.6,0.7,3,1.7,4.3,3c5.8,5.8,5.8,15.3,0,21.2L59.3,92.9L39.6,73.1z" />
                  <path class="st0"
                    d="M43.2,69.5c-5.8-5.8-15.3-5.8-21.2,0c-2.7,2.7-4.2,6.2-4.4,9.8c-8.3-8.8-8.1-22.7,0.5-31.3
                                    c8.8-8.8,23-8.8,31.7,0l9.4,9.4l8.8-9.2c3.9-3.9,10.2-3.9,14.1,0s3.9,10.2,0,14.1L59.3,85.3L43.2,69.5z" />
                </g>
              </g>
            </svg>
          </div>
          <span>BUDDIES</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem" id="app">
      <a class="navItem-wrp" href="{{ route('messages.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0" d="M75.6,32.8c0,15.9-15.9,28.9-35.5,28.9c-5.1,0-10-0.9-14.4-2.5c-1.7,1.2-4.3,2.9-7.5,4.2
                            c-3.3,1.4-7.3,2.7-11.3,2.7c-0.9,0-1.7-0.5-2.1-1.4c-0.3-0.8-0.2-1.8,0.5-2.4l0,0l0,0l0,0l0,0l0,0c0,0,0.1-0.1,0.2-0.2
                            c0.2-0.2,0.4-0.4,0.7-0.8c0.6-0.7,1.3-1.7,2.1-3c1.4-2.3,2.7-5.3,3-8.7C7,44.8,4.6,39,4.6,32.8c0-15.9,15.9-28.9,35.5-28.9
                            S75.6,16.8,75.6,32.8z" />
            </svg>
          </div>
          <span>CHAT</span>
        </div>
      </a>
      @if (count($channels))
      @foreach ($channels as $channel)
      <new-message-notify :auth-user="{{ auth()->user() }}" :channel-info="{{ $channel }}"></new-message-notify>
      @endforeach
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('groups.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st1" d="M70.3,41c0-0.4,0-0.9,0-1.3c0-11.5-6.7-22.1-17-27.1C52.9,5.7,47.1,0.2,40.2,0.2S27.5,5.7,27.1,12.6
                            c-10.4,5-17,15.6-17,27.1c0,0.4,0,0.7,0,1.1c-4,2.4-6.4,6.6-6.4,11.3c0,7.2,5.9,13.1,13.1,13.1c1.9,0,3.8-0.4,5.6-1.2
                            c5.2,3.9,11.4,5.9,17.9,5.9c6.4,0,12.6-2,17.7-5.8c1.7,0.8,3.5,1.2,5.3,1.2c7.2,0,13.1-5.9,13.1-13.1C76.4,47.6,74,43.4,70.3,41z
                            M50.2,52.1c0,2.6,0.8,5.1,2.2,7.3c-3.7,2.3-7.9,3.5-12.2,3.5c-4.4,0-8.7-1.3-12.4-3.6c1.4-2.1,2.1-4.6,2.1-7.1
                            C29.8,45,24.1,39.2,17,39c0.2-8.1,4.7-15.4,11.7-19.4c2.3,4.1,6.7,6.8,11.4,6.8s9.2-2.6,11.4-6.8c7,4,11.4,11.3,11.7,19.4
                            c0,0,0,0,0,0C56,39,50.2,44.9,50.2,52.1z" />
            </svg>
          </div>
          <span>GROUPS</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('stories.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <g>
                  <path class="st0" d="M13.4,67.8l11.2-4.1c1.6-0.6,3.2-1.6,4.4-2.8l37.8-37.8L51.9,8.3L14.1,46c-1.2,1.2-2.2,2.7-2.8,4.4L7.2,61.7
                                    C4.5,68.5,6.1,70.4,13.4,67.8z" />
                </g>
                <g>
                  <path class="st0" d="M71.9,7l-3.8-3.8c-1.5-1.5-3.7-2.3-6-2.1c-2.2,0.2-4.2,1.2-5.8,2.8l-1,1l14.9,14.9l1-1
                                    c1.6-1.6,2.6-3.7,2.8-5.8C74.2,10.7,73.4,8.5,71.9,7z" />
                </g>
              </g>
            </svg>
          </div>
          <span>STORIES</span>
        </div>
      </a>
      @if ($isNewStory)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('companies.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <path class="st0" d="M40,61h7V21.9c0-1.6,1.6-2.6,3.1-2l19.3,8.3c1.3,0.6,2.1,1.8,2.1,3.2V61h7v7H1.6v-7h7V17.3
                                c0-1.4,0.8-2.6,2.1-3.2L37.5,2.2C38,2,38.7,2,39.2,2.3C39.7,2.7,40,3.2,40,3.8V61z" />
              </g>
            </svg>
          </div>
          <span>COMPANIES</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('heroes.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0"
                d="M40,57.7L20.4,68c-1.3,0.7-2.9-0.4-2.6-1.9l3.7-21.8L5.7,28.8c-1.1-1.1-0.5-2.9,1-3.1l21.9-3.2l9.8-19.8
	                        c0.7-1.4,2.6-1.4,3.3,0l9.8,19.8l21.9,3.2c1.5,0.2,2.1,2.1,1,3.1L58.5,44.3l3.7,21.8c0.3,1.5-1.3,2.6-2.6,1.9L40,57.7z" />
            </svg>
          </div>
          <span>HEROES</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('hearts.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0"
                d="M45.1,50.9c-5.3-5.4-5.3-14.1,0-19.5c2.6-2.6,6.1-4,9.8-4c2.8,0,5.5,0.8,7.7,2.3c2.3-1.5,4.9-2.3,7.7-2.3
                            c1.3,0,2.6,0.2,3.8,0.5c2-6.8,0.3-14.4-5-19.8C65.4,4.4,60.4,2.3,55,2.3c-5.2,0-10.2,2-13.9,5.5l-2.6,4l-3.7-3.7
                            C31,4.3,26,2.3,20.6,2.3c-5.4,0-10.4,2.1-14.2,5.8c-7.8,7.8-7.8,20.6,0,28.4l31.4,31.3l12.1-12.1L45.1,50.9z" />
              <path class="st0"
                d="M48.5,47.5c-3.5-3.5-3.5-9.2,0-12.8c1.7-1.7,4-2.6,6.4-2.6c2.4,0,4.7,0.9,6.3,2.6l1.7,1.7l1.2-1.8
                            c1.7-1.6,3.9-2.5,6.3-2.5c2.4,0,4.7,0.9,6.4,2.6c3.4,3.5,3.5,9.1,0.1,12.6l-0.1,0.1L62.6,61.6L48.5,47.5z" />
            </svg>
          </div>
          <span>HEARTS</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('deals.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0"
                d="M59.2,27.9v-8.3C59.2,9,50.6,0.4,40,0.4S20.8,9,20.8,19.6v8.3H8.1v29.2C8.1,64.2,13.9,70,21,70h38
                        c7.1,0,12.9-5.8,12.9-12.9V27.9H59.2z M28.8,19.6c0-6.2,5-11.2,11.2-11.2s11.2,5,11.2,11.2v8.3H28.8V19.6z" />
            </svg>
          </div>
          <span>DEALS</span>
        </div>
      </a>
      @if ($isNewDeal)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('trades.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <path class="st0" d="M78.7,19.8L52.4,0v11h-19v21.1h19v11l26.3-19.8C79.9,22.4,79.9,20.7,78.7,19.8z" />
                <path class="st0" d="M27.6,26.9L1.3,46.7c-1.2,0.9-1.2,2.6,0,3.5L27.6,70V59h19V37.9h-19V26.9z" />
              </g>
            </svg>
          </div>
          <span>TRADE</span>
        </div>
      </a>
      @if ($isNewTrade)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('jobs.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0"
                d="M68,13.2H52.3V8c0-5.3-5-5-5-5H31.8c-4.9,0-5,5.1-5,5.1v5.2H11c-5.2,0-9.5,4.3-9.5,9.5v35.7
                        c0,5.2,4.3,9.5,9.5,9.5h57.1c5.2,0,9.5-4.3,9.5-9.5V22.8C77.6,17.5,73.3,13.2,68,13.2z M31.8,10.5c0-2.3,2.6-2.5,2.6-2.5h10.3
                        c2.7,0,2.6,2.8,2.6,2.8l-0.1,2.4H31.8V10.5z M64.5,36.1c-0.5,0.5-1.2,0.8-1.9,0.8H15.5c-1.5,0-2.7-1.2-2.7-2.8
                        c0-0.8,0.3-1.4,0.8-1.9s1.2-0.8,1.9-0.8h47.1c1.5,0,2.7,1.2,2.7,2.8C65.3,34.9,65,35.6,64.5,36.1z" />
            </svg>
          </div>
          <span>JOBS</span>
        </div>
      </a>
      @if ($isNewJob)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('events.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <path class="st0" d="M62.8,0.9c-0.5-0.5-1.2-0.8-1.9-0.8c-1.5,0-2.8,1.2-2.8,2.7v1.3v10.7c0,0.7,0.3,1.4,0.8,1.9
                                c0.5,0.5,1.2,0.8,1.9,0.8c1.5,0,2.8-1.2,2.8-2.7V4.1V2.8C63.6,2,63.2,1.4,62.8,0.9z" />
                <path class="st0" d="M21.1,0.9c-0.5-0.5-1.2-0.8-1.9-0.8c-1.5,0-2.8,1.2-2.8,2.7v1.3v10.7c0,0.7,0.3,1.4,0.8,1.9
                                c0.5,0.5,1.2,0.8,1.9,0.8c1.5,0,2.8-1.2,2.8-2.7V4.1V2.8C21.9,2,21.6,1.4,21.1,0.9z" />
                <path class="st0" d="M67.8,6.5v8.2c0,3.8-3.1,6.9-7,6.9c-1.9,0-3.6-0.7-4.9-2c-1.3-1.3-2.1-3-2.1-4.9V6.3H26.1v8.5
                                c0,3.8-3.1,6.9-7,6.9c-1.8,0-3.6-0.7-4.9-2c-1.3-1.3-2.1-3.1-2.1-4.9V6.5c-5.3,1.1-9.3,5.8-9.3,11.4v40.4c0,0.1,0,0.3,0,0.4
                                c0.2,6.2,5.3,11.2,11.6,11.2h51c6.4,0,11.6-5.2,11.6-11.6V17.9C77.1,12.3,73.1,7.6,67.8,6.5z M58.7,49.1c-0.5,0.5-1.2,0.8-1.9,0.8
                                H23.2c-1.5,0-2.7-1.2-2.7-2.8c0-0.8,0.3-1.4,0.8-1.9c0.5-0.5,1.2-0.8,1.9-0.8h33.6c1.5,0,2.7,1.2,2.7,2.8
                                C59.5,48,59.2,48.6,58.7,49.1z M58.7,38.9c-0.5,0.5-1.2,0.8-1.9,0.8H23.2c-1.5,0-2.7-1.2-2.7-2.8c0-0.8,0.3-1.4,0.8-1.9
                                c0.5-0.5,1.2-0.8,1.9-0.8h33.6c1.5,0,2.7,1.2,2.7,2.8C59.5,37.7,59.2,38.4,58.7,38.9z" />
              </g>
            </svg>
          </div>
          <span>EVENTS</span>
        </div>
      </a>
      @if ($isNewEvent)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('news.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path id="Mail_00000034805142091730622730000015747733887613171853_" class="st0" d="M68.5,7.6h-57C6.3,7.6,2,11.9,2,17.1v35.7
                            c0,5.2,4.3,9.5,9.5,9.5h57.1c5.2,0,9.5-4.3,9.5-9.5V17.2C78.1,11.9,73.8,7.6,68.5,7.6z M67.7,23.8L41.5,45.2c-0.4,0.4-1,0.5-1.5,0.5
                            s-1.1-0.2-1.5-0.5L12.3,23.8c-1-0.8-1.2-2.3-0.3-3.3c0.8-1,2.3-1.2,3.3-0.3L40,40.3l24.7-20.2c1-0.8,2.5-0.7,3.3,0.3
                            C68.8,21.4,68.7,22.9,67.7,23.8z" />
            </svg>
          </div>
          <span>NEWS</span>
        </div>
      </a>
      @if ($isNews)
      <div class="notification-section">
        <span class="notify-status blinking"><i class="fa-solid fa-circle"></i></span>
      </div>
      @endif
    </div>
    <div class="col-4 navItem">
      @if ($authUser->IsCompany())
      <a class="navItem-wrp" href="{{ route('studio.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <path class="st0" d="M28.1,10.9c-0.1-0.4-0.4-0.6-0.8-0.6H20c-0.4,0-0.7,0.3-0.8,0.6L1.9,58.1c-0.1,0.3,0,0.6,0.1,0.8
                                        c0.1,0.3,0.4,0.4,0.7,0.4h9.7c0.4,0,0.7-0.3,0.8-0.6l2.7-7.7h15.5l2.5,7.7c0.1,0.4,0.4,0.7,0.8,0.7h9.7c0.3,0,0.6-0.1,0.7-0.4
                                        c0.1-0.3,0.3-0.6,0.1-0.8L28.1,10.9z M19.1,41.4L23.8,28l4.5,13.4H19.1z" />
                <path class="st0"
                  d="M62.5,22.5c-6.2,0-9.7,1.4-13.2,5.2c-0.3,0.4-0.3,1,0,1.3l5.5,5.3c0.1,0.1,0.4,0.3,0.7,0.3l0,0
                                        c0.3,0,0.6-0.1,0.7-0.3c1.8-2,3.2-2.7,5.9-2.7c4.6,0,5.5,1.7,5.5,4.5V37h-7.1c-9.5,0-12.9,5.6-12.9,10.9c0,3.4,1.1,6.3,3.1,8.4
                                        c2.2,2.2,5.5,3.4,9.5,3.4c3.2,0,5.5-0.6,7.6-2.2v1c0,0.6,0.4,1,1,1h8.4c0.6,0,1-0.4,1-1V35.7C78.2,29.7,75.6,22.5,62.5,22.5z
                                        M62.3,50.8c-2.8,0-4.3-1-4.3-2.9c0-1.3,0.4-3.1,4.2-3.1h5.6v1c0,2-0.3,3.1-1,3.8C65.5,50.5,64.2,50.8,62.3,50.8z" />
              </g>
            </svg>
          </div>
          <span>STUDIO</span>
        </div>
      </a>
      @else
      <a class="navItem-wrp" href="{{ route('share.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <path class="st0" d="M69.1,39.6c3-0.7,5.3-3.4,5.3-6.7c0-3.7-2.9-6.8-6.6-6.9l0,0H49.3c0,0,3.1-22-5.4-25.3
                                    c-1.6-0.6-3.3-0.4-4.7,0.7c-4.1,3.2-1.3,11.5-3.6,16.7c-3.7,7.7-7.5,10.1-8.9,10.8c-0.4,0.2-0.6,0.6-0.6,1v34.5c0,1,0.8,2,1.9,2.9
                                    c2,1.7,4.6,2.6,7.2,2.6h24.7l0,0c2.5-0.1,4.5-2.1,4.5-4.7c0-1.3-0.5-2.5-1.4-3.4c3.2-0.2,5.7-2.8,5.7-6.1c0-1.7-0.7-3.3-1.9-4.4
                                    c0.1,0,0.2,0,0.3,0c3.2,0,5.7-2.7,5.7-6C72.7,42.7,71.2,40.5,69.1,39.6z" />
                <path class="st0" d="M20.2,69.8H7.8c-1.2,0-2.2-1-2.2-2.2V28.3c0-1.2,1-2.2,2.2-2.2h12.4c1.2,0,2.2,1,2.2,2.2v39.3
                                    C22.3,68.9,21.4,69.8,20.2,69.8z" />
              </g>
            </svg>
          </div>
          <span>SHARE</span>
        </div>
      </a>
      @endif
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('dating.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <path class="st0" d="M71.3,7c-8.6-8.5-22.6-8.5-31.1,0L40,7.2L39.8,7C31.3-1.5,17.3-1.5,8.7,7c-8.5,8.6-8.5,22.6,0,31.1l0.1,0.1
                            L40,69.4l31.1-31.1l0.2-0.1C79.8,29.6,79.8,15.6,71.3,7z M63.7,30.5L40,54.1L16.3,30.5c-2.1-2.1-3.2-4.9-3.2-7.9
                            c0-3,1.2-5.8,3.3-7.9c2.1-2.1,4.9-3.3,7.9-3.3s5.8,1.2,7.9,3.3l7.9,7.9l7.8-7.9c2.1-2.1,4.9-3.2,7.9-3.2c3,0,5.8,1.2,8,3.3
                            c2.1,2.1,3.2,4.9,3.2,7.9C66.9,25.6,65.8,28.4,63.7,30.5z" />
            </svg>
          </div>
          <span>MORE</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('tokens.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g>
                <g id="XMLID_830_">
                  <g>
                    <g>
                      <path class="st0" d="M74.9,33.5H57.8c-1.6,0-3,1.3-3,3v10.9c0,1.6,1.3,3,3,3h17.2c1.6,0,3-1.3,3-3V36.4
                                            C77.9,34.8,76.6,33.5,74.9,33.5z M63.7,46.2c-2.4,0-4.3-1.9-4.3-4.3s1.9-4.3,4.3-4.3c2.4,0,4.3,1.9,4.3,4.3
                                            C68,44.3,66,46.2,63.7,46.2z" />
                      <path class="st0" d="M61.3,4.6c-1.1-3.4-4.8-5.3-8.3-4.2L27.2,8.9h35.5L61.3,4.6z" />
                    </g>
                  </g>
                </g>
                <path class="st0"
                  d="M57.5,55c-4.2,0-7.6-3.4-7.6-7.6V36.4c0-4.2,3.4-7.6,7.6-7.6h17.8V19c0-2.8-2.3-5.1-5.1-5.1h-63
                                c-2.8,0-5.1,2.3-5.1,5.1v45.9c0,2.8,2.3,5.1,5.1,5.1h63c2.8,0,5.1-2.3,5.1-5.1V55H57.5z" />
              </g>
            </svg>
          </div>
          <span>WALLET</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem">
      <a class="navItem-wrp" href="{{ route('topics.index') }}">
        <div class="item">
          <div class="item-icon">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
              style="enable-background:new 0 0 80 70;" xml:space="preserve">
              <g id="XMLID_1055_">
                <g>
                  <path class="st0" d="M40,0.1C20.7,0.1,5.1,15.7,5.1,35S20.7,69.9,40,69.9S74.9,54.3,74.9,35S59.3,0.1,40,0.1z M45.8,57.3
                                    c0,1.3-1.1,2.4-2.4,2.4h-6.5c-1.3,0-2.4-1.1-2.4-2.4V30.8c0-1.3,1.1-2.4,2.4-2.4h6.5c1.3,0,2.4,1.1,2.4,2.4V57.3z M40,23.9
                                    c-3.3,0-5.9-2.6-5.9-5.9s2.6-5.9,5.9-5.9s5.9,2.6,5.9,5.9S43.3,23.9,40,23.9z" />
                </g>
              </g>
            </svg>
          </div>
          <span>INFO</span>
        </div>
      </a>
    </div>
    <div class="col-4 navItem d-none d-sm-block"><a class="navItem-wrp"></a></div>
    <div class="col-4 navItem d-none d-sm-block"><a class="navItem-wrp"></a></div>
  </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script src="{{ asset('js/app.js') }}"></script>
@endsection
