<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isNull;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())->get();
        return view('home.user_payment', ['payments' => $payments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $contentId)
    {
//        $unpaidContent = Content::with('menu')->where('user_id', Auth::id())->where('status', '=', 'False')->get();
        $data = new Payment;

        return view('home.user_create_payment', ['request' => $request, 'contentId' => $contentId]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Payment;
        $data->user_id = Auth::id();
        $data->content_id = $request->input('content_id');
        $data->payment = $request->input('payment');
        $data->save();

        // update the content status after successfull payment
        $content = Content::find($request->input('content_id'));
        $content->status = 'True';
        $content->save();

        return redirect()->route('user_content');





    }


/**
 * Display the specified resource.
 *
 * @param \App\Models\Payment $payment
 * @return \Illuminate\Http\Response
 */
public
function show(Payment $payment)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param \App\Models\Payment $payment
 * @return \Illuminate\Http\Response
 */
public
function edit(Payment $payment)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param \App\Models\Payment $payment
 * @return \Illuminate\Http\Response
 */
public
function update(Request $request, Payment $payment)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param \App\Models\Payment $payment
 * @return \Illuminate\Http\Response
 */
public
function destroy(Payment $payment)
{
    //
}
}
