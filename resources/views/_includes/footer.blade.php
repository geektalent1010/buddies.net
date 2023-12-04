@if (isset($ACTIVE_TITLE) && $ACTIVE_TITLE == 'DASHBOARD')
<footer>
    <div class="footerDesc m-auto d-flex justify-content-center">
      <div class="navicon-section moods-section">
        {{-- <img src="{{ asset('images/svg/Previous.svg') }}" class="prev" alt="footer Prev logo"/> --}}
        <svg class="moods-icon prev" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          viewBox="0 0 12 14" style="enable-background:new 0 0 12 14;" xml:space="preserve" width="18px" height="18px">
        <g>
          <g>
            <g>
              <path class="st0" d="M0.5,6.2l10-5.8c0.1-0.1,0.3-0.1,0.5-0.1c0.1,0,0.3,0.1,0.5,0.1c0.3,0.2,0.5,0.5,0.5,0.8v11.5
                c0,0.3-0.2,0.6-0.5,0.8c-0.1,0.1-0.3,0.1-0.5,0.1c-0.1,0-0.3-0.1-0.5-0.1l-10-5.8C0.2,7.6,0.1,7.3,0.1,7C0,6.7,0.2,6.4,0.5,6.2z"
                />
            </g>
          </g>
        </g>
        </svg>

        <span>MOODS</span>
        {{-- <img src="{{ asset('images/svg/Next.svg') }}" class="next" alt="footer Next logo"/> --}}
        <svg class="moods-icon next" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          viewBox="0 0 12 14" style="enable-background:new 0 0 12 14;" xml:space="preserve" width="18px" height="18px">
        <g>
          <g>
            <g>
              <path class="st0" d="M11.4,6.2l-10-5.8C1.3,0.4,1.2,0.3,1,0.3c-0.1,0-0.3,0.1-0.5,0.1C0.2,0.6,0.1,0.9,0.1,1.2v11.5
                c0,0.3,0.2,0.6,0.5,0.8c0.1,0.1,0.3,0.1,0.5,0.1c0.1,0,0.3-0.1,0.5-0.1l10-5.8c0.3-0.2,0.5-0.5,0.5-0.8
                C11.9,6.7,11.7,6.4,11.4,6.2z"/>
            </g>
          </g>
        </g>
        </svg>
      </div>
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
