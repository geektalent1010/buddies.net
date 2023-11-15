@if (isset($ACTIVE_TITLE) && $ACTIVE_TITLE == 'DASHBOARD')
<footer>
    <div class="footerDesc m-auto">
            <img src="{{ asset('images/svg/Previous.svg') }}" class="prev" alt="footer Prev logo"/>
            <img src="{{ asset('images/svg/MoodsLogo.svg') }}" class="mood-logo mx-2" alt="footer Mood logo" />
            <img src="{{ asset('images/svg/Next.svg') }}" class="next" alt="footer Next logo"/>
    </div>
</footer>
@else
<footer>
    <div class="footerDesc m-auto d-flex justify-content-center">
      @if (isset($ACTIVE_TITLE))
        <div class="navicon-section">
          @if (isset($ROUTES) && count($ROUTES))
              @foreach ($ROUTES as $ROUTE)
                  @if (isset($ROUTE['ACTIVE_ROUTE']) && $ROUTE['ACTIVE_ROUTE'])
                      <a href="{{ route($ROUTE['ROUTE']) }}">
                          <span class="nav-icon @if (isset($ACTIVE_PAGE) && $ACTIVE_PAGE == $ROUTE['ACTIVE']) active @endif"><i class="fa-solid fa-circle"></i></span>
                      </a>
                  @endif
              @endforeach
          @endif
          @if (isset($ACTIVE_CHAT_ROUTES) && $ACTIVE_CHAT_ROUTES)
              <a href="{{ route('messages.index') }}">
                  <span class="nav-icon @if (isset($ACTIVE_PAGE) && $ACTIVE_PAGE == 'members') active @endif"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              </a>
              <a href="{{ $CHATTING_ROUTE }}">
                  <span class="nav-icon @if (isset($ACTIVE_PAGE) && $ACTIVE_PAGE == 'chatting') active @endif"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              </a>
          @endif
          @if (isset($ACTIVE_GROUP_ROUTES) && $ACTIVE_GROUP_ROUTES)
            <a href="{{ route('groups.index') }}">
              <span class="nav-icon @if (isset($ACTIVE_PAGE) && ($ACTIVE_PAGE == 'own' || $ACTIVE_PAGE == 'create' || $ACTIVE_PAGE == 'edit')) active @endif"><i class="fa fa-circle" aria-hidden="true"></i></span>
            </a>
            <a href="{{ route('friends.groups.index') }}">
                <span class="nav-icon @if (isset($ACTIVE_PAGE) && ($ACTIVE_PAGE == 'friends')) active @endif"><i class="fa fa-circle" aria-hidden="true"></i></span>
            </a>
            <a href="{{ route('group.chat.index', [ 'id' => 0 ]) }}">
                <span class="nav-icon @if (isset($ACTIVE_PAGE) && $ACTIVE_PAGE == 'chat') active @endif"><i class="fa fa-circle" aria-hidden="true"></i></span>
            </a>
          @endif
          @if (isset($CREATE_ROUTE) && isset($ACTIVE_CREATE) && $ACTIVE_CREATE)
              <a href="{{ route($CREATE_ROUTE) }}">
                  <span class="nav-icon @if (isset($ACTIVE_PAGE) && $ACTIVE_PAGE == 'create') active @endif"><i class="fa-solid fa-circle"></i></span>
              </a>
          @endif
        </div>
      @endif
    </div>
</footer>
@endif