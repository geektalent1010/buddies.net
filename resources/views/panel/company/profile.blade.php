@extends('layouts.app', ['ACTIVE_TITLE' => 'PROFILE', 'ROUTES' => [
  ['ROUTE' => 'profile.index', 'ACTIVE' => 'profile', 'ACTIVE_ROUTE' => $is_me],
  ['ROUTE' => 'profile.setting.index', 'ACTIVE' => 'setting', 'ACTIVE_ROUTE' => $is_me]
], 'ACTIVE_PAGE' => 'profile'])

@section('title', __('- Company'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

@php
    $main_interests = explode(",", $user->profile->main_interests);
    $categories = array(
        'Automotive' => 'Automotive',
        'Business_Support' => 'Business Support',
        'Computers_Electronics' => 'Computers & Electronics',
        'Construction_Contractors' => 'Construction & Contractors',
        'Education' => 'Education',
        'Entertainment' => 'Entertainment',
        'Food_Dining' => 'Food & Dining',
        'Health_Medicine' => 'Health & Medicine',
        'Home_Garden' => 'Home & Garden',
        'Legal_Financial' => 'Legal & Financial',
        'Manufacturing_Wholesale_Distribution' => 'Manufacturing, Wholesale, Distribution',
        'Merchants_Retail' => 'Merchants, Retail',
        'Miscellaneous' => 'Miscellaneous',
        'Personal_Care_Services' => 'Personal Care & Services',
        'Real_Estate' => 'Real Estate',
        'Travel_Transportation' => 'Travel & Transportation'
    );
@endphp
<div class="main-bg">
    <div class="row m-0 mx-auto p-0 profile-section">
        <div class="row justify-content-center m-0 p-0 w-100">
            <div class="col-md-6 p-0">
                <div class="row p-0 m-0 block">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 contentItem avatar">
                        @if (isset($user->profile->main_avatar_url))
                            <a class="contentItem-wrp face" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->main_avatar_url.'?'.time()) }}">
                                <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->main_avatar_url.'?'.time()) }}">
                            </a>
                        @else
                            <div class="contentItem-wrp face">
                                <div class="thumbnail-card main_avatar_card_bg profile-avatar" attr-data="main_avatar">
                                    <p class="first_letter">{{ $user->getMono() }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-9 contentItem profile-person-section">
                        <div class="person-info-section h-100">
                            <div class="profile-card d-flex align-items-center h-100 flat-scroll">
                                <div class="profile-content pl-3">
                                    <p class="profile-card-title">{{ $user->profile->company_name ?? 'Company Name' }}</p>
                                    <p class="profile-card-context">
                                        @if (count($main_interests) > 0)
                                            @foreach ($main_interests as $tag)
                                                {{ isset($categories[$tag]) ? $categories[$tag] : '' }}
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 contentItem">
                    @if (isset($user->profile->banner_img_url))
                        <a class="contentItem-wrp main-avatar" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->banner_img_url.'?'.time()) }}">
                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->banner_img_url.'?'.time()) }}">
                        </a>
                    @else
                        <div class="contentItem-wrp main-avatar">
                            <div class="thumbnail-card main_avatar_card_bg" attr-data="main_avatar">

                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-sm-12 contentItem">
                    <div class="story-content-wrp">
                        <div class="my-story-card flat-scroll">
                            <p class="story-card-title">About Us</p>
                            @if (isset($user->profile->story_content))
                            <div class="story-card-context">
                                @php
                                    echo $user->profile->story_content;
                                @endphp
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 p-0">
                    <div class="row justify-content-center m-0 p-0 w-100">
                        <div class="company-info contentItem">
                            <div class="profile-card company-address-card profile-card-bg h-100 flat-scroll">
                                <p class="profile-card-title">Address</p>
                                <p class="profile-card-context">{{ $user->profile->street }} {{ $user->profile->house_number }}</p>
                                <p class="profile-card-context">{{ $user->profile->postal_code }}</p>
                                <p class="profile-card-context">{{ empty($city) ? isset($user->profile->city) ? $user->profile->city : 'City' : $city }}</p>
                                <p class="profile-card-context">{{ empty($country) ? isset($user->profile->country) ? $user->profile->country : 'Country' : $country }}</p>
                            </div>
                        </div>
                        <div class="contact-info contentItem">
                            <div class="profile-card company-profile-card profile-card-bg h-100 d-flex flex-column flat-scroll">
                                <p class="profile-card-title">Contact</p>
                                <div class="d-flex align-items-center profile-card-context">
                                    <span class="contact-info-icon mr-2"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <span class="profile-card-context mb-0">{{ $user->profile->phone }}</span>
                                </div>
                                <div class="d-flex align-items-center profile-card-context">
                                    <span class="contact-info-icon mr-2"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <span class="profile-card-context mb-0">{{ $user->email }}</span>
                                </div>
                                <div class="d-flex align-items-center profile-card-context">
                                    <span class="contact-info-icon mr-2 arrow"><i class="fa fa-mouse-pointer" aria-hidden="true"></i></span>
                                    <span class="profile-card-context mb-0">{{ $user->profile->site_url }}</span>
                                </div>
                            </div>
                        </div>
                        @if (!$is_me)
                        <div class="row p-0 w-100 like-section-container">
                          <div class="col-6 like-section">
                              <span class="heart-icon {{ in_array($authUser->id, explode(',', $user->profile->followers)) ? 'like' : '' }} company{{ $user->profile->id }}"  attr-data="{{ $user->profile->id }}"><i class="fa fa-heart" aria-hidden="true"></i></span>
                              <span class="likes-count{{ $user->profile->id }}">{{ $user->profile->followers && count(explode(',', $user->profile->followers)) > 0 ? count(explode(',', $user->profile->followers)) : 0 }}</span>
                          </div>
                          <div class="col-6 follow-btn-section">
                              <button class="btn btn-primary follow-btn mb-4">{{ in_array($authUser->id, explode(',', $user->profile->followers)) ? 'UNFOLLOW' : 'FOLLOW' }}</button>
                          </div>
                        </div>
                        @endif
                        <div class="col-12 col-sm-12 p-0">
                            <div class="row justify-content-center m-0 p-0 w-100 card-border-wrp">
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->logo_url))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->logo_url.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->logo_url.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url2))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url2.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url2.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url3))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url3.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url3.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url4))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url4.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url4.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url5))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url5.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url5.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url6))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url6.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url6.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url7))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url7.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url7.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-3 col-sm-3 col-md-3 contentItem thumbnail-card-border">
                                    @if (isset($user->profile->other_avatar_url8))
                                        <a class="contentItem-wrp" data-fancybox href="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url8.'?'.time()) }}">
                                            <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->other_avatar_url8.'?'.time()) }}">
                                        </a>
                                    @else
                                        <div class="contentItem-wrp">
                                            <div class="thumbnail-card">

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($is_me)
                    <div class="row justify-content-center align-items-center mt-4 mb-5 btn-section w-100 p-0 m-0">
                        <button class="profile-edit-btn" onclick="window.location.href='{{ route('profile.edit.index') }}'">EDIT</a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        Fancybox.bind('[data-fancybox]', {
          Toolbar: {
            display: [
              "close",
            ],
          },
        });
    });
    $('.follow-btn').click(function() {
      var send_data = {}; var company_id = 0;
      send_data['id'] = company_id = $('.heart-icon').attr('attr-data');
      console.log($('.follow-btn').text());
      $.ajax({
        type: 'PUT',
        url: '{{ route('company.likes') }}',
        data: send_data,
        success: function(data) {
          if (data.like) {
            $('.company' + company_id).addClass('like');
          } else {
            $('.company' + company_id).removeClass('like');
          }
          $('.likes-count' + company_id).html(data.followers);

          if ($('.follow-btn').text() == 'FOLLOW') {
            $('.follow-btn').html('UNFOLLOW');
          }
          else {
            $('.follow-btn').html('FOLLOW');
          }

        }
      })
  });
</script>
@endsection
