@extends('layouts.app', ['ACTIVE_TITLE' => 'CONNECT', 'ROUTES' => [
  ['ROUTE' => 'connect.index', 'ACTIVE' => 'all', 'ACTIVE_ROUTE' => true],
  ['ROUTE' => 'connect.search.setting', 'ACTIVE' => 'setting', 'ACTIVE_ROUTE' => true]
], 'ACTIVE_PAGE' => 'setting'])

@section('title', __('- Connect'))

@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_CONTENT')

@php
    $other_interests = isset($searchSetting) ? explode(",", $searchSetting->categories) : [];
@endphp

<div class="main-bg">
    <div class="m-0 p-0 w-100 setting-section search-section">
        <div class="row justify-content-center m-0 w-100">
            <div class="col-md-6 p-0">
                <div class="row app-page-subtitle bg-color-section m-0">
                    MY SETTINGS
                </div>
                <div class="row app-page-subtitle mb-30px bg-color-section m-0">
                    SELECT DISTANCE
                </div>
                <div class="row justify-content-center m-0 distancetab">
                    <div class="distance_tablinks py-4 @if (isset($searchSetting) && $searchSetting->distance == 'CITY') active @endif" onclick="select_distance(event)">MY CITY</div>
                    <div class="distance_tablinks py-4 @if (isset($searchSetting) && $searchSetting->distance == 'COUNTRY') active @endif" onclick="select_distance(event)">MY COUNTRY</div>
                    <div class="distance_tablinks py-4 @if (isset($searchSetting) && $searchSetting->distance == 'ALL') active @endif" onclick="select_distance(event)">ALL</div>
                </div>
                <div class="w-100 distance-search-section {{ isset($searchSetting) && $searchSetting->distance && $searchSetting->distance != 'GLOBAL' ? '' : 'd-none' }}">
                    <div class="search-input-section">
                        <input id="addressSearchKey" type="text" class="form-control" name="searchKey" placeholder="Search {{ isset($searchSetting) && $searchSetting->distance ? ucfirst(strtolower($searchSetting->distance)) : '' }}" value="{{ $address }}">
                        <div id="addressSearchIcon" class="search-icon-section">
                            <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                    </div>

                    <div class="w-100 addresstab">
                    </div>
                </div>

                <div class="row app-page-subtitle bg-color-section mb-30px">
                    SELECT GENDER
                </div>
                <div class="row justify-content-center gendertab m-0">
                    <div class="gender_tablinks py-4 @if (isset($searchSetting) && str_contains($searchSetting->gender, 'f')) active @endif" onclick="toggle_gender(this, 'f')">WOMEN</div>
                    <div class="gender_tablinks py-4 @if (isset($searchSetting) && str_contains($searchSetting->gender, 'm')) active @endif" onclick="toggle_gender(this, 'm')">MEN</div>
                    <div class="gender_tablinks py-4 @if (isset($searchSetting) && str_contains($searchSetting->gender, 'f,m')) active @endif" onclick="toggle_gender(this, 'f,m')">ALL</div>
                </div>
                <div class="row app-page-subtitle mb-30px bg-color-section">
                    SELECT AGE
                </div>
                <div class="row justify-content-center agetab m-0">
                    <div class="py-4 @if (isset($searchSetting) && str_contains($searchSetting->age, '18')) active @endif" onclick="toggle_age(this)">18-34</div>
                    <div class="py-4 @if (isset($searchSetting) && str_contains($searchSetting->age, '35')) active @endif" onclick="toggle_age(this)">35-50</div>
                    <div class="py-4 @if (isset($searchSetting) && str_contains($searchSetting->age, '51')) active @endif" onclick="toggle_age(this)">51-69</div>
                    <div class="py-4 @if (isset($searchSetting) && str_contains($searchSetting->age, '70')) active @endif" onclick="toggle_age(this)">ALL</div>
                </div>
                {{--<div class="row justify-content-center bg-color-section px-4 m-0 pt-4 pb-2">
                    <p>SELECT 5 INTEREST CATEGORIES</p>
                </div>
                <div class="w-100 accordion" id="category">
                    <div class="card">
                        <div class="card-header" id="categoryhead1">
                            <div class="title interest-category-check" attr-data="Crafts">Arts & Crafts</div>
                            <a href="#" class="btn-header-link collapsed collapse-Crafts {{ in_array('Crafts', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category1" aria-expanded="true" aria-controls="category1"></a>
                        </div>

                        <div id="category1" class="collapse collapse-Crafts {{ in_array('Crafts', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead1" data-parent="#category">
                            <div class="card-body">
                                <p>Aeromodelling</p>
                                <p>Airbrushing</p>
                                <p>Arts</p>
                                <p>Beadwork</p>
                                <p>Blacksmithing</p>
                                <p>Bookbinding</p>
                                <p>Bridge Building</p>
                                <p>Building Dollhouses</p>
                                <p>Calligraphy</p>
                                <p>Candle Making</p>
                                <p>Cardstacking</p>
                                <p>Cartooning</p>
                                <p>Ceramics</p>
                                <p>Coloring</p>
                                <p>Conworlding</p>
                                <p>Crafts</p>
                                <p>Crafts (unspecified)</p>
                                <p>Crochet</p>
                                <p>Crocheting</p>
                                <p>Cross-Stitch</p>
                                <p>Digital Photography</p>
                                <p>Drawing</p>
                                <p>Embroidery</p>
                                <p>Felting</p>
                                <p>Floral Arrangements</p>
                                <p>Gunsmithing</p>
                                <p>Gyotaku</p>
                                <p>Jet Engines</p>
                                <p>Jewelry Making</p>
                                <p>Keep A Journal</p>
                                <p>Knitting</p>
                                <p>Knotting</p>
                                <p>Leathercrafting</p>
                                <p>Macramé</p>
                                <p>Making Model Cars</p>
                                <p>Matchstick Modeling</p>
                                <p>Model Railroading</p>
                                <p>Model Rockets</p>
                                <p>Modeling Ships</p>
                                <p>Models</p>
                                <p>Nail Art</p>
                                <p>Needlepoint</p>
                                <p>Origami</p>
                                <p>Painting</p>
                                <p>Papermache</p>
                                <p>Papermaking</p>
                                <p>Photography</p>
                                <p>Pottery</p>
                                <p>Quilting</p>
                                <p>Scrapbooking</p>
                                <p>Sewing</p>
                                <p>Sketching</p>
                                <p>Soap Making</p>
                                <p>String Figures</p>
                                <p>Tatting</p>
                                <p>Taxidermy</p>
                                <p>Textiles</p>
                                <p>Tombstone Rubbing</p>
                                <p>Woodworking</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead2">
                            <div class="title interest-category-check" attr-data="Collecting">Collecting</div>
                            <a href="#" class="btn-header-link collapsed collapse-Collecting {{ in_array('Collecting', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category2" aria-expanded="true" aria-controls="category2"></a>
                        </div>

                        <div id="category2" class="collapse collapse-Collecting {{ in_array('Collecting', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead2" data-parent="#category">
                            <div class="card-body">
                                <p>Button Collecting</p>
                                <p>Coin Collecting</p>
                                <p>Collecting</p>
                                <p>Collecting Antiques</p>
                                <p>Collecting Artwork</p>
                                <p>Collecting Hats</p>
                                <p>Collecting Music Albums</p>
                                <p>Collecting RPM Records</p>
                                <p>Collecting Sports Cards</p>
                                <p>Collecting Swords</p>
                                <p>Diecast Collectibles</p>
                                <p>Dolls</p>
                                <p>Gun Collecting</p>
                                <p>Rock Collecting</p>
                                <p>Shopping</p>
                                <p>Stamp Collecting</p>
                                <p>Tool Collecting</p>
                                <p>Toy Collecting</p>
                                <p>Train Collecting</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead3">
                            <div class="title interest-category-check" attr-data="Dancing">Dancing</div>
                            <a href="#" class="btn-header-link collapsed collapse-Dancing {{ in_array('Dancing', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category3" aria-expanded="true" aria-controls="category3"></a>
                        </div>

                        <div id="category3" class="collapse collapse-Dancing {{ in_array('Dancing', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead3" data-parent="#category">
                            <div class="card-body">
                                <p>Belly Dancing</p>
                                <p>Dancing</p>
                                <p>Pole Dancing</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead5">
                            <div class="title interest-category-check" attr-data="Education">Educational</div>
                            <a href="#" class="btn-header-link collapsed collapse-Education {{ in_array('Education', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category5" aria-expanded="true" aria-controls="category5"></a>
                        </div>

                        <div id="category5" class="collapse collapse-Education {{ in_array('Education', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead5" data-parent="#category">
                            <div class="card-body">
                                <p>Educational Courses</p>
                                <p>Genealogy</p>
                                <p>Handwriting Analysis</p>
                                <p>Home Repair</p>
                                <p>Inventing</p>
                                <p>Kitchen Chemistry</p>
                                <p>Lasers</p>
                                <p>Learning A Foreign Language</p>
                                <p>Learning To Pilot A Plane</p>
                                <p>Reading</p>
                                <p>Tesla Coils</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead6">
                            <div class="title interest-category-check" attr-data="Extreme">Extreme</div>
                            <a href="#" class="btn-header-link collapsed collapse-Extreme {{ in_array('Extreme', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category6" aria-expanded="true" aria-controls="category6"></a>
                        </div>

                        <div id="category6" class="collapse collapse-Extreme {{ in_array('Extreme', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead6" data-parent="#category">
                            <div class="card-body">
                                <p>Abseling (Rappelling)</p>
                                <p>Airplane Combat</p>
                                <p>Airplane Flight</p>
                                <p>Alligator Wrestling</p>
                                <p>Barefooting</p>
                                <p>Base Jumping</p>
                                <p>Blobbing</p>
                                <p>BMX</p>
                                <p>Bobsledding</p>
                                <p>Bungee Jumping</p>
                                <p>Canyon Swinging</p>
                                <p>Car Racing</p>
                                <p>Cliff Diving</p>
                                <p>Downhill Mountain Biking</p>
                                <p>Downhill Skateboarding</p>
                                <p>Flowboarding</p>
                                <p>Free Climbing</p>
                                <p>Go Kart Racing</p>
                                <p>Hang gliding</p>
                                <p>Highlining</p>
                                <p>Ice Climbing</p>
                                <p>Ice Cross Downhill</p>
                                <p>Ice Diving</p>
                                <p>Jetboarding</p>
                                <p>Jousting</p>
                                <p>Kite Boarding</p>
                                <p>Luge / Skeleton</p>
                                <p>Motocross</p>
                                <p>Motorcycle Stunts</p>
                                <p>Motorcycles</p>
                                <p>Mountain Boarding</p>
                                <p>Noodling</p>
                                <p>Off Road Driving</p>
                                <p>Parachuting</p>
                                <p>Paragliding or Power Paragliding</p>
                                <p>Parkour</p>
                                <p>Powerboking</p>
                                <p>Roller Derby</p>
                                <p>Running of the Bulls</p>
                                <p>Sandboarding</p>
                                <p>Scuba Diving</p>
                                <p>Skateboarding</p>
                                <p>Sky Diving</p>
                                <p>Snowboarding</p>
                                <p>Snowmobiling</p>
                                <p>Spelunkering</p>
                                <p>Street Luge</p>
                                <p>Surfing</p>
                                <p>Wakeboarding</p>
                                <p>Waterfall Kayaking</p>
                                <p>White Water Rafting</p>
                                <p>Windsurfing</p>
                                <p>Wingsuit Flying</p>
                                <p>Xpogo</p>
                                <p>Zorbing</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead7">
                            <div class="title interest-category-check" attr-data="Food">Food & Drink</div>
                            <a href="#" class="btn-header-link collapsed collapse-Food {{ in_array('Food', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category7" aria-expanded="true" aria-controls="category7"></a>
                        </div>

                        <div id="category7" class="collapse collapse-Food {{ in_array('Food', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead7" data-parent="#category">
                            <div class="card-body">
                                <p>Brewing Beer</p>
                                <p>Cake Decorating</p>
                                <p>Cigar Smoking</p>
                                <p>Cooking</p>
                                <p>Eating Out</p>
                                <p>Entertaining</p>
                                <p>Home Brewing</p>
                                <p>Pipe Smoking</p>
                                <p>Tea Tasting</p>
                                <p>Wine Making</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead8">
                            <div class="title interest-category-check" attr-data="Games">Games</div>
                            <a href="#" class="btn-header-link collapsed collapse-Games {{ in_array('Games', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category8" aria-expanded="true" aria-controls="category8"></a>
                        </div>

                        <div id="category8" class="collapse collapse-Games {{ in_array('Games', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead8" data-parent="#category">
                            <div class="card-body">
                                <p>Backgammon</p>
                                <p>Board Games</p>
                                <p>Casino Gambling</p>
                                <p>Chess</p>
                                <p>Cosplay</p>
                                <p>Crossword Puzzles</p>
                                <p>Darts</p>
                                <p>Dominoes</p>
                                <p>Games</p>
                                <p>Jigsaw Puzzles</p>
                                <p>Lawn Darts</p>
                                <p>Learn to Play Poker</p>
                                <p>Legos</p>
                                <p>Pinochle</p>
                                <p>Speed Cubing (rubix cube)</p>
                                <p>Tetris</p>
                                <p>Video Games</p>
                                <p>Warhammer</p>
                                <p>YoYo</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead9">
                            <div class="title interest-category-check" attr-data="Tech">High Tech</div>
                            <a href="#" class="btn-header-link collapsed collapse-Tech {{ in_array('Tech', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category9" aria-expanded="true" aria-controls="category9"></a>
                        </div>

                        <div id="category9" class="collapse collapse-Tech {{ in_array('Tech', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead9" data-parent="#category">
                            <div class="card-body">
                                <p>Amateur Radio</p>
                                <p>Blogging</p>
                                <p>Computer activities</p>
                                <p>Electronics</p>
                                <p>Home Theater</p>
                                <p>Internet</p>
                                <p>Robotics</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead10">
                            <div class="title interest-category-check" attr-data="Intellectual">Intellectual</div>
                            <a href="#" class="btn-header-link collapsed collapse-Intellectual {{ in_array('Intellectual', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category10" aria-expanded="true" aria-controls="category10"></a>
                        </div>

                        <div id="category10" class="collapse collapse-Intellectual {{ in_array('Intellectual', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead10" data-parent="#category">
                            <div class="card-body">
                                <p>Astrology</p>
                                <p>Church/church activities</p>
                                <p>Meditation</p>
                                <p>Microscopy</p>
                                <p>People Watching</p>
                                <p>Protesting</p>
                                <p>Socializing</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead11">
                            <div class="title interest-category-check" attr-data="Music">Music</div>
                            <a href="#" class="btn-header-link collapsed collapse-Music {{ in_array('Music', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category11" aria-expanded="true" aria-controls="category11"></a>
                        </div>

                        <div id="category11" class="collapse collapse-Music {{ in_array('Music', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead11" data-parent="#category">
                            <div class="card-body">
                                <p>Beatboxing</p>
                                <p>Bell Ringing</p>
                                <p>Compose Music</p>
                                <p>Guitar</p>
                                <p>Learning An Instrument</p>
                                <p>Listening to music</p>
                                <p>Musical Instruments</p>
                                <p>Piano</p>
                                <p>Playing music</p>
                                <p>Rapping</p>
                                <p>Singing In Choir</p>
                                <p>Violin</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead12">
                            <div class="title interest-category-check" attr-data="Outdoors">Outdoors</div>
                            <a href="#" class="btn-header-link collapsed collapse-Outdoors {{ in_array('Outdoors', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category12" aria-expanded="true" aria-controls="category12"></a>
                        </div>

                        <div id="category12" class="collapse collapse-Outdoors {{ in_array('Outdoors', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead12" data-parent="#category">
                            <div class="card-body">
                                <p>Aircraft Spotting</p>
                                <p>Airsofting</p>
                                <p>Amateur Astronomy</p>
                                <p>Astronomy</p>
                                <p>Beach/Sun tanning</p>
                                <p>Beachcombing</p>
                                <p>Bird watching</p>
                                <p>Birding</p>
                                <p>Boating</p>
                                <p>Bonsai Tree</p>
                                <p>Boomerangs</p>
                                <p>Butterfly Watching</p>
                                <p>Camping</p>
                                <p>Canoeing</p>
                                <p>Cave Diving</p>
                                <p>Cloud Watching</p>
                                <p>Contact Juggling</p>
                                <p>Dumpster Diving</p>
                                <p>Falconry</p>
                                <p>Fast cars</p>
                                <p>Fishing</p>
                                <p>Fly Fishing</p>
                                <p>Fly Tying</p>
                                <p>Four Wheeling</p>
                                <p>Garage Saleing</p>
                                <p>Gardening</p>
                                <p>Geocaching</p>
                                <p>Ghost Hunting</p>
                                <p>Gnoming</p>
                                <p>Grip Strength</p>
                                <p>Hiking</p>
                                <p>Hot air ballooning</p>
                                <p>Hula Hooping</p>
                                <p>Hunting</p>
                                <p>Ice Fishing</p>
                                <p>Juggling</p>
                                <p>Jump Roping</p>
                                <p>Kayaking</p>
                                <p>Kites</p>
                                <p>Letterboxing</p>
                                <p>Marksmanship</p>
                                <p>Metal Detecting</p>
                                <p>Mountain Biking</p>
                                <p>Mountain Climbing</p>
                                <p>Owning An Antique Car</p>
                                <p>Paintball</p>
                                <p>Planking</p>
                                <p>Pyrotechnics</p>
                                <p>Racing Pigeons</p>
                                <p>Rafting</p>
                                <p>Rock Balancing</p>
                                <p>Rock Climbing</p>
                                <p>Rockets</p>
                                <p>Sailing</p>
                                <p>Sand Castles</p>
                                <p>Self Defense</p>
                                <p>Shark Diving</p>
                                <p>Shark Fishing</p>
                                <p>Skeet Shooting</p>
                                <p>Skiing</p>
                                <p>Slack Lining</p>
                                <p>Slingshots</p>
                                <p>Snorkeling</p>
                                <p>Snow Skiing</p>
                                <p>Storm Chasing</p>
                                <p>Surf Fishing</p>
                                <p>Survival</p>
                                <p>Swimming</p>
                                <p>Train Spotting</p>
                                <p>Traveling</p>
                                <p>Treasure Hunting</p>
                                <p>Urban Exploration</p>
                                <p>Walking</p>
                                <p>Watching sporting events</p>
                                <p>Water Ski</p>
                                <p>Working on cars</p>
                                <p>World Record Breaking</p>
                                <p>Ziplining</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead13">
                            <div class="title interest-category-check" attr-data="Performing">Performing Arts</div>
                            <a href="#" class="btn-header-link collapsed collapse-Performing {{ in_array('Performing', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category13" aria-expanded="true" aria-controls="category13"></a>
                        </div>

                        <div id="category13" class="collapse collapse-Performing {{ in_array('Performing', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead13" data-parent="#category">
                            <div class="card-body">
                                <p>Acting</p>
                                <p>Fire Poi</p>
                                <p>Glowsticking</p>
                                <p>Going to movies</p>
                                <p>Illusion</p>
                                <p>Impersonations</p>
                                <p>Magic</p>
                                <p>Puppetry</p>
                                <p>Renaissance Faire</p>
                                <p>Roleplaying</p>
                                <p>Storytelling</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead14">
                            <div class="title interest-category-check" attr-data="Pets">Pets</div>
                            <a href="#" class="btn-header-link collapsed collapse-Pets {{ in_array('Pets', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category14" aria-expanded="true" aria-controls="category14"></a>
                        </div>

                        <div id="category14" class="collapse collapse-Pets {{ in_array('Pets', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead14" data-parent="#category">
                            <div class="card-body">
                                <p>Animals/pets/dogs</p>
                                <p>Ant Farm</p>
                                <p>Aquarium (Freshwater & Saltwater)</p>
                                <p>Freshwater Aquariums</p>
                                <p>Herping</p>
                                <p>Rescuing Abused Or Abandoned Animals</p>
                                <p>Saltwater Aquariums</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead15">
                            <div class="title interest-category-check" attr-data="Philantropy">Philantropy</div>
                            <a href="#" class="btn-header-link collapsed collapse-Philantropy {{ in_array('Philantropy', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category15" aria-expanded="true" aria-controls="category15"></a>
                        </div>

                        <div id="category15" class="collapse collapse-Philantropy {{ in_array('Philantropy', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead15" data-parent="#category">
                            <div class="card-body">
                                <p>Becoming A Child Advocate</p>
                                <p>Bringing Food To The Disabled</p>
                                <p>Building A House For Habitat For Humanity</p>
                                <p>Reading To The Elderly</p>
                                <p>Rocking AIDS Babies</p>
                                <p>Tutoring Children</p>
                                <p>Volunteer</p>
                                <p>Working In A Food Pantry</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead18">
                            <div class="title interest-category-check" attr-data="Hobbies">RC Hobbies</div>
                            <a href="#" class="btn-header-link collapsed collapse-Hobbies {{ in_array('Hobbies', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category18" aria-expanded="true" aria-controls="category18"></a>
                        </div>

                        <div id="category18" class="collapse collapse-Hobbies {{ in_array('Hobbies', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead18" data-parent="#category">
                            <div class="card-body">
                                <p>Boats</p>
                                <p>Cars</p>
                                <p>Helicopters</p>
                                <p>Planes</p>
                                <p>Slot Car Racing</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead16">
                            <div class="title interest-category-check" attr-data="Sports">Sports</div>
                            <a href="#" class="btn-header-link collapsed collapse-Sports {{ in_array('Sports', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category16" aria-expanded="true" aria-controls="category16"></a>
                        </div>

                        <div id="category16" class="collapse collapse-Sports {{ in_array('Sports', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead16" data-parent="#category">
                            <div class="card-body">
                                <p>Acrobatics</p>
                                <p>Acroyoga</p>
                                <p>Archery</p>
                                <p>Badminton</p>
                                <p>Baseball</p>
                                <p>Basketball</p>
                                <p>Bicycle Polo</p>
                                <p>Body Building</p>
                                <p>Bowling</p>
                                <p>Boxing</p>
                                <p>Cardio Workout</p>
                                <p>Cheerleading</p>
                                <p>Cycling</p>
                                <p>Diving</p>
                                <p>Dodgeball</p>
                                <p>Exercise (aerobics, weights)</p>
                                <p>Fencing</p>
                                <p>Floorball</p>
                                <p>Fly Hunting</p>
                                <p>Football</p>
                                <p>Frisbee Golf</p>
                                <p>Golf</p>
                                <p>Gymnastics</p>
                                <p>Horseback Riding</p>
                                <p>Ice Skating</p>
                                <p>Inline Skating</p>
                                <p>Lacrosse</p>
                                <p>Locksport</p>
                                <p>Martial Arts</p>
                                <p>Pilates</p>
                                <p>Playing team sports</p>
                                <p>Running</p>
                                <p>Soccer</p>
                                <p>Squash</p>
                                <p>Swimming</p>
                                <p>Tai Chi</p>
                                <p>Tennis</p>
                                <p>Triathlon</p>
                                <p>Ultimate Frisbee</p>
                                <p>Weightlifting</p>
                                <p>Wrestling</p>
                                <p>Yoga</p>
                                <p>Zumba</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="categoryhead17">
                            <div class="title interest-category-check" attr-data="Writing">Writing</div>
                            <a href="#" class="btn-header-link collapsed collapse-Writing {{ in_array('Writing', $other_interests) ? 'active' : '' }}" data-toggle="collapse" data-target="#category17" aria-expanded="true" aria-controls="category17"></a>
                        </div>

                        <div id="category17" class="collapse collapse-Writing {{ in_array('Writing', $other_interests) ? 'active' : '' }}" aria-labelledby="categoryhead17" data-parent="#category">
                            <div class="card-body">
                                <p>Writing</p>
                                <p>Writing Music</p>
                                <p>Writing Songs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center bg-color-section px-4 m-0 pt-4 pb-2">
                    <p>SEARCH BASED ON INTEREST</p>
                </div>
                <div class="row justify-content-center basedtab m-0">
                    <div class="based_tablinks py-4 @if (isset($searchSetting) && $searchSetting->interest_based == 'YES') active @endif" onclick="select_based(event)">YES</div>
                    <div class="based_tablinks py-4 @if (!isset($searchSetting) || (isset($searchSetting) && empty($searchSetting->interest_based)) || (isset($searchSetting) && $searchSetting->interest_based == 'NO')) active @endif" onclick="select_based(event)">NO</div>
                </div>--}}
            </div>
        </div>
        <div class="row justify-content-center align-items-center mt-35px mb-35px btn-section w-100 p-0 m-0 mt-35px">
            <button class="btn btn-primary setting-save-btn">SAVE</button>
        </div>
    </div>
