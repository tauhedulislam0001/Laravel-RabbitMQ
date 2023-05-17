<?php

use App\Http\Controllers\Api\ProductController;
use App\Jobs\SendMessageJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'getList']);
Route::get('/product/{id}', [ProductController::class, 'show']);


Route::get('/send-message', function () {
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');
    SendMessageJob::dispatch('Hello, world!');


    return response()->json(['status' => 'success']);
});


Route::get('/check-connect', function () {

    // require_once __DIR__ . '/vendor/autoload.php'; // Replace with the path to your autoload file
    // Replace these values with your own

    $host = 'rabbitmqs';
    $port = 5672;
    $user = 'guest';
    $password = 'guest';
    $vhost = '/';


    // $host = 'rabbitmq'; // replace with your container name
    // $port = 5672;
    // $user = 'guest';
    // $password = 'guest';
    // $vhost = '/';
    try {
        $connection = new AMQPStreamConnection($host, $port, $user, $password, $vhost);
        $channel = $connection->channel();
        echo "Connected to RabbitMQ successfully.\n";
        $channel->close();
        $connection->close();
    } catch (Exception $e) {
        echo "Failed to connect to RabbitMQ: " . $e->getMessage() . "\n";
    }
});
