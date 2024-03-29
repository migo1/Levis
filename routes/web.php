<?php
//use Symfony\Component\Routing\Annotation\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::resource('dashboard', 'DashboardController');
Route::resource('clients', 'ClientController');
Route::resource('transactions', 'TransactionController');
Route::resource('files', 'FileController');
Route::get('/calendar','CalendarController@index');
Route::resource('leaves', 'LeaveController');
Route::resource('payrolls', 'PayrollController');
Route::resource('payrolls.payments', 'PaymentController');
Route::resource('requests', 'LeaveRequestController');
Route::resource('staff_details', 'StaffDetailController');
Route::resource('staff_images', 'StaffImageController');
Route::resource('holidays', 'HolidayController');

Route::resource('clients.files.contracts', 'ContractController');

Route::resource('parties', 'PartyController');
Route::get('/getParties/{id}', 'MainController@getParties');


Route::resource('clients.files', 'ClientFileController');




Route::get('/file_search', 'SearchFileController@index');
Route::get('/file_search/search', 'SearchFileController@search')->name('search');




