<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /* private $testService;
    //Dependancy Injection - is achieved through service containers
    public function __construct(TestService $testService){
        $this->testService = $testService;
    }

    // Injecting Request and TestService classes - When laravel calls this index method it creates these instances and injects into this method
    public function index(Request $request)
    {
        $this->testService->log('This is a test log');
        return $request->all();
    } */

    //To use middleware directly in controller instead of routes
    public function __construct()
    {
        //This will implemented to all of the controller methods
        // $this->middleware('authRouteCheck');
        //To apply middleware to only index method
        // $this->middleware('authRouteCheck')->only(['print']);
        //To add middleware to multiple methods
        // $this->middleware('authRouteCheck')->only(['print','show']);
        //Specify methods to which the middleware shouldnt be applied - to all other methods middleware will be applied to
        $this->middleware('authRouteCheck')->except(['print']);
    }

    //To add middleware to just one method alone
    public function index(PaymentService $paymentService){
        // dd($paymentService->process());
        //return instance of laravel application 
        dd(app());
        // dd($paymentService);
    }

    public function print(PaymentService $paymentService){
        dd($paymentService->process());
        //return instance of laravel application 
        // dd(app());
        // dd($paymentService);
    }

}
