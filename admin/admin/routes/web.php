<?php

use App\Ad;

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
use App\Archive;
use App\Blog;
use App\Feedback;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SMScontroller;
use App\Http\Controllers\UserController;
use App\League;
use App\Notification;
use App\Prediction;
use App\Shot;
use App\Slider;
use App\Sms_subscription;
use App\Subscription;
use App\Textslider;
use App\User;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

    $path = url('/images').'/';
    $path1 =url('/images/users').'/';
    $path2 = url('/images').'/';
    $localPath = "";
    // $path = "http://pachristo.com/victorpredict/administrator/images/";
    //$path1 = "http://pachristo.com/victorpredict/images/users/";
    //$path2 = "http://pachristo.com/victorpredict/administrator/images/";

    // $league = [];

    $league = League::latest('created_at')->get();

    $contactmail = '';
    $advertmail = '';
    $callno = '';
    $whatsappno = '';
    $telegramlink = '';
    $skypelink = '';
    $facebooklink = "";
    $twitterlink = "";

    View::share(['path' => $path, 'localPath' => $localPath, 'contactmail' => $contactmail,
        'advertmail' => $advertmail, 'callno' => $callno, 'whatsappno' => $whatsappno, 'telegramlink' => $telegramlink,
        'skypelink' => $skypelink, 'facebooklink' => $facebooklink, 'twitterlink' => $twitterlink,'allleagues'=>$league]);

