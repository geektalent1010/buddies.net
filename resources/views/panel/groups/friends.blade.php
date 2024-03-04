@extends('layouts.app', ['ACTIVE_TITLE' => 'GROUPS', 'ACTIVE_GROUP_ROUTES' => true, 'ACTIVE_PAGE' => 'friends'])

@section('title', __('- Groups'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
    <script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 groups-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0 mb-35px">
        <div class="app-page-subtitle top-title">NEW INVITES</div>
        @if (is_null($invites) || !count($invites))
          <div class="col no-members text-blue app-page-subtitle">
            [ NO NEW INVITES FOUND ]
          </div>
        @else
        <div class="member-body mt-30px">
          @foreach ($invites as $invite)
            <div class="member-item">
                <div class="member-link">
                    <div class="member-avatar-wrp">
                        <div class="member-avatar">
                          @if ($invite->inviteMember->group->logo)
                          <img src="{{ asset('uploads/groups/'.$invite->inviteMember->group->logo.'?'.time()) }}">
                          @else
                          <p class="first_letter">{{ substr($invite->inviteMember->group->name, 0, 1) }}</p>
                          @endif
                        </div>
                    </div>
                    <div class="member-name">{{ $invite->inviteMember->group->name }}</div>
                </div>
                <div class="option-icons-section">
                    <div class="option-icon-btn accept-invite" attr-data="{{ $invite->id }}">
                      <span class="option-icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="description-input-section">
              <input id="groupDescription" type="text" class="form-control desc-body" name="description" value="{{ $invite->inviteMember->group->description }}" readonly>
            </div>
          @endforeach
        </div>
        @endif
        <div class="top-title app-page-subtitle">GROUPS FROM FRIENDS</div>
        @if (is_null($members) || !count($members))
          <div class="col no-members app-page-subtitle">
              [ NO GROUPS FOUND ]
          </div>
        @else
          <div class="member-body flat-scroll mt-30px" id="app">
              @foreach ($members as $member)
                  <group-component :auth-user="{{ json_encode(auth()->user()) }}" :group-info="{{ json_encode($member) }}"></group-component>
                  <div class="description-input-section">
                    <input id="groupDescription" type="text" class="form-control desc-body" name="description" value="{{ $member->description }}" readonly>
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
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.accept-invite').click(function () {
    var send_data = {};
    send_data['request_id'] = $(this).attr('attr-data');
    $.ajax({
      url: '{{ route("group.invite.accept") }}',
      method: "POST",
      data: send_data,
      success: function(data) {
        if (data.status) {
          toastr['success'](data.message, 'Success');
          setTimeout(function() {
            window.location.reload();
          }, 1000);
        } else {
          toastr['error'](data.message, 'Error');
        }
      },
      error:function(err){
        toastr['error']('Error');
      }
    })
  });

  $('.delete-group-chat').on('click', function() {
    var send_data = {};
    send_data['groupId'] = $(this).attr('attr-data');
    send_data['userId'] = $(this).attr('attr-userId');
    $.ajax({
      type: 'POST',
      url: '{{ route('group.member.ban') }}',
      data : send_data,
      success:function(data){
        if (data.status) {
          toastr['success'](data.message, 'Success');
          setTimeout(function() {
            window.location.reload();
          }, 1000);
        } else {
          toastr['error'](data.message, 'Error');
        }
      },
      error:function(data){
        console.log(data);
      }
    });
  })
</script>
@endsection
