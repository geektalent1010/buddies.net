@extends('layouts.app', ['ACTIVE_TITLE' => 'BUDDIES', 'ROUTES' => [
  ['ROUTE' => 'buddies.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'buddies.individuals', 'ACTIVE' => 'individuals', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'buddies.companies', 'ACTIVE' => 'companies', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'companies'])

@section('title', __('- Buddies'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row flex-column m-0 px-0 w-100 buddies-section">
    @if (is_null($users) || !count($users))
    <div class="col no-members text-center mt-5">
      No Buddies
    </div>
    @else
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="search-input-section">
          <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Search Companies">
          <div class="search-icon-section">
            <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
        @include('_sections.lists.users')
      </div>
    </div>
    @endif
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
  
  $('.trash-icon').click(function () {
    var send_data = {};
    send_data['friend_id'] = $(this).attr('attr-data');
    $.ajax({
      url: '{{ route("buddies.remove") }}',
      method: "POST",
      data: send_data,
      success: function(data) {
        $('.update-success').removeClass('d-none');
        setTimeout(function() {
            $('.update-success').addClass('d-none');
            window.location.reload();
        }, 3000);
      },
      error:function(err){
          toastr['error']('Error');
      }
    })
  });

  $('.comment-icon').on('click', function() {
    var otherUserId = $(this).attr('attr-connectUserId');
    var send_data = {};
    send_data['otherUserId'] = otherUserId;
    $.ajax({
      type: 'POST',
      url: '{{ route('messages.create.chatroom') }}',
      data : send_data,
      success:function(data){
        if (data.status) {
          window.location.href = '{{ url('') }}/messages/{{ auth()->user()->id }}_' + otherUserId;
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