// partners

    Route::get('/partners', [
        GeneralController::class, 'getPartners',
    ])->middleware('auth')->name('partnersget');

    Route::get('/partners_del/{id?}', [
        GeneralController::class, 'deletePartners',

    ])->name('partnersdel')->middleware('auth');

    Route::post('/partners', [
        GeneralController::class, 'postPartners',
        'as' => 'partnersget',
        'middleware' => 'auth',
    ]);

    Route::get('/', function () {
        return view('welcome');
    })->name('/');
    Route::get('/login', function () {
        return view('welcome');
    })->name('/login');

    Route::get('/trashleague/{id}', function ($id) {
        League::where('id', $id)->delete();
    });

    Route::get('/counter/{key?}', [
        GeneralController::class, 'getCounter'])->name('/counter')->middleware('auth');

    Route::get('/home', [
        GeneralController::class, 'adminHome',
    ])->name('home')->middleware('auth');

    Route::get('/admins', [
        GeneralController::class, 'allAdmin',
    ])->name('admins')->middleware('auth');

    Route::get('/adminlogin', [
        GeneralController::class, 'adminHome',
    ])->name('home')->middleware('auth');

    Route::get('/dpupload', [
        GeneralController::class, 'adminHome',
    ])->middleware('auth');

    Route::get('/unSubscribe/{id?}', [
        UserController::class, 'getDeactivate',

    ])->name('/unSubscribe')->middleware('auth');

    Route::get('/smsunSubscribe/{id?}', [
        SMScontroller::class, 'getDeactivate',
    ])->name('/smsunSubscribe')->middleware('auth');

    Route::get('/bulkmail', [
        UserController::class, 'bulkMail',
    ])->name('bulkMail')->middleware('auth');

    Route::get('/bulkActive', [
        UserController::class, 'bulkActive',
    ])->name('/bulkActive')->middleware('auth');

    Route::get('/bulkExpired', [
        UserController::class, 'bulkExpired',
    ])->name('/bulkExpired')->middleware('auth');

    Route::get('/individualMail', [
        UserController::class, 'individualMail',
    ])->name('/individualMail')->middleware('auth');

    Route::get('/AllSms', [
        SMScontroller::class, 'allsms',

    ])->name('/AllSms')->middleware('auth');

    Route::get('/SmsMembers', [
        SMScontroller::class, 'getSmsMembers',

    ])->name('/SmsMembers')->middleware('auth');

    Route::get('/ActiveSmsMembers', [
        SMScontroller::class, 'getActiveSmsMembers',

    ])->name('/ActiveSmsMembers')->middleware('auth');

    Route::get('/ExpiredSmsMembers', [
        SMScontroller::class, 'getExpiredSmsMembers',

    ])->name('/ExpiredSmsMembers')->middleware('auth');

    Route::post('/submitSms', [
        SMScontroller::class, 'sendSms',

    ])->name('/submitSms')->middleware('auth');

    Route::post('/sortSmsMembers', [
        SMScontroller::class, 'smsmembers',

    ])->name('/sortSmsMembers')->middleware('auth');
    Route::get('/coverupload', function () {
        return view('/blogs');
    });

    Route::get('/logout', [
        AccountController::class, 'adminLogout',
    ])->name('logout');

    Route::post('/adminLogin', [
        AccountController::class, 'adminSignIn',
    ])->name('/adminLogin');

    Route::get('/loginOperationOk/{id?}', [
        AccountController::class, 'loginOperationOk',
    ])->name('/loginOperationOk');

    Route::get('/dashboard', [
        GeneralController::class, 'getHome',
    ])->name('/dashboard')->middleware('auth');

    Route::post('/loadleague', [
        GeneralController::class, 'newLeague',
    ])->name('loadleague')->middleware('auth');

    Route::post('/loadPrediction', [
        PredictionController::class, 'postNewPrediction',
    ])->name('/loadPrediction')->middleware('auth');

    Route::get('/newBookingCode', [
        PredictionController::class, 'getNewBookingCode',
    ])->name('/newBookingCode')->middleware('auth');

    Route::get('/bookingCodes', [
        PredictionController::class, 'getBookingCode',
    ])->name('/bookingCodes')->middleware('auth');

    Route::get('/trashBookingCode/{id?}', [
        PredictionController::class, 'getTrashBookingCode',

    ])->name('/trashBookingCode');

    Route::post('/newBookingCode', [
        PredictionController::class, 'postNewBookingCode',

    ])->name('/newBookingCode')->middleware('auth');

    Route::get('/newPrediction', [
        PredictionController::class, 'getNewPrediction',
    ])->name('/newPrediction')->middleware('auth');

    Route::get('/newVIPPrediction', [
        PredictionController::class, 'getNewVIPPrediction',
    ])->name('/newVIPPrediction')->middleware('auth');

    Route::get('/nblog', [
        BlogController::class, 'newBlog',
    ])->name('nblog')->middleware('auth');

    Route::get('/newads', [
        GeneralController::class, 'newAds',
    ])->name('newads')->middleware('auth');

    Route::get('/deleteSponsor/{id?}', [
        GeneralController::class, 'getDeleteSponsor',
    ])->name('/deleteSponsor')->middleware('auth');

    Route::get('/editSponsor/{id?}', [
        GeneralController::class, 'getEditSponsor',
    ])->name('/editSponsor')->middleware('auth');

    Route::post('/postEditSponsor/{id?}', [
        GeneralController::class, 'postEditSponsor',
    ])->name('/postEditSponsor')->middleware('auth');

    Route::get('/sponsored_ads', [
        GeneralController::class, 'getSponsoredAds',
    ])->name('/sponsored_ads')->middleware('auth');

    Route::post('/addSponsor', [
        GeneralController::class, 'postSponsoredAds',
    ])->name('/addSponsor')->middleware('auth');

    Route::get('/newAdwords', [
        GeneralController::class, 'newAdwords',
    ])->name('/newAdwords')->middleware('auth');

    Route::get('/loadleague', [
        GeneralController::class, 'loadLeague',
    ])->name('loadleague')->middleware('auth');

    Route::get('/manageleague', [
        GeneralController::class, 'manageLeague',
    ])->name('manageleague')->middleware('auth');

    Route::get('/manageads', [
        GeneralController::class, 'manageAds',
    ])->name('manageads')->middleware('auth');

    Route::get('/predictions', [
        PredictionController::class, 'getPredictions',
    ])->name('/predictions')->middleware('auth');

    Route::get('/tennis', [
        PredictionController::class, 'getTennis',
    ])->name('/tennis')->middleware('auth');

    Route::get('/basketball', [
        PredictionController::class, 'getBasketball',
    ])->middleware('auth')->name('/basketball');

    Route::get('/handball', [
        PredictionController::class, 'getHandball',
    ])->name('/handball')->middleware('auth');

    Route::get('/ice_hockey', [
        PredictionController::class, 'getIceHockey',
    ])->name('/ice_hockey')->middleware('auth');

    Route::get('/VIPpredictions', [
        PredictionController::class, 'getVIPPredictions',
    ])->name('/VIPpredictions')->middleware('auth');
    //
    Route::get('/archive', [
        PredictionController::class, 'archives',
    ])->name('/archive')->middleware('auth');

    Route::get('/testimonials', [
        PredictionController::class, 'allTestimonials',
    ])->name('/testimonials')->middleware('auth');

    Route::get('/blogs', [
        BlogController::class, 'allBlogs'
    ])->name('blogs')->middleware('auth');

    Route::get('/flagged', [
        GeneralController::class, 'flaggedEvents'
    ])->name('flagged')->middleware('auth');

    Route::get('/disabled', [
        GeneralController::class, 'disabledEvents'
    ])->name('disabled')->middleware('auth');

    Route::get('/newMember', [
        UserController::class, 'getNewMember'
    ])->name('/newMember')->middleware('auth');

    Route::post('/newMember', [
        UserController::class, 'postNewMember'
    ])->name('/newMember')->middleware('auth');

    Route::get('/allmembers', [
        UserController::class, 'allUsers'
    ])->name('allmembers')->middleware('auth');

    Route::post('/searchMember', [
        UserController::class, 'postSearchMember'
    ])->name('/searchMember')->middleware('auth');

    Route::post('/searchSmsMember', [
        SMScontroller::class, 'postSearchMember'
    ])->name('/searchSmsMember')->middleware('auth');

    Route::get('/searchSmsMember', [
        SMScontroller::class, 'getSearchMember'
    ])->name('/searchSmsMember')->middleware('auth');

    Route::get('/searchMember', [
        UserController::class, 'getSearchMember'
    ])->name('/searchMember')->middleware('auth');

    Route::get('/subscribed', [
        UserController::class, 'subscribedUsers'
    ])->name('/subscribed')->middleware('auth');

    Route::get('/expired', [
        UserController::class, 'expiredUsers'
    ])->name('/expired')->middleware('auth');

    Route::get('/dmembers', [
        UserController::class, 'disabledUsers'
    ])->name('dmembers')->middleware('auth');

    Route::get('/fmembers', [
        UserController::class, 'flaggedUsers'
    ])->name('fmembers')->middleware('auth');

    Route::get('/slidenote', [
        GeneralController::class, 'upcomingLeague'
    ])->name('slidenote')->middleware('auth');

    Route::get('/notemanage', [
        GeneralController::class, 'manageNotification'
    ]);

    Route::get('/perthreeacct', [
        GeneralController::class, 'perThreeAccounts',
        'as' => 'perthreeacct',
        'middleware' => 'auth',
    ]);

    Route::get('/annual', [
        GeneralController::class, 'annualAccounts',
        'as' => 'annual',
        'middleware' => 'auth',
    ]);

    Route::get('/dormant', [
        GeneralController::class, 'dormantAccounts',
        'as' => 'dormant',
        'middleware' => 'auth',
    ])->name('notemanage')->middleware('auth');

    Route::get('/systemRefresh', [
        UserController::class, 'systemRefresh'
    ])->name('systemRefresh')->middleware('auth');

    Route::get('/planManager', [
        GeneralController::class, 'planManager'
    ])->name('/planManager')->middleware('auth');

    Route::get('/SmsplanManager', [
        SMScontroller::class, 'planManager'
    ])->name('/SmsplanManager')->middleware('auth');

    Route::get('/feedbackLoader', [
        GeneralController::class, 'feedbackLoader'
    ])->name('/feedbackLoader')->middleware('auth');

    Route::get('/sliderManager', [
        GeneralController::class, 'sliderManager'
    ])->name('/sliderManager')->middleware('auth');

    Route::get('/shotManager', [
        GeneralController::class, 'shotManager'

    ])->name('/shotManager')->middleware('auth');

    Route::get('/deleteImage/{id?}', [
        GeneralController::class, 'getDeleteImage'
    ])->name('/deleteImage')->middleware('auth');

    Route::get('/getGallery', [
        GeneralController::class, 'getGallery'
    ])->name('/getGallery')->middleware('auth');

    Route::post('/uploadGallery', [
        GeneralController::class, 'postUploadGallery'
    ])->name('/uploadGallery')->middleware('auth');

    Route::post('/dpupload', [
        GeneralController::class, 'dpUpload'
    ])->name('dpupload')->middleware('auth');

    Route::post('/blogs', [
        BlogController::class, 'dpImageUpload',

    ])->name('coverupload')->middleware('auth');

    Route::post('/newBlog', [
        BlogController::class, 'newBlogPost',
    ])->name('/newBlog')->middleware('auth');

    Route::post('/newAds', [
        GeneralController::class, 'newAdsPost',
    ])->name('/newAds')->middleware('auth');

    Route::post('/newAdwords', [
        GeneralController::class, 'postAdwords',
    ])->name('/newAdwords')->middleware('auth');

    Route::post('/sliderManager', [
        GeneralController::class, 'newSlider',
    ])->name('sliderManager')->middleware('auth');

    Route::post('/shotManager', [
        GeneralController::class, 'newShot',
    ])->name('shotManager')->middleware('auth');

    Route::post('/slidenote', [
        GeneralController::class, 'newSlideNote',
    ])->name('slidenote')->middleware('auth');

    //AJAX ROUTES
    Route::get('/admincontrol/{admincode?}', [
        GeneralController::class, 'ajaxAdminControl',
    ])->name('admincontrol')->middleware('auth');

    Route::get('/gamedetails/{gamecode?}/{datain?}', [
        PredictionController::class, 'ajaxGameDetail',
    ])->name('/gamedetails')->middleware('auth');

    Route::get('/blogdetails/{blogcode}', [
        BlogController::class, 'ajaxBlogDetail',
    ])->name('blogdetails')->middleware('auth');

    Route::get('/updateprediction/{gid?}/{datain?}', [
        PredictionController::class, 'ajaxGameUpdate',
    ])->name('/updateprediction')->middleware('auth');

    Route::get('/updateVIPprediction/{gid?}/{datain?}', [
        PredictionController::class, 'ajaxVIPGameUpdate',
    ])->name('/updateVIPprediction')->middleware('auth');

    Route::get('/updateuserinfo/{uid}', [
        UserController::class, 'ajaxUserUpdate',
    ])->name('updateuserinfo')->middleware('auth');

    Route::get('/updatephonenumber/{uid}', [
        SMScontroller::class, 'ajaxUserUpdate',
    ])->name('updatephonenumber')->middleware('auth');

    Route::get('/userdetails/{uid}', [
        UserController::class, 'ajaxUserInfo',
    ])->name('userdetails')->middleware('auth');

    Route::get('/smsuserdetails/{uid}', [
        SMScontroller::class, 'smsajaxUserInfo',
    ])->name('/smsuserdetails')->middleware('auth');

    Route::get('/upgradeuseracct/{uid}', [
        UserController::class, 'upgradeAccount',
    ])->name('upgradeuseracct')->middleware('auth');

    Route::get('/smsupgradeuseracct/{uid}', [
        SMScontroller::class, 'upgradeAccount',
    ])->name('smsupgradeuseracct')->middleware('auth');

    Route::get('/updateblog/{bid}', [
        BlogController::class, 'ajaxBlogUpdate',
    ])->middleware('auth')->name('updateblog');

    Route::get('/updateads/{aid}', [
        GeneralController::class, 'ajaxAdsUpdate',
    ])->name('updateads')->middleware('auth');

    Route::get('/addresult/{id?}', [
        PredictionController::class, 'ajaxAddResult',
    ])->name('/addresult')->middleware('auth');

    Route::get('/ajaxusersetting/{userid}', [
        GeneralController::class, 'ajaxUserSetting',
    ])->name('usersettings')->middleware('auth');

    Route::get('/marktestimonial/{id}', function ($id, Prediction $prediction) {
        $game = $prediction->getPrediction($id);
        return view('ajaxfiles.marktestimonial', ['game' => $game]);
    });

    Route::get('/otherftrec/{id}', function ($id) {
        $game = Prediction::where('id', $id)->first();
        return view('ajaxfiles.otherft', ['game' => $game]);
    });

    Route::get('/planEditor/{id}', function ($id) {
        $plan = Subscription::where('id', $id)->first();
        return view('ajaxfiles.planEditor', ['plan' => $plan]);
    });
    Route::get('/smsplanEditor/{id}', function ($id) {
        $plan = Sms_subscription::where('id', $id)->first();
        return view('ajaxfiles.smsplanEditor', ['plan' => $plan]);
    });

    Route::get('/sliderLoader', function () {
        $texts = Textslider::all()->sortByDesc('id');
        return view('ajaxfiles.textRotator', ['texts' => $texts]);
    });

    Route::get('/approvedLoader', function () {
        $data1 = Feedback::where('approve', '1')->orderBy('updated_at', 'DESC')->get();
        return view('ajaxfiles.approvedFeed', ['data1' => $data1]);
    });

    Route::get('/unmarktestimonial/{id?}/{datain?}', function ($id, $datain) {
        if ($datain == 'Prediction') {
            Prediction::where('id', $id)->update(['testimonial' => '']);
        } else {
            Archive::where('id', $id)->update(['testimonial' => 0]);
        }
        return "DONE";
    });

    Route::get('/ajaxhide/{id?}/{datain?}', function ($id, $datain) {
        if ($datain == 'Prediction') {
            Prediction::where('id', $id)->update(['display' => 1]);
        } else {

            Archive::where('id', $id)->update(['display' => 1]);
        }
        return "DONE";
    })->name('/ajaxhide');

    Route::get('/ajaxunhide/{id?}/{datain?}', function ($id, $datain) {
        if ($datain == 'Prediction') {
            Prediction::where('id', $id)->update(['display' => 0]);
        } else {
            Archive::where('id', $id)->update(['display' => 0]);
        }
        return "DONE";
    })->name('/ajaxunhide');

    Route::get('/ajaxhideblog/{id}', function ($id) {
        Blog::where('id', $id)->update(['status' => 'Draft']);
        return "DONE";
    });

    Route::get('/ajaxunhideblog/{id}', function ($id) {
        Blog::where('id', $id)->update(['status' => 'Publish']);
        return "DONE";
    });

    Route::get('/ajaxhidead/{id}', function ($id) {
        Ad::where('id', $id)->update(['status' => '1']);
        return "DONE";
    });

    Route::get('/ajaxunhidead/{id}', function ($id) {
        Ad::where('id', $id)->update(['status' => '0']);
        return "DONE";
    });

    Route::get('/flaguser/{id}', function ($id) {
        User::where('id', $id)->update(['flag' => '1']);
        return "DONE";
    });

    Route::get('/unflaguser/{id}', function ($id) {
        User::where('id', $id)->update(['flag' => '0']);
        return "DONE";
    });

    Route::get('/disableuser/{id}', function ($id) {
        User::where('id', $id)->update(['status' => '1']);
        return "DONE";
    });

    Route::get('/enableuser/{id}', function ($id) {
        User::where('id', $id)->update(['status' => '0']);
        return "DONE";
    });

    Route::get('/ajaxnotedelete/{id}', function ($id) {
        $note = Notification::where('id', $id)->first();
        unlink('images/notification/' . $note->note_image);
        Notification::where('id', $id)->delete();
        return $id;
    });
