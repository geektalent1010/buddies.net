<div class="member-body flat-scroll" id="app">
  @foreach ($groups as $key => $group)
  <div class="search-item" attr-fullname="{{ $group->name }}">
    <group-component :auth-user="{{ json_encode(auth()->user()) }}" :group-info="{{ json_encode($group) }}"></group-component>
    <div class="description-input-section">
      <input id="teamDescription" type="text" class="form-control desc-body" name="description" value="{{ $group->description }}" readonly>
    </div>
  </div>
  @endforeach
</div>
