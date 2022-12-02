<?php

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
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HockeyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RavesController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SMScontroller;
// use App\Http\Controllers\SMSpaystack;
use App\Http\Controllers\SMSrave;
use App\Http\Controllers\SMSvoyage;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TennisController;
use App\Http\Controllers\VoguepayController;

// use App\Http\Controllers\

$path = url('/admin/images');

$localPath = url('/images');
$contactmail = 'Passionpredict@gmail.com';
$advertmail = 'advert@Passionpredict.com';
$callno = '2348188628470';
$whatsappno = '2348188628470';
$telegramlink = '';
$skypelink = '';
$facebooklink = "";
$twitterlink = "";
$bitcoin = "18kQi8qSdPKhrLj9KHeSgLHyok1tvB94A9";
$bankname = "Access Bank";
$bankaccountname = ' Mbuotidem Akpan';
$bankaccountno = "0097345869";
$mpesa_no = "0706272207";
$mpesa_name = "John Murithi";
$ghana_no = "+233547187157";
$ghana_name = "David Agyevi";
$south_africa_bank = ['bank' => 'Capitec Bank', 'no' => 1383649934, 'name' => 'Tamsanqa Matshitshi'];

$zambia_no = "+254783719791";
$zambia_name = "John";

View::share(['path' => $path, 'localPath' => $localPath, 'contactmail' => $contactmail, 'advertmail' => $advertmail,
    'callno' => $callno, 'whatsappno' => $whatsappno, 'telegramlink' => $telegramlink,
    'skypelink' => $skypelink, 'facebooklink' => $facebooklink, 'twitterlink' => $twitterlink,
    'bankname' => $bankname, 'bankaccountname' => $bankaccountname, 'bankaccountno' => $bankaccountno, 'bitcoin' => $bitcoin, 'mpesa_no' => $mpesa_no, 'mpesa_name' => $mpesa_name, 'ghana_no' => $ghana_no, 'ghana_name' => $ghana_name, 'south_africa_bank' => $south_africa_bank]);

Route::get('/', [
    PublicController::class, 'getHome'])->name('/');

Route::get('/news', [PublicController::class, 'getNews',
])->name('/news');

Route::get('/fetchInv', function () {
    return view('partials.invResults');
})->name('/fetchInv');

Route::get('/about-us', function () {
    return view('about');
})->name('/about-us');

Route::get('/refund-policy', function () {
    return view('refund');
})->name('/refund-policy');

Route::get('/1xbet', function () {
    return view('1xbet');
})->name('/1xbet');

Route::get('/gibet', function () {
    return view('gibet');
})->name('/gibet');

Route::get('/partners', function () {
    return view('partner');
});
Route::get('/blog', function () {
    return view('newblog');
});
Route::get('/blog/{slug?}', [
    PublicController::class, 'getBlog',
])->name('/blog-view');
Route::get('/currency_converter', function () {
    return view('converter.index');
})->name('/currency_converter');

Route::get('/activation/{email?}', [AccountController::class, 'getActivation',
])->name('/activation');

Route::get('/verify/{email?}/{code?}', [AccountController::class, 'getVerify',
])->name('/verify');

Route::post('/resendActivation', [AccountController::class, 'postResendActivation',
])->name('/resendActivation');

Route::get('/bet_offers', function () {
    return view('offers');
})->name('/bet_offers');

Route::get('/terms', function () {
    return view('terms');
})->name('/terms');

Route::get('/disclaimer', function () {
    return view('disclaimer');
})->name('/disclaimer');

Route::get('/league_table', function () {
    return view('league');
})->name('/league_table');

Route::get('/contact-us', function () {
    return view('contact');
})->name('/contact-us');

Route::post('/contact', [PublicController::class, 'postContact',
])->name('/contact');

Route::get('/dump_cl/{offset?}/{take?}', [PublicController::class, 'get_Cl',
])->name('/dump_cl');

Route::post('/wuForm', [PublicController::class, 'postWUForm',
])->name('/wuForm');

Route::get('/register', function () {
//    return redirect('https://www.victorspredict.com/social');
    return view('register');
    // return redirect('/');
})->name('/register');

Route::get('/login/{res?}', function () {
//    return redirect('https://www.victorspredict.com/social');
    if (currentUser()) {
        return redirect('/dashboard');
    } else {
        return view('login');
    }

})->name('/login');

Route::post('/register', [AccountController::class, 'postRegister',
])->name('/register');

Route::post('/login', [AccountController::class, 'postLogin',
])->name('/login');

Route::get('/reset', function () {
    return view('resetPassword');
})->name('/reset');

