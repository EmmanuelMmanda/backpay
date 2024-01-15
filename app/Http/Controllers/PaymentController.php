<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Task;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        return response()->json(['payments' => $payments], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'payment_id' => 'required',
            'payer_id' => 'required',
            'payer_name' => 'required',
            'payment_time' => 'required',
            'status' => 'required|string',
        ]);

        $payment = Payment::create([
            'task_id' => $request->task_id,
            'payment_id' => $request->payment_id,
            'payer_id' => $request->payer_id,
            'payment_time' => $request->payment_time,
            'payer_name' =>  $request->payer_name,
            'amount' =>  $request->amount,
            'status' => $request->status,
        ]);

        $task = Task::findOrFail($request->task_id);
        $task->update(['status' => 'PAID']);


        return response()->json(['payment' => $payment], 201);
    }

    public function verifyPayment(Payment $payment)
    {
        // Your logic to verify the payment

        // For demonstration purposes, let's assume verification is successful
        $payment->update(['status' => 'verified']);

        return response()->json(['payment' => $payment], 200);
    }

    public function getPaymentStatus(Payment $payment)
    {
        return response()->json(['status' => $payment->status], 200);
    }
}
