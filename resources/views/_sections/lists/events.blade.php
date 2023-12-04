<div class="accordion" id="news">
  @foreach ($posts as $index => $post)
    <div class="w-100 post-item mt-46px">
      <div class="text-right p-2 pr-md-0 created-at-label">{{ date_format($post->created_at, "d/m/Y" )}}</div>
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
      <div class="post-top-content" id="posthead{{ $index + 1 }}">
        <div class="title">
          @if (isset($post->title))
              @php
                  echo $post->title;
              @endphp
          @endif
        </div>
        <div class="content">
          @if (isset($post->address))
              @php
                  echo $post->address;
              @endphp
          @endif
        </div>
        <div class="content">
          @if (isset($post->event_date))
              @php
                  echo $post->event_date;
              @endphp
          @endif
        </div>
        <div class="optional-section">
            <a href="#" class="option-icon collapsed" data-toggle="collapse" data-target="#post{{ $index + 1 }}" aria-expanded="true" aria-controls="post{{ $index + 1 }}"></a>
        </div>
      </div>
      <div id="post{{ $index + 1 }}" class="collapse" aria-labelledby="posthead{{ $index + 1 }}" data-parent="#news">
        @if (isset($post->featured_image_url))
        <a class="w-100" data-fancybox href="{{ asset('uploads/posts/'.$post->featured_image_url.'?'.time()) }}">
          <img class="w-100 h-auto" src="{{ asset('uploads/posts/'.$post->featured_image_url.'?'.time()) }}" alt="featured image">
        </a>
        @endif
        <div class="post-content">
          <div class="title">
            @if (isset($post->subject))
                @php
                    echo $post->subject;
                @endphp
            @endif
          </div>
          <div class="content">
            @if (isset($post->description))
                @php
                    echo $post->description;
                @endphp
            @endif
          </div>
        </div>
      </div>
      <div class="like-section">
        <span class="heart-icon {{ in_array($authUser->id, explode(',', $post->followers)) ? 'like' : '' }} post{{ $post->id }}" attr-data="{{ $post->id }}"><i class="fa fa-heart" aria-hidden="true"></i></span>
        <span class="likes-count{{ $post->id }}">{{ $post->followers && count(explode(',', $post->followers)) > 0 ? count(explode(',', $post->followers)) : 0 }}</span>
        @if ($post->created_by === $authUser->id)
          <div class="option-icon-section">
            <a class="option-icon-btn" href="{{ route('events.edit.index', [ 'id' => $post->id ]) }}">
              <span class="option-icon"><i class="fa fa-pen" aria-hidden="true"></i></span>
            </a>
            <div class="option-icon-btn">
              <span class="option-icon trash-icon" attr-data="{{ $post->id }}"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
          </div>
        @endif
      </div>
    </div>
  @endforeach
</div>
