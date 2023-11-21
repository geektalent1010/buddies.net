
<div class="member-body flat-scroll">
  <div class="accordion" id="faq">
    <div class="card">
      <div class="card-header" id="faqhead1">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1" attr-fullname="DASHBOARD">DASHBOARD</a>
      </div>

      <div id="faq1" class="collapse" aria-labelledby="faqhead1" data-parent="#faq">
        <div class="card-body">
          <div class="">Dashboard is the navigation tool for your entire Buddies suite. Just click or tap on one of the dashboard icons and you will be forwarded to the selected page.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <div class="new-message-icon"></div>
            </div>
            <div>Alerts</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="moods-icon d-flex">
                <img src="{{ asset('images/svg/Previous.svg') }}" class="prev" alt="footer Prev logo"/>
                {{-- <img src="{{ asset('images/svg/MoodsLogo.svg') }}" class="mood-logo mx-2" alt="footer Mood logo" /> --}}
                <span>MOODS</span>
                <img src="{{ asset('images/svg/Next.svg') }}" class="next" alt="footer Next logo"/>
            </div>
          </div>
          <div>Change your background, change your mood.</div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('dashboard') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead2">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2" attr-fullname="PROFILE">PROFILE</a>
      </div>

      <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
        <div class="card-body">
          <div class="">Profile is your personal page to expose yourself to other community members. On this page you can write your story and upload your best images.</div>
          <div class="action-title my-3">Actions</div>
          <div class="mb-3">Click or tap EDIT to go into edit mode.</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Profile</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>My Details</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon active">Abc</span>
            </div>
            <div>Edit content</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon active"><i class="fa fa-image" aria-hidden="true"></i></span>
            </div>
            <div>Upload image</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon active"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete image</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span>
            </div>
            <div>Dashboard</div>
          </div>
          <div class="mb-3">Click or tap SAVE to store your page.</div>
          <div class="">On the my details page you are able to selected 5 interest categories. This offers a great opportunity to grow your buddies list with community members with the same interests.</div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('profile.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead3">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq3" aria-expanded="true" aria-controls="faq3" attr-fullname="CONNECT">CONNECT</a>
      </div>

      <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">Connect with other community members and build your buddies list. You can simply find someone by viewing the list, type a name, select a preferred dis- tance, gender or age.</div>
          <div class="">To connect with someone, you are obliged to write and send a message first to introduce yourself. As soon as someone receives and reads your message and accepts your request to become buddies, the two of you will be connected. Your new buddy will now be visible in your buddies list.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Connect</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Settings</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            <div>Accept request</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
            </div>
            <div>Send message</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('connect.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead5">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq5" aria-expanded="true" aria-controls="faq5" attr-fullname="BUDDIES">BUDDIES</a>
      </div>

      <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
        <div class="card-body">
          <div class="">See all your buddies in alphabetical order. Simply type any name in the search field to quickly find one of your buddies.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            <div>Accept</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-comment" aria-hidden="true"></i></span>
            </div>
            <div>Chat</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('buddies.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead4">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq4" aria-expanded="true" aria-controls="faq4" attr-fullname="CHAT">CHAT</a>
      </div>

      <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">Chat with your buddies whenever you want, and from any device you want. View the active chat list, or simply type any name to find an active chat.</div>
          <div class="">To start a first or new chat with a buddy not visible in the chat list, go to your buddies list, find the buddy, click the chat icon and write a first message.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Chat list</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Chat page</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon offline"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Online / Offline</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex">
              <div class="new-message-icon one-circle mr-1"></div>
              <div class="new-message-icon one-circle offline"></div>
            </div>
            <div>New message</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-comment" aria-hidden="true"></i></span>
            </div>
            <div>Chat</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
            </div>
            <div>Send message</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('messages.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead6">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq6" aria-expanded="true" aria-controls="faq6" attr-fullname="GROUPS">GROUPS</a>
      </div>

      <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
        <div class="card-body three-dots-container">
          <div class="mb-3">Create connections and build a deeper sense of community. Start your own group as a dedicated space for your personal community to flourish. Groups are mostly an incubator for ideas and feedback through authentic conversations.          </div>
          <div class="">Groups are only visible for added community members. To keep groups clean and to stay in line with regulations, the creator of a group is the only obliged to add or remove group members.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>My groups</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Groups from buddies</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Group chat</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-plus" aria-hidden="true"></i></span>
            </div>
            <div>Accept request</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-comment" aria-hidden="true"></i></span>
            </div>
            <div>Send message</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete group or buddy</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('groups.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead8">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq8" aria-expanded="true" aria-controls="faq8" attr-fullname="STORIES">STORIES</a>
      </div>

      <div id="faq8" class="collapse" aria-labelledby="faqhead8" data-parent="#faq">
        <div class="card-body three-dots-container">
          <div class="mb-3">Everyone has a story. In the stories channel, you can read personal stories from other community members and write your own. Add a nice picture and let us know where it’s taken. Introduce yourself to the community to find new buddies. You want to do something nice next weekend and want to buddy up with someone to join?</div>
          <div class="mb-3">Don’t forget to share your experience about a great deal from the local shops or companies. This way we can say: “Thank you.” and help them grow as well.</div>
          <div class="mb-3">Make sure you don’t violate the community guidelines. As Buddies, we need to be compliant with the new regulatory EU Digital Service Act, meaning that special views or political opinions can be shared in one of your private groups with like-minded buddies, not in public channels. Let’s respect the new regulations and avoid penalties.</div>
          <div class="mb-3">As Buddies we want to create a positive experience for anyone.</div>
          <div class="">If you like a story, click the heart. How many hearts will you collect today?</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>All stories</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Stories from buddies</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>My stories</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-pen" aria-hidden="true"></i></span>
            </div>
            <div>Edit</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('stories.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead7">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq7" aria-expanded="true" aria-controls="faq7" attr-fullname="COMPANIES">COMPANIES</a>
      </div>

      <div id="faq7" class="collapse" aria-labelledby="faqhead7" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">Local shops and companies are an important part of the buddies community as they offer community members special deals which can be found on the deals page. As a community member, you will always have an advantage on regular pricing.</div>
          <div>As buddies we strive to create mutual-gains formula that benefits all.</div>
          <div class="mb-3">Find shops and companies by name. Visit their profile page to find out more or click the follow button to add them to your favorites list.</div>
          <div class="">Feel free to refer your favorite local shops or companies to the constantly growing buddies platform.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Companies</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Search settings</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('companies.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead18">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq18" aria-expanded="true" aria-controls="faq18" attr-fullname="HEROES">HEROES</a>
      </div>

      <div id="faq18" class="collapse" aria-labelledby="faqhead18" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">We love to put our buddies in the spotlight. On the Heroes page you’ll find a list of the most active buddies, the ones that promote the platform in a way that it makes a real difference. Buddies is all about making a difference, one person at a time, for you and everyone you know.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('heroes.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead20">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq20" aria-expanded="true" aria-controls="faq20" attr-fullname="HEARTS">HEARTS</a>
      </div>

      <div id="faq20" class="collapse" aria-labelledby="faqhead20" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">The hearts channel is the one to visit for buddies that are looking for more than just a chat. If you are looking for romance or maybe your soulmate, the hearts channel will make your heart beats a little bit faster. Available soon.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('hearts.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead12">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq12" aria-expanded="true" aria-controls="faq12" attr-fullname="DEALS">DEALS</a>
      </div>

      <div id="faq12" class="collapse" aria-labelledby="faqhead12" data-parent="#faq">
        <div class="card-body">
          <div>What if you can buy something and you know you always have an advantage?</div>
          <div class="mb-3">That’s what the deals channel is all about.</div>
          <div class="mb-3">In times where big tech wants to take over the world, we as Buddies prefer to support our local shops and companies owned by the people we know.</div>
          <div class="mb-3">When you like their offers in deals and you order from them, they are happy with you as a new customer and in return they give you an advantage that makes you happy again.</div>
          <div class="">In this mutual-gains approach formula all parties work together to meet interests and maximize value creation. TOGETHER WE ARE BETTER.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>All companies</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Companies i follow</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-pen" aria-hidden="true"></i></span>
            </div>
            <div>Edit</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('deals.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead11">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq11" aria-expanded="true" aria-controls="faq11" attr-fullname="TRADE">TRADE</a>
      </div>

      <div id="faq11" class="collapse" aria-labelledby="faqhead11" data-parent="#faq">
        <div class="card-body three-dots-container">
          <div class="mb-3">Sometimes you own things, you dont really need and sometimes you need things, you don’t own. With our beautiful planet and nature in mind, we don’t throw away things. Let’s make someone else happy and give things a 2nd life.</div>
          <div class="mb-3">Trade is a channel to exchange something with someone else. Look at it as an environmental friendly marketplace where money doesn’t play a role.</div>
          <div class="mb-3">Maybe you have a bike you don’t use any longer. Another community member is willing to trade it for a TV. Trade just made two people happy, plus we saved the environment. TOGETHER WE ARE BETTER.</div>
          <div class="">Maybe you just want to give away something to someone... That’s appreciated as well :)</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>All trades</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Trades from buddies</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>My trades</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-pen" aria-hidden="true"></i></span>
            </div>
            <div>Edit</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('trades.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead13">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq13" aria-expanded="true" aria-controls="faq13" attr-fullname="JOBS">JOBS</a>
      </div>

      <div id="faq13" class="collapse" aria-labelledby="faqhead13" data-parent="#faq">
        <div class="card-body three-dots-container">
          <div class="mb-3">If you are looking for a new job, you are on the right channel. If you have or know someone who has a job to offer, you are on the right channel. Jobs is all about connecting people to jobs and jobs to people.</div>
          <div class="">Maybe you think, i have a job already. Well you are “safe” for now, but no one can predict the future. Maybe next month or even next year you will appreciate this channel. Don’t forget, the world is changing.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Job offers</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Job requests</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>My jobs</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-pen" aria-hidden="true"></i></span>
            </div>
            <div>Edit</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-trash" aria-hidden="true"></i></span>
            </div>
            <div>Delete</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('jobs.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="card">
      <div class="card-header" id="faqhead10">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq10" aria-expanded="true" aria-controls="faq10" attr-fullname="EVENTS">EVENTS</a>
      </div>

      <div id="faq10" class="collapse" aria-labelledby="faqhead10" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">In the near future BUDDIES plans to organize local events for community members. Why not meet as buddies in real life, share some food or have a dance?</div>
          <div class="mb-3">And ofcourse... invite some friends and family to join the party!</div>
          <div class="">Stay Tuned!</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('events.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="card">
      <div class="card-header" id="faqhead19">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq19" aria-expanded="true" aria-controls="faq19" attr-fullname="CAFE">BUDDIES CAFE</a>
      </div>

      <div id="faq19" class="collapse" aria-labelledby="faqhead19" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">Buddies Cafe is an amazing new concept that will grow in tandem with the Buddies platform. We all love to build an online community, but let’s not forget about real life. As soon as a Buddies region expands, we are on the outlook for a local cafe or restaurant where our buddies can meet, have a chat, have a drink or even enjoy a dinner together. Buddies Cafe, let’s meet one day.</div>
          <div class="">Stay Tuned!</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead9">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq9" aria-expanded="true" aria-controls="faq9" attr-fullname="NEWS">NEWS</a>
      </div>

      <div id="faq9" class="collapse" aria-labelledby="faqhead9" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">Anything about technical development, updates and maintainance from your IT or Support team will be shared with you in the news channel.</div>
          <div class="">Stay Tuned!</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <span class="nav-icon large"><i class="fa fa-heart" aria-hidden="true"></i></span>
            </div>
            <div>Like</div>
          </div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('news.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead15">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq15" aria-expanded="true" aria-controls="faq15" attr-fullname="SHARE">SHARE</a>
      </div>

      <div id="faq15" class="collapse" aria-labelledby="faqhead15" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">We love to show our enthusiasm to the world to let our amazing community grow. The more like-minded people, the more fun we all have.</div>
          <div class="mb-3">Quick question: Have you ever been watching a movie to recommended it later to a friend? The movie company paid you for promoting, right?</div>
          <div class="mb-3">At Buddies we think different. Share provides you with a personal referral link that you can share with anyone you know. When people use your link and pay for a subscription, you will be rewarded with credits as a “Thank You.”</div>
          <div class="mb-3">As you know, we don’t use advertising companies for promotions. We believe that the enthusiasm from a happy user has much more value.</div>
          <div class="mb-3">In share, you will find a nice collection of social media ads and movies that can be shared on any social platform. Let’s give Buddies the right exposure. Don’t forget to place your referral link while posting, it might bring you more credits.</div>
          <div class="">Let’s show the world our real face and let’s go viral.</div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('share.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead14">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq14" aria-expanded="true" aria-controls="faq14" attr-fullname="BE MORE">MORE</a>
      </div>

      <div id="faq14" class="collapse" aria-labelledby="faqhead14" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">As Buddies we know that the world cannot be changed at once. “If we can positively touch the lives of a few so they can positively touch the lives of a few, we are on the right path to serve the many!”</div>
          <div class="mb-3">The More project is a community driven project to provide more health, more education and more joy to local people in need.</div>
          <div class="mb-2">USUAL PROJECT</div>
          <div class="mb-3">Many projects have a business model attached. This makes that after paying huge salaries and large overhead costs, only a very small percentage of funds collected end up where they belong.</div>
          <div class="mb-2">THE MORE PROJECT</div>
          <div class="mb-3">Buddies uses a different approach. As community we stand together and we focus on local help. 100% will end up where it belongs. No matter if we provide a bag filled with healthy food or organize a special day for kids in need, the community will always provide a helping hand and funds to make things happen. No one expects something in return.</div>
          <div class="mb-3">WE ARE BETTER TOGETHER.</div>
          <div class="">Stay tuned!</div>
          <div class="mt-4 d-flex">
            <button class="go-to-button">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="faqhead17">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq17" aria-expanded="true" aria-controls="faq17" attr-fullname="WALLET">WALLET</a>
      </div>

      <div id="faq17" class="collapse" aria-labelledby="faqhead17" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">What’s in your wallet?</div>
          <div class="mb-3">Don’t worry, that wasn’t a real question to you directly. :)</div>
          <div class="mb-3">In your wallet, all credits you have earned as a reward for promoting Buddies throught your referral link will be visible. We are in development of a system to add a real value to your earned credits so the can be used on the platform.</div>
          <div class="mb-3">For example. Everytime you want to pay a subscription, the system will check your wallet how much credits it holds. If the value is enough to pay your sub- scription, you can choose to use credits instead of any other payment method.</div>
          <div class="">As we love transparency, you will find a list with everyone that signed up through your referral link including their status. In this overview you can follow how your collected credits are earned.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Sales status</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon medium"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active medium ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Sales tracker</div>
          </div>
          <div class="d-flex align-items-center mb-4">
            <div class="icon-section"><span class="nav-icon active"><img src="{{ asset('images/logo/LogoMenu.svg') }}" class="img-fluid w-50" alt="Buddies.zone" title="Buddies.zone" /></span></div>
            <div>Dashboard</div>
          </div>
          <div class="">Now, let’s share Buddies, have some fun and grow the community.</div>
          <div class="mt-4 d-flex">
            <button class="go-to-button" onclick="window.location.href='{{ route('tokens.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="card">
      <div class="card-header" id="faqhead16">
        <a href="#" class="btn btn-header-link member-item collapsed" data-toggle="collapse" data-target="#faq16" aria-expanded="true" aria-controls="faq16" attr-fullname="STUDIO">STUDIO</a>
      </div>

      <div id="faq16" class="collapse" aria-labelledby="faqhead16" data-parent="#faq">
        <div class="card-body">
          <div class="mb-3">Are you a creative mind or shall we offer you a helping hand?</div>
          <div class="mb-3">As BUDDIES we always try to imagine how we can make life easier for all community members, including our local shops and companies. That’s why we have created a very simple to use creative STUDIO to let you create nice DEALS ads within a few minutes.</div>
          <div class="mb-3">Be creative and surprise the community with your next DEAL today!</div>
          <div class="">Please note: STUDIO is available for Business Accounts only.</div>
          <div class="action-title my-3">Actions</div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section">
              <img class="logout" src="{{ asset('images/svg/Logout.svg') }}" alt="Logout" />
            </div>
            <div>Logout</div>
          </div>
          <div class="d-flex align-items-center mb-3">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon active small"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon small ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Studio</div>
          </div>
          <div class="d-flex align-items-center">
            <div class="icon-section d-flex align-items-center">
              <span class="nav-icon small"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
              <span class="nav-icon active small ml-1"><i class="fa-solid fa-circle" aria-hidden="true"></i></span>
            </div>
            <div>Share</div>
          </div>
          <div class="mt-4 d-flex justify-content-center">
            <button class="go-to-button" onclick="window.location.href='{{ route('studio.index') }}'">
              {{ __('VISIT') }}
            </button>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>