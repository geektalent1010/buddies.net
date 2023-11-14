@extends('layouts.home')


@section('PAGE_LEVEL_STYLES')
@endsection

@section('PAGE_START')
@endsection


@section('PAGE_CONTENT')

    <!-- OPEN - LEFT PART -->
    <div class="ms-left">

        <!-- +++ START - Home Left +++ -->
        @include('_sections.home.left_part.homeLeft')
        <!-- +++ END - Home Left +++ -->

        <!-- +++ START - Buddies Left +++ -->
        @include('_sections.home.left_part.buddiesLeft')
        <!-- +++ END - Buddies Left +++ -->

        <!-- +++ START - Connect Left +++ -->
        @include('_sections.home.left_part.connectLeft')
        <!-- +++ END - Connect Left +++ -->

        <!-- +++ START - Membership Left +++ -->
        @include('_sections.home.left_part.membershipLeft')
        <!-- +++ END - Membership Left +++ -->

        <!-- +++ START - Tell-A-Friend Left +++ -->
        @include('_sections.home.left_part.tellFriendLeft')
        <!-- +++ END - Tell-A-Friend Left +++ -->

        <!-- +++ START - Roadmap Left +++ -->
        @include('_sections.home.left_part.roadmapLeft')
        <!-- +++ END - Roadmap Left +++ -->

        <!-- +++ START - Summary Left +++ -->
        @include('_sections.home.left_part.summaryLeft')
        <!-- +++ END - Summary Left +++ -->

        <!-- +++ START - Notify-Me Left +++ -->
        @include('_sections.home.left_part.notifyMeLeft')
        <!-- +++ END - Notify-Me Left +++ -->

    </div>
    <!-- CLOSE - LEFT PART -->

    <!-- OPEN - RIGHT PART -->
    <div class="ms-right" id="right-part">

        <!-- +++ START - Home Right +++ -->
        @include('_sections.home.right_part.homeRight')
        <!-- +++ END - Home Right +++ -->

        <!-- +++ START - Buddies Right +++ -->
        @include('_sections.home.right_part.buddiesRight')
        <!-- +++ END - Buddies Right +++ -->

        <!-- +++ START - Connect Right +++ -->
        @include('_sections.home.right_part.connectRight')
        <!-- +++ END - Connect Right +++ -->

        <!-- +++ START - Membership Right +++ -->
        @include('_sections.home.right_part.membershipRight')
        <!-- +++ END - Membership Right +++ -->

        <!-- +++ START - Tell-A-Friend Right +++ -->
        @include('_sections.home.right_part.tellFriendRight')
        <!-- +++ END - Tell-A-Friend Right +++ -->

        <!-- +++ START - Roadmap Right +++ -->
        @include('_sections.home.right_part.roadmapRight')
        <!-- +++ END - Roadmap Right +++ -->

        <!-- +++ START - Summary Right +++ -->
        @include('_sections.home.right_part.summaryRight')
        <!-- +++ END - Summary Right +++ -->

        <!-- +++ START - Notify-Me Right +++ -->
        @include('_sections.home.right_part.notifyMeRight')
        <!-- +++ END - Notify-Me Right +++ -->

    </div>
    <!-- CLOSE - RIGHT PART -->

@endsection

@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