//
    Route::get('/archiveGame/{id}', [
        PredictionController::class, 'archiveGame',
    ])->name('archiveGame')->middleware('auth');

    Route::get('/unarchiveGame/{id}', [
        PredictionController::class, 'unarchiveGame',
    ])->middleware('auth')->name('/archiveGame');

    Route::get('/trashSlide/{id}', function ($id) {
        $slide = Slider::where('id', $id)->first();
        unlink('images/slider/' . $slide->path);
        Slider::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashMunch/{id}', function ($id) {
        $slide = Shot::where('id', $id)->first();
        unlink('images/munch/' . $slide->path);
        Shot::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashAdmin/{id}', function ($id) {
        \App\System::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashUser/{id}', function ($id) {
        \App\User::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashText/{id}', function ($id) {
        Textslider::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashFeed/{id}', function ($id) {
        Feedback::where('id', $id)->delete();
        return $id;
    });

    Route::get('/publishFeed/{id}', function ($id) {
        Feedback::where('id', $id)->update(['approve' => '1']);
        return $id;
    });

    Route::get('/unpublishFeed/{id}', function ($id) {
        Feedback::where('id', $id)->update(['approve' => '0']);
        return $id;
    });

    Route::post('/ajaxupdatepassword', [
        GeneralController::class, 'ajaxUpdatePassword',
        // 'as' => '',
    ])->name('ajaxupdatepassword')->middleware('auth');

    Route::post('/ajaxupdatecontrol', [
        GeneralController::class, 'ajaxUpdateControl',
    ])->name('ajaxupdatecontrol')->middleware('auth');

    Route::post('/ajaxuserinfo', [
        UserController::class, 'ajaxUserInfoUpdate',
    ])->name('ajaxuserinfo')->middleware('auth');

    Route::post('/AddPhone', [
        SMScontroller::class, 'ajaxUserInfoUpdate',
    ])->name('AddPhone')->middleware('auth');

    Route::post('/AddSmsPlan', [
        SMScontroller::class, 'addsmsplans',
    ])->name('AddSmsPlan')->middleware('auth');

    // AddSmsPlan

    Route::post('/ajaxuserpassword', [
        UserController::class, 'ajaxUserPasswordUpdate',
    ])->name('ajaxuserpassword')->middleware('auth');

    Route::post('/ajaxGameUpdate/{id?}/{dataIn?}', [
        PredictionController::class, 'postGameUpdate',
    ])->name('/ajaxGameUpdate')->middleware('auth');

    Route::post('/ajaxVIPGameUpdate/{id?}/{dataIn?}', [
        PredictionController::class, 'postVIPGameUpdate',
    ])->name('/ajaxVIPGameUpdate')->middleware('auth');

    Route::post('/ajaxBlogUpdate/{id?}/{image?}', [
        BlogController::class, 'postBlogUpdate',
    ])->name('/ajaxBlogUpdate')->middleware('auth');

    Route::post('/manageads', [
        GeneralController::class, 'AdvertUpdate',
    ])->name('manageads')->middleware('auth');

    Route::post('/ajaxTestimonial', [
        PredictionController::class, 'ajaxTestimonial',
    ])->name('/ajaxTestimonial')->middleware('auth');

    Route::post('/ajaxotherft', [
        GeneralController::class, 'ajaxOtherRec',
    ])->name('ajaxotherft')->middleware('auth');

    Route::post('/addResult', [
        PredictionController::class, 'postAddResult',
    ])->name('/addResult')->middleware('auth');

    Route::post('/ajaxusersetting', [
        UserController::class, 'ajaxUserUpdate',
    ])->name('updates')->middleware('auth');

    Route::post('/acctupgrade', [
        UserController::class, 'accountUpgrade',
    ])->name('/acctupgrade')->middleware('auth');

    Route::post('/smsacctupgrade', [
        SMScontroller::class, 'accountUpgrade',
    ])->name('/smsacctupgrade')->middleware('auth');

    Route::post('/ajaxadminsetting', [
        GeneralController::class, 'ajaxAdminUpdate',
    ])->name('adminupdate');

    Route::post('/ajaxnewadmin', [
        GeneralController::class, 'ajaxNewAdmin',
    ])->name('/ajaxnewadmin')->middleware('auth');

    Route::get('/ajaxgamedelete/{id?}/{finder?}', [
        PredictionController::class, 'ajaxGameDelete',
    ])->name('/ajaxgamedelete')->middleware('auth');

    Route::get('/ajaxblogdelete/{id?}', [
        BlogController::class, 'ajaxBlogDelete',
    ])->name('/ajaxblogdelete')->middleware('auth');

    Route::get('/adDelete/{id?}', [
        GeneralController::class, 'ajaxAdsDelete',
    ])->name('/adDelete')->middleware('auth');

    Route::post('/ajaxuserdelete', [
        UserController::class, 'ajaxUserDelete',
    ])->name('ajaxuserdelete')->middleware('auth');

    Route::post('/demomail', [
        GeneralController::class, 'sendDemo',
    ])->name('demomail')->middleware('auth');

    Route::post('/bulkMail', [
        UserController::class, 'sendBulk',
    ])->name('/bulkMail')->middleware('auth');

    Route::post('/bulkmailActive', [
        UserController::class, 'bulkmailActive',
    ])->name('bulkmailActive')->middleware('auth');

    Route::post('/bulkmailExpired', [
        UserController::class, 'bulkmailExpired',
    ])->name('bulkmailExpired')->middleware('auth');

    Route::post('/individualMail', [
        UserController::class, 'individualMailer',
    ])->name('individualMail')->middleware('auth');

    Route::post('/planUpdater', [
        GeneralController::class, 'planUpdater',
    ])->name('planUpdater')->middleware('auth');

    Route::post('/smsplanUpdater', [
        SMScontroller::class, 'planUpdater',
    ])->name('smsplanUpdater')->middleware('auth');

    Route::get('/DeleteSmsPlan/{id?}', [
        SMScontroller::class, 'deleteplan',
    ])->name('DeleteSmsPlan')->middleware('auth');
    Route::post('/newTextRotate', [
        GeneralController::class, 'newTextRotate',
    ])->name('/newTextRotate')->middleware('auth');

    Route::post('/bonusSubscribed', [
        UserController::class, 'postBonusSubscribed',
    ])->name('/bonusSubscribed')->middleware('auth');

    Route::post('/bonusLapsed', [
        UserController::class, 'postBonusLapsed',
    ])->name('/bonusLapsed')->middleware('auth');

    Route::post('/archiveMass', [
        GeneralController::class, 'postArchiveMass',
    ])->name('/archiveMass')->middleware('auth');

    Route::match(['get', 'post'], '/promotions', [
        PromotionController::class, 'getPromotion',
        'as' => '/promotions',
        'middleware' => 'auth',
    ]);

    Route::get('/createPromotion', function () {
        return view('createPromotion');
    })->name('/createPromotion');

    Route::get('/editPromotion/{id?}', [
        PromotionController::class, 'editPromotion',
    ])->name('/editPromotion')->middleware('auth');

    Route::get('/deletePromotion/{id?}', [
        PromotionController::class, 'trashPromotion',
    ])->name('/deletePromotion')->middleware('auth');

    Route::get('/viewProm/{id?}', [
        PromotionController::class, 'viewProm',
    ])->name('/viewProm')->middleware('auth');

    Route::get('/activeGameStat/{value?}', [
        GeneralController::class, 'activeGameStatus',
    ])->name('/activeGameStat')->middleware('auth');

});

//$end = date('d-m-Y',strtotime('+1 year'));
//echo "$end<br>";
//
//$t = strtotime('25 June 2016');
//
//$d = date('r', $t);
//$s = substr($d, 0, 3);
//echo "$s";
//
//Route::post('/ajaxeventdelete', function (){
//    if(Request::ajax()){
//        return Response::json(Request::all());
//    }
//});
