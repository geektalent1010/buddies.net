@extends('layouts.app', ['ACTIVE_TITLE' => 'DEALS', 'ROUTES' => [
  ['ROUTE' => 'deals.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'deals.buddies', 'ACTIVE' => 'buddies', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'deals.mine', 'ACTIVE' => 'mine', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'mine'])

@section('title', __('- Deals'))

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
        <div class="text-center app-page-subtitle create-title">EDIT A DEAL</div>
        <div class="member-body mt-35px">
          <div class="member-item">
            <div class="member-link">
              <div class="member-avatar-wrp">
                <div class="member-avatar">
                  @if ($deal->user->profile->main_avatar_url)
                  <img src="{{ asset('uploads/'.$deal->user->username.'/'.$deal->user->profile->main_avatar_url.'?'.time()) }}">
                  @else
                  <p class="first_letter">{{ $deal->user->getMono() }}</p>
                  @endif
                </div>
              </div>
              <div class="member-name">{{ $deal->user->getFullname() }}</div>
            </div>
          </div>
        </div>
        <div class="post-top-content">
          <div class="title editable deal-title" contenteditable="true">
              @if (isset($deal->title))
                  @php
                      echo $deal->title;
                  @endphp
              @endif
          </div>
          <div class="content deal-address">
              @if (!empty($deal->address))
                  @php
                      echo $deal->address;
                  @endphp
              @else
                  {{ $user->profile->getCity() }}, {{ $user->profile->getCountry() }}
              @endif
          </div>
        </div>
        <div class="w-100">
          <div class="contentItem-wrp">
            <div class="optional-section">
              <img class="option-icon avatar-upload plus-post-image {{ $deal->featured_image_url ? 'd-none' : '' }}" attr-data="thumbnail1" src="{{ asset('images/svg/ImageGreen.svg') }}">
              <span class="option-icon trash-avatar post-image {{ $deal->featured_image_url ? '' : 'd-none' }}" attr-data="thumbnail1"><i class="fa fa-trash" aria-hidden="true"></i></span>
              <input type="file" id="post-featured-image" style="display: none;" accept=".jpg,.jpeg,.png,.heif" onchange="avatar_upload()" />
            </div>
            <div class="thumbnail-card">
            </div>
            <img src="{{ asset('uploads/posts/'.$deal->featured_image_url.'?'.time()) }}" class="post-image w-100 {{ $deal->featured_image_url ? '' : 'd-none' }} blur-img" />
          </div>
        </div>
        <div class="post-content">
          <div class="title editable deal-subject" contenteditable="true">
              @if (isset($deal->subject))
                  @php
                      echo $deal->subject;
                  @endphp
              @endif
          </div>
          <div class="content editable deal-content" contenteditable="true">
              @if (isset($deal->description))
                  @php
                      echo $deal->description;
                  @endphp
              @endif
          </div>
        </div>
        <div class="like-section">
          <span class="heart-icon"><i class="fa fa-heart" aria-hidden="true"></i></span>
          <span>{{ $deal->followers && count(explode(',', $deal->followers)) > 0 ? count(explode(',', $deal->followers)) : 0 }}</span>
        </div>
      </div>
    </div>

    <div class="row justify-content-center align-items-center pb-5 mx-0 w-100 mt-35px">
      <button class="btn btn-primary post-button">
        {{ __('PUBLISH') }}
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

  var file_data = null;
  var isRemoveImage = false;
  var title = $('.deal-title').html();
  var address = $('.deal-address').html();
  var subject = $('.deal-subject').html();
  var description = $('.deal-content').html();

  $(".avatar-upload").click(function() {
    $("input[id='post-featured-image']").click();
  });

  function avatar_upload() {
    const file = $('#post-featured-image').prop('files')[0];
    if (!file || file == undefined) {
      toastr['error']('You must upload image file', 'Error');
      return;
    }
    if (file.size > 10485760) {
      toastr['error']('File too large. File must be less than 10MB.', 'Error');
      return;
    }
    isRemoveImage = false;
    $('.post-image').attr('src', URL.createObjectURL(file));
    $('.plus-post-image').addClass('d-none');
    $('.thumbnail-card').addClass('image-container');
    if ($('.post-image').hasClass('d-none')) {
      $('.post-image').removeClass('d-none')
    }

    const blobURL = URL.createObjectURL(file);
    const img = new Image();
    img.src = blobURL;

    img.onload = function () {
      const MAX_WIDTH = 1080;
      const MAX_HEIGHT = 675;
      const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
      const canvas = document.createElement("canvas");
      canvas.width = newWidth;
      canvas.height = newHeight;
      const ctx = canvas.getContext("2d");
      ctx.drawImage(img, 0, 0, newWidth, newHeight);
      canvas.toBlob(
        (blob) => {
          // Handle the compressed image.
          file_data = blob;
        },
        "image/jpeg",
        quality
      );
    };
  }

  $(".trash-avatar").click(function() {
    file_data = null;
    isRemoveImage = true;
    $("input[id='post-featured-image']").val('')
    $('.post-image').addClass('d-none');
    $('.thumbnail-card').removeClass('image-container');
    if ($('.plus-post-image').hasClass('d-none')) {
      $('.plus-post-image').removeClass('d-none')
    }
  });

  $('.deal-title').blur(function() {
    if (title != $(this).html()) {
      title = $(this).html();
    }
  });

  $('.deal-address').blur(function() {
    if (address != $(this).html()) {
      address = $(this).html();
    }
  });

  $('.deal-subject').blur(function() {
    if (subject != $(this).html()) {
      subject = $(this).html();
    }
  });

  $('.deal-content').blur(function() {
    if (description != $(this).html()) {
      description = $(this).html();
    }
  });

  $('.post-button').on('click', function() {
    var form_data = new FormData();
    form_data.append('id', '{{ $deal->id }}')
    form_data.append('file', file_data);
    form_data.append('removeImage', isRemoveImage);
    form_data.append('title', title);
    form_data.append('description', description);
    form_data.append('address', address);
    form_data.append('subject', subject);
    $.ajax({
      type: 'POST',
      url: '{{ route('post.update') }}',
      processData: false,
      contentType: false,
      cache: false,
      data : form_data,
      success:function(data){
        if (data.error) {
          toastr['error'](data.error, 'Error');
        } else {
          $('.update-success').removeClass('d-none');
          setTimeout(function() {
              $('.update-success').addClass('d-none');
              window.location.href = '{{ route('deals.mine') }}';
          }, 3000);
        }
      },
      error:function(data){
        console.log(data);
      }
    });
  })

</script>
@endsection
