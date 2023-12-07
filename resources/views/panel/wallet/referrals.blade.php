@extends('layouts.app', ['ACTIVE_TITLE' => 'CREDITS', 'ROUTES' => [
  ['ROUTE' => 'tokens.index', 'ACTIVE' => 'credits', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'referrals.index', 'ACTIVE' => 'referrals', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'referrals'])

@section('title', __('- Wallet'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')
<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 wallet-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="wallet-title app-page-subtitle mb-30px">MY REFERRALS</div>
        <div class="referral-header-section p-4">
          <p class="wallet-text status-header-text w-50">STATUS</p>
          <p class="wallet-text w-25">MEMBERSHIP</p>
          <p class="wallet-text text-right w-25">CREDITS</p>
        </div>
        <div class="referral-header-section-mobile p-4">
          <p class="wallet-text status-header-text w-50">STATUS</p>
          <p class="wallet-text w-45">M</p>
          <p class="wallet-text text-right w-25">C</p>
        </div>

        @if (count($user->referrers) > 0)
          @foreach ($user->referrers as $referralUser)
            <div class="referral-body-section px-4 py-3 d-flex justify-content-between">
              <div class="d-flex status-section w-50">
                <span class="status-white-icon"><i class="fa-solid fa-circle"></i></span>
                <p class="wallet-text ml-3">{{ $referralUser->getFullname() }}</p>
              </div>
              <p class="wallet-text central-text w-25">TRIAL</p>
              <p class="wallet-text central-text-mobile w-45">T</p>
              <p class="wallet-number text-right w-25">0,00</p>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
