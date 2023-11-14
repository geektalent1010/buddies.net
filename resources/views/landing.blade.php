@extends('layouts.landing')


@section('PAGE_LEVEL_STYLES')
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')
    @include('_sections.landing.butterfly')
    @include('_sections.landing.welcome')
    @include('_sections.landing.beAmazed')
    @include('_sections.landing.beConnected')
    @include('_sections.landing.beMore')
    @include('_sections.landing.footer')
@endsection


@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script type="text/javascript">
    // var beYourDesktopVideo = document.getElementById('landing-be-you-video');
    // var beYourMobileVideo = document.getElementById('landing-be-you-video-mobile');

    // $('.play-icon').click(function() {
    //     if ($('.pause-icon').hasClass('d-none')) {
    //         $('.pause-icon').removeClass('d-none')
    //     }
    //     $(this).addClass('d-none');
    //     $('.video-controls').hide();
    //     beYourMobileVideo.muted = true;
    //     beYourDesktopVideo.play();
    //     beYourMobileVideo.play();
    // })
    // $('.pause-icon').click(function() {
    //     if ($('.play-icon').hasClass('d-none')) {
    //         $('.play-icon').removeClass('d-none')
    //     }
    //     $(this).addClass('d-none');
    //     $('.video-controls').show();
    //     beYourDesktopVideo.pause();
    //     beYourMobileVideo.pause();
    // })

    const landing_video = document.getElementById('landing-video');
    const landing_video_mobile = document.getElementById('landing-video-mobile');
    const div = document.querySelector('.desclimWrapper');

    landing_video.load();
    landing_video_mobile.load();
    // When the video has finished loading
    landing_video.addEventListener('canplaythrough', function() {
        div.classList.add('background-loaded');
        div.classList.add('background-loaded-mobile');
        document.body.style.backgroundColor = '#04246b' //changing bg color
    });
</script>
@endsection
