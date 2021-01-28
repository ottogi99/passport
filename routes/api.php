<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('siguns')->group(function () {
    Route::get('/', 'SigunController@index');
});

Route::prefix('nonghyups')->group(function () {
    Route::get('/', 'NonghyupController@index');
});

Route::middleware('auth:api')->prefix('posts')->group(function () {
    Route::get('/', 'Postcontroller@index');
    Route::get('/{postId}', 'PostController@show');
    Route::post('/', 'PostController@store');
    Route::patch('/{postId}', 'PostController@update');
    Route::delete('/{postId}', 'PostController@destroy');
});

// Route::prefix('posts')->group(function () {
//     Route::get('/{postId?}', 'PostController@index'); // 선택적 파라미터 function index(postId = 0)
// });


// Route::get('/callback', function (Request $request) {
Route::post('/signin', function (Request $request) {
    $http = new GuzzleHttp\Client;
    
    // $response = $http->post('http://passport.test/oauth/token', [
    $response = $http->post('http://vuespa.test/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => '2',
            // Asus labtop in office
            'client_secret' => 'DfPSI4j2SW9jpbygy2eNjSxhtQyNbxqt9cu2f542',
            // Lenovo desktop at home
            // 'client_secret' => 'IKY08TkZfUo5ZXcxFQjlKPaYFnsMnwvya1bYZT1B',
            // Lenovo T14s 용
            // 'client_secret' => 'IW0MnIqf2gbFPLGAL9LACWChUXsDmtrMjzTW6x2r',
            'username' => 'sunghwa@onthesys.com',
            'password' => 'wjdtjdghk1',
            'scope' => '',
        ],
    ]);
    
    return json_decode((string) $response->getBody(), true);
});

Route::middleware('auth:api')->get('/user/me', function (Request $request) {
    $me = Auth::user();
    
    return response()->json([
        'me' => $me
    ]);
});
