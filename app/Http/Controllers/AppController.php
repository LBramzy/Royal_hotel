<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Support\NumberFormatter;
use App\Models\Payment;

// use Illuminate\Http\Request;

class AppController extends Controller
{
    public function homepage(){
        return view("home");
    }

    public function admin_dashboard(){
        $total_rooms = Room::count();
        $total_bookings = Booking::count();
        $occupiedRoomsCount = Room::currentlyBooked()->count();
        $free_rooms = $total_rooms - $occupiedRoomsCount;
        $todays_bookings = Booking::whereDate('created_at', today())->count();
        $totalRevenue = Payment::where('payment_status', 'completed')->sum('amount');
        $total_revenue = NumberFormatter::abbreviate($totalRevenue);
        $rooms = Room::with('room_images_relation')->get();

        return view('dashboards.admin_dashboard',[
            'total_rooms' => $total_rooms,
            'total_bookings' => $total_bookings,
            'occupied_rooms' => $occupiedRoomsCount,
            'free_rooms' => $free_rooms,
            'todays_bookings' => $todays_bookings,
            'total_revenue' => $total_revenue,
            'rooms' => $rooms,
        ]);
    }

    public function forgot_password(){
        return view('Auth.forgot_password');
    }
}
