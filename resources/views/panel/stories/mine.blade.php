@extends('layouts.app', ['ACTIVE_TITLE' => 'STORIES', 'ROUTES' => [
  ['ROUTE' => 'stories.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'stories.buddies', 'ACTIVE' => 'buddies', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'stories.mine', 'ACTIVE' => 'mine', 'ACTIVE_ROUTE' => $authUser->isIndividual() || $authUser->isAdmin()]
], 'ACTIVE_PAGE' => 'mine'])

@section('title', __('- Stories'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg">
  <div class="m-0 p-0 w-100 posts-section">
    <div class="app-page-subtitle w-100 mb-30px">
        MY STORIES
    </div>
    <div class="row justify-content-center m-0 pb-3 w-100">
      @if (is_null($stories) || !count($stories))
        <div class="col justify-content-center align-items-center no-members">
          <div class="row justify-content-center m-0 w-100">
            <button class="post-button" onclick="window.location.href='{{ route('story.create.index') }}'">
              {{ __('CREATE') }}
            </button>
          </div>
        </div>
      @else
        <div class="col-md-6 p-0">
          <div class="row justify-content-center m-0 w-100 mb-35px">
            <button class="post-button" onclick="window.location.href='{{ route('story.create.index') }}'">
              {{ __('CREATE') }}
            </button>
          </div>
          @include('_sections.lists.stories')
        </div>
      @endif
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

  $('.trash-icon').on('click', function() {
    var send_data = {};
    send_data['id'] = $(this).attr('attr-data');
    $.ajax({
      type: 'DELETE',
      url: '{{ route('post.delete') }}',
      data: send_data,
      success: function(data) {
        $('.update-success').removeClass('d-none');
        setTimeout(function() {
            $('.update-success').addClass('d-none');
            window.location.reload();
        }, 3000);
      },
      error: function(data){
        console.log(data);
      }
    })
  })

  $('.heart-icon').click(function() {
      var send_data = {}; var post_id = 0;
      send_data['id'] = post_id = $(this).attr('attr-data');
      $.ajax({
        type: 'PUT',
        url: '{{ route('post.likes') }}',
        data: send_data,
        success: function(data) {
          if (data.like) {
            $('.post' + post_id).addClass('like');
          } else {
            $('.post' + post_id).removeClass('like');
          }
          $('.likes-count' + post_id).html(data.followers);
        }
      })
  });
</script>
@endsection
