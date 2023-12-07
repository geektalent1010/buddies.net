<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// No Auth Panel
Route::group([], function (): void {
    Route::get('/', 'LandingController@landing')->name('home');

    Route::get('{referral_id}', static function ($referral_id) {
        if (User::where('customer_id', $referral_id)->exists()) {
            $urlArray = urlHelper();
            Cookie::queue(
                cookie(
                    'referral_id',
                    $referral_id,
                    60 * 24 * 30 * 3,
                    null,
                    '.' . $urlArray['baseDomain']
                )
            );
        }

        return redirect()->route('home');
    })->where('referral_id', '[0-9]{6}+')->name('referral:referral-link');

    Route::get('landing', 'LandingController@landing')->name('landing');
});

Route::group(['middleware' => ['web'], 'namespace' => 'Auth'], function (): void {
    Route::post('verify', 'RegisterController@verify')->name('auth.verify');
    Route::post('address-filter', 'RegisterController@addressFilter')->name('address.search');

    Route::post('enquiry-send', 'RegisterController@sendEnquiry')->name('enquiry.send');
});

// Auth Panel
Route::group(['middleware' => ['auth']], function (): void {
    Route::group(['middleware' => ['roles:individual,admin']], function (): void {
        Route::get('story', 'StoriesController@create')->name('story.create.index');
        Route::get('story/{id}', 'StoriesController@edit')->name('story.edit.index');
        Route::get('stories/mine', 'StoriesController@mine')->name('stories.mine');
        Route::get('trade', 'TradeController@create')->name('trade.create.index');
        Route::get('trade/{id}', 'TradeController@edit')->name('trade.edit.index');
        Route::get('trades/mine', 'TradeController@mine')->name('trades.mine');
    });
    Route::group(['middleware' => ['roles:company,admin']], function (): void {
        Route::get('deal', 'DealsController@create')->name('deal.create.index');
        Route::get('deal/{id}', 'DealsController@edit')->name('deal.edit.index');
        Route::get('deals/mine', 'DealsController@mine')->name('deals.mine');
        Route::get('studios', 'StudioController@index')->name('studio.index');
        Route::get('studios/edit', 'StudioController@edit')->name('studio.edit');
        Route::put('studio/update_mode1', 'StudioController@updateMode1')->name('studio.update.mode1');
        Route::put('studio/update_mode2', 'StudioController@updateMode2')->name('studio.update.mode2');
        Route::put('studio/update_mode3', 'StudioController@updateMode3')->name('studio.update.mode3');
        Route::put('studio/update_mode4', 'StudioController@updateMode4')->name('studio.update.mode4');
        Route::post('studio/image-upload', 'StudioController@uploadImage')->name('studio.image.upload');
        Route::put('studio/image-remove', 'StudioController@removeImage')->name('studio.remove.image');
        Route::post('studio/update', 'StudioController@update')->name('studio.update');
        Route::get('studio/download', 'StudioController@download')->name('studio.download');
    });
    Route::group(['middleware' => ['admin']], function (): void {
        Route::get('new', 'NewsController@create')->name('news.create.index');
        Route::get('new/{id}', 'NewsController@edit')->name('news.edit.index');
        Route::get('event', 'EventsController@create')->name('events.create.index');
        Route::get('event/{id}', 'EventsController@edit')->name('events.edit.index');
    });
    Route::group(['middleware' => ['admin'], 'namespace' => 'Admin'], function (): void {
        Route::get('admin/members/{userID?}', 'MembersController@index')->name('members.index');
        Route::post('admin/members/update-detail-info', 'MembersController@updateUserDetailInfo')->name('admin.members.infoUpdate');
        Route::put('admin/members/update_account_status', 'MembersController@updateAccountStatus')->name('admin.members.statusUpdate');
        Route::get('admin/joining-reports', 'ReportsController@index')->name('joining.reports.index');
        Route::get('admin/downline-reports', 'ReportsController@downline')->name('downline.reports.index');
        Route::get('admin/sales-reports', 'ReportsController@sales')->name('sales.reports.index');

        Route::get('admin/joiningReportFilters', 'ReportsController@filters')->name('joiningReport.filters');
        Route::post('admin/joiningReportTable', 'ReportsController@fetch')->name('joiningReport.fetch');
        Route::get('admin/downlineReportFilters', 'ReportsController@downlineFilters')->name('downlineReport.filters');
        Route::post('admin/downlineReportTable', 'ReportsController@downlineFetch')->name('downlineReport.fetch');
        Route::get('admin/salesReportFilters', 'ReportsController@salesFilters')->name('salesReport.filters');
        Route::post('admin/salesReportTable', 'ReportsController@salesFetch')->name('salesReport.fetch');

        Route::post('admin/downloadJoiningReportPdf', 'ReportsController@downloadJoiningReportPdf')->name('joiningReport.download.pdf');
        Route::get('admin/downloadJoiningReportExcel', 'ReportsController@downloadJoiningReportExcel')->name('joiningReport.download.excel');
        Route::post('admin/printJoiningReport', 'ReportsController@printJoiningReport')->name('joiningReport.print');

        Route::get('admin/products', 'ProductsController@index')->name('products.index');
        Route::get('admin/emails', 'EmailsController@index')->name('emails.index');
        Route::get('admin/finance', 'FinanceController@index')->name('finance.index');
        Route::get('admin/financeFilters', 'FinanceController@filters')->name('finance.filters');
        Route::post('admin/trasactionList', 'FinanceController@fetch')->name('finance.transaction.fetch');
        Route::get('admin/tickets', 'TicketsController@index')->name('tickets.index');
    });
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Profile Route
    Route::get('profile/edit', 'UserController@edit')->name('profile.edit.index');
    Route::get('profile/setting', 'UserController@setting')->name('profile.setting.index');
    Route::get('profile/{userID?}', 'UserController@index')->name('profile.index');
    Route::post('profile/update-detail-info', 'UserController@updateUserProfileDetailInfo')->name('profile.update.detail');

    // Setting Routes
    Route::post('user-verify', 'UserController@verify')->name('user.verify');
    Route::put('settings/profile-address-update', 'UserController@updateProfileAddress')->name('setting.profile.address');
    Route::put('settings/other-interested-update', 'UserController@updateOtherInterested')->name('setting.other.interested');
    Route::put('settings/main-interested-update', 'UserController@updateMainInterested')->name('setting.main.interested');
    Route::post('settings/profile-avatar-upload', 'UserController@uploadProfileAvatar')->name('setting.profile.avatar');
    Route::put('settings/profile-avatar-remove', 'UserController@removeProfileAvatar')->name('setting.remove.avatar');
    Route::put('settings/update_story', 'UserController@updateStoryContent')->name('setting.update.story');
    Route::put('settings/update_job_title', 'UserController@updateJobTitle')->name('setting.update.job_title');
    Route::put('settings/update_city', 'UserController@updateCity')->name('setting.update.city');
    Route::put('settings/update_country', 'UserController@updateCountry')->name('setting.update.country');
    Route::put('settings/update_street', 'UserController@updateStreet')->name('setting.update.street');
    Route::put('settings/update_code', 'UserController@updateCode')->name('setting.update.code');
    Route::put('settings/update_email', 'UserController@updateEmail')->name('setting.update.email');
    Route::put('settings/update_phone', 'UserController@updatePhone')->name('setting.update.phone');
    Route::put('settings/update_site', 'UserController@updateSite')->name('setting.update.site');
    Route::post('settings/update-detail-info', 'UserController@updateUserDetailInfo')->name('setting.update.detail');

    // Companies Route
    Route::get('companies', 'CompaniesController@index')->name('companies.index');
    Route::get('company-search-setting', 'CompaniesController@searchSetting')->name('companies.search.setting');
    Route::post('company/filter', 'CompaniesController@filter')->name('company.search.filter');
    Route::put('companies/likes', 'CompaniesController@likes')->name('company.likes');

    // Heroes Route
    Route::get('heroes', 'HeroesController@index')->name('heroes.index');

    // Messages Route
    Route::get('messages', 'MessageController@index')->name('messages.index');
    Route::get('messages/{ids?}', 'MessageController@chat')->name('messages.chat');
    Route::post('messages/filter', 'MessageController@filter')->name('messages.search.filter');
    Route::post('messages/create-chat-room', 'MessageController@chatRoomCreate')->name('messages.create.chatroom');
    Route::put('messages/update-channel', 'MessageController@updateConnectedStatus')->name('messages.connected.status');
    Route::put('messages/trash', 'MessageController@trashUser')->name('messages.trash.user');

    // Connect Route
    Route::get('connect', 'ConnectController@index')->name('connect.index');
    Route::get('connect/{userId?}', 'ConnectController@request')->name('connect.request');
    Route::get('connect-search-setting', 'ConnectController@searchSetting')->name('connect.search.setting');
    Route::post('connect/request', 'ConnectController@send')->name('connect.request.send');
    Route::post('connect/filter', 'ConnectController@filter')->name('connect.search.filter');
    Route::post('connect/address-filter', 'ConnectController@addressFilter')->name('connect.address.search');
    Route::put('search-setting-update', 'ConnectController@saveSearchSetting')->name('connect.setting.update');

    // Buddies Route
    Route::get('buddies', 'BuddiesController@individuals')->name('buddies.index');
    Route::get('buddies/individuals', 'BuddiesController@individuals')->name('buddies.individuals');
    Route::get('buddies/companies', 'BuddiesController@companies')->name('buddies.companies');
    Route::post('buddies/accept', 'BuddiesController@accept')->name('buddies.accept');
    Route::post('buddies/remove', 'BuddiesController@remove')->name('buddies.remove');

    // Share Route
    Route::get('share', 'ShareController@index')->name('share.index');
    Route::get('share/link', 'ShareController@link')->name('share.link');
    Route::get('share/download', 'ShareController@download')->name('share.download');

    // Group Route
    Route::get('groups', 'GroupsController@index')->name('groups.index');
    Route::get('groups/own', 'GroupsController@showOwnGroups')->name('own.groups.index');
    Route::get('group', 'GroupsController@show')->name('group.create.index');
    Route::get('group/edit/{id}', 'GroupsController@edit')->name('group.edit.index');
    Route::get('group/friends', 'GroupsController@showFriendsGroups')->name('friends.groups.index');
    Route::post('group/create-chat-room', 'GroupsController@createGroupChatRoom')->name('group.create.chatroom');
    Route::post('group/update-info', 'GroupsController@updateGroupInfo')->name('group.info.update');
    Route::post('group/accept', 'GroupsController@accept')->name('group.invite.accept');
    Route::post('group/ban', 'GroupsController@ban')->name('group.member.ban');
    Route::post('group/unban', 'GroupsController@unban')->name('group.member.unban');
    Route::get('group-chatroom/{id}', 'GroupsController@chat')->name('group.chat.index');
    Route::delete('group/delete', 'GroupsController@delete')->name('group.delete');

    // Trade Route
    Route::get('trades', 'TradeController@index')->name('trades.index');
    Route::get('trades/buddies', 'TradeController@buddies')->name('trades.buddies');

    // News Route
    Route::get('news', 'NewsController@index')->name('news.index');

    // Events Route
    Route::get('events', 'EventsController@index')->name('events.index');

    // Stories Route
    Route::get('stories', 'StoriesController@index')->name('stories.index');
    Route::get('stories/buddies', 'StoriesController@buddies')->name('stories.buddies');

    // Deals Route
    Route::get('deals', 'DealsController@index')->name('deals.index');
    Route::get('deals/buddies', 'DealsController@buddies')->name('deals.buddies');

    // Jobs Route
    Route::get('jobs', 'JobsController@index')->name('jobs.index');
    Route::get('job', 'JobsController@create')->name('job.create.index');
    Route::get('job/{id}', 'JobsController@edit')->name('job.edit.index');
    Route::post('job/store', 'JobsController@store')->name('job.store');
    Route::post('job/update', 'JobsController@update')->name('job.update');
    Route::put('job/likes', 'JobsController@likes')->name('job.likes');
    Route::delete('job/delete', 'JobsController@delete')->name('job.delete');
    Route::get('jobs/individuals', 'JobsController@individuals')->name('jobs.individuals');
    Route::get('jobs/mine', 'JobsController@mine')->name('jobs.mine');

    // Topics Route
    Route::get('topics', 'TopicsController@index')->name('topics.index');

    // Post Route
    Route::post('post/store', 'PostsController@store')->name('post.store');
    Route::post('post/update', 'PostsController@update')->name('post.update');
    Route::put('post/likes', 'PostsController@likes')->name('post.likes');
    Route::delete('post/delete', 'PostsController@delete')->name('post.delete');

    // Dating Route
    Route::get('dating', 'DatingController@index')->name('dating.index');

    // Tokens Route
    Route::get('wallet/credits', 'TokensController@index')->name('tokens.index');
    Route::get('wallet/referrals', 'TokensController@referrals')->name('referrals.index');

    // Hearts Route
    Route::get('hearts', 'HeartsController@index')->name('hearts.index');
});
