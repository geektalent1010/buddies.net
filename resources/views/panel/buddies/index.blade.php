@extends('layouts.app', ['ACTIVE_TITLE' => 'BUDDIES', 'ROUTES' => [
  ['ROUTE' => 'buddies.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'buddies.individuals', 'ACTIVE' => 'individuals', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'all'])

@section('title', __('- Buddies'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 px-0 w-100 buddies-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="text-center py-3 new-requests">
          NEW INVITES
        </div>
        @if (is_null($requests) || !count($requests))
          <div class="d-flex justify-content-center align-items-center no-members">
            <div class="text-center text-blue">NO</div>                
          </div>
        @else
          <div class="member-body">
          @foreach ($requests as $request)
            <div class="member-item">
                <a class="member-link" href="{{ route('profile.index', [ 'userID' => $request->request_user->id ]) }}">
                    <div class="member-avatar-wrp">
                        <div class="member-avatar">
                          @if($request->request_user->profile->main_avatar_url)
                          <img src="{{ asset('uploads/'.$request->request_user->username.'/'.$request->request_user->profile->main_avatar_url.'?'.time()) }}">
                          @else
                          <p class="first_letter">{{ $request->request_user->getMono() }}</p>
                          @endif
                        </div>
                    </div>
                    <div class="member-name">{{ $request->request_user->getFullname() }}</div>
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