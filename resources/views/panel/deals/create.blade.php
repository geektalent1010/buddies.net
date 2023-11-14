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
    <div class="row justify-content-center m-0 py-3 w-100">
      <div class="col-md-6 p-0">
        <div class="text-center pb-3 create-title">CREATE A DEAL</div>
        <div class="member-body">
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
        <div class="post-top-content">
          <div class="title deal-title editable" contenteditable="true">Type Subject</div>
          <div class="content deal-address editable" contenteditable="true">{{ $user->profile->getCity() }}, {{ $user->profile->getCountry() }}</div>
        </div>
        <div class="w-100">
          <div class="contentItem-wrp">
            <div class="optional-section">
              <img class="option-icon avatar-upload plus-post-image" attr-data="thumbnail1" src="{{ asset('images/svg/ImageGreen.svg') }}">
              <span class="option-icon trash-avatar post-image d-none" attr-data="thumbnail1"><i class="fa fa-trash" aria-hidden="true"></i></span>
              <input type="file" id="post-featured-image" style="display: none;" accept=".jpg,.jpeg,.png" onchange="avatar_upload()" />
            </div>
            <div class="thumbnail-card">
            </div>
            <img src="{{ asset('images/avatar/Pic01.png') }}" class="post-image w-100 d-none" />
          </div>
        </div>
        <div class="post-content">
          <div class="title deal-subject editable" contenteditable="true">Type Subject</div>
          <div class="content deal-content editable" contenteditable="true">
            Type text
          </div>
        </div>
        <div class="like-section mb-3">
          <span class="heart-icon"><i class="fa fa-heart" aria-hidden="true"></i></span>
          <span>0</span>
        </div>
      </div>
    </div>
    
    <div class="row justify-content-center align-items-center pb-5 mx-0">
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
    if (file.size > 2097152) {
      toastr['error']('File too large. File must be less than 2MB.', 'Error');
      return;
    }
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
    form_data.append('file', file_data);
    form_data.append('title', title);
    form_data.append('address', address);
    form_data.append('subject', subject);
    form_data.append('description', description);
    form_data.append('type', 4);
    $.ajax({
      type: 'POST',
      url: '{{ route('post.store') }}',
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