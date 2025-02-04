@extends('layouts.app', ['ACTIVE_TITLE' => 'CHAT', 'ACTIVE_CHAT_ROUTES' => true, 'ACTIVE_PAGE' => 'members', 'CHATTING_ROUTE' => url('') . '/messages/' . auth()->user()->id . '_'])

@section('title', __('- Chat'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
<script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>
@endsection

@section('PAGE_CONTENT')

<div class="main-bg pb-0">
  <div class="row m-0 p-0 w-100 chat-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="text-center app-page-subtitle mb-30px">
          CHAT LIST
        </div>
        <div class="search-input-section">
          <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Search">
          <div class="search-icon-section">
            <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
        <div class="member-body flat-scroll" id="app">
          @if (is_null($channels) || !count($channels))
            <div class="app-page-subtitle mb-30px no-members">
              <div class="text-center">[ NO CHATS FOUND ]</div>
            </div>
          @else
            @foreach ($channels as $channel)
            <member-component :auth-user="{{ auth()->user() }}" :channel-info="{{ $channel }}" :member-info="{{ $channel->otherUser }}" :member-profile="{{ $channel->otherUser->profile }}" :current-channel="@if (!is_null($channelInfo) && $channelInfo->id === $channel->id) true @else false @endif" :online-status="@if (Cache::has('is_online' . $channel->otherUser->id)) true @else false @endif"></member-component>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.disconnect-icon-btn').on('click', function() {
    var send_data = {};
    send_data['channelId'] = $(this).attr('attr-channelId');
    send_data['status'] = 0;
    $.ajax({
      type: 'PUT',
      url: '{{ route('messages.connected.status') }}',
      data: send_data,
      success:function(data){
        if (data.status) {
            setTimeout(function() {
              window.location.href = '{{ route('messages.chat', ['ids' => auth()->user()->id  . '_' ]) }}';
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