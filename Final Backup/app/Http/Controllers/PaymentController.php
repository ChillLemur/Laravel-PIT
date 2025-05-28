<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        // Create a new payment record
        Payment::create([
            'UserID' => auth()->id(), // Use the authenticated user's ID
            'EventID' => $request->event_id, // Associate the payment with the event
            'status' => 'completed', // Default status
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment successful and recorded in your history.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->back()->with('success', 'Payment deleted successfully.');
    }
}