Route::post('/resetPassword', [ResetController::class, 'postReset',
])->name('/resetPassword');

Route::post('/resetPasswordNow', [ResetController::class, 'postResetPassword',
])->name('/resetPasswordNow');

Route::get('/resetPassword/{email?}/{code?}', [ResetController::class, 'getReset',
])->name('/resetPassword');

Route::get('/logout', [AccountController::class, 'getLogout',
])->name('/logout');

Route::get('/tip-stores', function () {
    return view('stores');
})->name('/tip-stores');

Route::get('/archives', [PredictionController::class, 'getArchive'])->name('/archives');

Route::get('/packages/{country?}', [
    PublicController::class, 'getPricing'])->name('/pricing');

Route::get('3_5_goals', [
    PredictionController::class, 'getOver35'])->name('3_5_goals');

Route::get('0_5_ht', [
    PredictionController::class, 'getOver05'])->name('0_5_ht');

Route::get('/Jackpot/{country?}', [
    PublicController::class, 'getJackpot'])->name('/jackpot');
Route::get('/smspricing', [
    SMScontroller::class, 'getPricing'])->name('/smspricing');

Route::get('/how_to_pay/{country?}', [
    PublicController::class, 'getHowPay'])->name('/how_to_pay');

Route::post('/select_country', [
    PublicController::class, 'postCountry'])->name('/select_country');

Route::get('/select_country', function () {
    return view('country');
})->name('/select_country');

Route::get('/pay/{category?}/{title?}', [
    PaymentController::class, 'getPayment',
])->middleware('sentinelAuth')->name('/pay');
Route::get('/smspay/{category?}/{title?}', [
    PaymentController::class, 'getSmsPayment',
])->middleware('sentinelAuth')->name('/smspay');

Route::get('/smspaystack/{subID?}/{code?}', [
    SMSpaystack::class, 'getPaymentStatus',
])->middleware('sentinelAuth')->name('/smspaystack');

Route::get('/smsvoguepay/{transactionID?}/{planID?}', [
    SMSvoyage::class, 'processPayment'])->name('/smsvoguepay')->middleware('sentinelAuth');

Route::get('/smsrave/{id?}/{txRef?}', [
    SMSrave::class, 'getFinish',
])->middleware('sentinelAuth')->name('/smsrave');
Route::get('/gsmsrave/{id?}/{txRef?}', [
    SMSrave::class, 'getrbetFinish',
])->middleware('sentinelAuth')->name('/gsmsrave');

Route::post('/sendOTP', [
    SMScontroller::class, 'postVerify',
])->middleware('sentinelAuth')->name('/sendOTP');

Route::group(['prefix' => 'basketball'], function () {

    Route::get('/', [
        'BasketBallController@getIndex',
    ])->name('/basketball/');
});

Route::group(['prefix' => 'tennis'], function () {
    Route::get('/', [
        TennisController::class, 'getIndex',
    ])->name('/tennis/');
});

Route::group(['prefix' => 'handball'], function () {
    Route::get('/', [
        HandballController::class, 'getIndex',
    ])->name('/handball/');
});

Route::group(['prefix' => 'ice-hockey'], function () {
    Route::get('/', [
        HockeyController::class, 'getIndex',
    ])->name('/ice-hockey');
});
Route::get('/SmsActivation', [SMScontroller::class, 'GetActivation'])
    ->name('/SmsActivation')->middleware('sentinelAuth');

Route::get('/SmsVerify', [SMScontroller::class, 'GetVerify'])
    ->name('/SmsVerify')->middleware('sentinelAuth');

Route::post('/SmsCodeVerify', [SMScontroller::class, 'verifyCode'])
    ->name('/SmsCodeVerify')->middleware('sentinelAuth');

Route::get('/SmsHome', [SMScontroller::class, 'GetHome'])
    ->name('/SmsHome')->middleware('sentinelAuth');

Route::get('/details', function () {

    $ip = '50.90.0.1';
    $data = \Location::get($ip);
    dd($data);

});

