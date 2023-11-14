
<div class="member-body flat-scroll">
  @foreach ($companies as $profile)
    <div class="member-item" attr-fullname="{{ $profile->user->getFullname() }}">
      <a class="member-link" href="{{ route('profile.index', [ 'userID' => $profile->user_id ]) }}">
        <div class="member-avatar-wrp">
          <div class="member-avatar">
            @if($profile->main_avatar_url)
            <img src="{{ asset('uploads/'.$profile->user->username.'/'.$profile->main_avatar_url.'?'.time()) }}">
            @else
            <p class="first_letter">{{ $profile->user->getMono() }}</p>
            @endif
          </div>
        </div>
        <div class="member-name">{{ $profile->user->getFullname() }}</div>
      </a>
      <div class="option-icons-section">
        <div class="option-icon-btn heart-icon-btn" attr-data="{{ $profile->id }}">
          <span class="option-icon heart-icon {{ in_array($authUser->id, explode(',', $profile->followers)) ? 'like' : '' }} company{{ $profile->id }}"><i class="fa fa-heart" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  @endforeach
</div>