<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Room;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceController extends Controller
{
    public function downloadInvoice(Room $room)
    {
        $booking = $room->booking()->latest()->first();
        $payment = $room->payment()->latest()->first();

        $pdf = Pdf::loadView('invoices.pdf', [
            'booking' => $booking,
            'payment' => $payment,
        ]);

        return $pdf->download("invoice-{$booking->booking_id_number}.pdf");
    } 
}