Route::group(['prefix' => 'social'], function () {
//    Route::get('/', [
    //         SocialMediaController::class,'getIndex'
    //    ])->name('/social');

    Route::get('/profile', [
        SocialMediaController::class, 'getProfile',
    ])->name('/social/profile')->middleware('sentinelAuth');

    Route::get('/user/{id?}/{name?}', [
        SocialMediaController::class, 'getUserPage',
    ])->name('/social/user')->middleware('sentinelAuth');

    Route::get('/timeline', [
        SocialMediaController::class, 'getTimeline',
    ])->name('/social/timeline')->middleware('sentinelAuth');

    Route::get('/follow_people', [
        SocialMediaController::class, 'getPeople',
    ])->name('/social/follow_people')->middleware('sentinelAuth');

    Route::get('/follow_user/{id?}', [
        SocialMediaController::class, 'get_follow_user',
    ])->name('/social/follow_user')->middleware('sentinelAuth');

    Route::get('/unfollow_user/{id?}', [
        SocialMediaController::class, 'get_unfollow_user',
    ])->name('/social/unfollow_user')->middleware('sentinelAuth');

    Route::get('/edit_profile', [
        SocialMediaController::class, 'get_edit_profile',
    ])->name('/social/edit_profile')->middleware('sentinelAuth');

    Route::get('/fetch_posts/{index?}', [
        SocialMediaController::class, 'get_fetch_posts',
    ])->name('/social/fetch_posts')->middleware('sentinelAuth');

    Route::get('/fetch_my_posts/{id?}', [
        SocialMediaController::class, 'get_fetch_my_posts',
    ])->name('/social/fetch_my_posts')->middleware('sentinelAuth');

    Route::get('/followers/{id?}/{name?}', [
        SocialMediaController::class, 'get_followers',
    ])->name('/social/followers')->middleware('sentinelAuth');

    Route::get('/following/{id?}/{name?}', [
        SocialMediaController::class, 'get_following',
    ])->name('/social/following')->middleware('sentinelAuth');

    Route::get('/like_post/{id?}', [
        SocialMediaController::class, 'get_like_post',
    ])->name('/social/like_post')->middleware('sentinelAuth');

    Route::get('/delete_comment/{id?}', [
        SocialMediaController::class, 'get_delete_comment',
    ])->name('/social/delete_comment')->middleware('sentinelAuth');

    Route::get('/delete_post/{id?}', [
        SocialMediaController::class, 'get_delete_post',
    ])->name('/social/delete_post')->middleware('sentinelAuth');

    Route::get('/toggle_comment/{id?}/{key?}', [
        SocialMediaController::class, 'get_toggle_comment',
    ])->name('/social/toggle_comment')->middleware('sentinelAuth');

    Route::get('/post/{id?}', [
        SocialMediaController::class, 'get_post',
    ])->name('/social/post')->middleware('sentinelAuth');

    Route::post('/share_story', [
        SocialMediaController::class, 'post_share_story',
    ])->name('/social/share_story')->middleware('sentinelAuth');

    Route::post('/share_post', [
        SocialMediaController::class, 'post_share_post',
    ])->name('/social/share_post')->middleware('sentinelAuth');

    Route::post('/post_comment', [
        SocialMediaController::class, 'post_comment',
    ])->name('/social/post_comment')->middleware('sentinelAuth');

    Route::get('/search', [
        SocialMediaController::class, 'post_search',
    ])->name('/social/search')->middleware('sentinelAuth');
});

Route::get('/dashboard', [
    PortalController::class, 'getHome',
])->middleware('sentinelAuth')->name('/portal/home');

Route::get('/profile/update', [
    PortalController::class, 'getUpdateProfile',
])->middleware('sentinelAuth')->name('/portal/update');

Route::get('/make_payment', [
    PortalController::class, 'getMakePayment',
])->middleware('sentinelAuth')->name('/portal/make_payment');

Route::post('/profile/update', [
    PortalController::class, 'postUpdateProfile',
])->middleware('sentinelAuth')->name('/portal/update');

Route::get('/profile/country', [
    PortalController::class, 'changeCoutry',
])->middleware('sentinelAuth')->name('/country');

Route::get('/double_chance', [
    PredictionController::class, 'getDoubleChance'])->name('/double_chance');

Route::get('/over_15_goals', [
    PredictionController::class, 'getOver15'])->name('/over_15_goals');

Route::get('/over_25_goals', [
    PredictionController::class, 'getOver25'])->name('/over_25_goals');
Route::get('/big_odds', [
    PredictionController::class, 'getBigOdds'])->name('/big_odds');

Route::get('/btts_gg', [
    PredictionController::class, 'getBTTS'])->name('/btts_gg');

Route::get('/over_05_halftime', [
    PredictionController::class, 'getOver05HT'])->name('/over_05_halftime');

Route::get('/draw_no_bet', [
    PredictionController::class, 'getDNB'])->name('/draw_no_bet');

Route::get('/draws', [
    PredictionController::class, 'getDraws'])->name('/draws');

Route::get('/handicap', [
    PredictionController::class, 'getHandicap'])->name('/handicap');

