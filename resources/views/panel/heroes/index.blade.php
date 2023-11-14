@extends('layouts.app', ['ACTIVE_TITLE' => 'HEROES', 'ROUTES' => [
['ROUTE' => 'heroes.index', 'ACTIVE' => 'heroes', 'ACTIVE_ROUTE' => true],
], 'ACTIVE_PAGE' => 'heroes'])

@section('title', __('- heroes'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 heroes-section">
    <div class="row justify-content-center m-0 p-0 w-100">
      <div class="col-md-6 p-0">
        <div class="search-input-section">
          <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Find a Hero">
          <div id="coachesSearchIcon" class="search-icon-section">
            <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>

        @include('_sections.lists.heroes')
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
    $('.trash-icon').click(function () {
      var send_data = {};
      send_data['friend_id'] = $(this).attr('attr-data');
      // $.ajax({

      //   method: "POST",
      //   data: send_data,
      //   success: function(data) {
      //     toastr['success'](data.success, 'Success');
      //     setTimeout(function() {
      //       window.location.reload();
      //     }, 1000);
      //   },
      //   error:function(err){
      //       toastr['error']('Error');
      //   }
      // })
    });
</script>
@endsection