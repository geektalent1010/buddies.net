@extends('layouts.app', ['ACTIVE_TITLE' => 'GROUPS', 'ACTIVE_GROUP_ROUTES' => true, 'ACTIVE_PAGE' => 'own'])

@section('title', __('- Groups'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
    <script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>
@endsection


@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 px-0 w-100 groups-section">
    <div class="row justify-content-center m-0 w-100">
      <div class="col-md-6 p-0 text-center top-title">
        <div class="text-center app-page-subtitle top-title mb-30px">
          MY GROUPS
        </div>
        <div class="row justify-content-center align-items-center save-btn-section w-100 p-0 m-0">
          <a class="btn btn-primary create-btn d-flex justify-content-center align-items-center" href="{{ route('group.create.index') }}">CREATE</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center m-0 mb-35px w-100">
      @if (is_null($groups) || !count($groups))
        <div class="col app-page-subtitle no-members mb-30px">
          [ NO GROUPS FOUND ]
        </div>
      @else
        <div class="col-md-6 p-0 mt-35px">
          <div class="search-input-section">
            <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Search Group">
            <div class="search-icon-section">
              <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
          </div>
          @include('_sections.lists.groups')
        </div>
      @endif
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

  // $('.leave-group').on('click', function() {
  //   var send_data = {};
  //   send_data['groupId'] =  $(this).attr('attr-groupId');
  //   send_data['userId'] = $(this).attr('attr-userId');
  //   $.ajax({
  //     type: 'POST',
  //     url: '{{ route('group.member.ban') }}',
  //     data : send_data,
  //     success:function(data){
  //       if (data.status) {
  //         $('.update-success').removeClass('d-none');
  //         setTimeout(function() {
  //             $('.update-success').addClass('d-none');
  //             window.location.reload();
  //         }, 3000);
  //       } else {
  //         toastr['error'](data.message, 'Error');
  //       }
  //     },
  //     error:function(data){
  //       console.log(data);
  //     }
  //   });
  // })

  $('.delete-group').on('click', function() {
    var send_data = {};
    send_data['id'] = $(this).attr('attr-data');
    $.ajax({
      type: 'DELETE',
      url: '{{ route('group.delete') }}',
      data: send_data,
      success: function(data) {
        toastr['success'](data.success, 'Success');
        setTimeout(function() {
          window.location.reload();
        }, 1000);
      },
      error: function(data){
        console.log(data);
      }
    })
  })

</script>
@endsection
