<div class="member-body flat-scroll">
  <div class="accordion" id="heroes">
    @foreach ($heroes as $index => $hero)
    <div class="member-item" attr-fullname="{{ $hero->getFullname() }}">
      <a class="member-link" href="{{ route('profile.index', [ 'userID' => $hero->id ]) }}">
        <div class="member-avatar-wrp">
          @if (isset($hero->profile->main_avatar_url))
          <img class="member-avatar"
            src="{{ asset('uploads/'.$hero->username.'/'.$hero->profile->main_avatar_url.'?'.time()) }}"
            alt="{{ $hero->getFullname() }}'s main_avatar">
          @else
          <div class="member-avatar">
            <p class="first_letter">{{ $hero->getMono() }}</p>
          </div>
          @endif
        </div>
        <div class="member-name">{{ $hero->getFullname() }}</div>
      </a>
      <div class="option-icons-section">
        <div class="option-icon-btn heart-icon-btn d-flex justify-content-center align-items-center"
          id="herohead{{ $index + 1 }}">
          <span class="option-icon rank-icon">
            <i class="fa fa-star" aria-hidden="true"></i>
          </span>
          <p class="followers likes-count{{ $hero->id }}">{{ $index + 1 }}</p>
          <a href="#" class="collapsed" data-toggle="collapse" data-target="#hero{{ $index + 1 }}" aria-expanded="true"
            aria-controls="hero{{ $index + 1 }}"></a>
        </div>
      </div>
    </div>
    <div id="hero{{ $index + 1 }}" class="collapse" aria-labelledby="herohead{{ $index + 1 }}" data-parent="#heroes">
      <div class="hero-detail row mr-0 ml-0">
        <div class="col-md-6 p-0 col-6">
          <p class="mb-0">{{ $hero->profile->getCountry() }}</p>
          <p>{{ $hero->profile->getCity() }}</p>
          <p class="mb-0">{{ $hero->referrals_count }} Referrals</p>
        </div>
        <div class="col-md-6 p-0 col-6">
          <div class="follower-section d-flex justify-content-end align-items-center  mb-3 option-icon-btn">
            <span
              class="option-icon heart-icon {{ in_array($authUser->id, explode(',', $hero->profile->followers)) ? 'like' : '' }} like hero{{ $hero->profile->id }}"
              attr-data="{{ $hero->profile->id }}">
              <i class="fa fa-heart" aria-hidden="true"></i>
            </span>
            <p class="followers likes-count{{ $hero->id }}">{{ !empty($hero->profile->followers) ?
              $hero->profile->followers : '0' }}</p>
          </div>
          @if ($hero->status)
          <div class="connect-btn-section desktop">
            <a href="{{ route('connect.request', ['userId' => $hero->id ]) }}"
              class="btn btn-primary profile-connect-btn">CONNECT</a>
          </div>
          @endif
        </div>
        @if ($hero->status)
          <div class="col-12 p-0 mt-3">
            <div class="connect-btn-section mobile">
              <a href="{{ route('connect.request', ['userId' => $hero->id ]) }}"
                class="btn btn-primary profile-connect-btn">CONNECT</a>
            </div>
          </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</div>