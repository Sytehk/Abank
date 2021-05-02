<?php


Route::get('/cron-job', 'FrontendController@cron')->name('cron.job');

Route::get('/', 'FrontendController@home')->name('homePage');

Route::get('/latest-news/{id}/{slug}', 'FrontendController@singleBlog')->name('single.blog');
Route::get('/latest-news/', 'FrontendController@blog')->name('blog');
Route::get('/contact', 'FrontendController@contact')->name('contact');

Route::post('/contact', 'FrontendController@ContactSubmit')->name('ContactSubmit');

Route::post('/subscribe', 'FrontendController@subscribePost')->name('subscribePost');


Route::get('/change-lang/{lang}', 'FrontendController@changeLang')->name('lang');


Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminDashboardController@loginForm')->name('login');
    Route::post('/', 'AdminDashboardController@login')->name('login.post');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', 'AdminDashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'AdminDashboardController@profile')->name('profile');
    Route::post('profile', 'AdminDashboardController@profilePost')->name('profile.post');

    Route::get('change/password', 'AdminDashboardController@ChangePass')->name('change.password');
    Route::post('change/password', 'AdminDashboardController@ChangePassPost')->name('change.password.post');

    Route::get('logout', 'AdminDashboardController@logout')->name('logout');;


    // allUser//
    Route::get('allUser', 'AdminDashboardController@allUser')->name('allUser');
    route::get('bannedUsers', 'AdminDashboardController@bannedUser')->name('banned.user');
    Route::get('verifiedUsers', 'AdminDashboardController@verifiedUser')->name('verified.user');
    route::get('mobileUnverifiedUsers', 'AdminDashboardController@mobileUnverifiedUser')->name('mobile.unverified');
    route::get('emailUnverifiedUsers', 'AdminDashboardController@emailUnverifiedUser')->name('email.unverified');
    route::get('userDetails/{id}', 'AdminDashboardController@UserDetails')->name('userDetails');
    route::post('userDetailsUpdate', 'AdminDashboardController@UserDetailsUpdate')->name('userDetails.update');

    Route::get('/user/withdraw/report/{id}', 'AdminDashboardController@withdrawReport')->name('withdraw.report');
    Route::get('/user/transaction/report/{id}', 'AdminDashboardController@transactionReport')->name('transaction.report');
    Route::Post('/add/sub/{id}', 'AdminDashboardController@addSub')->name('add.sub');
    Route::Post('/send/mail/to/user/{id}', 'AdminDashboardController@sendMailToUser')->name('sendMailToUser');


    // settings//
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::get('changeCoverImage', 'SettingsController@changeCoverImage')->name('changeCoverImage');
    route::post('settings/update', 'SettingsController@generalUpdate')->name('general.settings');
    route::post('settings/update/CoverImage', 'SettingsController@updateCoverImage')->name('general.updateCoverImage');

    Route::get('settings-email', 'SettingsController@email')->name('settings.api');
    route::post('settings-email/update', 'SettingsController@emailUpdate')->name('email.settings');
    Route::get('settings-sms-api', 'SettingsController@smsApi')->name('settings.sms.api');
    route::post('settings-sms/update', 'SettingsController@smsApiUpdate')->name('sms.settings.update');

    Route::get('settings-facebook-api', 'SettingsController@facebookApi')->name('settings.facebook.api');
    route::post('settings-facebook/update', 'SettingsController@facebookUpdate')->name('facebook.settings.update');


    Route::get('home-page', 'GeneralController@HomePage')->name('home.page');
    Route::post('home-page', 'GeneralController@HomePageUpdate')->name('home.page.update');


    /////loan////
    Route::get('loan/packages', 'LoanController@loanPackage')->name('loan.pak');
    Route::get('loan/request', 'LoanController@loanRequest')->name('loan.request');
    Route::post('loan/packages/add', 'LoanController@loanPackageAdd')->name('loan.pak.add');
    Route::post('loan/packages/update', 'LoanController@loanPackageUpdate')->name('loan.pak.update');

    Route::post('loan/request/update', 'LoanController@loanRequestUpdate')->name('loan.request.update');


    /////Fixed deposit////
    Route::get('fixed-deposit/packages', 'LoanController@fixedDepositPackage')->name('fixed.deposit.pak');
    Route::post('fixed-deposit/packages/add', 'LoanController@fixedDepositAdd')->name('fixed.deposit.pak.add');
    Route::post('fixed-deposit/packages/update', 'LoanController@fixedDepositUpdate')->name('fixed.deposit.pak.update');


    /////blog////
    Route::get('latest-news', 'GeneralController@blog')->name('blog');
    Route::get('add-news', 'GeneralController@blogAdd')->name('blog.add');
    Route::post('add-news', 'GeneralController@blogStore')->name('blog.store');
    Route::get('news/edit/{id}', 'GeneralController@blogEdit')->name('blog.edit');
    Route::post('news/update/{id}', 'GeneralController@blogUpdate')->name('blog.update');
    Route::post('news/delete', 'GeneralController@blogDelete')->name('blog.delete');

    /////branch////

    Route::get('branch', 'GeneralController@branch')->name('branch');
    Route::get('add-branch', 'GeneralController@branchAdd')->name('branch.add');
    Route::post('add-branch', 'GeneralController@branchStore')->name('branch.store');
    Route::get('branch/edit/{id}', 'GeneralController@branchEdit')->name('branch.edit');
    Route::post('branch/update/{id}', 'GeneralController@branchUpdate')->name('branch.update');
    Route::post('branch/delete', 'GeneralController@branchDelete')->name('branch.delete');


    Route::get('services', 'GeneralController@services')->name('services');
    Route::post('service', 'GeneralController@serviceStore')->name('service.store');
    Route::post('service/update/{id}', 'GeneralController@serviceUpdate')->name('service.update');
    Route::post('service/delete/{id}', 'GeneralController@serviceDelete')->name('service.delete');

    /////fag////
    Route::get('faq', 'GeneralController@faq')->name('faq');
    Route::get('add-faq', 'GeneralController@faqAdd')->name('faq.add');
    Route::post('add-faq', 'GeneralController@faqStore')->name('faq.store');
    Route::get('faq/edit/{id}', 'GeneralController@faqEdit')->name('faq.edit');
    Route::post('faq/update/{id}', 'GeneralController@faqUpdate')->name('faq.update');
    Route::post('faq/delete/{id}', 'GeneralController@faqDelete')->name('faq.delete');


    //    subscribe  ////
    Route::get('subscribe', 'GeneralController@subscribe')->name('subscribe');
    Route::post('subscribeUpdate', 'GeneralController@subscribeUpdate')->name('subscribeUpdate');
    Route::post('subscribe/delete/{id}', 'GeneralController@subscribeDelete')->name('subscribe.delete');
    Route::get('subscribe/send/mail-to-all', 'GeneralController@subscribeMailSendForm')->name('subscribe.mail.send.form');
    Route::post('subscribe/send/mail-to-all', 'GeneralController@subscribeMailSendAll')->name('subscribe.mail.sendToAll');


    Route::get('sliders', 'GeneralController@sliders')->name('sliders');
    Route::get('add-slider', 'GeneralController@sliderAdd')->name('slider.add');
    Route::post('slider', 'GeneralController@sliderStore')->name('slider.store');
    Route::get('slider/edit/{id}', 'GeneralController@sliderEdit')->name('slider.edit');
    Route::post('slider/update/{id}', 'GeneralController@sliderUpdate')->name('slider.update');
    Route::post('slider/delete/{id}', 'GeneralController@sliderDelete')->name('slider.delete');


    Route::get('social-icon', 'GeneralController@socialindex')->name('social.index');
    Route::post('social-icon', 'GeneralController@socialAdd')->name('social.index');
    Route::post('social-update', 'GeneralController@socialUpdate')->name('social.update');
    Route::post('social-delete/{id}', 'GeneralController@socialDelete')->name('social.delete');

    Route::get('contacts', 'GeneralController@contactsIndex')->name('contacts.index');
    Route::post('contacts', 'GeneralController@contactsAdd')->name('contacts.index');
    Route::post('contacts-update', 'GeneralController@contactsUpdate')->name('contacts.update');
    Route::post('contact/delete/{id}', 'GeneralController@contactsDelete')->name('contact.delete');


    Route::get('breadcrumb', 'GeneralController@BreadcrumbIndex')->name('breadcrumbIndex');
    Route::post('breadcrumb', 'GeneralController@Breadcrumb')->name('breadcrumb');

    Route::get('logo', 'SettingsController@logo')->name('logo.index');
    Route::post('logo-update', 'SettingsController@logoUpdate')->name('logo.update');

    Route::get('/charges', 'AdminController@charges')->name('tf.charges');
    Route::post('/charges', 'AdminController@chargesUpdate')->name('tf.charges.update');


    Route::get('/Other-bank/transaction/request', 'AdminController@transactionRequest')->name('transaction.request');
    Route::get('/Other-bank/transaction/approved', 'AdminController@transactionApproved')->name('transaction.approved');
    Route::post('/Other-bank/transaction/approved', 'AdminController@transactionOtBankConfirm')->name('transaction.ot.bank.confirm');
    Route::post('/Other-bank/transaction/reject', 'AdminController@transactionOtBankReject')->name('transaction.ot.bank.reject');
    Route::get('/Other-bank/transaction/rejected', 'AdminController@transactionRejected')->name('transaction.rejected');


    //Payment Gateway

    Route::get('/gateway', 'AdminController@gateway')->name('gateway');
    Route::post('/gateway-craete', 'AdminController@gatewayCreate')->name('gatewayCreate');
    Route::put('/gateway-update/{gateway}', 'AdminController@gatewayUpdate')->name('gatewayUpdate');

    Route::get('/manual-approve-deposit', 'AdminController@manualapdeposit')->name('manual.apdeposit');
    Route::get('/manual-pending-deposit', 'AdminController@manualpdeposit')->name('manual.pdeposit');
    Route::get('/manual-reject-deposit', 'AdminController@manualrdeposit')->name('manual.rdeposit');
    Route::get('/manual-deposit-detail/{id}', 'AdminController@manualDepoSingle')->name('single.manual.deposit');
    Route::get('/manual-gateway', 'AdminController@manualgateway')->name('manual.gateway');
    Route::post('/manugateway-craete', 'AdminController@manugatewayCreate')->name('manugateway-create');
    Route::put('/manual-gateway-update/{gateway}', 'AdminController@manugatewayUpdate')->name('manugatewayUpdate');

    Route::post('/rdeposit.approve', 'AdminController@rDepositapprove')->name('rDeposit.approve');
    Route::post('/rDeposit.reject', 'AdminController@rDepositReject')->name('rDeposit.reject');


    //Withdraw Gateway
    Route::get('/withdraw/request', 'AdminController@withdrawRequest')->name('withdraw.request');
    Route::get('/approve/withdraw', 'AdminController@withdrawLog')->name('withdraw.log');
    Route::get('/rejected/withdraw', 'AdminController@withdrawRejected')->name('rejected.withdraw');


    Route::post('/withdraw/approve', 'AdminController@withdrawApprove')->name('withdraw.approve');
    Route::post('/withdraw/reject', 'AdminController@withdrawCancel')->name('withdraw.reject');

    Route::get('/wmethod', 'AdminController@wmethod')->name('wmethod');

    Route::post('/wmethod-craete', 'AdminController@wmethodCreate')->name('wmethod-create');
    Route::put('/wmethod-update/{wmethod}', 'AdminController@wmethodUpdate')->name('wmethod-update');


    Route::get('/other/bank', 'GeneralController@otherBank')->name('other.banks');
    Route::post('/other/bank/craete', 'GeneralController@otherBankCreate')->name('other.banks.create');
    Route::post('/other-update/{id}', 'GeneralController@otherBankUpdate')->name('other.banks.update');


    Route::get('/investors', 'GeneralController@investors')->name('investors');
    Route::post('/investor-add', 'GeneralController@investorAdd')->name('investor.add');
    Route::post('/investor-update', 'GeneralController@investorUpdate')->name('investor.update');
    Route::post('/investor/delete', 'GeneralController@investorDelete')->name('investor.delete');


    Route::get('/user/{user}', 'AdminController@singleUser')->name('user-single');

    Route::get('/deposits', 'AdminController@deposits')->name('deposits');
    Route::put('/deposit-approve/{depo}', 'AdminController@depoApprove')->name('depo-approve');
    Route::put('/deposit-cancel/{depo}', 'AdminController@depoCancel')->name('depo-cancel');

