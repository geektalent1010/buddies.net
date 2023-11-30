@extends('layouts.app', ['ACTIVE_TITLE' => 'GROUPS', 'ACTIVE_GROUP_ROUTES' => true, 'ACTIVE_PAGE' => 'own'])

@section('title', __('- Groups'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

<div class="main-bg d-flex">
  <div class="row m-0 px-0 w-100 groups-section">
    <div class="row justify-content-center m-0 pt-4 pb-3 w-100">
      <div class="col-md-6 p-0 text-center top-title">
        MY GROUPS
      </div>
    </div>
    <div class="row justify-content-center m-0 pb-3 w-100">
      {{--@if (is_null($groups) || !count($groups))
        <div class="col d-flex flex-column justify-content-center align-items-center no-members">
          <div class="text-center">NO GROUP FOUND</div>
          <div class="row justify-content-center m-0 pt-4 w-100">
            <button class="btn btn-primary launch-button" href="{{ route('group.create.index') }}">
              {{ __('CREATE') }}
            </button>
          </div>
        </div>
      @else--}}
        <div class="col-md-6 p-0">
          <div class="search-input-section">
            <input id="searchKey" type="text" class="form-control" name="searchKey" placeholder="Search Group">
            <div class="search-icon-section">
              <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="member-body flat-scroll">
            @foreach ($groups as $group)
              <div class="member-item" attr-fullname="{{ $group->name }}">
                <div class="member-link">
                  <div class="member-avatar-wrp">
                    <div class="member-avatar">
                      @if($group->logo)
                      <img src="{{ asset('uploads/groups/'.$group->logo.'?'.time()) }}">
                      @else
                      <p class="first_letter">{{ substr($group->name, 0, 1) }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="member-name">{{ $group->name }}</div>
                </div>
                <div class="options-section">
                  <a class="option-icon-btn" href="{{ route('group.edit.index', [ 'id' => $group->id ]) }}">
                    <span class="option-icon"><i class="fa fa-pen" aria-hidden="true"></i></span>
                  </a>
                  <a class="option-icon-btn delete-group-chat" href="javascript:;" attr-data="{{ $group->id }}">
                    <span class="option-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      {{--@endif--}}
    </div>

    <div class="row justify-content-center m-0 py-3 w-100">
      <div class="col-md-6 p-0">
        <div class="text-center pb-3 top-title">CREATE YOUR GROUP</div>

        <div class="name-input-section">
          <div class="image-icon-section">
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
          <input id="groupName" type="text" class="form-control border-bg" name="name" placeholder="Group Name">
        </div>
        <div class="description-input-section">
          <input id="groupDescription" type="text" class="form-control" name="description" placeholder="Description">
        </div>
      </div>
    </div>

    <div class="row justify-content-center align-items-center py-3 mx-0">
      <button class="btn btn-primary launch-button">
        {{ __('CREATE') }}
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

  $('.delete-group-chat').on('click', function() {
    var send_data = {};
    send_data['id'] = $(this).attr('attr-data');
    $.ajax({
      type: 'DELETE',
      url: '{{ route('group.delete') }}',
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

  var file_data = null;

  $(".avatar-upload").click(function() {
    $("input[id='post-featured-image']").click();
  });

  function avatar_upload() {
    const file = $('#post-featured-image').prop('files')[0]; // get the file
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
      const MAX_WIDTH = 640;
      const MAX_HEIGHT = 640;
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

  $('.launch-button').on('click', function() {
    var groupName = $('#groupName').val();
    var description = $('#groupDescription').val();
    if (!groupName && !description) {
      toastr['error']('Please Input the Group Info', 'Error');
      return;
    }

    var form_data = new FormData();
    form_data.append('logo', file_data);
    form_data.append('name', groupName);
    form_data.append('description', description);
    $.ajax({
      type: 'POST',
      url: '{{ route('group.create.chatroom') }}',
      processData: false,
      contentType: false,
      cache: false,
      data : form_data,
      success:function(data){
        if (data.status) {
          window.location.href = '{{ route('own.groups.index') }}';
        } else {
          toastr['error'](data.message, 'Error');
        }
      },
      error:function(data){
        console.log(data);
      }
    });
  })

</script>
@endsection
