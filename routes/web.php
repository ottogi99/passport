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
// use Illuminate\Http\Request;
// use Illuminate\Support\Str;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');

/** Access 토큰관련 라우트 **/
// Route::get('/redirect', function (Request $request) {
//     $request->session()->put('state', $state = Str::random(40));

//     $query = http_build_query([
//         'client_id' => '3',    # 발급받은 클라이언트 ID는 3
//         'redirect_uri' => 'http://passport.test/callback',  # 클라이언트 등록시 등록한 redirect url
//         'response_type' => 'code',
//         'scope' => '',
//         'state' => $state,
//     ]);

// 		# 클라이언트 ID와 암호키를 전달하여 승인 코드를 요청
//     return redirect('http://passport.test/oauth/authorize?'.$query);
// });

// Route::get('/callback', function (Request $request) {
//     $state = $request->session()->pull('state');

//     throw_unless(
//         strlen($state) > 0 && $state === $request->state,
//         InvalidArgumentException::class
//     );

//     $http = new GuzzleHttp\Client;

//     $response = $http->post('http://passport.test/oauth/token', [
//         'form_params' => [
//             'grant_type' => 'authorization_code',
//             'client_id' => '3',
//             'client_secret' => 'CsKjd42dxnKHqxSEMpYlsCASjkDjmz8C9FXbt4b9',
//             'redirect_uri' => 'http://passport.test/callback',
//             'code' => $request->code,
//         ],
//     ]);

//     return json_decode((string) $response->getBody(), true);
// });
/** Access 토큰관련 라우트 **/

/** Password Grant 토큰 **/
// Route::get('/callback', function (Request $request) {
//     $http = new GuzzleHttp\Client;
    
//     $response = $http->post('http://passport.test/oauth/token', [
//         'form_params' => [
//             'grant_type' => 'password',
//             'client_id' => '2',
//             'client_secret' => 'gsqiVTcsYuB8CxRwg4bGkhp2HG7NgbLFGictpyiA',
//             'username' => 'sunghwa@onthesys.com',
//             'password' => 'wjdtjdghk1',
//             'scope' => '',
//         ],
//     ]);
    
//     return json_decode((string) $response->getBody(), true);
// });
/** Password Grant 토큰 **/

/** 묵시적 Grant 라우트 **/
// Route::get('/redirect', function (Request $request) {
//     $query = http_build_query([
//         'client_id' => '3',    # 발급받은 클라이언트 ID는 3
//         'redirect_uri' => 'http://passport.test/callback',  # 클라이언트 등록시 등록한 redirect url
//         'response_type' => 'token',
//         'scope' => '',
//     ]);

// 		# 클라이언트 ID와 암호키를 전달하여 승인 코드를 요청
//     return redirect('http://passport.test/oauth/authorize?'.$query);
// });

// Route::get('/callback', function (Request $request) {
//     return view('implicitGrant');
// });
/** 묵시적 Grant 라우트 **/