////fix-deposit-package////

    Route::get('/fix/deposit/package', 'AdminController@fixDepositPak')->name('fix.deposit.pak');
    Route::get('/fix/deposit/history', 'AdminController@fixDepositHistory')->name('fix.deposit.history');
    Route::post('/fix/deposit/package/add', 'AdminController@fixDepositPakAdd')->name('deposit.pak.add');
    Route::post('/fix/deposit/package/update', 'AdminController@fixDepositPakUpdate')->name('deposit.pak.update');

    //support ticket
    Route::get('/supports', 'SupportTicketController@indexSupport')->name('support.admin.index');
    Route::get('/support/reply/{ticket}', 'SupportTicketController@adminSupport')->name('ticket.admin.reply');
    Route::post('/reply/{ticket}', 'SupportTicketController@adminReply')->name('store.admin.reply');



    Route::get('/language/manager', 'LanguageController@langManage')->name('language-manage');
    Route::post('/language/manager', 'LanguageController@langStore')->name('language-manage-store');
    Route::delete('language-manage/{id}', 'LanguageController@langDel')->name('language-manage-del');
    Route::get('language-key/{id}', 'LanguageController@langEdit')->name('language-key');
    Route::put('key-update/{id}', 'LanguageController@langUpdate')->name('key-update');
    Route::post('language-manage-update/{id}', 'LanguageController@langUpdatepp')->name('language-manage-update');

    Route::post('language-import}', 'LanguageController@langImport')->name('import_lang');

});


