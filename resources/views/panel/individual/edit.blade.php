@extends('layouts.app', ['ACTIVE_TITLE' => 'PROFILE', 'ROUTES' => [
  ['ROUTE' => 'profile.index', 'ACTIVE' => 'edit', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'profile.setting.index', 'ACTIVE' => 'setting', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'edit'])

@section('title', __('- Edit'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.Jcrop.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/crop_style.css') }}" />
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

@php
    $birthday = date_create($user->profile->birthday);
    $other_interests = explode(",", $user->profile->other_interests);
    $categories = array(
        'Crafts' => 'Arts & Crafts',
        'Collecting' => 'Collecting',
        'Dancing' => 'Dancing',
        'Education' => 'Education',
        'Extreme' => 'Extreme',
        'Food' => 'Food & Drink',
        'Games' => 'Games',
        'Tech' => 'High Tech',
        'Intellectual' => 'Intellectual',
        'Music' => 'Music',
        'Outdoors' => 'Outdoors',
        'Performing' => 'Performing Arts',
        'Pets' => 'Pets',
        'Philantropy' => 'Philantropy',
        'Hobbies' => 'RC Hobbies',
        'Sports' => 'Sports',
        'Writing' => 'Writing'
    );
@endphp
<div class="main-bg">
    <div class="row m-0 mx-auto p-0 setting-section">
        <input type="file" id="profile-avatar-file" style="display: none;" accept=".jpg,.jpeg,.png" onchange="image_upload()" />
        <div class="row justify-content-center m-0 p-0 w-100">
            <div class="col-md-6 p-0">
                <div class="row p-0 m-0 block">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 contentItem avatar">
                        @if (isset($user->profile->main_avatar_url))
                            <div class="contentItem-wrp face">
                                <div class="optional-section">
                                    <span class="option-icon trash-avatar" attr-data="main_avatar"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                </div>
                                <div class="image-container"></div>
                                <img class="avatar" alt="main avatar" src="{{ asset('uploads/'.$user->username.'/'.$user->profile->main_avatar_url.'?'.time()) }}">
                            </div>
                        @else
                            <div class="cropme contentItem-wrp profile-avatar-wrp face">
                                <div class="thumbnail-card profile-avatar" attr-data="main_avatar">
                                    <input id="selectedFile" class="file-selector__input" type='file' accept=".png, .jpg, .jpeg, .svg">
                                    <img id='crop__result' src=''>
                                    <img class="option-icon" attr-data="main_avatar" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 contentItem profile-person-section">
                        <div class="person-info-section h-100">
                            <div class="profile-card d-flex align-items-center h-100 flat-scroll">
                                <div class="profile-content pl-3">
                                    <p class="profile-card-title">{{ $user->profile->first_name }} {{ $user->profile->last_name }}</p>
                                    <p class="profile-card-context changeable job-title-edit" contenteditable="true">{{ $user->profile->job_title ?? 'Job Title' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 contentItem block">
                    @if (isset($user->profile->banner_img_url))
                        <div class="contentItem-wrp main-avatar">
                            <div class="optional-section banner-section">
                                <span class="option-icon trash-avatar" attr-data="banner_img"><i class="fa fa-trash" aria-hidden="true"></i></span>
                            </div>
                            <div class="image-container"></div>
                            <img class="avatar" alt="main avatar" src="{{ asset('uploads/'.$user->username.'/'.$user->profile->banner_img_url.'?'.time()) }}">
                        </div>
                    @else
                        <div class="contentItem-wrp main-avatar">
                            <div class="optional-section  banner-section">
                                <img class="option-icon avatar-upload" attr-data="banner_img" src="{{ asset('images/svg/ImageGreen.svg') }}">
                            </div>
                            <div class="thumbnail-card main_avatar_card_bg avatar">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-sm-12 contentItem block">
                    <div class="story-content-wrp">
                        <div class="my-story-card">
                            <div class="d-flex">
                                <div class="about">
                                    <p class="story-card-title">About Me</p>
                                </div>
                                <div class="d-flex birthday">
                                    <span><i class="fa-solid fa-gift"></i></span>
                                    <p class="profile-card-context">{{ date_format($birthday, "j F Y" ) }}</p>
                                </div>
                            </div>
                            @if (isset($user->profile->story_content))
                            <div class="story-card-context mr-2 changeable story-edit" contenteditable="true">
                                @php
                                    echo $user->profile->story_content;
                                @endphp
                            </div>
                            @else
                            <div class="story-card-context mr-2 changeable story-edit" contenteditable="true">
                                Type here
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 p-0 block">
                    <div class="row justify-content-center m-0 p-0 w-100">
                        <div class="col-12 contentItem interests-section">
                            <div class="profile-card profile-card-bg d-flex flat-scroll">
                                <div class="profile-content">
                                    <p class="profile-card-title">My Interests</p>
                                    @if ($user->profile->other_interests && count($other_interests) > 0)
                                        @foreach ($other_interests as $tag)
                                            <p class="profile-card-context">{{ isset($categories[$tag]) ? $categories[$tag] : '' }}</p>
                                        @endforeach
                                    @else
                                        <p class="profile-card-context">-</p>
                                    @endif
                                </div>
                                <div class="profile-content">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('images/logo/LogoMenu.svg') }}" class="position-relative" />
                                        </div>
                                        <!-- @if (isset($buddies)) -->
                                            <p class="profile-card-context buddies-count">{{ $buddies->count() }}</p>
                                        <!-- @endif -->
                                    </div>
                                    <p class="profile-card-context country-edit" >{{ empty($country) ? isset($user->profile->country) ? $user->profile->country : 'Country' : $country }}</p>
                                    <p class="profile-card-context mt-2 city-edit" >{{ empty($city) ? isset($user->profile->city) ? $user->profile->city : 'City' : $city }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 p-0">
                            <div class="row justify-content-center m-0 p-0 w-100 card-border-wrp">
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url1))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail1"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url1.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail1" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url2))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail2"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url2.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail2" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url3))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail3"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url3.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail3" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url4))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail4"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url4.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail4" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url5))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail5"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url5.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail5" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url6))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail6"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url6.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail6" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url7))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail7"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url7.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail7" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url8))
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <span class="option-icon trash-avatar" attr-data="thumbnail8"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="image-container"></div>
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url8.'?'.time()) }}">
                                        </div>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="optional-section">
                                                <img class="option-icon avatar-upload" attr-data="thumbnail8" src="{{ asset('images/svg/ImageGreen.svg') }}">
                                            </div>
                                            <div class="thumbnail-card">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--
                <form class="form-section" data-form="update-user-detail" autocomplete="off" method="POST" action="{{ route('setting.update.detail') }}">
                    @csrf
                    <div class="row mt-4 mx-0">
                        <div class="col-md-6">
                            <div class="detail-info-section">
                                <div class="info-title">
                                    <span>CHANGE CONTACT DETAILS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" id="mobileNumber" placeholder="Phone Number" value="{{ $user->phone ?? '' }}">
                                    <label id="mobile-number-error" class="has-error" for="phone" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="{{ $user->email ?? '' }}">
                                    <label id="email-error" class="has-error" for="email" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mx-0">
                        <div class="col-md-6">
                            <div class="detail-info-section">
                                <div class="info-title">
                                    <span>CHANGE ADDRESS DETAILS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <div class="form-group">
                                    <input type="text" name="street_name" class="form-control" id="streetName" placeholder="Street" value="{{ $user->profile->street ?? '' }}">
                                    <label id="street-name-error" class="has-error" for="street_name" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <div class="form-group">
                                    <input type="text" name="house_number" class="form-control" id="houseNumber" placeholder="House/Building Number" value="{{ $user->profile->house_number ?? '' }}">
                                    <label id="house-number-error" class="has-error" for="house_number" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <input type="text" name="city" class="form-control" id="real-city" placeholder="City" value="{{ isset($user->profile->city) ? $user->profile->city : '' }}" hidden>
                                <div class="form-group search-city">
                                    <input type="text" class="form-control" id="city" placeholder="City" value="{{ empty($city) ? isset($user->profile->city) ? $user->profile->city : 'City' : $city }}" onchange="changeCity()">
                                    <label id="city-error" class="has-error" for="city" style="display: none"></label>
                                </div>
                            </div>
                            <div class="address-search-section">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <div class="form-group">
                                    <input type="text" name="postal_code" class="form-control" id="postalCode" placeholder="Zip Code" value="{{ $user->profile->postal_code ?? '' }}">
                                    <label id="postal-code-error" class="has-error" for="postal_code" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <input type="text" name="state" class="form-control" id="real-state" placeholder="Area" value="{{ isset($user->profile->state) ? $user->profile->state : '' }}" hidden>
                                <div class="form-group">
                                    <input type="text" class="form-control disabled" id="state" placeholder="Area" value="{{ empty($state) ? isset($user->profile->state) ? $user->profile->state : 'Area' : $state }}" onchange="changeArea()" disabled>
                                    <label id="state-error" class="has-error" for="state" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <input type="text" name="country" class="form-control" id="real-country" placeholder="Country" value="{{ isset($user->profile->country) ? $user->profile->country : '' }}" hidden>
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control disabled" id="country" placeholder="Country" value="{{ empty($country) ? isset($user->profile->country) ? $user->profile->country : 'Country' : $country }}" disabled>
                                    <select class="form-control" name="">
                                        <option value="0"></option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    <label id="country-error" class="has-error" for="country" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mx-0">
                        <div class="col-md-6">
                            <div class="detail-info-section">
                                <div class="info-title">
                                    <span>USERNAME</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control disabled" id="username" placeholder="User Name" value="{{ $user->username }}" disabled>
                                    <label id="username-error" class="has-error" for="username" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mx-0">
                        <div class="col-sm-6">
                            <div class="detail-info-section">
                                <div class="info-title">
                                    <span>CHANGE PASSWORD</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <div class="detail-info-section">
                                <div class="info-title">
                                    <span>CONFIRM PASSWORD</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <input type="password" name="changePassword" class="form-control" id="change-password" placeholder="Password" value="0" hidden>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
                                    <label id="password-error" class="has-error" for="password" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-sm-none">
                            <div class="detail-info-section">
                                <div class="info-title">
                                    <span>CONFIRM PASSWORD</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="detail-info-section">
                                <input type="password" name="confirmPassword" class="form-control" id="confirm-password" placeholder="Password" value="0" hidden>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password-confirm" placeholder="Password" value="">
                                    <label id="password-confirm-error" class="has-error" for="password" style="display: none"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                --}}
                <div class="row justify-content-center align-items-center mt-4 mb-5 btn-section w-100 p-0 m-0">
                    <button class="btn btn-primary save-button button-submit" data-button="submit" onclick="window.location.href='{{ route('profile.index') }}'">SAVE</button>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="imageModalContainer" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered crop__modal">
        <div class="modal-content crop__modal-content modal-content1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="arrow-left"></i></span>
                </button>
                <h5 class="modal-title" id="imageModal">Crop Image</h5>
            </div>
            <div class="modal-body" id="crop__modal-body">
                <img id='crop-image-container'>

                </img>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn crop__action" data-dismiss="modal"><i data-feather="x"></i></button>
                <button type="button" class="btn crop__action save-modal" onclick="cropImage()"><i data-feather="check"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ asset('js/jquery.Jcrop.js') }}"></script>
