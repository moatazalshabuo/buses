<?php
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Auth\UserAuthenticatedSessionController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserRouteController;
use App\Http\Controllers\RouteTimeController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/u', function () {
    return view('user.home');
});
// مسار تسجيل الدخول للمشرف
Route::get('/admin/login', [AdminAuthenticatedSessionController::class, 'create'])
    ->middleware('guest:admin')
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthenticatedSessionController::class, 'store'])
    ->middleware('guest:admin');

// مسار تسجيل تسجيل المسؤول الرئيسي
Route::get('/admin/register', [AdminRegistrationController::class, 'showRegistrationForm'])
    ->middleware('guest:admin')
    ->name('registeradmin');

    Route::post('/admin/register', [AdminRegistrationController::class, 'registerAdmin'])
    ->middleware('guest:admin')
    ->name('register.admin.store'); // تحديث الاسم هنا
// مسار تسجيل الخروج للمشرف
Route::get('/admin/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('admin.logout');

Route::post('/admin/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('admin.logout');
// Admin routes
Route::middleware('auth:admin')->group(function () {
    Route::view('/admin/dashboard', 'dashboard.content')->name('admin.dashboard');

    Route::get('/users', 'App\Http\Controllers\UserController@index');

    //view Users for  admin
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/toggle-status/{id}', [AdminUserController::class, 'toggleStatus'])->name('admin.users.toggle.status');
    //Edit data and password for User By Admin
    Route::get('admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    //Add sub admin for system
    Route::get('/subadmin/register', [AdminRegistrationController::class, 'create'])
    ->name('admin.register');
    Route::post('/subadmin/register', [AdminRegistrationController::class, 'store'])
    ->name('register.store');

    //View Sub Admin
     Route::get('/sub-admins', [AdminController::class, 'showSubAdmins'])->name('sub.admins');
    //Edit sub Admin data
    Route::get('/subadmin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/subadmin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    //Delete Sub Admin
    Route::delete('/subadmin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

//تقرير

Route::get('/generate-report', [RouteController::class, 'generateReport'])->name('routes.report');

    Route::get('/routes', [RouteController::class, 'index'])->name('route.index');
    Route::get('/routes/create', [RouteController::class, 'create'])->name('route.create');
    Route::post('/routes/create', [RouteController::class, 'store'])->name('route.store');
    Route::get('/routes/{route}/edit', [RouteController::class, 'edit'])->name('route.edit');
    Route::patch('/routes/{route}', [RouteController::class, 'update'])->name('route.update');
    Route::delete('/routes/{route}', [RouteController::class, 'destroy'])->name('route.destroy');
    Route::post('/toggle-status/{id}', [RouteController::class, 'toggleStatus'])->name('toggle.status');
    Route::get('/routes/search', [RouteController::class, 'search'])->name('route.search');

    Route::get('/route_times', [RouteTimeController::class, 'index'])->name('routetime.index');
    Route::get('/route_times/create', [RouteTimeController::class, 'create'])->name('routetime.create');
    Route::post('/route_times/create', [RouteTimeController::class, 'store'])->name('routetime.store');
    Route::get('/route_times/{routeTime}/edit', [RouteTimeController::class, 'edit'])->name('routetime.edit');
    Route::patch('/route_times/{routeTime}', [RouteTimeController::class, 'update'])->name('routetime.update');
    Route::delete('/route_times/{id}', [RouteTimeController::class, 'destroy'])->name('routetime.destroy');
    Route::post('/toggle-status/{id}', [RouteTimeController::class, 'toggleStatus'])->name('toggle.status');

    Route::get('/buses', [BusController::class, 'index'])->name('buses.index');
    Route::get('/buses/create', [BusController::class, 'create'])->name('buses.create');
    Route::post('/buses/create', [BusController::class, 'store'])->name('buses.store');});
//edit Bus
Route::get('/buses/{bus}/edit', [BusController::class, 'edit'])->name('buses.edit');
Route::patch('/buses/{bus}', [BusController::class, 'update'])->name('buses.update');

//Delete Bus
Route::delete('/buses/{id}', [BusController::class, 'destroy'])->name('buses.destroy');

//active or unactive Bus
Route::post('/bus/toggle-status/{id}', [BusController::class, 'toggleStatus'])->name('toggle.status');

//Search Bus
Route::get('/buses/search', [BusController::class, 'search'])->name('buses.search');
// مسار تسجيل الدخول للمستخدم العادي
Route::get('/user/login', [UserAuthenticatedSessionController::class, 'create'])
    ->middleware('guest:user')
    ->name('user.login');

Route::post('/user/login', [UserAuthenticatedSessionController::class, 'store'])
    ->middleware('guest:user');

// مسار تسجيل الخروج للمستخدم العادي
Route::get('/user/logout', [UserAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:user')
    ->name('user.logout');
Route::post('/user/logout', [UserAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:user')
    ->name('user.logout');

// مسار تسجيل الدخول للمستخدم العادي
// مسار تسجيل الخروج للمستخدم العادي
Route::get('/user/logout', [UserAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:user')
    ->name('user.logout');
Route::post('/user/logout', [UserAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:user')
    ->name('user.logout');

// مسار تسجيل الدخول للمستخدم العادي
Route::get('/user/register', [UserRegistrationController::class, 'create'])
    ->middleware('guest:user')
    ->name('user.register');

Route::post('/user/register', [UserRegistrationController::class, 'store'])
    ->middleware('guest:user');

// مسار عرض بيانات المستخدم
Route::get('/user/profile', [ProfileController::class, 'show'])
    ->middleware('auth:user')
    ->name('user.profile');

// مسار عرض بيانات المستخدم
Route::get('/user/profile', [ProfileController::class, 'show'])
    ->middleware('auth:user')
    ->name('user.profile');

    // مسار عرض نموذج تحرير بيانات المستخدم
// مسار عرض نموذج تحرير بيانات المستخدم
Route::get('/user/profile/edit', [ProfileController::class, 'edit'])->middleware('auth:user')->name('user.profile.edit');

// مسار تحديث بيانات المستخدم
Route::put('/user/profile', [ProfileController::class, 'update'])->middleware('auth:user')->name('user.profile.update');

// User routes
Route::middleware('auth:user')->group(function () {
    Route::view('/user/dashboard', 'user.homecontent')->name('user.dashboard');
    Route::get('map',[MapController::class,'index'])->name('map');
    //view Route for user
    Route::get('/user/routes', [UserRouteController::class, 'index'])->name('user.routes.index');
    //serach Route for user
    Route::get('/search', 'App\Http\Controllers\UserRouteController@search')->name('search');
   //create reservation
//create reservation
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/times/{routeId}', [ReservationController::class, 'getTimes'])->name('times');
Route::get('/busesByRoute/{routeId}', [ReservationController::class, 'getBusesByRoute'])->name('busesByRoute');
//show user reservation
Route::get('/my-reservations', [ReservationController::class, 'myReservations'])->name('reservations.index');
//cancel user reservation
Route::post('/reservation/{id}/cancel',  [ReservationController::class, 'cancelReservation'])->name('reservation.cancel');

});

Route::get('login-bus',[BusController::class,'login'])->name('bus-login');
Route::post('handale-login',[BusController::class,'handale_login'])->name('handale.login');
Route::get('routes-bus',[BusController::class,'routeBus'])->name('route.bus');
Route::get('bus-map/{id}',[BusController::class,'map'])->name('bus.map');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