</div>

@endsection

@section('PAGE_END')
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var interests = '{{ (isset($searchSetting) && $searchSetting->categories) ? $searchSetting->categories : '' }}', ages = '{{ (isset($searchSetting) && $searchSetting->age) ? $searchSetting->age : '' }}', genders = '{{ (isset($searchSetting) && $searchSetting->gender) ? $searchSetting->gender : '' }}';
    var interested_category = interests ? interests.split(',') : [];
    var selected_age = ages ? ages.split(',') : [];
    var selected_gender = genders ? genders.split(',') : [];
    var selected_distance = '{{ (isset($searchSetting) && $searchSetting->distance) ? $searchSetting->distance : '' }}', selected_based = '{{ (isset($searchSetting) && $searchSetting->based) ? $searchSetting->based : '' }}';
    var searchSettingId = '{{ isset($searchSetting) ? $searchSetting->id : 0 }}';
    var selected_address = '{{ (isset($searchSetting) && $searchSetting->address) ? $searchSetting->address : '' }}';

    $('.interest-category-check').on('click', function() {
        var category = $(this).attr('attr-data');
        var className = '.collapse-' + category;
        if (interested_category.indexOf(category) < 0) {
            if (interested_category.length > 4) {
                toastr['error']('You cannot select more than 5 categories.', 'Alert');
                return;
            }
            interested_category.push(category);
            if (!$(className).hasClass('active')) {
                $(className).addClass('active');
            }
        } else {
            interested_category.splice(interested_category.indexOf(category), 1);
            if ($(className).hasClass('active')) {
                $(className).removeClass('active');
            }
        }
    })

    function select_distance(evt) {
        var tablinks = document.getElementsByClassName("distance_tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        if (selected_distance != evt.currentTarget.textContent) {
            evt.currentTarget.className += " active";
            selected_distance = evt.currentTarget.textContent;
            if (selected_distance == 'GLOBAL') {
                $('.distance-search-section').hide();
                $('.addresstab').hide();
                $("#addressSearchKey").val('')
                selected_address = ''
            } else {
                if ($('.distance-search-section').hasClass('d-none')) {
                    $('.distance-search-section').removeClass('d-none');
                }
                $('.distance-search-section').show();
                var key = selected_distance.toLowerCase();
                var placeholder = "Search " + key.charAt(0).toUpperCase() + key.slice(1);
                $('#addressSearchKey').attr("placeholder", placeholder);
            }
        } else {
            selected_distance = '';
            $('.distance-search-section').hide();
            $('.addresstab').hide();
            $("#addressSearchKey").val('')
            selected_address = ''
        }
    }

    function select_gender(evt, value) {
        var tablinks = document.getElementsByClassName("gender_tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        if (selected_gender != value) {
            evt.currentTarget.className += " active";
            selected_gender = value;
        } else {
            selected_gender = '';
        }
    }

    function toggle_gender(element, value) {
        if (element.classList.contains("active")) {
            selected_gender.splice(selected_gender.indexOf(value), 1);
            element.className = element.className.replace(" active", "");
        } else {
            selected_gender.push(value);
            element.className += " active";
        }
    }

    function toggle_age(element) {
        var age = element.textContent;
        if (element.classList.contains("active")) {
            selected_age.splice(selected_age.indexOf(age), 1);
            element.className = element.className.replace(" active", "");
        } else {
            selected_age.push(age);
            element.className += " active";
        }
        selected_age = selected_age.filter((value, index, original) => original.indexOf(value) === index);
    }

    function select_based(evt) {
        var tablinks = document.getElementsByClassName("based_tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        if (selected_based != evt.currentTarget.textContent) {
            evt.currentTarget.className += " active";
            selected_based = evt.currentTarget.textContent;
        } else {
            selected_based = '';
        }
    }

    $('#addressSearchIcon').click(function () {
        if($("#addressSearchKey").val() == '') {
            $('.addresstab').hide();
        } else {
            var options = {
                distance: selected_distance,
                keyword: $("#addressSearchKey").val(),
            };
            $.ajax({
                url: '{{ route("connect.address.search") }}',
                method: "POST",
                data: options,
                success: function(res) {
                    if (res.length) {
                        var html = '';
                        for(var resIndex = 0; resIndex < res.length; resIndex++) {
                        html +=
                            '<div class="address py-3" attr-data="' + res[resIndex].address + '"  attr-name="' + res[resIndex].name + '">' + res[resIndex].name + '</div>';
                        }
                        $('.addresstab').html(html);
                        $('.addresstab').show();
                    }
                },
                error:function(err){
                    toastr['error']('Error');
                }
            })
        }
    });

    $(document).on('click', '.address', function() {
        selected_address = $(this).attr('attr-data');
        $("#addressSearchKey").val($(this).attr('attr-name'))
        $('.addresstab').hide();
    })

    $('.setting-save-btn').on('click', function() {
        var send_data = {};
        send_data['id'] = searchSettingId;
        send_data['distance'] = selected_distance;
        send_data['address'] = selected_address;
        // send_data['gender'] = selected_gender;
        send_data['gender'] = selected_gender.join(',');
        send_data['age'] = selected_age.join(',');
        send_data['categories'] = interested_category.join(',');
        send_data['interest_based'] = selected_based;
        send_data['type'] = 0;

        $.ajax({
          type: 'PUT',
          url: '{{ route('connect.setting.update') }}',
          data: send_data,
          success: function(data) {
            $('.update-success').removeClass('d-none');
            setTimeout(function() {
                $('.update-success').addClass('d-none');
            }, 3000);
            searchSettingId = data.settingId;
          }
        })
    })

</script>
@endsection
