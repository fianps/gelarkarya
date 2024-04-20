<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Mail\Kontak;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();

        return view('landing.kontak.index', [
            'title' => 'Kontak',
            'lombas' => $lombas,
        ]);
    }

    // make method to send email with Mail::to() and Mail::send()
    public function send(Request $request)
    {
        $data = request(['name', 'email', 'subject', 'message']);

        Mail::to('admin@bptik.com')->send(new Kontak($data), function ($message){
            $message->subject($request->subject);
        });

        return redirect()->route('kontak')->with('success', 'Pesan berhasil dikirim');
    }

    // public function send(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'subject' => 'required',
    //         'message' => 'required',
    //     ]);

    //     $name = $request->name;
    //     $email = $request->email;
    //     $subject = $request->subject;
    //     $message = $request->message;

    //     Mail::to('admin@bptik.com')->send(new Kontak($name, $email, $subject, $message));
    // }
}
