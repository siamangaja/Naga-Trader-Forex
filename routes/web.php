<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepositController;


Route::get('/btc', [PagesController::class,'BTC'])->name('BTC');

Route::get('/', [PagesController::class,'frontpage'])->name('frontpage');

Route::get('/admin/login', [AdminAuthController::class,'getLogin'])->name('login-admin');
Route::post('/admin/login', [AdminAuthController::class,'postLogin'])->name('login.admin.submit');
Route::get('/admin/logout', [AdminAuthController::class,'postLogout'])->name('logout.admin');

// Admin
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin', [AdminController::class,'dashboard'])->name('dashboard.admin');
    Route::get('/admin/profile', [AdminController::class,'profile'])->name('profile.admin');
    Route::get('/admin/change-password', [AdminController::class,'changePassword'])->name('admin.change-password');
    Route::post('/admin/change-password', [AdminController::class,'savePassword']);
    Route::get('/admin/users', [AdminController::class,'userIndex'])->name('user.index');
    Route::get('/admin/user/{id}/edit', [AdminController::class,'userEdit']);
    Route::post('/admin/user', [AdminController::class,'userUpdate'])->name('user.update');
    Route::get('/admin/user/{id}/delete', [AdminController::class,'userDelete'])->name('user.delete');
    Route::get('/admin/news', [AdminController::class,'newsIndex'])->name('news.index');
    Route::get('/admin/news/add', [AdminController::class,'newsAdd'])->name('news.add');
    Route::post('/admin/news/add', [AdminController::class,'newsStore'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [AdminController::class,'newsEdit'])->name('news.edit');
    Route::post('/admin/news/{id}/edit', [AdminController::class,'newsUpdate'])->name('news.update');
    Route::get('/admin/news/{id}/delete', [AdminController::class,'newsDelete'])->name('news.delete');
    Route::get('/admin/features', [AdminController::class,'featuresIndex'])->name('features.index');
    Route::get('/admin/features/add', [AdminController::class,'featuresAdd'])->name('features.add');
    Route::post('/admin/features/add', [AdminController::class,'featuresStore'])->name('features.store');
    Route::get('/admin/features/{id}/edit', [AdminController::class,'featuresEdit'])->name('features.edit');
    Route::post('/admin/features/{id}/edit', [AdminController::class,'featuresUpdate'])->name('features.update');
    Route::get('/admin/features/{id}/delete', [AdminController::class,'featuresDelete'])->name('features.delete');
    Route::get('/admin/testimonials', [AdminController::class,'testimonialsIndex'])->name('testimonial.index');
    Route::get('/admin/testimonial/add', [AdminController::class,'testimonialsAdd'])->name('testimonial.add');
    Route::post('/admin/testimonial/add', [AdminController::class,'testimonialsStore'])->name('testimonial.store');
    Route::get('/admin/testimonial/{id}/edit', [AdminController::class,'testimonialsEdit'])->name('testimonial.edit');
    Route::post('/admin/testimonial/{id}/edit', [AdminController::class,'testimonialsUpdate'])->name('testimonial.update');
    Route::get('/admin/testimonial/{id}/delete', [AdminController::class,'testimonialsDelete'])->name('testimonial.delete');
    Route::get('/admin/price', [AdminController::class,'priceIndex'])->name('price.index');
    Route::get('/admin/price/add', [AdminController::class,'priceAdd'])->name('price.add');
    Route::post('/admin/price/add', [AdminController::class,'priceStore'])->name('price.store');
    Route::get('/admin/price/{id}/edit', [AdminController::class,'priceEdit'])->name('price.edit');
    Route::post('/admin/price/{id}/edit', [AdminController::class,'priceUpdate'])->name('price.update');
    Route::get('/admin/price/{id}/delete', [AdminController::class,'priceDelete'])->name('price.delete');
    Route::get('/admin/pages', [AdminController::class,'pagesIndex'])->name('page.index');
    Route::get('/admin/page/add', [AdminController::class,'pagesAdd'])->name('page.add');
    Route::post('/admin/page/add', [AdminController::class,'pagesStore'])->name('page.store');
    Route::get('/admin/page/{id}/edit', [AdminController::class,'pagesEdit'])->name('page.edit');
    Route::post('/admin/page/{id}/edit', [AdminController::class,'pagesUpdate'])->name('page.update');
    Route::get('/admin/page/{id}/delete', [AdminController::class,'pagesDelete'])->name('page.delete');
    Route::get('/admin/partners', [AdminController::class,'partnersIndex'])->name('partner.index');
    Route::get('/admin/partner/add', [AdminController::class,'partnersAdd'])->name('partner.add');
    Route::post('/admin/partner/add', [AdminController::class,'partnersStore'])->name('partner.store');
    Route::get('/admin/partner/{id}/edit', [AdminController::class,'partnersEdit'])->name('partner.edit');
    Route::post('/admin/partner/{id}/edit', [AdminController::class,'partnersUpdate'])->name('partner.update');
    Route::get('/admin/partner/{id}/delete', [AdminController::class,'partnersDelete'])->name('partner.delete');
    Route::get('/admin/options', [AdminController::class,'optionsIndex'])->name('options.index');
    Route::get('/admin/options/{id}/edit', [AdminController::class,'optionsEdit'])->name('options.edit');
    Route::post('/admin/options/{id}/edit', [AdminController::class,'optionsUpdate'])->name('options.update');
});

// User
Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/user', [DepositController::class,'dashboardUser'])->name('user.dashboard');
    Route::get('/user/profile', [DepositController::class,'profileUser'])->name('user.profile');
    Route::post('/user/profile', [DepositController::class,'saveprofileUser']);
    Route::get('/user/change-password', [DepositController::class,'ChangePassword'])->name('user.change-password');
    Route::post('/user/change-password', [DepositController::class,'SavePassword']);
    Route::get('/user/deposit', [DepositController::class,'depositUser'])->name('user.deposit');
    Route::get('/user/deposit/add', [DepositController::class,'depositAdd'])->name('user.deposit');
    Route::post('/user/deposit/add', [DepositController::class,'depositStore']);
    Route::get('/user/deposit/{ref}', [DepositController::class,'depositDetail']);
    Route::get('/user/withdraw', [DepositController::class,'withdrawUser'])->name('user.withdraw');
    Route::get('/user/withdraw/add', [DepositController::class,'WithdrawAdd']);
    Route::post('/user/withdraw/add', [DepositController::class,'WithdrawStore']);
    Route::get('/user/bank', [DepositController::class,'ChangeBank'])->name('user.bank');
    Route::post('/user/bank/save', [DepositController::class,'SaveBank']);
    Route::post('/user/bank/store', [DepositController::class,'StoreBank']);
    Route::get('/user/wallet', [DepositController::class,'WalletUser'])->name('user.wallet');
});

Route::get('/login', [UserLoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class,'login'])->name('user.login.submit');
Route::get('/logout', [UserLoginController::class,'logout'])->name('logout');
Route::get('/register', [UserRegisterController::class,'showRegisterForm'])->name('user.register');
Route::post('/register', [UserRegisterController::class,'register'])->name('user.register.submit');
Route::get('/news', [NewsController::class,'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class,'details']);
Route::get('contact', [PagesController::class,'contact'])->name('contact');
Route::post('contact', [PagesController::class,'submitContact'])->name('submit.contact');
Route::get('{slug}', [PagesController::class,'details']);