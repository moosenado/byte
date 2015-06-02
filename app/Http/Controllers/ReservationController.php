<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservationClass;

class ReservationController extends Controller {
    
    public function index(){
        return view("reservation.index");
    }
    
    public function check(Request $request){
        $input = $request->all();
        
        $date = $input['date'];
        $time = $input['time'];
        $capacity = $input['capacity'];
        $minTime = ReservationClass::getMinTime($time);
        $maxTime = ReservationClass::getMaxTime($time);
        
        $cap = ReservationClass::checkTables($date, $minTime, $maxTime);
        
        if(($cap + $capacity) > 20) {
            return view("reservation.full");
        }
        else {
            $list = ReservationClass::availableTables($date, $minTime, $maxTime);
            return view("reservation.info")
                    ->with('date', $date)
                    ->with('time', $time)
                    ->with("capacity", $capacity)
                    ->with('list', $list);
        }
    }
    
    public function reserve(Request $request){
        
        $input = $request->all();
        
        $date = $input['date'];
        $time = $input['time'];
        $capacity = $input['capacity'];
        $fname = $input['fname'];
        $lname = $input['lname'];
        $email = $input['email'];
        $phone = $input['phone'];
        
        ReservationClass::makeReservation($date, $time, $fname, $lname, $phone, $email, $capacity);
        
        return view("reservation.thanks")
                ->with('date', $date)
                ->with('time', $time)
                ->with('capacity', $capacity)
                ->with('fname', $fname)
                ->with('lname', $lname)
                ->with('email', $email)
                ->with('phone', $phone);
    }
    
}