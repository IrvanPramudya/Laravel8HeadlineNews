<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::get();
        return view('admin.message.index', compact('data'));
    }
}
