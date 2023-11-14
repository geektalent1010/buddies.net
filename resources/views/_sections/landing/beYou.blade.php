<div class="video-wrapper">
    <video class="video-section be-you-video" id="landing-be-you-video" poster="{{ asset('images/BeYouDesktop.png') }}" loop playsinline>
        <source src="{{ asset('videos/BeYouDesktop.mp4') }}" type="video/mp4">
    </video>
    <video class="video-section-mobile be-you-video-mobile" id="landing-be-you-video-mobile" poster="{{ asset('images/BeYouPhone.png') }}" loop playsinline>
        <source src="{{ asset('videos/BeYouPhone.mp4') }}" type="video/mp4">
    </video>
    
   <div class="video-controls">
        <img class="play-icon" src="{{ asset('images/svg/PlayButton.svg') }}" alt="PlayButton svg">
        <img class="pause-icon d-none" src="{{ asset('images/svg/PauseButton.svg') }}" alt="PauseButton svg">
    </div>
</div>