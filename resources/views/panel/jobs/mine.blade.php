@extends('layouts.app', ['ACTIVE_TITLE' => 'JOBS', 'ROUTES' => [
  ['ROUTE' => 'jobs.index', 'ACTIVE' => 'offer', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'jobs.individuals', 'ACTIVE' => 'individuals', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'jobs.mine', 'ACTIVE' => 'mine', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'mine'])

@section('title', __('- Jobs'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 p-0 w-100 posts-section">
    <div class="row justify-content-center m-0 pt-3 pb-3 w-100">
      <div class="col-md-6 p-0 text-center create-title">
        MY JOBS
      </div>
    </div>
    <div class="row justify-content-center m-0 pb-3 w-100">
      @if (is_null($jobs) || !count($jobs))
        <div class="col justify-content-center align-items-center no-members">
          <div class="row justify-content-center m-0 w-100">
            <button class="post-button" onclick="window.location.href='{{ route('job.create.index') }}'">
              {{ __('CREATE') }}
            </button>
          </div>
        </div>
      @else
        <div class="col-md-6 p-0">
          <div class="row justify-content-center m-0 w-100">
            <button class="post-button" onclick="window.location.href='{{ route('job.create.index') }}'">
              {{ __('CREATE') }}
            </button>
          </div>
          @foreach ($jobs as $index => $job)
            @php $index++ @endphp
            <div class="w-100 post-item mb-3">
              <div class="text-right p-2 pr-md-0 created-at-label">{{ date_format($job->created_at, "d/m/Y" )}}</div>
              <div class="member-body">
                <div class="member-item">
                  <div class="member-link">
                    <div class="member-avatar-wrp">
                      <div class="member-avatar">
                        @if($job->user->profile->main_avatar_url)
                        <img src="{{ asset('uploads/'.$job->user->username.'/'.$job->user->profile->main_avatar_url.'?'.time()) }}">
                        @else
                        <p class="first_letter">{{ $job->user->getMono() }}</p>
                        @endif
                      </div>
                    </div>
                    <div class="member-name">{{ $job->user->getFullname() }}</div>
                  </div>
                  <div class="notification-section">
                    <a class="option-icon-btn" href="{{ route('profile.index', [ 'userID' => $job->created_by ]) }}">
                      <span class="option-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="title-section">
                <div class="title">
                  @if (isset($job->title))
                      @php
                          echo $job->title;
                      @endphp
                  @endif
                </div>
              </div>
              @foreach ($job->descriptions as $key => $description)
              <div class="description-section {{ $key > 0 ? 'pt-0' : '' }}">
                <div class="row m-0 pb-2 w-100">
                  <div class="col-sm-5 col-md-3 p-0 title">Hours:</div>
                  <div class="col-sm-7 col-md-9 p-0 content">
                    @if (isset($description->hours))
                        @php
                            echo $description->hours;
                        @endphp
                    @endif
                  </div>
                </div>
                @if ($job->type == 1)
                <div class="row m-0 pb-2 w-100">
                  <div class="col-sm-5 col-md-3 p-0 title">Employees:</div>
                  <div class="col-sm-7 col-md-9 p-0 content">
                    @if (isset($description->employees))
                        @php
                            echo $description->employees;
                        @endphp
                    @endif
                  </div>
                </div>
                @endif
                <div class="row m-0 pb-2 w-100">
                  <div class="col-sm-5 col-md-3 p-0 title">Category:</div>
                  <div class="col-sm-7 col-md-9 p-0 content">
                    @if (isset($description->category))
                        @php
                            echo $description->category;
                        @endphp
                    @endif
                  </div>
                </div>
                <div class="row m-0 pb-2 w-100">
                  <div class="col-sm-5 col-md-3 p-0 title">Area:</div>
                  <div class="col-sm-7 col-md-9 p-0 content">
                    @if (isset($description->area))
                        @php
                            echo $description->area;
                        @endphp
                    @endif
                  </div>
                </div>
                <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#post_{{$index}}" aria-expanded="true"></a>
              </div>
              @endforeach
              <div class="post-content collapse" id="post_{{$index}}" >
                <div class="about-us">
                  <div class="title pb-1">
                    {{ $job->type == 1 ? 'About Us' : 'About Me' }}
                  </div>
                  <div class="content">
                    @if (isset($job->about_us))
                        @php
                            echo $job->about_us;
                        @endphp
                    @endif
                  </div>
                </div>
                <div class="qualifications mt-4">
                  <div class="title pb-1">
                    {{ $job->type == 1 ? 'Qualifications' : 'Qualifications' }}
                  </div>
                  <div class="content">
                    @if (isset($job->qualifications))
                        @php
                            echo $job->qualifications;
                        @endphp
                    @endif
                  </div>
                </div>
                <div class="skills mt-4">
                  <div class="title pb-1">
                    {{ $job->type == 1 ? 'Skills' : 'My Skills' }}
                  </div>
                  <div class="content">
                    @if (isset($job->skills))
                        @php
                            echo $job->skills;
                        @endphp
                    @endif
                  </div>
                </div>
                @if ($job->type == 1)
                <div class="offer mt-4">
                  <div class="title pb-1">
                    What we offer
                  </div>
                  <div class="content">
                    @if (isset($job->offer))
                        @php
                            echo $job->offer;
                        @endphp
                    @endif
                  </div>
                </div>
                @endif
                <div class="closing-text mt-4">
                  <div class="content">
                    @if (isset($job->closing_text))
                        @php
                            echo $job->closing_text;
                        @endphp
                    @endif
                  </div>
                </div>
              </div>
              <div class="like-section">
                <span class="heart-icon {{ in_array($authUser->id, explode(',', $job->followers)) ? 'like' : '' }} post{{ $job->id }}" attr-data="{{ $job->id }}"><i class="fa fa-heart" aria-hidden="true"></i></span>
                <span class="likes-count{{ $job->id }}">{{ $job->followers && count(explode(',', $job->followers)) > 0 ? count(explode(',', $job->followers)) : 0 }}</span>
                @if ($job->created_by === $authUser->id)
                  <div class="option-icon-section">
                    <a class="option-icon-btn" href="{{ route('job.edit.index', [ 'id' => $job->id ]) }}">
                      <span class="option-icon"><i class="fa fa-pen" aria-hidden="true"></i></span>
                    </a>
                    <div class="option-icon-btn">
                      <span class="option-icon trash-icon" attr-data="{{ $job->id }}"><i class="fa fa-trash" aria-hidden="true"></i></span>
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
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.trash-icon').on('click', function() {
    var send_data = {};
    send_data['id'] = $(this).attr('attr-data');
    $.ajax({
      type: 'DELETE',
      url: '{{ route('job.delete') }}',
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
        url: '{{ route('job.likes') }}',
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
  $(document).ready(function () {
    $('.create-nav-button').addClass('d-none');
  });
</script>
@endsection