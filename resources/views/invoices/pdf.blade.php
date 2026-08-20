<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; }
        .title { font-size: 24px; font-weight: bold; color: #a5793f; }
        .subtitle { font-size: 11px; color: #666; margin-top: 4px; }
        hr { border: none; border-top: 1px solid #ddd; margin: 15px 0; }
        .section-title { font-weight: bold; margin-bottom: 8px; }
        .row { margin-top: 6px; }
        .label { color: #555; }
        .value { font-weight: bold; }
        .footer { margin-top: 25px; font-size: 11px; color: #555; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Royal Hotel</div>
        <div class="subtitle">Luxury | Comfort | Excellence</div>
        <div class="subtitle">123 Admiralty Way, Lekki, Lagos, Nigeria</div>
        <div class="subtitle">+234 800 123 4567 | info@royalhotel.com</div>
    </div>

    <hr>

    <div class="row">Receipt No.: <span class="value">{{ $booking->booking_id_number }}</span></div>
    <div class="row">Payment Reference: <span class="value">{{ $payment->transaction_id }}</span></div>

    <hr>

    <div class="section-title">Guest Information</div>
    <div class="row">Guest Name: <span class="value">{{ $booking->booked_user_name }}</span></div>
    <div class="row">Guest Email: <span class="value">{{ $booking->booked_user_email }}</span></div>

    <hr>

    <div class="section-title">Booking Details</div>
    <div class="row">Room: <span class="value">{{ $booking->booked_room_name }}</span></div>
    <div class="row">Room Number: <span class="value">{{ $booking->booked_room_number }}</span></div>
    <div class="row">Check In: <span class="value">{{ $booking->created_at->format('d M Y') }}</span></div>
    <div class="row">Check Out: <span class="value">{{ \Carbon\Carbon::parse($booking->booking_expiration)->format('d M Y') }}</span></div>

    <hr>

    <div class="section-title">Payment Details</div>
    <div class="row">Amount Paid: <span class="value">&#8358;{{ number_format($payment->amount, 2) }}</span></div>
    <div class="row">Payment Status: <span class="value">{{ $payment->payment_status }}</span></div>

    <hr>

    <div class="footer">
        Thank you for choosing Royal Hotel. We look forward to welcoming you and providing an exceptional stay.
    </div>
</body>
</html>