Route::get('/banker_of_the_day', [
    PredictionController::class, 'getBanker'])->name('/banker_of_the_day');

Route::get('/aweh_goals', [
    PredictionController::class, 'getAweh'])->name('/aweh_goals');
Route::get('/hweh_goals', [
    PredictionController::class, 'getHweh'])->name('/hweh_goals');
Route::get('/hwin_goals', [
    PredictionController::class, 'getHwin'])->name('/hwin_goals');

//VIP

Route::get('/super_investment_tip', [
    PredictionController::class, 'getInvestmentTips'])->name('/super_investment_tip')->middleware(['sentinelAuth', 'investmentGuard']);

Route::get('/sureTwoToFiveOdds', [
    PredictionController::class, 'getSureTwoOdds'])->name('/sureTwoOdds')->middleware(['sentinelAuth', 'silverGuard']);

Route::get('/sureThreeOdds', [
    PredictionController::class, 'getSureThreeOdds'])->name('/sureThreeOdds')->middleware(['sentinelAuth', 'silverGuard']);

Route::get('/over35goals', [
    PredictionController::class, 'getOver35goals'])->name('/over35goals')->middleware(['sentinelAuth', 'silverGuard']);

Route::get('/super_singles', [
    PredictionController::class, 'getSuperSingles'])->name('/super_singles')->middleware(['sentinelAuth', 'silverGuard']);

Route::get('/sureFiveOddsPlus', [
    PredictionController::class, 'getSureFiveOdds'])->name('/sureFiveOdds')->middleware(['sentinelAuth', 'goldGuard']);

Route::get('/fifty_odds_plus', [
    PredictionController::class, 'getFiftyOdds'])->name('/fifty_odds_plus')->middleware(['sentinelAuth', 'goldGuard']);

Route::get('/weekend_tips', [
    PredictionController::class, 'getWeekendTips'])->name('/weekend_tips')->middleware(['sentinelAuth', 'goldGuard']);

Route::get('/ht_ft', [
    PredictionController::class, 'getHTFT'])->name('/ht_ft')->middleware(['sentinelAuth', 'goldGuard']);

Route::get('/paystack/{subID?}/{code?}', [PaystackController::class, 'getPaymentStatus'])->name('/paystack');

Route::get('/processPayment/{transactionID?}/{planID?}', [
    VoguepayController::class, 'processPayment'])->name('/processPayment');

//RAVE ROUTE
Route::get('/rave/{id?}/{txRef?}', [
    RavesController::class, 'getFinish'])->name('/rave');

Route::get('/grave/{id?}/{txRef?}', [
    RavesController::class, 'getrbetFinish'])->name('/grave');
//fix country issues
//Route::get('/fix/country','AccountController@updatecountryfailed');
Route::get('facebook', [SocialController::class, 'facebookRedirectToProvider'])->name('/facebook');
Route::get('facebook/callback', [SocialController::class, 'handleFacebookProviderCallback']);

Route::get('google', [SocialController::class, 'googleRedirectToProvider'])->name('/google');
Route::get('google/callback', [SocialController::class, 'handleGoogleProviderCallback']);

//PAYPAL ROUTES

// Post payment details for store/process API request
Route::get('/paypalPayment/{category?}/{plan?}', [PaypalController::class, 'store'])->name('/paypalPayment')->middleware('sentinelAuth');

// Handle status
Route::get('/payment/add-funds/paypal/status', [PaypalController::class, 'getPaymentStatus']);

// You can use "get" or "post" method below for payment..
Route::post('paypal', [PaypalController::class, 'postPayment']);

Route::get('/soccervista', [
    PublicController::class, 'getSoccerVista']);
Route::get('/predictz', [
    PublicController::class, 'getPredictz']);

Route::get('/betensured', [
    PublicController::class, 'getBetensured']);
Route::get('/football-predictions', [
    PublicController::class, 'getFootbalPredictions']);
Route::get('/forebet', [
    PublicController::class, 'getForebet']);
Route::get('/tips180', [
    PublicController::class, 'getTips180']);

Route::get('/statarea', [
    PublicController::class, 'getStatarea']);
Route::get('/soccer-prediction', [
    PublicController::class, 'getSoccerPrediction']);
Route::get('/pronostic/football', [
    PublicController::class, 'getPronostic',

]);

Route::get('/Cyberbet', [
    PublicController::class, 'Getcyberbet',

]);

Route::get('/testimonial', function () {

    return view('winning');

});
Route::get('/tips-store', function () {
    return view('stores');
})->name('stores_tips');

Route::get('/check', function () {
    return view('reset');
}
);
