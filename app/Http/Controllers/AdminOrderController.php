<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class AdminOrderController extends Controller
{
    private $order;

    public function index()
    {
        return view('admin.order.index', ['orders' => Order::orderBy('id', 'desc')->get()]);
    }

    public function detail($id)
    {
        return view('admin.order.detail', ['order' => Order::find($id)]);
    }

    public function edit($id)
    {
        return view('admin.order.edit', ['order' => Order::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);
        $this->order->order_status = $request->order_status;
        $this->order->delivery_address = $request->delivery_address;
        $this->order->delivery_status = $request->order_status;
        $this->order->payment_status = $request->order_status;
        $this->order->save();

        // if ($request->order_status == 'Pending') {
        //     $this->order->order_status = $request->order_status;
        //     $this->order->delivery_address = $request->delivery_address;
        //     $this->order->delivery_status = $request->order_status;
        //     $this->order->payment_status = $request->order_status;
        //     $this->order->save();
        // } else if ($request->order_status == 'Processing') {
        //     $this->order->order_status = $request->order_status;
        //     $this->order->delivery_address = $request->delivery_address;
        //     $this->order->delivery_status = $request->order_status;
        //     $this->order->payment_status = $request->order_status;
        //     $this->order->save();
        // } else if ($request->order_status == 'Complete') {
        //     $this->order->order_status = $request->order_status;
        //     $this->order->delivery_status = $request->order_status;
        //     $this->order->payment_status = $request->order_status;
        //     $this->order->save();
        // } else if ($request->order_status == 'Cancel') {
        //     $this->order->order_status = $request->order_status;
        //     $this->order->delivery_status = $request->order_status;
        //     $this->order->payment_status = $request->order_status;
        //     $this->order->save();
        // }
        return redirect('/admin/all-order')->with('message', 'Order updated successfully.');
    }

    public function showInvoice($id)
    {
        return view('admin.order.invoice', ['order' => Order::find($id)]);
    }

    public function printInvoice($id)
    {
        // $pdf = PDF::loadHTML("<h1>Hello World</h1>");
        // return $pdf->stream('test.pdf');

        $pdf = PDF::loadView('admin.order.print-invoice', ['order' => Order::find($id)]);
        return $pdf->stream($id.'-order.pdf');
    }

    public function delete($id)
    {
        Order::deleteOrder($id);
        return redirect('/admin/all-order')->with('message', 'Order deleted successfully');
    }
}
