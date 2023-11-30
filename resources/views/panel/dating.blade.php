@extends('layouts.app', ['ACTIVE_TITLE' => 'MORE', 'ROUTES' => [
['ROUTE' => 'dating.index', 'ACTIVE' => 'dating', 'ACTIVE_ROUTE' => true],
], 'ACTIVE_PAGE' => 'dating'])

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
            <div class="mb-2">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 80 70"
                    style="enable-background:new 0 0 80 70;" xml:space="preserve">
                    <path class="st0" d="M71.3,7c-8.6-8.5-22.6-8.5-31.1,0L40,7.2L39.8,7C31.3-1.5,17.3-1.5,8.7,7c-8.5,8.6-8.5,22.6,0,31.1l0.1,0.1
                            L40,69.4l31.1-31.1l0.2-0.1C79.8,29.6,79.8,15.6,71.3,7z M63.7,30.5L40,54.1L16.3,30.5c-2.1-2.1-3.2-4.9-3.2-7.9
                            c0-3,1.2-5.8,3.3-7.9c2.1-2.1,4.9-3.3,7.9-3.3s5.8,1.2,7.9,3.3l7.9,7.9l7.8-7.9c2.1-2.1,4.9-3.2,7.9-3.2c3,0,5.8,1.2,8,3.3
                            c2.1,2.1,3.2,4.9,3.2,7.9C66.9,25.6,65.8,28.4,63.7,30.5z" />
                </svg>
            </div>
            <div class="text-center">AVAILABLE SOON</div>
    </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
