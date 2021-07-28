<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Response;
use Razorpay\Api\Api;

class CourseController extends Controller
{
    protected $client;

    public function __construct()
    {
        
    }

    public function index()
    {
        $course = Course::get();

        return view('course.index', ['course' => $course]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'image' => 'max:255'
        ]);

        $course              = new Course();
        $course->name        = $validatedData['name'];
        $course->description = $validatedData['description'];
        $course->amount        = $validatedData['amount'];
        $course->image       = $validatedData['image'];
        $course->save();       

        return redirect()->route('course');
    }

    public function razorpay(Request $request)
    {
        $id=$request->id;
        $course = Course::where('id',$id)->first();

        $paise_amount = round($course->amount*100);
        $api_key = env('RAZORPAY_API_KEYID');
        $api_secret = env('RAZORPAY_API_KEY_SECRET');
        $api=new Api($api_key,$api_secret);

        $order_creation = $api->order->create([
            'receipt' => 'order_receipt',
            'amount'  => $paise_amount,
            'currency'=> 'INR',
            'payment_capture' => '1'
        ]);
        $orderid = $order_creation->id;

        $response['key'] = env('RAZORPAY_API_KEYID');
        $response['amount'] = $paise_amount;
        $response['name'] = 'Optisol';
        $response['description'] = 'Order checkout';
        $response['image'] = "https://1nwu8i3sj55rdbw4k4fm55i1-wpengine.netdna-ssl.com/wp-content/uploads/thegem-logos/logo_8a0c90dfabf2285c6664e55334d3dd25_1x.png"/*$course->image*/;
        $response['prefile_name'] = 'Optisol';
        $response['email'] = 'optisol@gmail.com';
        $response['orderid'] = $orderid;
        $response['address'] = 'Thanks for using optisol';
        $response['color'] = '#60b246';
        $response['orders'] = '';

        return Response::json($response);
    }
}
