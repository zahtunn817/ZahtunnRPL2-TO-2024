<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about', [
            'page' => 'tentang aplikasi',
            'section' => 'Tentang aplikasi',
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'page' => 'contact us',
            'section' => 'Hubungi kami',
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'komentar' => 'required|string',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar,
        ];

        Mail::send('pages.email', $data, function ($message) {
            $message->to('zahratunn817@gmail.com', 'Zahratun')->subject('Email dari Pengunjung');
        });

        return redirect()->back()->with('success', 'Pesanmu berhasil dikirim!');
    }
}
