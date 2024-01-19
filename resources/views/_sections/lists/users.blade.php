<div class="member-body flat-scroll">
  @foreach ($users as $user)
    <div class="member-item" attr-fullname="{{ $user->getFullname() }}">
      <a class="member-link" href="{{ route('profile.index', [ 'userID' => $user->id ]) }}">
        <div class="member-avatar-wrp">
          @if (isset($user->profile->main_avatar_url))
          <img class="member-avatar" src="{{ asset('uploads/'.$user->username.'/'.$user->profile->main_avatar_url.'?'.time()) }}" alt="{{ $user->profile->first_name }}'s main_avatar">
          @else
          <div class="member-avatar">
            <p class="first_letter">{{ $user->getMono() }}</p>
          </div>
          @endif
        </div>
        <div class="member-name">{{ $user->getFullname() }}</div>
      </a>
      <div class="option-icons-section">
        <div class="option-icon-btn comment-icon" attr-connectUserId="{{ $user->id }}">
          <span class="option-icon"><i aria-hidden="true" class="fa fa-comment"></i></span>
        </div>
        <div class="option-icon-btn trash-icon" attr-data="{{ $user->id }}">
          <span class="option-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  @endforeach
</div>
