<div class="member-body flat-scroll">
  @foreach ($groups as $key => $group)
  <div class="search-item" attr-fullname="{{ $group->name }}">
    <div class="member-item">
      <div class="member-link">
        <div class="member-avatar-wrp">
          <div class="member-avatar">
            @if ($group->logo)
            <img src="{{ asset('uploads/groups/'.$group->logo.'?'.time()) }}">
            @else
            <p class="first_letter">{{ substr($group->name, 0, 1) }}</p>
            @endif
          </div>
        </div>
        <div class="member-name">{{ $group->name }}</div>
      </div>
      <div class="option-icons-section">
        <a class="option-icon-btn ml-2" href="{{ route('group.edit.index', [ 'id' => $group->id ]) }}">
          <span class="option-icon"><i class="fa fa-pen" aria-hidden="true"></i></span>
        </a>
        <a class="option-icon-btn" href="{{ route('group.chat.index', [ 'id' => $group->id ]) }}">
          <span class="option-icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
        </a>
        <a class="option-icon-btn delete-group" href="javascript:;" attr-data="{{ $group->id }}">
          <span class="option-icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
        </a>
      </div>
    </div>
    <div class="description-input-section">
      <input id="teamDescription" type="text" class="form-control desc-body" name="description" value="{{ $group->description }}" readonly>
    </div>
  </div>
  @endforeach
</div>