///*admin auth end/**/

Auth::routes();


Route::get('/login', 'FrontendController@login')->name('login');
Route::get('/user/password/reset', 'ForgotPasswordController@sendResetPassMail')->name('sendResetPassMail');
Route::get('/user/password/reset/{code}', 'ForgotPasswordController@resetPasswordForm')->name('resetPasswordForm');
Route::get('/user/forgot/password/reset', 'ForgotPasswordController@resetForm')->name('user.ForgotPassword.resetPassForm');
Route::POST('/user/forgot/password/reset', 'ForgotPasswordController@resetPassword')->name('user.resetPassword');
Route::get('/user', 'UserController@loginPage')->name('get-login-page');

Route::group(['prefix' => 'user', 'middleware' => 'guest', 'as' => 'user.'], function () {
    Route::get('/login', 'FrontendController@userlogin')->name('login');
});


Route::group(['prefix' => 'user', 'middleware' => 'auth', 'as' => 'user.'], function () {
    Route::get('/verify', 'UserController@verify')->name('verify');
    Route::post('/verify/email', 'UserController@verifyEmailCode')->name('verify.email');
    Route::get('/verify/resend/email/code', 'UserController@resendVerifyEmail')->name('resend-mail-code');
    Route::post('/verify/sms', 'UserController@verifySms')->name('verify.number');
    Route::get('/verify/resend/sms/code', 'UserController@resendVerifySms')->name('resend-sms-code');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/change/password', 'UserController@changePass')->name('changePass');

    Route::group(['middleware' => 'active_status'], function () {

        Route::group(['middleware' => 'verify_user'], function () {


            Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

            Route::get('/e-deposit', 'UserController@deposit')->name('deposit');

            Route::get('/loan-history', 'UserController@loanHistory')->name('loan.history');
            Route::post('/loan/repay', 'UserController@loanRepay')->name('loan.repay');

            Route::get('/deposit-preview', 'UserController@depositPreview')->name('deposit.preview');
            Route::post('/deposit-confirm', 'PaymentController@depositConfirm')->name('deposit.confirm');
            Route::post('/deposit-data-insert', 'UserController@depositDataInsert')->name('deposit.data-insert');
            Route::post('/deposit-data-manual', 'UserController@depositDataManual')->name('deposit.data-manual');
            Route::post('/mdeposit-confirm', 'UserController@mdepositConfirm')->name('mdeposit.confirm');


            Route::group(['middleware' => 'loan_payable_user'], function () {


                Route::get('/profile', 'UserController@profileIndex')->name('profile');
                Route::post('/profile', 'UserController@profileUpdate')->name('profile.update');
                Route::post('/profile/password', 'UserController@passwordChange')->name('password.change');
                Route::post('/profile/image/upload', 'UserController@profileImage')->name('profile.image.upload');

                Route::get('/account/statement', 'UserController@accStatement')->name('account.statement');

                Route::get('/transaction-history', 'UserController@trx')->name('trx');

                Route::get('/transfer/balance', 'UserController@transferToOwnBank')->name('transfer.to.ownbank');
                Route::post('/transfer/balance', 'UserController@transferOwnBank')->name('transfer.ownbank');
                Route::post('/own/bank/transfer/confirm', 'UserController@transferOwnBankConfirm')->name('transfer.ownbank.confirm');
                Route::get('/transfer/preview', 'UserController@transferPreview')->name('transfer.preview');

                Route::get('/transfer/balance/other-bank', 'UserController@transferToOtherBank')->name('transfer.to.otherBank');
                Route::post('/transfer/balance/other-bank', 'UserController@transferOtherBank')->name('transfer.otherBank');


                Route::get('/other/bank/transfer/preview', 'UserController@transferOtBankPreview')->name('ot.transfer.preview');
                Route::post('/other/bank/transfer/confirm', 'UserController@transferOtherBankConfirm')->name('ot.transfer.confirm');

                Route::get('/transfer/balance/bank-data/', 'UserController@bankData')->name('bank.data');


                Route::get('/e-currency', 'UserController@withdraw')->name('withdraw');
                Route::post('/withdraw-post', 'UserController@withdrawPost')->name('withdraw.post');

                Route::get('/our-branch', 'UserController@branch')->name('branch');

                Route::get('/fixed-deposit-package', 'UserController@fixDepPackage')->name('fix.dep.package');
                Route::get('/fixed-deposit-history', 'UserController@fixDepHistory')->name('fix.dep.history');
                Route::post('/fixed-deposit/store', 'UserController@fixDepStore')->name('fix.dep.store');

                Route::get('/loan-package', 'UserController@loanPackage')->name('loan.package');

                Route::post('/loan/store', 'UserController@loanStore')->name('loan.store');


            });


            Route::get('/support', 'SupportTicketController@ticketIndex')->name('support.index.customer');
            Route::get('/support/new', 'SupportTicketController@ticketCreate')->name('add.new.ticket');
            Route::post('/store/ticket', 'SupportTicketController@ticketStore')->name('ticket.store');
            Route::get('/ticket/close/{ticket}', 'SupportTicketController@ticketClose')->name('ticket.close');
            Route::get('/support/reply/{ticket}', 'SupportTicketController@ticketReply')->name('ticket.customer.reply');
            Route::post('/support/store/{ticket}', 'SupportTicketController@ticketReplyStore')->name('store.customer.reply');



        });

    });


});

