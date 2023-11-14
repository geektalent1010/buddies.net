@extends('layouts.app', ['ACTIVE_TITLE' => 'EVENTS', 'ROUTES' => [
  ['ROUTE' => 'events.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'events.mine', 'ACTIVE' => 'mine', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'mine'])

@section('title', __('- Events'))

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
        <div class="text-center pb-3 create-title">CREATE AN EVENT</div>
        <div class="member-body">
          <div class="member-item">
            <div class="member-link">
              <div class="member-avatar-wrp">
                <div class="member-avatar">
                  <p class="first_letter">B</p>
                </div>
              </div>
              <div class="member-name">Buddies Support Team</div>
            </div>
          </div>
        </div>
        <div class="post-top-content">
          <div class="title event-name editable" contenteditable="true">Event Name</div>
          <div class="content event-address editable" contenteditable="true">City, Country</div>
          <div class="content event-date editable" contenteditable="true">Date</div>
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
            <div class="post-image image-container d-none"></div>
            <img src="{{ asset('images/avatar/Pic01.png') }}" class="post-image w-100 d-none" />
          </div>
        </div>
        <div class="post-content">
          <div class="title event-subject editable" contenteditable="true">Subject</div>
          <div class="content event-content editable" contenteditable="true">Content</div>
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
  var title = $('.event-name').html();
  var address = $('.event-address').html();
  var event_date = $('.event-date').html();
  var subject = $('.event-subject').html();
  var description = $('.event-content').html();

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
      if ($('.post-image').hasClass('d-none')) {
        $('.post-image').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail1') {
      $('.post-image1').attr('src', URL.createObjectURL(file));
      if ($('.post-image1').hasClass('d-none')) {
        $('.post-image1').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail2') {
      $('.post-image2').attr('src', URL.createObjectURL(file));
      if ($('.post-image2').hasClass('d-none')) {
        $('.post-image2').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail3') {
      $('.post-image3').attr('src', URL.createObjectURL(file));
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
      if ($('.plus-post-image').hasClass('d-none')) {
        $('.plus-post-image').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail1') {
      file1_data = null;
      $('.post-image1').addClass('d-none');
    } else if (target_featured_image == 'thumbnail2') {
      file2_data = null;
      $('.post-image2').addClass('d-none');
    } else if (target_featured_image == 'thumbnail3') {
      file3_data = null;
      $('.post-image3').addClass('d-none');
    }
    $("input[id='post-featured-image']").val('')
  });

  $('.event-name').blur(function() {
    if (title != $(this).html()) {
      title = $(this).html();
    }
  });

  $('.event-address').blur(function() {
    if (address != $(this).html()) {
      address = $(this).html();
    }
  });

  $('.event-date').blur(function() {
    if (event_date != $(this).html()) {
      event_date = $(this).html();
    }
  });

  $('.event-subject').blur(function() {
    if (subject != $(this).html()) {
      subject = $(this).html();
    }
  });

  $('.event-content').blur(function() {
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
    form_data.append('address', address);
    form_data.append('event_date', event_date);
    form_data.append('subject', subject);
    form_data.append('description', description);
    form_data.append('type', 6);
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
              window.location.href = '{{ route('events.mine') }}';
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