@extends('layouts.app', ['ACTIVE_TITLE' => 'GROUPS', 'ACTIVE_GROUP_ROUTES' => true, 'ACTIVE_PAGE' => 'friends'])

@section('title', __('- Groups'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 groups-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="text-center my-4 top-title font-dinpro-18">NEW INVITES</div>
        @if (is_null($invites) || !count($invites))
          <div class="text-center col no-members text-blue font-dinpro-18 mt-42px mb-42px">
            [ NO NEW INVITES FOUND ]
          </div>
        @else
        <div class="member-body">
          @foreach ($invites as $invite)
            <div class="member-item">
                <div class="member-link">
                    <div class="member-avatar-wrp">
                        <div class="member-avatar">
                          @if($invite->invite_member->group->logo)
                          <img src="{{ asset('uploads/groups/'.$invite->invite_member->group->logo.'?'.time()) }}">
                          @else
                          <p class="first_letter">{{ substr($invite->invite_member->group->name, 0, 1) }}</p>
                          @endif
                        </div>
                    </div>
                    <div class="member-name">{{ $invite->invite_member->group->name }}</div>
                </div>
                <div class="option-icons-section">
                    <div class="option-icon-btn accept-invite" attr-data="{{ $invite->id }}">
                      <span class="option-icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="description-input-section">
              <input id="groupDescription" type="text" class="form-control desc-body" name="description" value="{{ $invite->invite_member->group->description }}" readonly>
            </div>
          @endforeach
        </div>
        @endif
        <div class="text-center py-3 top-title font-dinpro-18">GROUPS FROM FRIENDS</div>
        @if (is_null($members) || !count($members))
          <div class="text-center col no-members mt-5 font-dinpro-18 mt-42px">
              [ NO GROUPS FOUND ]
          </div>
        @else
          <div class="member-body flat-scroll">
              @foreach ($members as $member)
                  <div class="member-item" attr-fullname="{{ $member->group->name }}">
                      <div class="member-link">
                          <div class="member-avatar-wrp">
                              <div class="member-avatar">
                                @if($member->group->logo)
                                <img src="{{ asset('uploads/groups/'.$member->group->logo.'?'.time()) }}">
                                @else
                                <p class="first_letter">{{ substr($member->group->name, 0, 1) }}</p>
                                @endif
                              </div>
                          </div>
                          <div class="member-name">{{ $member->group->name }}</div>
                      </div>
                      <div class="option-icons-section">
                          <a class="option-icon-btn" href="{{ route('group.chat.index', [ 'id' => $member->group->id ]) }}">
                            <span class="option-icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
                          </a>
                          <div class="option-icon-btn delete-group-chat" attr-data="{{ $member->group->id }}" attr-userId="{{ $authUser->id }}">
                              <span class="option-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                          </div>
                      </div>
                  </div>
                  <div class="description-input-section">
                    <input id="groupDescription" type="text" class="form-control desc-body" name="description" value="{{ $member->group->description }}" readonly>
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