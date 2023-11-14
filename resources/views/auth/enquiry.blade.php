@extends('layouts.landing')

@section('title', __('- Enquiry'))

@section('PAGE_LEVEL_STYLES')
<style type="text/css">
    .info-title {
        margin-bottom: 12px;
        padding-left: 28px;
    }
    .input-fields-section {
      max-width: 330px;
    }
    .important-note {
      font-weight: 500 !important;
    }
    .important-desc {
      font-size: 11px !important;
    }
</style>
@endsection

@section('PAGE_CONTENT')
<div class="main-bg-login d-flex justify-content-center align-items-center">
  <div class="row justify-content-center">
    <div class="enquiry-send-form">
      <div class="login-page">
        <div class="login-title text-center mb-2">
          <p>ALMOST...</p>
          <span class="join-desc">We will open up soon for our final test round<br />including 500 alpha testers.</span>
        </div>
        <div class="login-title text-center mb-5">
          <span class="join-desc">Leave your name, country and email address<br />te be part of our amazing test group.</span>
        </div>
      </div>
      <div>
        <form id="enquiryform">
          <div class="row justify-content-center">
            <div class="row mx-0 input-fields-section">
              <div class="col-12">
                <div class="login-page">
                  <div class="login-title info-title">
                    <span>PLEASE FILL OUT ALL FIELDS</span>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="login-page">
                  <div class="form-group">
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>

                    @error('first_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="login-page">
                  <div class="form-group">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>

                    @error('last_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="login-page">
                  <div class="form-group">
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Country" required>

                    @error('country')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="login-page">
                  <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="login-page">
                  <div class="login-title text-center mt-5 mb-3">
                    <span class="join-desc important-note">IMPORTANT NOTE</span>
                  </div>
                  <div class="login-title text-center mb-1">
                    <span class="join-desc important-desc">
                      We know that your opinion matters.<br />
                      As Buddies, we have to follow to the new EU regulations.<br />
                      To keep everyone happy and to avoid any future penalties,<br />
                      we have to share some new guidelines with you.</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mx-0 my-5">
            <div class="col-12">
              <div class="login-page">
                <div class="form-group info-title">
                  <label class="checkbox-container">
                    <input type="checkbox" name="real-person" required />
                    <span class="checkbox-circle"></span>
                    <span class="checkbox-name">I AM A REAL PERSON AND THE DATA I HAVE FILLED OUT IS CORRECT</span>
                  </label>
                </div>
                <div class="form-group info-title">
                  <label class="checkbox-container">
                    <input type="checkbox" name="agree-rule" required />
                    <span class="checkbox-circle"></span>
                    <span class="checkbox-name">I AGREE ON THE COMMUNITY GUIDELINES AND I WILL FOLLOW THE RULES</span>
                  </label>
                </div>
                <div class="form-group info-title">
                  <label class="checkbox-container">
                    <input type="checkbox" name="built-by-friends" required />
                    <span class="checkbox-circle"></span>
                    <span class="checkbox-name">I UNDERSTAND THAT THIS COMMUNITY IS BUILT BY FRIENDS FOR FRIENDS</span>
                  </label>
                </div>
                <div class="form-group info-title">
                  <label class="checkbox-container">
                    <input type="checkbox" name="not-post-any-discriminating" required />
                    <span class="checkbox-circle"></span>
                    <span class="checkbox-name">I WILL NOT POST ANY DISCRIMINATING VIEWS IN OPEN CHANNELS</span>
                  </label>
                </div>
                <div class="form-group info-title">
                  <label class="checkbox-container">
                    <input type="checkbox" name="not-post-any-political" required />
                    <span class="checkbox-circle"></span>
                    <span class="checkbox-name">I WILL NOT POST ANY POLITICAL VIEWS IN OPEN CHANNELS</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mb-5">
            <div class="login-page">
              <div class="form-group row justify-content-center">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary login-button send-button">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="login-page enquiry-success-form d-none">
      <img class="w-100" src="{{ asset('images/svg/ThankYou.svg') }}" alt="ThankYou svg">
      <div class="enquiry-desc text-center">
        <p class="mb-1">YOUR ENQUIRY</p>
        <p>IS BEING PROCESSED</p>
        <span class="desktop">A member of our team will be in touch shortly</span>
        <span class="mobile">A member of our team<br>will be in touch shortly</span>
      </div>
    </div>
  </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function() {
    $("#enquiryform").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '{{ route('enquiry.send') }}',
        data: $("#enquiryform").serialize(),
        success:function(data){
          if (data.status) {
            if (!$('.enquiry-send-form').hasClass('d-none')) {
                $('.enquiry-send-form').addClass('d-none');
            }
            $('.enquiry-success-form').removeClass('d-none');
          } else {
            toastr['error'](data.message, 'Error');
          }
        },
        error:function(data){
          console.log(data);
        }
      });
    });

  });
  </script>
@endsection