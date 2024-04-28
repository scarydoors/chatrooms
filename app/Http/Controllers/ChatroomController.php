<?php

namespace App\Http\Controllers;

use App\Events\ChatroomCreated;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    public function index()
    {
        ChatroomCreated::dispatch();
        return response()->json(['yeah' => 'what']);
    }
}
