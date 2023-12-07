<div class="member-body flat-scroll">
  @foreach ($channels as $channel)
  <member-component :auth-user="{{ auth()->user() }}" :channel-info="{{ $channel }}" :member-info="{{ $channel->otherUser }}" :member-profile="{{ $channel->otherUser->profile }}" :current-channel="@if (!is_null($channelInfo) && $channelInfo->id === $channel->id) true @else false @endif"></member-component>
  @endforeach
</div>