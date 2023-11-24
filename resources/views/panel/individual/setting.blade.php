@extends('layouts.app', ['ACTIVE_TITLE' => 'PROFILE', 'ROUTES' => [
  ['ROUTE' => 'profile.index', 'ACTIVE' => 'profile', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'profile.setting.index', 'ACTIVE' => 'setting', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'setting'])

@section('title', __('- Individual'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<style type="text/css">
    select.country-select {
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
    }
    select.phone-select {
        width: 140px;
        margin-right: 4px;
        padding-left: 28px !important;
        padding-right: 8px !important;
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
    }
    .login-page .form-group .combodate {
        display: block;
        width: 100%;
    }
    .login-page .form-group select.day, .login-page .form-group select.month, .login-page .form-group select.year {
        background: #04246b40;
        border: none;
        -webkit-border-radius: 10rem;
        -moz-border-radius: 10rem;
        -ms-border-radius: 10rem;
        border-radius: 10rem;
        box-shadow: none;
        height: 44px;
        font-weight: 400;
        outline: medium none;
        padding-left: 28px;
        padding-right: 12px;
        font-size: 16px;
        line-height: 1.4;
        color: #fff;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        width: 32% !important;
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
    }
    .register-input-container {
        width: 100%;
    }
    .pt-2\.5 {
        padding-top: 12px;
    }
    .form-section {
        width: 680px;
    }
    .info-title {
        margin-bottom: 12px;
        padding-left: 40px;
    }
    label.has-error {
        padding: 8px 24px 0 16px;
        font-size: 14px;
        color: #00ffff;
        text-align: left;
        font-family: 'DinPro Light', sans-serif;
        margin: 0;
    }
    label.valid {
        padding: 8px 24px 0 16px;
        font-size: 14px;
        color: #00ffff;
        text-align: left;
        font-family: 'DinPro Light', sans-serif;
        margin: 0;
    }

    @media only screen and (max-width: 767.98px) {
        .form-section {
            width: 100%;
        }
    }

    .addresstab {
        display: none;
        width: 100%;
        z-index: 1000; 
        background: #2d23a3;
        position: absolute;
        padding-top: 12px;
        padding-bottom: 12px;
        max-height: 250px;
        overflow-y: auto;
        margin-top: -12px;
    }

    .addresstab div {
        color: #fff;
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 18px;
        width: 100%;
        padding-left: 26px;
        padding-right: 20px;
    }
    .addresstab div:hover {
        background-color: #573fdb;
    }
    .important-note {
        font-weight: 500 !important;
    }
    .important-desc {
        font-size: 11px !important;
    }
    .copy-btn {
        width: 100%;
        max-width: 300px;
        height: 44px;
        background: #04246b;
        display: flex;
        align-items: center;
        justify-content: center;
        text-transform: uppercase;
        color: white;
        -webkit-border-radius: 10rem;
        -moz-border-radius: 10rem;
        -ms-border-radius: 10rem;
        border-radius: 10rem;
        font-size: 16px !important;
        font-family: 'DinPro', sans-serif !important;
        border: 0.1rem solid #04246b;
        cursor: pointer;
    }
    .copy-btn:hover {
        background: #00ffff !important;
        color: #04246b !important;
        border-color: #00ffff !important;
    }
    .copy-btn:focus, .copy-btn:active {
        background: #00ffff !important;
        color: #04246b !important;
        border-color: #00ffff !important;
        outline: none;
        box-shadow: none;
    }
    .copy-btn.disabled, .copy-btn:disabled, .copy-btn[disabled] {
        opacity: 1 !important;
    }
    select:disabled {
        color: white !important;
    }
    .editable {
        color: #00ffff !important;
    }
</style>
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

@php
    $other_interests = explode(",", $user->profile->other_interests);
@endphp

<div class="main-bg">

    <div class="row m-0 p-0 w-100 setting-section">
        <div class="row justify-content-center m-0 w-100">
          <div class="register-input-container">
              <div class="container register-input-section pt-5">
                  <div class="row justify-content-center">
                      <div class="login-page">
                        <div class="login-title text-center">
                            <p class="mb-1 registration-title">MY DETAILS</p>
                        </div>
                        <div class="login-title text-center mb-2 mt-4">
                            <span style="font-size: 16px;">MY REFERRAL LINK<br>https://www.buddies.net/{{ $user->customer_id ?? '123456'}}</span>
                        </div>
                        <div class="d-flex justify-content-center align-items-center btn-section w-100 p-0 m-0 mb-5">
                            <a class="btn btn-primary copy-btn" onclick="copyLink(this,event)" attr_href="{{url('/')}}/{{ $user->customer_id }}">COPY LINK</a>
                        </div>
                      </div>
                  </div>
                  <div class="row justify-content-center">
                      <form class="form-section" data-form="register" autocomplete="off" method="POST" action="{{ route('profile.update.detail') }}">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  @foreach ($errors->all() as $error)
                                      {{ $error }}<br/>
                                  @endforeach
                              </div>
                          @endif

                          @csrf

                          <div class="row mt-4">
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span class="editable">FIELDS IN BLUE ARE EDITABLE</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6"></div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="first_name" class="form-control" id="firstName" placeholder="First Name" tabindex="1" value="{{ $user->profile->first_name}}" readonly>
                                          <label id="first-name-error" class="has-error" for="first_name" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Last Name" tabindex="2" value="{{ $user->profile->last_name}}" readonly>
                                          <label id="last-name-error" class="has-error" for="last_name" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>                    
                          </div>
                          <div class="row mt-4">
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span>DATE OF BIRTH</span>
                                      </div>
                                  </div>
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" id="date" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="birthday" value="{{$user->profile->birthday}}" hidden>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span>GENDER</span>
                                      </div>
                                  </div>
                                  <div class="login-page">
                                      <div class="form-group d-flex pt-2.5 pl-3">
                                          <label class="checkbox-container">
                                              <input type="radio" name="gender" id="gender-female" value="f" {{ $user->profile->gender == 'f' ? 'checked' : '' }}/>
                                              <span class="checkbox-circle"></span>
                                              <span class="checkbox-name">{{ __('FEMALE') }}</span>
                                          </label>
                                          <label class="checkbox-container pl-5">
                                              <input type="radio" name="gender" id="gender-male" value="m" {{ $user->profile->gender == 'm' ? 'checked' : '' }}/>
                                              <span class="checkbox-circle"></span>
                                              <span class="checkbox-name">{{ __('MALE') }}</span>
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-4">
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span class="registration-phone-label">PHONE NUMBER</span>
                                      </div>
                                  </div>
                                  <div class="login-page">
                                      <div class="form-group">
                                          <div class="d-flex">
                                              @php
                                                $numbers = explode(" ", $user->profile->phone);
                                                $first_number = $numbers[0];
                                                $last_number = count($numbers) > 1 ? $numbers[1] : '';
                                              @endphp
                                              <select class="form-control phone-select webkit_style editable" name="">
                                                <option value="{{ $first_number }}">{{ $first_number }}</option>
                                                @foreach ($phonecodes as $code)                                    
                                                    <option value="+{{$code}}">+{{$code}}</option>
                                                @endforeach
                                              </select>
                                              <input type="text" name="phone" class="form-control" id="real-mobileNumber" placeholder="Phone Number" hidden>
                                              <input
                                                type="text"
                                                class="form-control editable"
                                                id="mobileNumber"
                                                placeholder="Phone Number"
                                                tabindex="6"
                                                value="{{ $last_number }}"
                                              >
                                          </div>
                                          <label id="mobile-number-error" class="has-error" for="phone" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span class="registration-email-lable">EMAIL</span>
                                      </div>
                                  </div>
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="email" name="email" class="form-control editable" id="email" placeholder="Email" tabindex="7" value="{{ $user->email}}">
                                          <label id="email-error" class="has-error" for="email" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-4 company-details-section">
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span>THE COMPANY YOU REPRESENT</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                    <div class="login-title info-title">
                                        <span>WEBSITE</span>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="company_name" class="form-control editable" id="companyName" placeholder="Company Name" tabindex="4" value="{{ $user->profile->company_name}}">
                                          <label id="company-name-error" class="has-error" for="company_name" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="site_url" class="form-control editable" id="vatNumber" placeholder="Website" tabindex="5" value="{{ $user->profile->site_url}}">
                                          <label id="vat-number-error" class="has-error" for="site_url" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-4">
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span>ADDRESS</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6"></div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="street_name" class="form-control editable" id="streetName" placeholder="Street" tabindex="8" value="{{ $user->profile->street}}">
                                          <label id="street-name-error" class="has-error" for="street_name" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="house_number" class="form-control editable" id="houseNumber" placeholder="House Number" tabindex="9" value="{{ $user->profile->house_number}}">
                                          <label id="house-number-error" class="has-error" for="house_number" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="postal_code" class="form-control editable" id="postalCode" placeholder="Postal Code" tabindex="11" value="{{ $user->profile->postal_code}}">
                                          <label id="postal-code-error" class="has-error" for="postal_code" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <!-- <input type="text" name="city" class="form-control editable" id="real-city" placeholder="City" value="{{ isset($user->profile->city) ? $user->profile->city : '' }}" hidden> -->
                                      <div class="form-group">
                                          <input type="text" name="city" class="form-control editable" id="city" placeholder="City" tabindex="10" value="{{ empty($cityname) ? isset($user->profile->city) ? $user->profile->city : '' : $cityname }}">
                                          <!-- <input type="text" class="form-control editable" id="city" placeholder="City" tabindex="10" value="{{ empty($cityname) ? isset($user->profile->city) ? $user->profile->city : '' : $cityname }}" onchange="changeCity()"> -->
                                          <label id="city-error" class="has-error" for="city" style="display: none"></label>
                                      </div>
                                  </div>
                                  <div class="addresstab">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <select class="form-control country-select webkit_style editable" name="country">
                                              @foreach($countries as $country)
                                                  <option value="{{ $country->id }}" @if($country->id == $user->profile->country ) selected @endif>{{ $country['name'] }}</option>
                                              @endforeach
                                          </select>
                                          <label id="country-error" class="has-error" for="country" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-4">
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="login-title info-title">
                                          <span>LOGIN DETAILS</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6"></div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="text" name="username" class="form-control" id="username" placeholder="User Name" tabindex="14" value="{{ $user->username}}" readonly>
                                          <label id="username-error" class="has-error" for="username" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="login-page">
                                      <div class="form-group">
                                          <input type="password" name="changePassword" class="form-control" id="change-password" value="0" hidden>
                                          <input type="password" name="password" class="form-control editable" id="password" placeholder="Password" tabindex="15" value="">
                                          <label id="password-error" class="has-error" for="password" style="display: none"></label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          {{-- <div class="row mt-4">
                              <div class="col-md-12">
                                  <div class="login-page d-md-flex">
                                      <div class="login-title info-title">
                                          <span>DISPLAY ON MY PAGE</span>
                                      </div>
                                      <div class="form-group d-flex pt-1 pl-4">
                                          <label class="checkbox-container">
                                              <input type="checkbox" name="display_options[]" id="display-option-phone" value="p" @if (str_contains($user->profile->display_options, 'p')) checked @endif/>
                                              <span class="checkbox-circle"></span>
                                              <span class="checkbox-name">{{ __('PHONE NUMBER') }}</span>
                                          </label>
                                          <label class="checkbox-container pl-4">
                                              <input type="checkbox" name="display_options[]" id="display-option-email" value="e" @if (str_contains($user->profile->display_options, 'e')) checked @endif/>
                                              <span class="checkbox-circle"></span>
                                              <span class="checkbox-name">{{ __('EMAIL') }}</span>
                                          </label>
                                          <label class="checkbox-container pl-4">
                                              <input type="checkbox" name="display_options[]" id="display-option-website" value="w" @if (str_contains($user->profile->display_options, 'w')) checked @endif/>
                                              <span class="checkbox-circle"></span>
                                              <span class="checkbox-name">{{ __('WEBSITE') }}</span>
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div> --}}
                          <div class="row justify-content-center mt-4 mx-0">
                              <div class="login-page">
                                  <div class="form-group row justify-content-center">
                                      <div class="col-12 text-center">
                                          <button class="btn btn-primary login-button button-submit" data-button="submit">
                                              {{ __('SAVE') }}
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-md-6 p-0" id="setting-item">
              {{-- 
                <div class="row justify-content-center bg-color-section px-4 m-0 pt-4 pb-2">
                  <p>I AM INTERESTED IN</p>
              </div>
              <div class="row justify-content-center gendertab m-0">
                  <div class="gender_tablinks py-4 @if (isset($user->profile->interest_based) && str_contains($user->profile->interest_based, 'f')) active @endif" id="female" onclick="toggle_gender(this, 'f')">WOMEN</div>
                  <div class="gender_tablinks py-4 @if (isset($user->profile->interest_based) && str_contains($user->profile->interest_based, 'm')) active @endif" id="male" onclick="toggle_gender(this, 'm')">MEN</div>
              </div> --}}
              <div class="row justify-content-center bg-color-section px-4 m-0 pt-4 pb-2">
                  <p>SELECT 5 INTEREST CATEGORIES</p>
              </div>
              <div class="w-100 accordion" id="category">
                  <div class="card">
                      <div class="card-header" id="categoryhead1">
                          <div class="title interest-category-check" attr-data="Crafts">Arts & Crafts</div>
                          <a href="#" class="btn-header-link collapsed collapse-Crafts {{ in_array('Crafts', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category1" aria-expanded="true" aria-controls="category1"></a>
                      </div>

                      <div id="category1" class="collapse collapse-Crafts {{ in_array('Crafts', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead1" data-parent="#category">
                          <div class="card-body">
                              <p>Aeromodelling</p>
                              <p>Airbrushing</p>
                              <p>Arts</p>
                              <p>Beadwork</p>
                              <p>Blacksmithing</p>
                              <p>Bookbinding</p>
                              <p>Bridge Building</p>
                              <p>Building Dollhouses</p>
                              <p>Calligraphy</p>
                              <p>Candle Making</p>
                              <p>Cardstacking</p>
                              <p>Cartooning</p>
                              <p>Ceramics</p>
                              <p>Coloring</p>
                              <p>Conworlding</p>
                              <p>Crafts</p>
                              <p>Crafts (unspecified)</p>
                              <p>Crochet</p>
                              <p>Crocheting</p>
                              <p>Cross-Stitch</p>
                              <p>Digital Photography</p>
                              <p>Drawing</p>
                              <p>Embroidery</p>
                              <p>Felting</p>
                              <p>Floral Arrangements</p>
                              <p>Gunsmithing</p>
                              <p>Gyotaku</p>
                              <p>Jet Engines</p>
                              <p>Jewelry Making</p>
                              <p>Keep A Journal</p>
                              <p>Knitting</p>
                              <p>Knotting</p>
                              <p>Leathercrafting</p>
                              <p>Macramé</p>
                              <p>Making Model Cars</p>
                              <p>Matchstick Modeling</p>
                              <p>Model Railroading</p>
                              <p>Model Rockets</p>
                              <p>Modeling Ships</p>
                              <p>Models</p>
                              <p>Nail Art</p>
                              <p>Needlepoint</p>
                              <p>Origami</p>
                              <p>Painting</p>
                              <p>Papermache</p>
                              <p>Papermaking</p>
                              <p>Photography</p>
                              <p>Pottery</p>
                              <p>Quilting</p>
                              <p>Scrapbooking</p>
                              <p>Sewing</p>
                              <p>Sketching</p>
                              <p>Soap Making</p>
                              <p>String Figures</p>
                              <p>Tatting</p>
                              <p>Taxidermy</p>
                              <p>Textiles</p>
                              <p>Tombstone Rubbing</p>
                              <p>Woodworking</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead2">
                          <div class="title interest-category-check" attr-data="Collecting">Collecting</div>
                          <a href="#" class="btn-header-link collapsed collapse-Collecting {{ in_array('Collecting', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category2" aria-expanded="true" aria-controls="category2"></a>
                      </div>

                      <div id="category2" class="collapse collapse-Collecting {{ in_array('Collecting', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead2" data-parent="#category">
                          <div class="card-body">
                              <p>Button Collecting</p>
                              <p>Coin Collecting</p>
                              <p>Collecting</p>
                              <p>Collecting Antiques</p>
                              <p>Collecting Artwork</p>
                              <p>Collecting Hats</p>
                              <p>Collecting Music Albums</p>
                              <p>Collecting RPM Records</p>
                              <p>Collecting Sports Cards</p>
                              <p>Collecting Swords</p>
                              <p>Diecast Collectibles</p>
                              <p>Dolls</p>
                              <p>Gun Collecting</p>
                              <p>Rock Collecting</p>
                              <p>Shopping</p>
                              <p>Stamp Collecting</p>
                              <p>Tool Collecting</p>
                              <p>Toy Collecting</p>
                              <p>Train Collecting</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead3">
                          <div class="title interest-category-check" attr-data="Dancing">Dancing</div>
                          <a href="#" class="btn-header-link collapsed collapse-Dancing {{ in_array('Dancing', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category3" aria-expanded="true" aria-controls="category3"></a>
                      </div>

                      <div id="category3" class="collapse collapse-Dancing {{ in_array('Dancing', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead3" data-parent="#category">
                          <div class="card-body">
                              <p>Belly Dancing</p>
                              <p>Dancing</p>
                              <p>Pole Dancing</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead5">
                          <div class="title interest-category-check" attr-data="Education">Educational</div>
                          <a href="#" class="btn-header-link collapsed collapse-Education {{ in_array('Education', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category5" aria-expanded="true" aria-controls="category5"></a>
                      </div>

                      <div id="category5" class="collapse collapse-Education {{ in_array('Education', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead5" data-parent="#category">
                          <div class="card-body">
                              <p>Educational Courses</p>
                              <p>Genealogy</p>
                              <p>Handwriting Analysis</p>
                              <p>Home Repair</p>
                              <p>Inventing</p>
                              <p>Kitchen Chemistry</p>
                              <p>Lasers</p>
                              <p>Learning A Foreign Language</p>
                              <p>Learning To Pilot A Plane</p>
                              <p>Reading</p>
                              <p>Tesla Coils</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead6">
                          <div class="title interest-category-check" attr-data="Extreme">Extreme</div>
                          <a href="#" class="btn-header-link collapsed collapse-Extreme {{ in_array('Extreme', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category6" aria-expanded="true" aria-controls="category6"></a>
                      </div>

                      <div id="category6" class="collapse collapse-Extreme {{ in_array('Extreme', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead6" data-parent="#category">
                          <div class="card-body">
                              <p>Abseling (Rappelling)</p>
                              <p>Airplane Combat</p>
                              <p>Airplane Flight</p>
                              <p>Alligator Wrestling</p>
                              <p>Barefooting</p>
                              <p>Base Jumping</p>
                              <p>Blobbing</p>
                              <p>BMX</p>
                              <p>Bobsledding</p>
                              <p>Bungee Jumping</p>
                              <p>Canyon Swinging</p>
                              <p>Car Racing</p>
                              <p>Cliff Diving</p>
                              <p>Downhill Mountain Biking</p>
                              <p>Downhill Skateboarding</p>
                              <p>Flowboarding</p>
                              <p>Free Climbing</p>
                              <p>Go Kart Racing</p>
                              <p>Hang gliding</p>
                              <p>Highlining</p>
                              <p>Ice Climbing</p>
                              <p>Ice Cross Downhill</p>
                              <p>Ice Diving</p>
                              <p>Jetboarding</p>
                              <p>Jousting</p>
                              <p>Kite Boarding</p>
                              <p>Luge / Skeleton</p>
                              <p>Motocross</p>
                              <p>Motorcycle Stunts</p>
                              <p>Motorcycles</p>
                              <p>Mountain Boarding</p>
                              <p>Noodling</p>
                              <p>Off Road Driving</p>
                              <p>Parachuting</p>
                              <p>Paragliding or Power Paragliding</p>
                              <p>Parkour</p>
                              <p>Powerboking</p>
                              <p>Roller Derby</p>
                              <p>Running of the Bulls</p>
                              <p>Sandboarding</p>
                              <p>Scuba Diving</p>
                              <p>Skateboarding</p>
                              <p>Sky Diving</p>
                              <p>Snowboarding</p>
                              <p>Snowmobiling</p>
                              <p>Spelunkering</p>
                              <p>Street Luge</p>
                              <p>Surfing</p>
                              <p>Wakeboarding</p>
                              <p>Waterfall Kayaking</p>
                              <p>White Water Rafting</p>
                              <p>Windsurfing</p>
                              <p>Wingsuit Flying</p>
                              <p>Xpogo</p>
                              <p>Zorbing</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead7">
                          <div class="title interest-category-check" attr-data="Food">Food & Drink</div>
                          <a href="#" class="btn-header-link collapsed collapse-Food {{ in_array('Food', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category7" aria-expanded="true" aria-controls="category7"></a>
                      </div>

                      <div id="category7" class="collapse collapse-Food {{ in_array('Food', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead7" data-parent="#category">
                          <div class="card-body">
                              <p>Brewing Beer</p>
                              <p>Cake Decorating</p>
                              <p>Cigar Smoking</p>
                              <p>Cooking</p>
                              <p>Eating Out</p>
                              <p>Entertaining</p>
                              <p>Home Brewing</p>
                              <p>Pipe Smoking</p>
                              <p>Tea Tasting</p>
                              <p>Wine Making</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead8">
                          <div class="title interest-category-check" attr-data="Games">Games</div>
                          <a href="#" class="btn-header-link collapsed collapse-Games {{ in_array('Games', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category8" aria-expanded="true" aria-controls="category8"></a>
                      </div>

                      <div id="category8" class="collapse collapse-Games {{ in_array('Games', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead8" data-parent="#category">
                          <div class="card-body">
                              <p>Backgammon</p>
                              <p>Board Games</p>
                              <p>Casino Gambling</p>
                              <p>Chess</p>
                              <p>Cosplay</p>
                              <p>Crossword Puzzles</p>
                              <p>Darts</p>
                              <p>Dominoes</p>
                              <p>Games</p>
                              <p>Jigsaw Puzzles</p>
                              <p>Lawn Darts</p>
                              <p>Learn to Play Poker</p>
                              <p>Legos</p>
                              <p>Pinochle</p>
                              <p>Speed Cubing (rubix cube)</p>
                              <p>Tetris</p>
                              <p>Video Games</p>
                              <p>Warhammer</p>
                              <p>YoYo</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead9">
                          <div class="title interest-category-check" attr-data="Tech">High Tech</div>
                          <a href="#" class="btn-header-link collapsed collapse-Tech {{ in_array('Tech', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category9" aria-expanded="true" aria-controls="category9"></a>
                      </div>

                      <div id="category9" class="collapse collapse-Tech {{ in_array('Tech', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead9" data-parent="#category">
                          <div class="card-body">
                              <p>Amateur Radio</p>
                              <p>Blogging</p>
                              <p>Computer activities</p>
                              <p>Electronics</p>
                              <p>Home Theater</p>
                              <p>Internet</p>
                              <p>Robotics</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead10">
                          <div class="title interest-category-check" attr-data="Intellectual">Intellectual</div>
                          <a href="#" class="btn-header-link collapsed collapse-Intellectual {{ in_array('Intellectual', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category10" aria-expanded="true" aria-controls="category10"></a>
                      </div>

                      <div id="category10" class="collapse collapse-Intellectual {{ in_array('Intellectual', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead10" data-parent="#category">
                          <div class="card-body">
                              <p>Astrology</p>
                              <p>Church/church activities</p>
                              <p>Meditation</p>
                              <p>Microscopy</p>
                              <p>People Watching</p>
                              <p>Protesting</p>
                              <p>Socializing</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead11">
                          <div class="title interest-category-check" attr-data="Music">Music</div>
                          <a href="#" class="btn-header-link collapsed collapse-Music {{ in_array('Music', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category11" aria-expanded="true" aria-controls="category11"></a>
                      </div>

                      <div id="category11" class="collapse collapse-Music {{ in_array('Music', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead11" data-parent="#category">
                          <div class="card-body">
                              <p>Beatboxing</p>
                              <p>Bell Ringing</p>
                              <p>Compose Music</p>
                              <p>Guitar</p>
                              <p>Learning An Instrument</p>
                              <p>Listening to music</p>
                              <p>Musical Instruments</p>
                              <p>Piano</p>
                              <p>Playing music</p>
                              <p>Rapping</p>
                              <p>Singing In Choir</p>
                              <p>Violin</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead12">
                          <div class="title interest-category-check" attr-data="Outdoors">Outdoors</div>
                          <a href="#" class="btn-header-link collapsed collapse-Outdoors {{ in_array('Outdoors', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category12" aria-expanded="true" aria-controls="category12"></a>
                      </div>

                      <div id="category12" class="collapse collapse-Outdoors {{ in_array('Outdoors', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead12" data-parent="#category">
                          <div class="card-body">
                              <p>Aircraft Spotting</p>
                              <p>Airsofting</p>
                              <p>Amateur Astronomy</p>
                              <p>Astronomy</p>
                              <p>Beach/Sun tanning</p>
                              <p>Beachcombing</p>
                              <p>Bird watching</p>
                              <p>Birding</p>
                              <p>Boating</p>
                              <p>Bonsai Tree</p>
                              <p>Boomerangs</p>
                              <p>Butterfly Watching</p>
                              <p>Camping</p>
                              <p>Canoeing</p>
                              <p>Cave Diving</p>
                              <p>Cloud Watching</p>
                              <p>Contact Juggling</p>
                              <p>Dumpster Diving</p>
                              <p>Falconry</p>
                              <p>Fast cars</p>
                              <p>Fishing</p>
                              <p>Fly Fishing</p>
                              <p>Fly Tying</p>
                              <p>Four Wheeling</p>
                              <p>Garage Saleing</p>
                              <p>Gardening</p>
                              <p>Geocaching</p>
                              <p>Ghost Hunting</p>
                              <p>Gnoming</p>
                              <p>Grip Strength</p>
                              <p>Hiking</p>
                              <p>Hot air ballooning</p>
                              <p>Hula Hooping</p>
                              <p>Hunting</p>
                              <p>Ice Fishing</p>
                              <p>Juggling</p>
                              <p>Jump Roping</p>
                              <p>Kayaking</p>
                              <p>Kites</p>
                              <p>Letterboxing</p>
                              <p>Marksmanship</p>
                              <p>Metal Detecting</p>
                              <p>Mountain Biking</p>
                              <p>Mountain Climbing</p>
                              <p>Owning An Antique Car</p>
                              <p>Paintball</p>
                              <p>Planking</p>
                              <p>Pyrotechnics</p>
                              <p>Racing Pigeons</p>
                              <p>Rafting</p>
                              <p>Rock Balancing</p>
                              <p>Rock Climbing</p>
                              <p>Rockets</p>
                              <p>Sailing</p>
                              <p>Sand Castles</p>
                              <p>Self Defense</p>
                              <p>Shark Diving</p>
                              <p>Shark Fishing</p>
                              <p>Skeet Shooting</p>
                              <p>Skiing</p>
                              <p>Slack Lining</p>
                              <p>Slingshots</p>
                              <p>Snorkeling</p>
                              <p>Snow Skiing</p>
                              <p>Storm Chasing</p>
                              <p>Surf Fishing</p>
                              <p>Survival</p>
                              <p>Swimming</p>
                              <p>Train Spotting</p>
                              <p>Traveling</p>
                              <p>Treasure Hunting</p>
                              <p>Urban Exploration</p>
                              <p>Walking</p>
                              <p>Watching sporting events</p>
                              <p>Water Ski</p>
                              <p>Working on cars</p>
                              <p>World Record Breaking</p>
                              <p>Ziplining</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead13">
                          <div class="title interest-category-check" attr-data="Performing">Performing Arts</div>
                          <a href="#" class="btn-header-link collapsed collapse-Performing {{ in_array('Performing', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category13" aria-expanded="true" aria-controls="category13"></a>
                      </div>

                      <div id="category13" class="collapse collapse-Performing {{ in_array('Performing', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead13" data-parent="#category">
                          <div class="card-body">
                              <p>Acting</p>
                              <p>Fire Poi</p>
                              <p>Glowsticking</p>
                              <p>Going to movies</p>
                              <p>Illusion</p>
                              <p>Impersonations</p>
                              <p>Magic</p>
                              <p>Puppetry</p>
                              <p>Renaissance Faire</p>
                              <p>Roleplaying</p>
                              <p>Storytelling</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead14">
                          <div class="title interest-category-check" attr-data="Pets">Pets</div>
                          <a href="#" class="btn-header-link collapsed collapse-Pets {{ in_array('Pets', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category14" aria-expanded="true" aria-controls="category14"></a>
                      </div>

                      <div id="category14" class="collapse collapse-Pets {{ in_array('Pets', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead14" data-parent="#category">
                          <div class="card-body">
                              <p>Animals/pets/dogs</p>
                              <p>Ant Farm</p>
                              <p>Aquarium (Freshwater & Saltwater)</p>
                              <p>Freshwater Aquariums</p>
                              <p>Herping</p>
                              <p>Rescuing Abused Or Abandoned Animals</p>
                              <p>Saltwater Aquariums</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead15">
                          <div class="title interest-category-check" attr-data="Philantropy">Philantropy</div>
                          <a href="#" class="btn-header-link collapsed collapse-Philantropy {{ in_array('Philantropy', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category15" aria-expanded="true" aria-controls="category15"></a>
                      </div>

                      <div id="category15" class="collapse collapse-Philantropy {{ in_array('Philantropy', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead15" data-parent="#category">
                          <div class="card-body">
                              <p>Becoming A Child Advocate</p>
                              <p>Bringing Food To The Disabled</p>
                              <p>Building A House For Habitat For Humanity</p>
                              <p>Reading To The Elderly</p>
                              <p>Rocking AIDS Babies</p>
                              <p>Tutoring Children</p>
                              <p>Volunteer</p>
                              <p>Working In A Food Pantry</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead18">
                          <div class="title interest-category-check" attr-data="Hobbies">RC Hobbies</div>
                          <a href="#" class="btn-header-link collapsed collapse-Hobbies {{ in_array('Hobbies', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category18" aria-expanded="true" aria-controls="category18"></a>
                      </div>

                      <div id="category18" class="collapse collapse-Hobbies {{ in_array('Hobbies', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead18" data-parent="#category">
                          <div class="card-body">
                              <p>Boats</p>
                              <p>Cars</p>
                              <p>Helicopters</p>
                              <p>Planes</p>
                              <p>Slot Car Racing</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead16">
                          <div class="title interest-category-check" attr-data="Sports">Sports</div>
                          <a href="#" class="btn-header-link collapsed collapse-Sports {{ in_array('Sports', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category16" aria-expanded="true" aria-controls="category16"></a>
                      </div>

                      <div id="category16" class="collapse collapse-Sports {{ in_array('Sports', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead16" data-parent="#category">
                          <div class="card-body">
                              <p>Acrobatics</p>
                              <p>Acroyoga</p>
                              <p>Archery</p>
                              <p>Badminton</p>
                              <p>Baseball</p>
                              <p>Basketball</p>
                              <p>Bicycle Polo</p>
                              <p>Body Building</p>
                              <p>Bowling</p>
                              <p>Boxing</p>
                              <p>Cardio Workout</p>
                              <p>Cheerleading</p>
                              <p>Cycling</p>
                              <p>Diving</p>
                              <p>Dodgeball</p>
                              <p>Exercise (aerobics, weights)</p>
                              <p>Fencing</p>
                              <p>Floorball</p>
                              <p>Fly Hunting</p>
                              <p>Football</p>
                              <p>Frisbee Golf</p>
                              <p>Golf</p>
                              <p>Gymnastics</p>
                              <p>Horseback Riding</p>
                              <p>Ice Skating</p>
                              <p>Inline Skating</p>
                              <p>Lacrosse</p>
                              <p>Locksport</p>
                              <p>Martial Arts</p>
                              <p>Pilates</p>
                              <p>Playing team sports</p>
                              <p>Running</p>
                              <p>Soccer</p>
                              <p>Squash</p>
                              <p>Swimming</p>
                              <p>Tai Chi</p>
                              <p>Tennis</p>
                              <p>Triathlon</p>
                              <p>Ultimate Frisbee</p>
                              <p>Weightlifting</p>
                              <p>Wrestling</p>
                              <p>Yoga</p>
                              <p>Zumba</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                      <div class="card-header" id="categoryhead17">
                          <div class="title interest-category-check" attr-data="Writing">Writing</div>
                          <a href="#" class="btn-header-link collapsed collapse-Writing {{ in_array('Writing', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category17" aria-expanded="true" aria-controls="category17"></a>
                      </div>

                      <div id="category17" class="collapse collapse-Writing {{ in_array('Writing', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead17" data-parent="#category">
                          <div class="card-body">
                              <p>Writing</p>
                              <p>Writing Music</p>
                              <p>Writing Songs</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row justify-content-center align-items-center my-4 btn-section w-100 p-0 m-0">
            <button class="btn btn-primary setting-save-btn">SAVE</button>
        </div>
    </div>
</div>

@endsection

@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let timer = null;

    $('.register-input-section').on('click', function() {
        $('.addresstab').hide();
    })

    function changeCity() {
        $("#real-city").val(document.getElementById("city").value);
        if (document.getElementById("city").value == '') {
            $("#state").attr("disabled", false);
            $('.dropdown-select').show();
            $('#country').addClass('d-none');
        }
    }

    $(document).on('click', '.address', function() {
        const ids = $(this).attr('attr-data').split(',');
        const names = $(this).attr('attr-name').split(', ');
        $("#city").val(names[0]);
        $("#real-city").val(ids[0]);
        $('.addresstab').hide();
    })

    var user_type = 0;
    const register = {
        init: function () {
            this.variables();
            this.addEventListeners();
            this.firstInputFocus();
        },
        variables: function () {
            this.form = $('[data-form="register"]');
            this.submitButton = $('[data-button="submit"]');
            this.firstNameInput = $('#firstName');
            this.firstNameError = $('#first-name-error');
            this.lastNameInput = $('#lastName');
            this.lastNameError = $('#last-name-error');
            this.dateBirth = $('#dateBirth');
            this.companyNameInput = $('#companyName');
            this.companyNameError = $('#company-name-error');
            this.vatNumberInput = $('#vatNumber');
            this.vatNumberError = $('#vat-number-error');
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
            this.scrollToError = '';
        },
        addEventListeners: function () {
            this.firstNameInput.on('keyup', function () {
                this.validateFirstNameInput();
            }.bind(this));
            this.lastNameInput.on('keyup', function () {
                this.validateLastNameInput();
            }.bind(this));
            this.companyNameInput.on('keyup', function () {
                this.validateCompanyNameInput();
            }.bind(this));
            this.vatNumberInput.on('keyup', function () {
                this.validateVatNumberInput();
            }.bind(this));
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
            this.form.on('submit', function (event) {
                if (this.validateFirstNameInput() &&
                    this.validateLastNameInput() &&
                    this.validateCompanyNameInput() &&
                    this.validateMobileNumberInput() &&
                    this.validateEmailInput() &&
                    this.validateStreetNameInput() &&
                    this.validateHouseNumberInput() &&
                    this.validateCityInput() &&
                    this.validatePostalCodeInput()) {
                    $('.button-submit').attr('disabled', true);
                    return true;
                } else {
                    event.preventDefault();
                    this.scrollToElement(this.scrollToError);
                    this.scrollToError.focus();
                }
            }.bind(this));
            $(document).on('keypress', function (e) {
                if ((e.which === 13)) {
                    this.form.submit();
                }
            }.bind(this));
        },
        scrollToElement: function (element) {
            $('body, html').animate({
                scrollTop: element.offset().top - 80
            }, 500);
        },
        firstInputFocus: function () {
            setTimeout(function () {
                this.firstNameInput.focus();
            }.bind(this), 300);
        },
        validateFirstNameInput: function () {
            var validationMessage = '';
            var value = this.firstNameInput.val();

            if ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)) || (/^[\p{L}\d\- ]{2,50}$/u.test(value))) {
                validationMessage = 'Now, that\'s a good name.\n';
                this.firstNameError.addClass('valid');
                this.firstNameError.hide();
            } else if (value === '') {
                validationMessage = 'The name field is required.';
                this.firstNameError.removeClass('valid');
                this.firstNameError.show();
            } else {
                validationMessage = 'The name must contain only letter and be minimum of 2 characters.';
                this.firstNameError.removeClass('valid');
                this.firstNameError.show();
            }

            this.firstNameError.html(validationMessage);
            this.scrollToError = this.firstNameInput;

            return ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)) || (/^[\p{L}\d\- ]{2,50}$/u.test(value)));
        },
        validateLastNameInput: function () {
          var validationMessage = '';
          var value = this.lastNameInput.val();

          if ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)) || (/^[\p{L}\d\- ]{2,50}$/u.test(value))) {
              validationMessage = 'Now, that\'s a good last name.\n';
              this.lastNameError.addClass('valid');
              this.lastNameError.hide();
          } else if (value === '') {
              validationMessage = 'The last name field is required.';
              this.lastNameError.removeClass('valid');
              this.lastNameError.show();
          } else {
              validationMessage = 'The last name must contain only letter and be minimum of 2 characters.';
              this.lastNameError.removeClass('valid');
              this.lastNameError.show();
          }

          this.lastNameError.html(validationMessage);
          this.scrollToError = this.lastNameInput;

          return ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)) || (/^[\p{L}\d\- ]{2,50}$/u.test(value)));
        },
        validateCompanyNameInput: function () {
            var validationMessage = '';
            var value = this.companyNameInput.val();

            if (user_type == 0) {
                return true
            }

            if ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)) || (/^[\p{L}\d\- ]{2,50}$/u.test(value))) {
                validationMessage = 'Now, that\'s a good company name.\n';
                this.companyNameError.addClass('valid');
                this.companyNameError.hide();
            } else if (value === '') {
                validationMessage = 'The company name field is required.';
                this.companyNameError.removeClass('valid');
                this.companyNameError.show();
            } else {
                validationMessage = 'The company name must contain only letter and be minimum of 2 characters.';
                this.companyNameError.removeClass('valid');
                this.companyNameError.show();
            }

            this.companyNameError.html(validationMessage);
            this.scrollToError = this.companyNameInput;

            return ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)) || (/^[\p{L}\d\- ]{2,50}$/u.test(value)));
        },
        validateVatNumberInput: function () {
            var validationMessage = '';
            var value = this.vatNumberInput.val();

            if (user_type == 0) {
                return true
            }

            if ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value))) {
                validationMessage = 'Now, that\'s a good vat number.\n';
                this.vatNumberError.addClass('valid');
                this.vatNumberError.hide();
            } else if (value === '') {
                validationMessage = 'The vat number field is required.';
                this.vatNumberError.removeClass('valid');
                this.vatNumberError.show();
            } else {
                validationMessage = 'The vat number must contain only letter and be minimum of 2 characters.';
                this.vatNumberError.removeClass('valid');
                this.vatNumberError.show();
            }

            this.vatNumberError.html(validationMessage);
            this.scrollToError = this.vatNumberInput;

            return ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)));
        },
        validateMobileNumberInput: function () {
            var validationMessage = '';
            var value = $('.phone-select').val() + ' ' + this.mobileNumberInput.val();
            console.log(value)
            $("#real-mobileNumber").val(value);

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
            var value_from_dropdown = $('.current').text();

            if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value)) || (/^[a-zA-Z\-0-9 ]{3,50}$/.test(value_from_dropdown)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value_from_dropdown))) {
                validationMessage = 'Now, that\'s a good country name.\n';
                this.countryError.addClass('valid');
                this.countryError.hide();
            } else if (value === '' || value_from_dropdown === '') {
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

            if (value !== '') {
                return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value)));
            }
            else {
                return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value_from_dropdown)) || (/^[\p{L}\d\- ]{3,50}$/u.test(value_from_dropdown)));
            }
            
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
                    validationMessage = 'This username is taken';
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
        addLoader: function () {
            this.submitButton.addClass('loader');
        },
        removeLoader: function () {
            this.submitButton.removeClass('loader');
        }
    };

    $(document).ready(function () {
        register.init();

        const currentDate = new Date();
        $('#date').val(`${$('#date').val().split("-")[2]}-${$('#date').val().split("-")[1]}-${$('#date').val().split("-")[0]}`);
        $('#date').combodate({
            minYear: 1900,
            maxYear: currentDate.getFullYear() - 18,
        });
        $('select.day').addClass('webkit_style');
        $('select.month').addClass('webkit_style');
        $('select.year').addClass('webkit_style');

        $('select.day').addClass('editable');
        $('select.month').addClass('editable');
        $('select.year').addClass('editable');
    });

    function onVerify(action, value) {
        return $.ajax({
            url: '{{ route('auth.verify') }}',
            type: 'POST',
            data: {
                key: action,
                value: value
            }
        });
    }

    function copyLink(element, event) {
        event.preventDefault();
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).attr('attr_href')).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Copied to Clipboard');
    }

    var genders = '{{ isset($user->profile->interest_based) ? $user->profile->interest_based : '' }}'
    var selected_gender = genders ? genders.split(',') : [];
    
    function select_gender(evt, value) {
        var tablinks = document.getElementsByClassName("gender_tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        if (selected_gender != value) {
            evt.currentTarget.className += " active";
            selected_gender = value;
        } else {
            selected_gender = '';
        }
    }

    function toggle_gender(element, value) {
        if (element.classList.contains("active")) {
            selected_gender.splice(selected_gender.indexOf(value), 1);
            element.className = element.className.replace(" active", "");
        } else {
            selected_gender.push(value);
            element.className += " active";
        }
    }

    // if (!document.getElementById("female").classList.contains("active") && !document.getElementById("male").classList.contains("active")) {
    //     document.getElementById("female").className += " active";
    // }

    var interested_category = '{{ $user->profile->other_interests }}' ? '{{ $user->profile->other_interests }}'.split(',') : [];

    $('.interest-category-check').on('click', function() {
        var category = $(this).attr('attr-data');
        var className = '.collapse-' + category;
        if (interested_category.indexOf(category) < 0) {
            if (interested_category.length > 4) {
                toastr['error']('You cannot select more than 5 categories.', 'Alert');
                return;
            }
            interested_category.push(category);
            if (!$(className).hasClass('active')) {
                $(className).addClass('active');
            }
        } else {
            interested_category.splice(interested_category.indexOf(category), 1);
            if ($(className).hasClass('active')) {
                $(className).removeClass('active');
            }
        }
    })

    $('.setting-save-btn').on('click', function() { 
        var send_data = {};
        send_data['id'] = '{{$user->profile->id}}';
        // send_data['gender'] = selected_gender;
        if (selected_gender.length < 1) {
            toastr['error']('You should select at least one gender.', 'Alert');
        }
        else {
            send_data['interest_based'] = selected_gender.join(',');
            send_data['other_interests'] = interested_category.join(',');

            $.ajax({
            type: 'PUT',
            url: '{{ route('setting.other.interested') }}',
            data: send_data,
            success: function(data) {
                $('.update-success').removeClass('d-none');
                setTimeout(function() {
                    $('.update-success').addClass('d-none');
                }, 3000);
            },
            error:function(data){
                console.log(data);
            }
            })
        }        
    })

</script>
@endsection