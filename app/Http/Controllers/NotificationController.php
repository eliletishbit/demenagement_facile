<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    //

    public function notificationsview(){


        return view('pages.back.notifications');
    }

    public function notificationsadmin(){

    }

    public function notificationsclient(){
        
    }

    public function notificationschauffeur(){
        
    }
}
