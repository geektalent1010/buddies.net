@extends('layouts.app', ['ACTIVE_TITLE' => 'WALLET', 'ROUTES' => [
  ['ROUTE' => 'tokens.index', 'ACTIVE' => 'credits', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'referrals.index', 'ACTIVE' => 'referrals', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'credits'])

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
                    <div class="wallet-title app-page-subtitle">MY CREDITS</div>
                    <div class="success-section p-4 d-flex justify-content-between mt-30px">
                        <p class="wallet-text">TOTAL</p>
                        <p class="wallet-number">0,00</p>
                    </div>
                    <div class="wallet-title app-page-subtitle">SEND CREDITS</div>
                    <div class="light-section p-4 d-flex justify-content-between mt-30px">
                        <p class="wallet-text">AMOUNT</p>
                        <p class="wallet-number">0,00</p>
                    </div>
                    <div class="primary-section p-4 d-flex justify-content-between">
                        <p class="wallet-text">WALLET ID</p>
                        <p class="wallet-number">{{ $user->customer_id }}</p>
                    </div>
                    <div
                        class="d-flex justify-content-center align-items-center btn-section w-100 p-0 m-0 mt-35px mb-5">
                        <a class="btn btn-primary send-btn">SEND</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
