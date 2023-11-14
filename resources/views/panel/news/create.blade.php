@extends('layouts.app', ['ACTIVE_TITLE' => 'NEWS', 'ROUTES' => [
  ['ROUTE' => 'news.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'news.mine', 'ACTIVE' => 'mine', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'mine'])

@section('title', __('- News'))

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
        <div class="text-center pb-3 create-title">CREATE A NEWS</div>
        <div class="member-body">
          <div class="member-item">
            <div class="member-link">
              <div class="member-avatar-wrp">
                <div class="member-avatar">
                  <img src="{{ asset('images/logo/LogoMenu.svg') }}" class="logo-buddies"/>
                </div>
              </div>
              <div class="member-name">Buddies Support Team</div>
            </div>
          </div>
        </div>
        <div class="post-top-content">
          <div class="title news-title editable" contenteditable="true">Type Subject</div>
        </div>
        <input type="file" id="post-featured-image" style="display: none;" accept=".jpg,.jpeg,.png" onchange="avatar_upload()" />
        <div class="w-100">
          <div class="contentItem-wrp">
            <div class="optional-section">
              <img class="option-icon featured-image-upload plus-post-image" attr-data="thumbnail" src="{{ asset('images/svg/ImageGreen.svg') }}">
              <span class="option-icon trash-featured-image post-image d-none" attr-data="thumbnail"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div class="thumbnail-card">
            </div>
            <img src="{{ asset('images/avatar/Pic01.png') }}" class="post-image w-100 d-none" />
          </div>
        </div>
        <div class="row justify-content-center m-0 p-0 w-100 gap">
          <div class="col-4 col-sm-4 col-md-4 contentItem">
              <div class="contentItem-wrp">
                  <div class="optional-section">
                      <img class="option-icon featured-image-upload plus-post-image1" attr-data="thumbnail1" src="{{ asset('images/svg/ImageGreen.svg') }}">
                      <span class="option-icon trash-featured-image post-image1 d-none" attr-data="thumbnail1"><i class="fa fa-trash" aria-hidden="true"></i></span>
                  </div>
                  <div class="thumbnail-card1">
                  </div>
                  <img src="{{ asset('images/avatar/Pic01.png') }}" class="post-image1 d-none" />
              </div>
          </div>
          <div class="col-4 col-sm-4 col-md-4 contentItem">
              <div class="contentItem-wrp">
                  <div class="optional-section">
                      <img class="option-icon featured-image-upload plus-post-image2" attr-data="thumbnail2" src="{{ asset('images/svg/ImageGreen.svg') }}">
                      <span class="option-icon trash-featured-image post-image2 d-none" attr-data="thumbnail2"><i class="fa fa-trash" aria-hidden="true"></i></span>
                  </div>
                  <div class="thumbnail-card2">
                  </div>
                  <img src="{{ asset('images/avatar/Pic01.png') }}" class="post-image2 d-none" />
              </div>
          </div>
          <div class="col-4 col-sm-4 col-md-4 contentItem">
              <div class="contentItem-wrp">
                  <div class="optional-section">
                      <img class="option-icon featured-image-upload plus-post-image3" attr-data="thumbnail3" src="{{ asset('images/svg/ImageGreen.svg') }}">
                      <span class="option-icon trash-featured-image post-image3 d-none" attr-data="thumbnail3"><i class="fa fa-trash" aria-hidden="true"></i></span>
                  </div>
                  <div class="thumbnail-card3">
                  </div>
                  <img src="{{ asset('images/avatar/Pic01.png') }}" class="post-image3 d-none" />
              </div>
          </div>
        </div>
        <div class="post-content">
          <div class="title news-subject editable" contenteditable="true">Type Subject</div>
          <div class="content news-content editable" contenteditable="true">
            Content
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

  var target_featured_image = '';
  var file_data = null;
  var file1_data = null;
  var file2_data = null;
  var file3_data = null;
  var title = $('.news-title').html();
  var subject = $('.news-subject').html();
  var description = $('.news-content').html();

  $(".featured-image-upload").click(function() {
    target_featured_image = $(this).attr('attr-data');
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
    if (target_featured_image == 'thumbnail') {
      $('.post-image').attr('src', URL.createObjectURL(file));
      $('.plus-post-image').addClass('d-none');
      $('.thumbnail-card').addClass('image-container');
      if ($('.post-image').hasClass('d-none')) {
        $('.post-image').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail1') {
      $('.post-image1').attr('src', URL.createObjectURL(file));
      $('.plus-post-image1').addClass('d-none');
      $('.thumbnail-card1').addClass('image-container');
      if ($('.post-image1').hasClass('d-none')) {
        $('.post-image1').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail2') {
      $('.post-image2').attr('src', URL.createObjectURL(file));
      $('.plus-post-image2').addClass('d-none');
      $('.thumbnail-card2').addClass('image-container');
      if ($('.post-image2').hasClass('d-none')) {
        $('.post-image2').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail3') {
      $('.post-image3').attr('src', URL.createObjectURL(file));
      $('.plus-post-image3').addClass('d-none');
      $('.thumbnail-card3').addClass('image-container');
      if ($('.post-image3').hasClass('d-none')) {
        $('.post-image3').removeClass('d-none')
      }
    }
    $("input[id='post-featured-image']").val('')
    
    const blobURL = URL.createObjectURL(file);
    const img = new Image();
    img.src = blobURL;
    
    img.onload = function () {
      const MAX_WIDTH = 1080;
      const MAX_HEIGHT = 1080;
      const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
      const canvas = document.createElement("canvas");
      canvas.width = newWidth;
      canvas.height = newHeight;
      const ctx = canvas.getContext("2d");
      ctx.drawImage(img, 0, 0, newWidth, newHeight);
      canvas.toBlob(
        (blob) => {
          // Handle the compressed image.
          if (target_featured_image == 'thumbnail') {
            file_data = blob;
          } else if (target_featured_image == 'thumbnail1') {
            file1_data = blob;
          } else if (target_featured_image == 'thumbnail2') {
            file2_data = blob;
          } else if (target_featured_image == 'thumbnail3') {
            file3_data = blob;
          } else if (target_featured_image == 'thumbnail4') {
            file4_data = blob;
          }
        },
        "image/jpeg",
        quality
      );
    };
  }

  $(".trash-featured-image").click(function() {
    target_featured_image = $(this).attr('attr-data');
    if (target_featured_image == 'thumbnail') {
      file_data = null;
      $('.post-image').addClass('d-none');
      $('.thumbnail-card').removeClass('image-container');
      if ($('.plus-post-image').hasClass('d-none')) {
        $('.plus-post-image').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail1') {
      file1_data = null;
      $('.post-image1').addClass('d-none');
      $('.thumbnail-card1').removeClass('image-container');
      if ($('.plus-post-image1').hasClass('d-none')) {
        $('.plus-post-image1').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail2') {
      file2_data = null;
      $('.post-image2').addClass('d-none');
      $('.thumbnail-card2').removeClass('image-container');
      if ($('.plus-post-image2').hasClass('d-none')) {
        $('.plus-post-image2').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail3') {
      file3_data = null;
      $('.post-image3').addClass('d-none');
      $('.thumbnail-card3').removeClass('image-container');
      if ($('.plus-post-image3').hasClass('d-none')) {
        $('.plus-post-image3').removeClass('d-none')
      }
    }
    $("input[id='post-featured-image']").val('')
  });

  $('.news-title').blur(function() {
    if (title != $(this).html()) {
      title = $(this).html();
    }
  });

  $('.news-subject').blur(function() {
    if (subject != $(this).html()) {
      subject = $(this).html();
    }
  });

  $('.news-content').blur(function() {
    if (description != $(this).html()) {
      description = $(this).html();
    }
  });

  $('.post-button').on('click', function() {
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('file1', file1_data);
    form_data.append('file2', file2_data);
    form_data.append('file3', file3_data);
    form_data.append('title', title);
    form_data.append('subject', subject);
    form_data.append('description', description);
    form_data.append('type', 5);
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
              window.location.href = '{{ route('news.mine') }}';
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