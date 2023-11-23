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
    <div class="row justify-content-center m-0 w-100">
      <div class="col-md-6 p-0">
        <div class="app-page-subtitle">EDIT A JOB</div>
        <div class="member-body mt-30px">
          <div class="member-item">
            <div class="member-link">
              <div class="member-avatar-wrp">
                <div class="member-avatar">
                  @if($user->profile->main_avatar_url)
                  <img src="{{ asset('uploads/'.$user->username.'/'.$user->profile->main_avatar_url.'?'.time()) }}">
                  @else
                  <p class="first_letter">{{ $user->getMono() }}</p>
                  @endif
                </div>
              </div>
              <div class="member-name">{{ $user->getFullname() }}</div>
            </div>
          </div>
        </div>
        <div class="title-section">
          <div class="title job-title" contenteditable="true">
            @if (isset($job->title))
                @php
                    echo $job->title;
                @endphp
            @endif
          </div>
        </div>
        @foreach ($job->descriptions as $key => $description)
        <div class="description-section">
          <div class="row m-0 pb-2 w-100">
            <div class="col-sm-5 col-md-3 p-0 title">Hours:</div>
            <div class="col-sm-7 col-md-9 p-0 content description-hours" contenteditable="true">
              @if (isset($description->hours))
                  @php
                      echo $description->hours;
                  @endphp
              @endif
            </div>
          </div>
          <div class="row m-0 pb-2 w-100 {{ $job->type == 1 ? '' : 'd-none' }}">
            <div class="col-sm-5 col-md-3 p-0 title">Employees:</div>
            <div class="col-sm-7 col-md-9 p-0 content description-employees" contenteditable="true">
              @if (isset($description->employees))
                  @php
                      echo $description->employees;
                  @endphp
              @endif
            </div>
          </div>
          <div class="row m-0 pb-2 w-100">
            <div class="col-sm-5 col-md-3 p-0 title">Category:</div>
            <div class="col-sm-7 col-md-9 p-0 content description-category" contenteditable="true">
              @if (isset($description->category))
                  @php
                      echo $description->category;
                  @endphp
              @endif
            </div>
          </div>
          <div class="row m-0 pb-2 w-100">
            <div class="col-sm-5 col-md-3 p-0 title">Area:</div>
            <div class="col-sm-7 col-md-9 p-0 content description-area" contenteditable="true">
              @if (isset($description->area))
                  @php
                      echo $description->area;
                  @endphp
              @endif
            </div>
          </div>
          <a href="#" class="btn-header-link collapsed" data-toggle="collapse" data-target="#post-content" aria-expanded="true"></a>
        </div>
        @endforeach
        <div class="post-content collapse" id="post-content">
          <div class="about-us">
            <div class="title pb-1">
              {{ $job->type == 1 ? 'About Us' : 'About Me' }}
            </div>
            <div class="content job-about" contenteditable="true">
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
            <div class="content job-qualifications" contenteditable="true">
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
            <div class="content job-skills" contenteditable="true">
              @if (isset($job->skills))
                  @php
                      echo $job->skills;
                  @endphp
              @endif
            </div>
          </div>
          <div class="offer mt-4 {{ $job->type === 1 ? '' : 'd-none' }}">
            <div class="title pb-1">
              What we offer
            </div>
            <div class="content job-offer" contenteditable="true">
              @if (isset($job->offer))
                  @php
                      echo $job->offer;
                  @endphp
              @endif
            </div>
          </div>
          <div class="closing-text mt-4">
            <div class="content job-closing-text" contenteditable="true">
              @if (isset($job->closing_text))
                  @php
                      echo $job->closing_text;
                  @endphp
              @endif
            </div>
          </div>
        </div>
        <div class="like-section">
          <span class="heart-icon"><i class="fa fa-heart" aria-hidden="true"></i></span>
          <span>{{ $job->followers && count(explode(',', $job->followers)) > 0 ? count(explode(',', $job->followers)) : 0 }}</span>
        </div>
      </div>
    </div>
    
    <div class="row justify-content-center align-items-center pb-5 mx-0 w-100 mt-35px">
      <button class="btn btn-primary post-button">
        {{ __('Update') }}
      </button>
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

  var job_title = $('.job-title').html();
  var description_hours = $('.description-hours').html();
  var description_employees = $('.description-employees').html();
  var description_category = $('.description-category').html();
  var description_area = $('.description-area').html();
  var job_about = $('.job-about').html();
  var job_qualifications = $('.job-qualifications').html();
  var job_skills = $('.job-skills').html();
  var job_offer = $('.job-offer').html();
  var job_closing_text = $('.job-closing-text').html();

  $('.job-title').blur(function() {
    if (job_title != $(this).html()) {
      job_title = $(this).html();
    }
  });

  $('.description-hours').blur(function() {
    if (description_hours != $(this).html()) {
      description_hours = $(this).html();
    }
  });

  $('.description-employees').blur(function() {
    if (description_employees != $(this).html()) {
      description_employees = $(this).html();
    }
  });

  $('.description-category').blur(function() {
    if (description_category != $(this).html()) {
      description_category = $(this).html();
    }
  });

  $('.description-area').blur(function() {
    if (description_area != $(this).html()) {
      description_area = $(this).html();
    }
  });

  $('.job-about').blur(function() {
    if (job_about != $(this).html()) {
      job_about = $(this).html();
    }
  });

  $('.job-qualifications').blur(function() {
    if (job_qualifications != $(this).html()) {
      job_qualifications = $(this).html();
    }
  });

  $('.job-skills').blur(function() {
    if (job_skills != $(this).html()) {
      job_skills = $(this).html();
    }
  });

  $('.job-offer').blur(function() {
    if (job_offer != $(this).html()) {
      job_offer = $(this).html();
    }
  });

  $('.job-closing-text').blur(function() {
    if (job_closing_text != $(this).html()) {
      job_closing_text = $(this).html();
    }
  });

  $('.post-button').on('click', function() {
    var form_data = new FormData();
    form_data.append('id', '{{ $job->id}}')
    var send_data = {};
    send_data['id'] = '{{ $job->id}}';
    send_data['title'] = job_title;
    send_data['about_us'] = job_about;
    send_data['qualifications'] = job_qualifications;
    send_data['skills'] = job_skills;
    send_data['offer'] = job_offer;
    send_data['closing_text'] = job_closing_text;

    send_data['hours'] = description_hours;
    send_data['employees'] = description_employees;
    send_data['category'] = description_category;
    send_data['area'] = description_area;
    $.ajax({
      type: 'POST',
      url: '{{ route('job.update') }}',
      data: send_data,
      success:function(data){
        if (data.error) {
          toastr['error'](data.error, 'Error');
        } else {
          $('.update-success').removeClass('d-none');
          setTimeout(function() {
              $('.update-success').addClass('d-none');
              window.location.href = '{{ route('jobs.index') }}';
          }, 3000);
        }
      },
      error:function(data){
        console.log(data);
      }
    })
  })

</script>
@endsection