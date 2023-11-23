@extends('layouts.app', ['ACTIVE_TITLE' => 'DEALS', 'ROUTES' => [
  ['ROUTE' => 'deals.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'deals.buddies', 'ACTIVE' => 'buddies', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'deals.mine', 'ACTIVE' => 'mine', 'ACTIVE_ROUTE' => $authUser->IsCompany() || $authUser->IsAdmin()]
], 'ACTIVE_PAGE' => 'mine'])

@section('title', __('- Deals'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 posts-section">
    <div class="row justify-content-center m-0 w-100">
      <div class="col-md-6 p-0 app-page-subtitle create-title">
        MY DEALS
      </div>
    </div>
    <div class="row justify-content-center m-0 pb-3 w-100">
      @if (is_null($deals) || !count($deals))
        <div class="col justify-content-center align-items-center no-members">
          <div class="row justify-content-center m-0 w-100 mt-30px">
            <button class="post-button" onclick="window.location.href='{{ route('deal.create.index') }}'">
              {{ __('CREATE') }}
            </button>
          </div>
        </div>
      @else
        <div class="col-md-6 p-0 accordion" id="deals">
          <div class="row justify-content-center m-0 w-100 mt-30px mb-35px">
            <button class="post-button" onclick="window.location.href='{{ route('deal.create.index') }}'">
              {{ __('CREATE') }}
            </button>
          </div>
          @foreach ($deals as $index => $deal)
          <div class="w-100 post-item mb-3">
            <div class="text-right p-2 pr-md-0 created-at-label">{{ date_format($deal->created_at, "d/m/Y" )}}</div>
            <div class="member-body">
              <div class="member-item">
                <div class="member-link">
                  <div class="member-avatar-wrp">
                    <div class="member-avatar">
                      @if($deal->user->profile->main_avatar_url)
                      <img src="{{ asset('uploads/'.$deal->user->username.'/'.$deal->user->profile->main_avatar_url.'?'.time()) }}">
                      @else
                      <p class="first_letter">{{ $deal->user->getMono() }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="member-name">
                    <a class="member-name-wrp" href="{{ route('profile.index', [ 'userID' => $deal->created_by ]) }}">
                      <p>{{ $deal->user->getFullname() }}</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="post-top-content" id="posthead{{ $index + 1 }}">
              <div class="title deal-title">
                @if (isset($deal->title))
                    @php
                        echo $deal->title;
                    @endphp
                @endif
              </div>
              <div class="content deal-address">
                @if (isset($deal->address))
                    @php
                        echo $deal->address;
                    @endphp
                @endif
              </div>
              <div class="optional-section">
                  <a href="#" class="option-icon collapsed" data-toggle="collapse" data-target="#post{{ $index + 1 }}" aria-expanded="true" aria-controls="post{{ $index + 1 }}"></a>
              </div>
            </div>
            <div id="post{{ $index + 1 }}" class="collapse" aria-labelledby="posthead{{ $index + 1 }}" data-parent="#deals">
              @if (isset($deal->featured_image_url))
              <a class="w-100" data-fancybox href="{{ asset('uploads/posts/'.$deal->featured_image_url.'?'.time()) }}">
                <img class="w-100 h-auto" src="{{ asset('uploads/posts/'.$deal->featured_image_url.'?'.time()) }}" alt="featured image">
              </a>
              @endif
              <div class="post-content">
                <div class="title deal-subject">
                  @if (isset($deal->subject))
                      @php
                          echo $deal->subject;
                      @endphp
                  @endif
                </div>
                <div class="content deal-description">
                  @if (isset($deal->description))
                      @php
                          echo $deal->description;
                      @endphp
                  @endif
                </div>
              </div>
            </div>
            <div class="like-section">
              <span class="heart-icon {{ in_array($authUser->id, explode(',', $deal->followers)) ? 'like' : '' }} post{{ $deal->id }}" attr-data="{{ $deal->id }}"><i class="fa fa-heart" aria-hidden="true"></i></span>
              <span class="likes-count{{ $deal->id }}">{{ $deal->followers && count(explode(',', $deal->followers)) > 0 ? count(explode(',', $deal->followers)) : 0 }}</span>
              @if ($deal->created_by === $authUser->id)
                <div class="option-icon-section">
                  <a class="option-icon-btn" href="{{ route('deal.edit.index', [ 'id' => $deal->id ]) }}">
                    <span class="option-icon"><i class="fa fa-pen" aria-hidden="true"></i></span>
                  </a>
                  <div class="option-icon-btn">
                    <span class="option-icon trash-icon" attr-data="{{ $deal->id }}"><i class="fa fa-trash" aria-hidden="true"></i></span>
                  </div>
                </div>
              @endif
            </div>
          </div>
          @endforeach
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