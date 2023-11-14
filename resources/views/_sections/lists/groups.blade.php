
<div class="member-body flat-scroll">
  @foreach ($groups as $key => $member)
    <div class="member-item" attr-fullname="{{ $member->group->name }}">
      <div class="member-link">
        <div class="member-avatar-wrp">
          <div class="member-avatar">
            @if($member->group->logo)
            <img src="{{ asset('uploads/groups/'.$member->group->logo.'?'.time()) }}">
            @else
            <p class="first_letter">{{ substr($member->group->name, 0, 1) }}</p>
            @endif
          </div>
        </div>
        <div class="member-name">{{ $member->group->name }}</div>
      </div>
      <div class="options-section">
        <a class="option-icon-btn" href="{{ route('group.chat.index', [ 'id' => $member->group->id ]) }}">
          <span class="option-icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
        </a>
        <a class="option-icon-btn leave-group {{ $member->group->user_id == $authUser->id ? 'd-none' : '' }}" href="javascript:;" attr-groupId="{{ $member->group_id }}" attr-userId="{{ $member->user_id }}">
          <span class="option-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
        </a>
      </div>
    </div>
  @endforeach
</div>