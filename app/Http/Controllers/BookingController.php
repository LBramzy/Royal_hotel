<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Payment;
use App\Http\Requests\StoreBooking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    public function book_room(Room $room){
        $room = $room->load('room_images_relation');
        // dd($room);

        return view("rooms.book_room", [
            "room" => $room,
        ]);
    }

    public function generateTransactionCode()
    {
        do {
            $code = "RYL-". Str::upper(Str::random(5)) . random_int(1000000, 9999999);
        } while (Booking::where('booking_id_number', $code)->exists());

        return $code;
    }

    public function generatePaymentCode()
    {
        do {
            $code = "PAY-". Str::upper(Str::random(5)) . random_int(1000000, 9999999);
        } while (Payment::where('transaction_id', $code)->exists());

        return $code;
    }

    public function show_booking_details(Room $room){
        $booking = $room->booking()->where('booking_id_number', $room->booking_id_number)->first();
        $payment = $room->payment()->where('booking_id_number', $room->booking_id_number)->first();

        return view("rooms.booking_details", [
            "booking" => $booking,
            "payment" => $payment,
        ]);
    }


    // public function store_booking(StoreBooking $request, Room $room){

    //     // $booking = new Booking;

    //     $data = $request->validated();

    //     $booking_id_number = $this->generateTransactionCode();
    //     $transaction_ID = $this->generatePaymentCode();

    //     $roomID = $room->id;
    //     $userID = Auth::user()->id;

    //     $days = (int) $data['booking_days'];
    //     $startDate = now();
    //     $endDate = $startDate->copy()->addDays($days);
        
    //     $room->booking_id_number = $booking_id_number;
    //     $room->room_occupied = true;
    //     // $room->room_status = 'unavailable';
    //     $room->booking_expiration = $endDate;
    //     $room->save();

    //     $user_email = Auth::user()->email;
    //     $user_name = Auth::user()->name;

        

    //     //  Passing data to database
    //     Booking::create([
    //         'room_id' => $roomID,
    //         'user_id' => $userID,
    //         'booking_id_number' => $booking_id_number,
    //         'booking_amount' => $data['booking_amount'],
    //         'booking_days' => $days,
    //         'booking_expiration' => $endDate,
    //         'booked_room_name' => $room->room_name,
    //         'booked_room_number' => $room->room_number,
    //         'booked_user_name' => $user_name,
    //         'booked_user_email' => $user_email,
    //     ]);


    //     Payment::create([
    //         'room_id' => $roomID,
    //         'user_id' => $userID,
    //         'transaction_id' => $transaction_ID,
    //         'amount' => $data['booking_amount'],
    //         'reference_number' => 123456789,
    //         'persona_name' => $user_name,
    //         'persona_email' => $user_email,
    //         'payment_status' => "completed",
    //         'booking_id_number' => $booking_id_number,
    //     ]);

    //     $booking = $room->booking()->where('booking_id_number', $room->booking_id_number)->first();
    //     $payment = $room->payment()->where('booking_id_number', $room->booking_id_number)->first();

    //     return redirect()->route('booking.details', [$room])->with([
    //         'booking' => $booking,
    //         'payment' => $payment,
    //     ]);
        
    // }

    public function view_user_booking(){
        return view("rooms.view_user_booking");
    }
}
