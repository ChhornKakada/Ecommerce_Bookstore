<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_detail;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Shipping_address;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreOrderRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->json()->all();

    // create payment
    $payment = new Payment();
    if (isset($data['payment'])) {
      $tmpPayment = $data['payment'];
      if ($data['paymentMethodId'] == 1) {
        $payment->cardholder_name = $tmpPayment['cardholderName'];
        $payment->card_number = $tmpPayment['cardNumber'];
        $payment->month = $tmpPayment['month'];
        $payment->year = $tmpPayment['year'];
        $payment->cvv = $tmpPayment['cvv'];
      } else {
        $payment->email = $tmpPayment['email'];
        $payment->password = bcrypt($tmpPayment["password"]);
      }
      $payment->payment_mothod_id = $data['paymentMethodId'];
    }
    $payment->save();

    $shipping = new Shipping_address();
    if (isset($data['shippingAddress'])) {
      $shippingTmp = $data['shippingAddress'];
      $shipping = new Shipping_address([
        'firstname' => $shippingTmp['firstname'],
        'lastname' => $shippingTmp['lastname'],
        'address' => $shippingTmp['address'],
        'city' => $shippingTmp['city'],
        'country' =>  $shippingTmp['country'],
        'zip_code' => $shippingTmp['zipcode'],
        'optional' => $shippingTmp['optional'],
        'apartment' => $shippingTmp['apartment']
      ]);
      $shipping->save();
    }

    // create new order
    $order = new Order();
    $order->customer_id = $data['customerId'];
    $order->total_price = $data['totalPrice'];
    $order->price_after_discount = $data['priceAfterDiscount'];
    $order->payment_id = $payment->id;
    $order->shipping_address_id = $shipping->id;
    $order->shipping_company_id = $data['shippingCompany'];
    $order->save();

    if (isset($data['orderDetails'])) {
      foreach ($data['orderDetails'] as $orderDetailBook) {
        // if you want to inilized data as below you need to define the fillable in model
        $orderDetail = new Order_detail([
          "order_id" => $order->id,
          "book_id" => $orderDetailBook["bookId"],
          "qty" => $orderDetailBook["qty"],
          "total_price" => $orderDetailBook["totalPrice"]
        ]);
        $orderDetail->save();
      }
    }

    return response()->json(['message' => 'order saved successfully']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(Order $order)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateOrderRequest  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateOrderRequest $request, Order $order)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    //
  }
}