//Payment IPN
Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
Route::get('/ipnblockbtc', 'PaymentController@blockIpnBtc')->name('ipn.block.btc');
Route::get('/ipnblocklite', 'PaymentController@blockIpnLite')->name('ipn.block.lite');
Route::get('/ipnblockdog', 'PaymentController@blockIpnDog')->name('ipn.block.dog');
Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::post('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::post('/ipncoinpayeth', 'PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::post('/ipncoinpaybch', 'PaymentController@ipnCoinPayBch')->name('ipn.coinPay.bch');
Route::post('/ipncoinpaydash', 'PaymentController@ipnCoinPayDash')->name('ipn.coinPay.dash');
Route::post('/ipncoinpaydoge', 'PaymentController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
Route::post('/ipncoinpayltc', 'PaymentController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
Route::post('/ipncoin', 'PaymentController@ipnCoin')->name('ipn.coinpay');
Route::post('/ipncoingate', 'PaymentController@ipnCoinGate')->name('ipn.coingate');

Route::post('/ipnpaytm', 'PaymentController@ipnPayTm')->name('ipn.paytm');
Route::post('/ipnpayeer', 'PaymentController@ipnPayEer')->name('ipn.payeer');
Route::post('/ipnpaystack', 'PaymentController@ipnPayStack')->name('ipn.paystack');
Route::post('/ipnvoguepay', 'PaymentController@ipnVoguePay')->name('ipn.voguepay');
//Payment IPN







