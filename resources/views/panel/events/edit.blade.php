@extends('layouts.app', ['ACTIVE_TITLE' => 'EVENTS', 'ROUTES' => [
  ['ROUTE' => 'events.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
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
    <div class="row justify-content-center m-0 w-100">
      <div class="col-md-6 p-0">
        <div class="text-center create-title app-page-subtitle mb-30px">EDIT AN EVENT</div>
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
          <div class="title event-name editable" contenteditable="true">
              @if (isset($post->title))
                  @php
                      echo $post->title;
                  @endphp
              @else
                  Event Name
              @endif
          </div>
          <div class="content event-address editable" contenteditable="true">
              @if (isset($post->address))
                  @php
                      echo $post->address;
                  @endphp
              @else
                  City, Country
              @endif
          </div>
          <div class="content event-date editable" contenteditable="true">
              @if (isset($post->event_date))
                  @php
                      echo $post->event_date;
                  @endphp
              @else
                  Date
              @endif
          </div>
        </div>
        <input type="file" id="post-featured-image" style="display: none;" accept=".jpg,.jpeg,.png,.heif" onchange="avatar_upload()" />
        <div class="w-100">
          <div class="contentItem-wrp">
            <div class="optional-section">
              <img class="option-icon featured-image-upload plus-post-image {{ $post->featured_image_url ? 'd-none' : '' }}" attr-data="thumbnail" src="{{ asset('images/svg/ImageGreen.svg') }}">
              <span class="option-icon trash-featured-image post-image {{ $post->featured_image_url ? '' : 'd-none' }}" attr-data="thumbnail"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div class="image-container post-image {{ $post->featured_image_url ? '' : 'd-none' }}"></div>
            <img src="{{ asset('uploads/posts/'.$post->featured_image_url.'?'.time()) }}" class="post-image w-100 {{ $post->featured_image_url ? '' : 'd-none' }} blur-img" />
          </div>
        </div>
        <div class="post-content">
          <div class="title event-subject editable" contenteditable="true">
              @if (isset($post->subject))
                  @php
                      echo $post->subject;
                  @endphp
              @else
                  Subject
              @endif
          </div>
          <div class="content event-content editable" contenteditable="true">
              @if (isset($post->description))
                  @php
                      echo $post->description;
                  @endphp
              @else
                  Content
              @endif
          </div>
        </div>
        <div class="like-section">
          <span class="heart-icon"><i class="fa fa-heart" aria-hidden="true"></i></span>
          <span>{{ $post->followers && count(explode(',', $post->followers)) > 0 ? count(explode(',', $post->followers)) : 0 }}</span>
        </div>
      </div>
    </div>

    <div class="row justify-content-center align-items-center mb-30px mt-35px mx-0 w-100">
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
  var isRemoveImage = false;
  var isRemoveImage1 = false;
  var isRemoveImage2 = false;
  var isRemoveImage3 = false;
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
    if (file.size > 10485760) {
      toastr['error']('File too large. File must be less than 10MB.', 'Error');
      return;
    }
    if (target_featured_image == 'thumbnail') {
      isRemoveImage = false;
      $('.post-image').attr('src', URL.createObjectURL(file));
      $('.plus-post-image').addClass('d-none');
      if ($('.post-image').hasClass('d-none')) {
        $('.post-image').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail1') {
      isRemoveImage1 = false;
      $('.post-image1').attr('src', URL.createObjectURL(file));
      $('.plus-post-image1').addClass('d-none');
      if ($('.post-image1').hasClass('d-none')) {
        $('.post-image1').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail2') {
      isRemoveImage2 = false;
      $('.post-image2').attr('src', URL.createObjectURL(file));
      $('.plus-post-image2').addClass('d-none');
      if ($('.post-image2').hasClass('d-none')) {
        $('.post-image2').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail3') {
      isRemoveImage3 = false;
      $('.post-image3').attr('src', URL.createObjectURL(file));
      $('.plus-post-image3').addClass('d-none');
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
      isRemoveImage = true;
      $('.post-image').addClass('d-none');
      if ($('.plus-post-image').hasClass('d-none')) {
        $('.plus-post-image').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail1') {
      file1_data = null;
      isRemoveImage1 = true;
      $('.post-image1').addClass('d-none');
      if ($('.plus-post-image1').hasClass('d-none')) {
        $('.plus-post-image1').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail2') {
      file2_data = null;
      isRemoveImage2 = true;
      $('.post-image2').addClass('d-none');
      if ($('.plus-post-image2').hasClass('d-none')) {
        $('.plus-post-image2').removeClass('d-none')
      }
    } else if (target_featured_image == 'thumbnail3') {
      file3_data = null;
      isRemoveImage3 = true;
      $('.post-image3').addClass('d-none');
      if ($('.plus-post-image3').hasClass('d-none')) {
        $('.plus-post-image3').removeClass('d-none')
      }
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
    form_data.append('id', '{{ $post->id }}')
    form_data.append('file', file_data);
    form_data.append('file1', file1_data);
    form_data.append('file2', file2_data);
    form_data.append('file3', file3_data);
    form_data.append('removeImage', isRemoveImage);
    form_data.append('removeImage1', isRemoveImage1);
    form_data.append('removeImage2', isRemoveImage2);
    form_data.append('removeImage3', isRemoveImage3);
    form_data.append('title', title);
    form_data.append('address', address);
    form_data.append('event_date', event_date);
    form_data.append('subject', subject);
    form_data.append('description', description);
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
              window.location.href = '{{ route('events.index') }}';
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
