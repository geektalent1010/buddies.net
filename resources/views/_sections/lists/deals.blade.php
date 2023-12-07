<div class="accordion" id="deals">
  @foreach ($deals as $index => $deal)
  <div class="w-100 post-item mb-3 mt-30px">
    <div class="text-right p-2 pr-md-0 created-at-label">{{ date_format($deal->created_at, "d/m/Y" ) }}</div>
    <div class="member-body">
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
          <div class="member-name">
            <a class="member-name-wrp" href="{{ route('profile.index', [ 'userID' => $deal->created_by ]) }}">
              <p>{{ $deal->user->getFullname() }}</p>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="post-top-content" id="posthead{{ $index + 1 }}">
      <div class="title">
        @if (isset($deal->title))
            @php
                echo $deal->title;
            @endphp
        @endif
      </div>
      <div class="content">
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
          <div class="title">
            @if (isset($deal->subject))
                @php
                    echo $deal->subject;
                @endphp
            @endif
          </div>
          <div class="content">
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
