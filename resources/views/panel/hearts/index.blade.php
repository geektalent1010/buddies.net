@extends('layouts.app', ['ACTIVE_TITLE' => 'HEARTS', 'ROUTES' => [
  ['ROUTE' => 'hearts.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'all'])

@section('title', __('- Hearts'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 hearts-section">
    <div class="row justify-content-center m-0 pb-3 w-100">
        <div class="col d-flex flex-column justify-content-center align-items-center flex no-members">
          <div class="mb-2"><img class="hearts-icon" src="{{ asset('images/svg/Hearts.svg') }}" alt="PlayButton svg"></div>
          <div class="text-center">AVAILABLE SOON</div>
        </div>
    </div>
  </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection