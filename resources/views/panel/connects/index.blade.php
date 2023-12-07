@extends('layouts.app', ['ACTIVE_TITLE' => 'CONNECT', 'ROUTES' => [
  ['ROUTE' => 'connect.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'connect.search.setting', 'ACTIVE' => 'setting', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'all'])

@section('title', __('- Connect'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 px-0 w-100 connect-section">

    <div class="row justify-content-center app-subtitle-main m-0 p-0 w-100">
      <div class="justify-content-center col-md-6 p-0 m-0">
        <div class="search-input-section p-0">
            <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Find new buddies">
            <div class="search-icon-section">
            <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="p-0 below-group" >
          <div class="title-group">
              <div class="app-page-subtitle new-requests font-dinpro-18">
              NEW INVITES
              </div>
              @if (is_null($requests) || !count($requests))
              <div class="app-page-subtitle no-members font-dinpro-18">
                  <div class="text-center">[ NO NEW INVITES FOUND ]</div>
              </div>
              @else
              <div class="member-body mt-30px">
              @foreach ($requests as $request)
                  <div class="member-item">
                      <a class="member-link" href="{{ route('profile.index', [ 'userID' => $request->requestUser->id ]) }}">
                          <div class="member-avatar-wrp">
                              <div class="member-avatar">
                              @if ($request->requestUser->profile->main_avatar_url)
                              <img src="{{ asset('uploads/'.$request->requestUser->username.'/'.$request->requestUser->profile->main_avatar_url.'?'.time()) }}">
                              @else
                              <p class="first_letter">{{ $request->requestUser->getMono() }}</p>
                              @endif
                              </div>
                          </div>
                          <div class="member-name">{{ $request->requestUser->getFullname() }}</div>
                      </a>
                      <div class="option-icons-section">
                          <div class="option-icon-btn" attr-data="{{ $request->id }}">
                          <span class="option-icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                          </div>
                      </div>
                  </div>
                  <div class="publish-content">
                      <div class="content">
                      @if (isset($request->context))
                          @php
                              echo $request->context;
                          @endphp
                      @endif
                      </div>
                  </div>
              @endforeach
              </div>
              @endif
              <div class="app-page-subtitle top-title font-dinpro-18 mb-30px">
              GET CONNECTED
              </div>
          </div>
          @include('_sections.lists.connectUsers')
        </div>
      </div>
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

  $(document).ready(function(){
    $("#searchKey").focus(function() {
        $(".title-group").fadeOut(300);

    });
    $("#searchKey").blur(function() {
        $(".title-group").fadeIn(300);
    });
  });

  $('#connectSearchIcon').click(function () {
  // $('#connectSearchKey').on('keyup', function () {
    if($("#connectSearchKey").val() == '') {
      $('.member-body').hide();
    } else {
      var options = {
          keyword: $("#connectSearchKey").val(),
      };
      $.ajax({
        url: '{{ route("connect.search.filter") }}',
        method: "POST",
        data: options,
        success: function(res) {
          if (res.length) {
            var html = '';
            for(var resIndex = 0; resIndex < res.length; resIndex++) {
              html +=
                '<div class="member-item">' +
                '  <div class="member-link">' +
                '    <div class="member-avatar-wrp">' +
                '      <div class="member-avatar">' +
                '        <img class="svg-avatar" src="{{ asset('images/svg/SmileIcon.svg') }}" alt="member default avatar">' +
                '      </div>' +
                '    </div>' +
                '    <div class="member-name">' + res[resIndex].first_name + ' ' + res[resIndex].last_name + '</div>' +
                '  </div>' +
                '  <div class="option-icons-section">' +
                '    <a class="option-icon-btn" href="javascript:;">' +
                '      <span class="option-icon"><i class="fa fa-search" aria-hidden="true"></i></span>' +
                '    </a>' +
                '  </div>' +
                '</div>';
            }
            $('.member-body').html(html);
            $('.member-body').show();
          } else {
            var html = '<div class="col no-members mt-5">'
              +'No User'
              +'</div>';
            $('.member-body').html(html);
            $('.member-body').show();
          }
        },
        error:function(err){
            toastr['error']('Error');
        }
      })
    }
  });

  $('.send-icon-section').click(function () {
    var userId = $(this).attr('attr-userId');
    if($(".request-message" + userId).val() == '') {
      toastr['error']('Please enter the message', 'Error');
      return;
    } else {
      var send_data = {};
      send_data['user_id'] = userId;
      send_data['message'] = $(".request-message" + userId).val();
      $.ajax({
        url: '{{ route("connect.request.send") }}',
        method: "POST",
        data: send_data,
        success: function(data) {
          if (data.error) {
            toastr['error'](data.error, 'Error');
          } else {
            $('.update-success').removeClass('d-none');
            setTimeout(function() {
                $('.update-success').addClass('d-none');
                window.location.href = '{{ route('connect.index') }}';
            }, 3000);
          }
        },
        error:function(err){
            toastr['error']('Error');
        }
      })
    }
  });

  $('.option-icon-btn').click(function () {
    var send_data = {};
    send_data['request_id'] = $(this).attr('attr-data');
    $.ajax({
      url: '{{ route("buddies.accept") }}',
      method: "POST",
      data: send_data,
      success: function(data) {
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
      error:function(err){
          toastr['error']('Error');
      }
    })
  });
</script>
@endsection