<script src="{{ asset('js/jquery.SimpleCropper.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function changeCity() {
        $("#real-city").val(document.getElementById("city").value);
        if (document.getElementById("city").value == '') {
            $("#state").attr("disabled", false);
            $('.dropdown-select').show();
            $('#country').addClass('d-none');
        }
    }

    function changeArea() {
        $("#real-state").val(document.getElementById("state").value);
    }

    function create_custom_dropdowns() {
        $('select').each(function (i, select) {
            if (!$(this).next().hasClass('dropdown-select')) {
                $(this).after('<div class="dropdown-select wide ' + ($(this).attr('class') || '') + '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function (j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ? 'selected' : '') + '" data-value="' + $(o).val() + '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
                $('.current').text($("#country").val());
                $('.dropdown-select').hide();
            }
        });

        $('.dropdown-select ul').before('<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()" class="dd-searchbox" type="text"></div>');
    }

    // Open/close
    $(document).on('click', '.dropdown-select', function (event) {
        if($(event.target).hasClass('dd-searchbox')){
            return;
        }
        $('.dropdown-select').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });

    // Close when clicking outside
    $(document).on('click', function (event) {
        if ($(event.target).closest('.dropdown-select').length === 0) {
            $('.dropdown-select').removeClass('open');
            $('.dropdown-select .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });

    function filter(){
        var valThis = $('#txtSearchValue').val();
        $('.dropdown-select ul > li').each(function(){
        var text = $(this).text();
            (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show() : $(this).hide();
    });
    };
    // Search

    // Option click
    $(document).on('click', '.dropdown-select .option', function (event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown-select').find('.current').text(text);
        $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
        $("#real-country").val(text);
        console.log(text);
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown-select', function (event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
        // Space or Enter
        //if (event.keyCode == 32 || event.keyCode == 13) {
        if (event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function () {
        create_custom_dropdowns();
    });

    var other_interested = '{{ $user->profile->other_interests }}' ? '{{ $user->profile->other_interests }}'.split(',') : [];
    var avatar_url = '';
    var contents = $('.story-edit').html();
    var job_title = $('.job-title-edit').html();
    var city = $('.city-edit').html();
    var country = $('.country-edit').html();

    $('.other-interested-update').on('click', function() {
        var send_data = {};
        send_data['id'] = '{{ $user->profile->id }}';
        send_data['other_interests'] = other_interested.join(',');
        $.ajax({
          type: 'PUT',
          url: '{{ route('setting.other.interested') }}',
          data: send_data,
          success: function(data) {
            $('.update-success').removeClass('d-none');
            setTimeout(function() {
                $('.update-success').addClass('d-none');
                window.location.reload();
            }, 3000);
          }
        })
    })

    feather.replace();

    $('#selectedFile').change(function () {
        if (this.files[0] == undefined)
            return;
        $('#imageModalContainer').modal('show');
        let reader = new FileReader();
        reader.addEventListener("load", function () {
            $("#crop-image-container").attr("src", reader.result);
            window.src = reader.result;
        }, false);
        if (this.files[0]) {
            reader.readAsDataURL(this.files[0]);
        }
    });

    let croppi;
    $('#imageModalContainer').on('shown.bs.modal', function () {
        let width = document.getElementById('crop__modal-body').offsetHeight;
        $('#crop-image-container').height((width - 100) + 'px');
        croppi = $('#crop-image-container').croppie({
            viewport: {
            width: width - 100,
            height: width - 100
            },
        });
        $('.modal-body1').height(document.getElementById('crop-image-container').offsetHeight + 50 + 'px');
        croppi.croppie('bind', {
            url: window.src,
        }).then(function () {
            croppi.croppie('setZoom', 0.8);
        });
    });
    $('#imageModalContainer').on('hidden.bs.modal', function () {
        croppi.croppie('destroy');
    });
    function cropImage() {
        croppi.croppie('result', { type: 'base64', format: 'jpeg', size: 'original' })
            .then(function (resp) {
                $('#crop__result').attr('src', resp);
                $('.modal').modal('hide');
                $('#crop__result').show();

                $("input[id='selectedFile']").val('');
                var blobURL = resp;
                const img = new Image();
                img.src = blobURL;

                img.onload = function () {
                    const MAX_WIDTH = 1280;
                    const MAX_HEIGHT = 1280;
                    const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                    const canvas = document.createElement("canvas");
                    canvas.width = newWidth;
                    canvas.height = newHeight;
                    const ctx = canvas.getContext("2d");
                    ctx.drawImage(img, 0, 0, newWidth, newHeight);
                    canvas.toBlob(
                        (blob) => {
                            // Handle the compressed image.
                            var form_data = new FormData();
                            form_data.append('file', blob);
                            form_data.append('field', 'main_avatar');
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('setting.profile.avatar') }}',
                                processData: false,
                                contentType: false,
                                cache: false,
                                data : form_data,
                                success:function(data){
                                    if (data.error) {
                                        toastr['error'](data.error, 'Error');
                                    } else {
                                        $('.update-success').removeClass('d-none');
                                        setTimeout(function() {
                                            $('.update-success').addClass('d-none');
                                            window.location.reload();
                                        }, 3000);
                                    }
                                },
                                error:function(data){
                                    console.log(data);
                                }
                            });
                        },
                        "image/jpeg",
                        quality
                    );
                };
            });
    }

    // $('.cropme').simpleCropper();

    // $(".cropme").click(function() {
    //     avatar_url = $(this).attr('attr-data');
    // });

    $(".avatar-upload").click(function() {
        avatar_url = $(this).attr('attr-data');
        $("input[id='profile-avatar-file']").click();
    });

    function image_upload(data) {
        var img_src = $(".cropme").find("img").attr("src");
        var file_data = $('#profile-avatar-file').prop('files')[0];
        if (file_data && file_data.size > 2097152) {
            toastr['error']('File too large. File must be less than 2MB.', 'Error');
            return;
        }
        $("input[id='profile-avatar-file']").val('')

        var blobURL;
        if (!file_data || file_data == undefined) {
            blobURL = img_src;
        }
        else {
            blobURL = URL.createObjectURL(file_data);
        }

        const img = new Image();
        img.src = blobURL;

        img.onload = function () {
            const MAX_WIDTH = 1280;
            const MAX_HEIGHT = 1280;
            const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
            const canvas = document.createElement("canvas");
            canvas.width = newWidth;
            canvas.height = newHeight;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, newWidth, newHeight);
            canvas.toBlob(
                (blob) => {
                    // Handle the compressed image.
                    var form_data = new FormData();
                    form_data.append('file', blob);
                    form_data.append('field', avatar_url);
                    form_data.append('img_src', img_src);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('setting.profile.avatar') }}',
                        processData: false,
                        contentType: false,
                        cache: false,
                        data : form_data,
                        success:function(data){
                            if (data.error) {
                                toastr['error'](data.error, 'Error');
                            } else {
                                $('.update-success').removeClass('d-none');
                                setTimeout(function() {
                                    $('.update-success').addClass('d-none');
                                    window.location.reload();
                                }, 3000);
                            }
                        },
                        error:function(data){
                            console.log(data);
                        }
                    });
                },
                "image/jpeg",
                quality
            );
        };
    }

    $(".trash-avatar").click(function() {
        var send_data = {};
        send_data['id'] = '{{ $user->profile->id }}';
        send_data['field'] = $(this).attr('attr-data');
        $.ajax({
          type: 'PUT',
          url: '{{ route('setting.remove.avatar') }}',
          data: send_data,
          success: function(data) {
            $('.update-success').removeClass('d-none');
            setTimeout(function() {
                $('.update-success').addClass('d-none');
                window.location.reload();
            }, 3000);
          }
        })
    });

    $('.story-edit').blur(function() {
        if (contents != $(this).html()) {
            contents = $(this).html();
            var send_data = {};
            send_data['id'] = '{{ $user->profile->id }}';
            send_data['story_content'] = contents
            $.ajax({
              type: 'PUT',
              url: '{{ route('setting.update.story') }}',
              data: send_data,
              success: function(data) {
                $('.update-success').removeClass('d-none');
                setTimeout(function() {
                    $('.update-success').addClass('d-none');
                }, 3000);
              }
            })
        }
    });

    $('.job-title-edit').blur(function() {
        if (job_title != $(this).html()) {
            job_title = $(this).html();
            var send_data = {};
            send_data['id'] = '{{ $user->profile->id }}';
            send_data['job_title'] = job_title
            $.ajax({
              type: 'PUT',
              url: '{{ route('setting.update.job_title') }}',
              data: send_data,
              success: function(data) {
                $('.update-success').removeClass('d-none');
                setTimeout(function() {
                    $('.update-success').addClass('d-none');
                }, 3000);
              }
            })
        }
    });

    $('.city-edit').blur(function() {
        if (city != $(this).html()) {
            city = $(this).html();
            var send_data = {};
            send_data['id'] = '{{ $user->profile->id }}';
            send_data['city'] = city
            $.ajax({
              type: 'PUT',
              url: '{{ route('setting.update.city') }}',
              data: send_data,
              success: function(data) {
                $('.update-success').removeClass('d-none');
                setTimeout(function() {
                    $('.update-success').addClass('d-none');
                }, 3000);
              }
            })
        }
    });

    $('.country-edit').blur(function() {
        if (country != $(this).html()) {
            country = $(this).html();
            var send_data = {};
            send_data['id'] = '{{ $user->profile->id }}';
            send_data['country'] = country
            $.ajax({
              type: 'PUT',
              url: '{{ route('setting.update.country') }}',
              data: send_data,
              success: function(data) {
                $('.update-success').removeClass('d-none');
                setTimeout(function() {
                    $('.update-success').addClass('d-none');
                }, 3000);
              }
            })
        }
    });

    let timer = null;

    $('.main-bg').on('click', function() {
        $('.address-search-section').hide();
    })

    $('.search-city input[type="text"]').on('keyup', function() {
        const key = $(this).val();
        if (timer) {
            clearTimeout(timer)
        }
        timer = setTimeout(function() {
            if(key == '') {
                $('.address-search-section').hide();
            } else {
                var options = {
                    distance: 'CITY',
                    keyword: key,
                };
                $.ajax({
                    url: '{{ route("connect.address.search") }}',
                    method: "POST",
                    data: options,
                    success:function(res){
                        if (res.length) {
                            var html = '';
                            for(var resIndex = 0; resIndex < res.length; resIndex++) {
                                html +=
                                    '<div class="address py-3" attr-data="' + res[resIndex].address + '"  attr-name="' + res[resIndex].name + '">' + res[resIndex].name + '</div>';
                            }
                            $('.address-search-section').html(html);
                            $('.address-search-section').show();
                        }
                        else {
                            $("#state").attr("disabled", false);
                            $('.dropdown-select').show();
                            $('#country').addClass('d-none');
                            $('#state').removeClass('disabled');
                        }
                    },
                    error:function(err){
                        toastr['error']('Error');
                    }
                })
            }
        }, 1000);
    })

    $(document).on('click', '.address', function() {
        const ids = $(this).attr('attr-data').split(',');
        const names = $(this).attr('attr-name').split(', ');
        $("#city").val(names[0]);
        $("#state").val(names[1]);
        $("#country").val(names[2]);
        $("#real-city").val(ids[0]);
        $("#real-state").val(ids[1]);
        $("#real-country").val(ids[2]);
        $('.address-search-section').hide();
        $(".current").text(names[2]);
        $('.dropdown-select').hide();
        $('#country').removeClass('d-none');
        $("#state").prop("disabled", true);
    })

    const updateUserDetail = {
        init: function () {
            this.variables();
            this.addEventListeners();
        },
        variables: function () {
            this.form = $('[data-form="update-user-detail"]');
            this.submitButton = $('[data-button="submit"]');
            this.mobileNumberInput = $('#mobileNumber');
            this.mobileNumberError = $('#mobile-number-error');
            this.emailInput = $('#email');
            this.emailError = $('#email-error');
            this.streetNameInput = $('#streetName');
            this.streetNameError = $('#street-name-error');
            this.houseNumberInput = $('#houseNumber');
            this.houseNumberError = $('#house-number-error');
            this.cityInput = $('#city');
            this.cityError = $('#city-error');
            this.postalCodeInput = $('#postalCode');
            this.postalCodeError = $('#postal-code-error');
            this.stateInput = $('#state');
            this.stateError = $('#state-error');
            this.countryInput = $('#country');
            this.countryError = $('#country-error');
            this.usernameInput = $('#username');
            this.usernameError = $('#username-error');
            this.passwordInput = $('#password');
            this.passwordError = $('#password-error');
            this.passwordConfirmInput = $('#password-confirm');
            this.passwordConfirmError = $('#password-confirm-error');
            this.scrollToError = '';
        },
        addEventListeners: function () {
            this.mobileNumberInput.on('keyup', function () {
                this.validateMobileNumberInput();
            }.bind(this));
            this.emailInput.on('keyup', function () {
                this.validateEmailInput();
            }.bind(this));
            this.streetNameInput.on('keyup', function () {
                this.validateStreetNameInput();
            }.bind(this));
            this.houseNumberInput.on('keyup', function () {
                this.validateHouseNumberInput();
            }.bind(this));
            this.cityInput.on('keyup', function () {
                this.validateCityInput();
            }.bind(this));
            this.postalCodeInput.on('keyup', function () {
                this.validatePostalCodeInput();
            }.bind(this));
            this.stateInput.on('keyup', function () {
                this.validateStateInput();
            }.bind(this));
            this.countryInput.on('keyup', function () {
                this.validateCountryInput();
            }.bind(this));
            this.usernameInput.on('keyup', function () {
                this.validateUsernameInput();
            }.bind(this));
            this.passwordInput.on('keyup', function () {
                this.validatePasswordInput();
            }.bind(this));
            this.passwordConfirmInput.on('keyup', function () {
                this.validatePasswordConfirmInput();
            }.bind(this));
            this.form.on('submit', function (event) {
                if (this.validateMobileNumberInput() &&
                    this.validateEmailInput() &&
                    this.validateStreetNameInput() &&
                    this.validateHouseNumberInput() &&
                    this.validateCityInput() &&
                    this.validatePostalCodeInput() &&
                    this.validateStateInput() &&
                    this.validateCountryInput()) {
                    $('.button-submit').attr('disabled', true);
                    return true;
                } else {
                    event.preventDefault();
                    this.scrollToElement(this.scrollToError);
                    this.scrollToError.focus();
                }
            }.bind(this));
        },
        scrollToElement: function (element) {
            $('body, html').animate({
                scrollTop: element.offset().top - 80
            }, 500);
        },
        validateMobileNumberInput: function () {
            var validationMessage = '';
            var value = this.mobileNumberInput.val();

            if ((/^[0-9 ]{7,50}$/.test(value.trim())) || (/^(\+)?[0-9 ]{6,50}$/.test(value.trim()))) {
                validationMessage = 'Now, that\'s a good phone number.\n';
                this.mobileNumberError.addClass('valid');
                this.mobileNumberError.hide();
            } else if (value === '') {
                validationMessage = 'Phone number is required.';
                this.mobileNumberError.removeClass('valid');
                this.mobileNumberError.show();
            } else {
                validationMessage = 'Minimum 7 digits.';
                this.mobileNumberError.removeClass('valid');
                this.mobileNumberError.show();
            }

            this.mobileNumberError.html(validationMessage);
            this.scrollToError = this.mobileNumberInput;

            return ((/^[0-9 ]{7,50}$/.test(value.trim())) || (/^(\+)?[0-9 ]{6,50}$/.test(value.trim())));
        },
        validateEmailInput: function () {
            var validationMessage = '';
            var value = this.emailInput.val();
            var action = 'verifyEmail';
            let self = this;
            if (timer) {
                clearTimeout(timer)
            }
            timer = setTimeout(async function() {
                var response = await onVerify(action, value);
                if (response.status) {
                    validationMessage = 'Email is in use already.';
                    self.emailError.removeClass('valid');
                    self.emailError.show();
                } else {
                    if ((/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value))) {
                        validationMessage = 'Now, that\'s a good email.\n';
                        self.emailError.addClass('valid');
                        self.emailError.hide();
                    } else if (value === '') {
                        validationMessage = 'The email field is required.';
                        self.emailError.removeClass('valid');
                        self.emailError.show();
                    } else {
                        validationMessage = 'Email is not valid.';
                        self.emailError.removeClass('valid');
                        self.emailError.show();
                    }
                }

                self.emailError.html(validationMessage);
                self.scrollToError = self.emailInput;
            }, 1000)

            return ((/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)));
        },
        validateStreetNameInput: function () {
            var validationMessage = '';
            var value = this.streetNameInput.val();

            if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value))) {
                validationMessage = 'Now, that\'s a good street name.\n';
                this.streetNameError.addClass('valid');
                this.streetNameError.hide();
            } else if (value === '') {
                validationMessage = 'Street name is required.';
                this.streetNameError.removeClass('valid');
                this.streetNameError.show();
            } else {
                validationMessage = 'The street name must contain letter and number and be minimum of 3 characters.';
                this.streetNameError.removeClass('valid');
                this.streetNameError.show();
            }

            this.streetNameError.html(validationMessage);
            this.scrollToError = this.streetNameInput;

            return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value)));
        },
        validateHouseNumberInput: function () {
            var validationMessage = '';
            var value = this.houseNumberInput.val();

            if ((/^.{1,50}$/.test(value))) {
                validationMessage = 'Now, that\'s a good house number.\n';
                this.houseNumberError.addClass('valid');
                this.houseNumberError.hide();
            } else if (value === '') {
                validationMessage = 'House number is required.';
                this.houseNumberError.removeClass('valid');
                this.houseNumberError.show();
            } else {
                validationMessage = 'The house number must contain letter and number and be minimum of 3 characters.';
                this.houseNumberError.removeClass('valid');
                this.houseNumberError.show();
            }

            this.houseNumberError.html(validationMessage);
            this.scrollToError = this.houseNumberInput;

            return ((/^.{1,50}$/.test(value)));
        },
        validateCityInput: function () {
            var validationMessage = '';
            var value = this.cityInput.val();

            if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value))) {
                validationMessage = 'Now, that\'s a good city name.\n';
                this.cityError.addClass('valid');
                this.cityError.hide();
            } else if (value === '') {
                validationMessage = 'The city name field is required.';
                this.cityError.removeClass('valid');
                this.cityError.show();
            } else {
                validationMessage = 'The city name must contain letter and number and be minimum of 3 characters.';
                this.cityError.removeClass('valid');
                this.cityError.show();
            }

            this.cityError.html(validationMessage);
            this.scrollToError = this.cityInput;

            return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value)));
        },
        validatePostalCodeInput: function () {
            var validationMessage = '';
            var value = this.postalCodeInput.val();

            if ((/^.{3,50}$/.test(value))) {
                validationMessage = 'Now, that\'s a good zip code.\n';
                this.postalCodeError.addClass('valid');
                this.postalCodeError.hide();
            } else if (value === '') {
                validationMessage = 'Zip code is required.';
                this.postalCodeError.removeClass('valid');
                this.postalCodeError.show();
            } else {
                validationMessage = 'Minimum 3 characters / digits.';
                this.postalCodeError.removeClass('valid');
                this.postalCodeError.show();
            }

            this.postalCodeError.html(validationMessage);
            this.scrollToError = this.postalCodeInput;

            return ((/^.{3,50}$/.test(value)));
        },
        validateStateInput: function () {
            var validationMessage = '';
            var value = this.stateInput.val();

            if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value))) {
                validationMessage = 'Now, that\'s a good area name.\n';
                this.stateError.addClass('valid');
                this.stateError.hide();
            } else if (value === '') {
                validationMessage = 'The area name field is required.';
                this.stateError.removeClass('valid');
                this.stateError.show();
            } else {
                validationMessage = 'The area name must contain letter and number and be minimum of 3 characters.';
                this.stateError.removeClass('valid');
                this.stateError.show();
            }

            this.stateError.html(validationMessage);
            this.scrollToError = this.stateInput;

            return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value)));
        },
        validateCountryInput: function () {
            var validationMessage = '';
            var value = this.countryInput.val();

            if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value))) {
                validationMessage = 'Now, that\'s a good country name.\n';
                this.countryError.addClass('valid');
                this.countryError.hide();
            } else if (value === '') {
                validationMessage = 'Country is required.';
                this.countryError.removeClass('valid');
                this.countryError.show();
            } else {
                validationMessage = 'Minimum 3 characters.';
                this.countryError.removeClass('valid');
                this.countryError.show();
            }

            this.countryError.html(validationMessage);
            this.scrollToError = this.countryInput;

            return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value)));
        },
        validateUsernameInput: function () {
            var validationMessage = '';
            var value = this.usernameInput.val();
            var action = 'verifyUsername';
            let self = this;
            if (timer) {
                clearTimeout(timer)
            }
            timer = setTimeout(async function() {
                var response = await onVerify(action, value);
                if (response.status) {
                    validationMessage = 'The username seems to be exist !';
                    self.usernameError.removeClass('valid');
                    self.usernameError.show();
                } else {
                    if ((/^.{6,50}$/.test(value))) {
                        validationMessage = 'Now, that\'s a good username.\n';
                        self.usernameError.addClass('valid');
                        self.usernameError.hide();
                    } else if (value === '') {
                        validationMessage = 'Username is required.';
                        self.usernameError.removeClass('valid');
                        self.usernameError.show();
                    } else {
                        validationMessage = 'Minimum 6 characters / digits.';
                        self.usernameError.removeClass('valid');
                        self.usernameError.show();
                    }
                }

                self.usernameError.html(validationMessage);
                self.scrollToError = self.usernameInput;
            }, 1000)

            return ((/^.{6,50}$/.test(value)));
        },
        validatePasswordInput: function () {
            var validationMessage = '';
            var value = this.passwordInput.val();
            $("#change-password").val(1);

            if ((/\d/.test(value)) && (/[a-zA-Z]/.test(value)) && (/^.{7,}$/.test(value))) {
                validationMessage = 'Now, that\'s a secure password.\n';
                this.validRegisterPassword();
            } else if ((/\d/.test(value)) && (/[a-zA-Z]/.test(value))) {
                validationMessage = 'Password must contain a <strong><del>letter</del></strong> and a <strong><del>number</del></strong>, and be minimum of <strong>7 characters</strong>.';
                this.errorRegisterPassword();
            } else if ((/^.{7,}$/.test(value)) && (/[a-zA-Z]/.test(value))) {
                validationMessage = 'Password must contain a <strong><del>letter</del></strong> and a <strong>number</strong>, and be minimum of <strong><del>7 characters</del></strong>.';
                this.errorRegisterPassword();
            } else if ((/^.{7,}$/.test(value)) && (/\d/.test(value))) {
                validationMessage = 'Password must contain a <strong>letter</strong> and a <strong><del>number</del></strong>, and be minimum of <strong><del>7 characters</del></strong>.';
                this.errorRegisterPassword();
            } else if ((/^.{7,}$/.test(value))) {
                validationMessage = 'Password must contain a <strong>letter</strong> and a <strong>number</strong>, and be minimum of <strong><del>7 characters</del></strong>.';
                this.errorRegisterPassword();
            } else if ((/\d/.test(value))) {
                validationMessage = 'Password must contain a <strong>letter</strong> and a <strong><del>number</del></strong>, and be minimum of <strong>7 characters</strong>.';
                this.errorRegisterPassword();
            } else if ((/[a-zA-Z]/.test(value))) {
                validationMessage = 'Password must contain a <strong><del>letter</del></strong> and a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                this.errorRegisterPassword();
            } else if (value === '') {
                validationMessage = 'Password must contain a <strong>letter</strong> and a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                $("#change-password").val(0);
                this.validRegisterPassword();
            } else {
                validationMessage = 'Password must contain a <strong>letter</strong> and a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                $("#change-password").val(0);
                this.validRegisterPassword();
            }

            this.passwordError.html(validationMessage);
            this.scrollToError = this.passwordInput;

            return (/\d/.test(value)) && (/[a-zA-Z]/.test(value)) && (/^.{7,}$/.test(value));
        },
        validRegisterPassword: function () {
            this.passwordError.addClass('valid');
            this.passwordError.hide();
        },
        errorRegisterPassword: function () {
            this.passwordError.removeClass('valid');
            this.passwordError.show();
        },
        validatePasswordConfirmInput: function () {
            var validationMessage = '';
            var password = this.passwordInput.val();
            var password_confirm = this.passwordConfirmInput.val();
            if (password === '') {
                validationMessage = "Please fill out password first.";
                this.errorRegisterPasswordConfirm();
            }
            else if (password_confirm !== password) {
                validationMessage = "Password does not match";
                this.errorRegisterPasswordConfirm();
            }
            else  {
                this.validRegisterPasswordConfirm();
            }

            this.passwordConfirmError.html(validationMessage);
            this.scrollToError = this.passwordConfirmInput;

            return (/\d/.test(password_confirm)) && (/[a-zA-Z]/.test(password_confirm)) && (/^.{7,}$/.test(password_confirm));
        },
        validRegisterPasswordConfirm: function () {
            this.passwordConfirmError.addClass('valid');
            this.passwordConfirmError.hide();
        },
        errorRegisterPasswordConfirm: function () {
            this.passwordConfirmError.removeClass('valid');
            this.passwordConfirmError.show();
        },
    };

    function onVerify(action, value) {
        return $.ajax({
            url: '{{ route('user.verify') }}',
            type: 'POST',
            data: {
                key: action,
                value: value
            }
        });
    }

    $(document).ready(function () {
        updateUserDetail.init();
    });

</script>
@endsection