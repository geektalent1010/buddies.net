
<div class="modal video-modal">
    <div class="video-modal-content">
        <img class="cancel-video" src="{{ asset('images/svg/cancelWhite.svg') }}" onclick="hideModal()">
        <video class="intro-video" id="intro-video" playsinline>
            <source src="{{ asset('videos/BuddiesH1.mp4') }}" type="video/mp4">
        </video>
        <video class="intro-video-mobile" id="intro-video-mobile" playsinline>
            <source src="{{ asset('videos/BuddiesV1.mp4') }}" type="video/mp4">
      </video>
   </div>
</div>
<!-- <div class="video-controls">
    <img class="play-icon" src="{{ asset('images/svg/PlayButton.svg') }}" alt="PlayButton svg">
</div> -->

<style>
    .video-modal {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }
    .video-modal-content {
        position: absolute;
        top: 50%;
        left:50%;
        transform: translate(-50%, -50%);    
        padding: 0px;
        width: auto;
        max-height: 100vh;
    }
    .show-modal {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
        display: block;
    }
    .cancel-video {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 20px;
        z-index: 2;
    }
</style>

<script type="text/javascript">
    const play_icon = document.querySelector('.play-icon');
    const stop_icon = document.querySelector('.stop-icon');
    
    if (play_icon) {
        play_icon.addEventListener('mouseover', function() {
            play_icon.src = '{{ asset('') }}' + 'images/svg/PlayButtonBlue.svg';
        });
        play_icon.addEventListener('mouseout', function() {
            play_icon.src = '{{ asset('') }}' + 'images/svg/PlayButtonWhite.svg';
        });
    }
    if (stop_icon) {
        stop_icon.addEventListener('mouseover', function() {
            stop_icon.src = '{{ asset('') }}' + 'images/svg/StopButtonBlue.svg';
        });
        stop_icon.addEventListener('mouseout', function() {
            stop_icon.src = '{{ asset('') }}' + 'images/svg/StopButtonWhite.svg';
        });
    }

    let video = document.querySelector('.video-section');
    let video_mobile = document.querySelector('.video-section-mobile');
    $('.play-icon').click(function() {
        document.querySelector('.desclimWrapper').classList.remove('background-loaded');
        document.querySelector('.desclimWrapper').classList.remove('background-loaded-mobile');
        if (window.innerWidth > 769) {
            video.querySelector('source').src = '{{ asset('') }}' + 'videos/BuddiesH1.mp4';
            video.load();
            video.muted = false;
            video.addEventListener('canplaythrough', function() {
                document.querySelector('.desclimWrapper').classList.add('background-loaded');
                document.querySelector('.desclimWrapper').classList.add('background-loaded-mobile');
            });
        }
        else {
            video_mobile.querySelector('source').src = '{{ asset('') }}' + 'videos/BuddiesV1.mp4';
            video_mobile.load();
            video_mobile.muted = false;
            video_mobile.addEventListener('canplaythrough', function() {
                document.querySelector('.desclimWrapper').classList.add('background-loaded');
                document.querySelector('.desclimWrapper').classList.add('background-loaded-mobile');
            });
        }
        $('.play-icon').addClass('d-none');
        $('.stop-icon').removeClass('d-none');
        $('.welcome-background').removeClass('d-flex');
        $('.welcome-background').addClass('d-none');
        $('.landing-footer-section').removeClass('d-flex');
        $('.landing-footer-section').addClass('d-none');
        $('.desclimWrapper').removeClass('d-flex');
        $('.desclimWrapper').addClass('d-none');
    });

    $('.stop-icon').click(function() {
        document.querySelector('.desclimWrapper').classList.remove('background-loaded');
        document.querySelector('.desclimWrapper').classList.remove('background-loaded-mobile');
        if (window.innerWidth > 769) {
            video.querySelector('source').src = '{{ asset('') }}' + 'videos/ButterflyH1.mp4';
            video.load();
            video.muted = true;
            video.addEventListener('canplaythrough', function() {
                document.querySelector('.desclimWrapper').classList.add('background-loaded');
                document.querySelector('.desclimWrapper').classList.add('background-loaded-mobile');
            });
        }
        else {
            video_mobile.querySelector('source').src = '{{ asset('') }}' + 'videos/ButterflyV1.mp4';
            video_mobile.load();
            video_mobile.muted = true;
            video_mobile.addEventListener('canplaythrough', function() {
                document.querySelector('.desclimWrapper').classList.add('background-loaded');
                document.querySelector('.desclimWrapper').classList.add('background-loaded-mobile');
            });
        }
        $('.stop-icon').addClass('d-none');
        $('.play-icon').removeClass('d-none');
        $('.welcome-background').addClass('d-flex');
        $('.welcome-background').removeClass('d-none');
        $('.landing-footer-section').addClass('d-flex');
        $('.landing-footer-section').removeClass('d-none');
        $('.desclimWrapper').addClass('d-flex');
        $('.desclimWrapper').removeClass('d-none');
    });
</script>