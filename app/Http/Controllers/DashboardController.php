<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Participant;

class DashboardController extends Controller
{
    public function berandaAdmin()
    {
        $users = User::all();
        $participants = Participant::all();
        // get the summary of data participant per cabang column
        $cabangs = Participant::select('cabang', \DB::raw('count(*) as total'))
            ->groupBy('cabang')
            ->get();
        $kategoris = Participant::select('kategori', \DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();
        // get 
        
        // $tes = Participant::select('cabang', \DB::raw('count(*) as total'),)
        //     ->groupBy('cabang')
        //     ->get();
        // $result[] = ['Cabang', 'Total'];
        // foreach ($tes as $key => $value) {
        //     $result[++$key] = [$value->cabang, (int)$value->total];
        // }
        return view('admin.index', [
            'title' => 'Beranda',
            'link' => '/data-peserta',
            'users' => $users,
            'participants' => $participants,
            'cabangs' => $cabangs,
            'kategoris' => $kategoris,
        ]);
    }

    public function changePasswordAdmin(Request $request)
    {
        $request->validate([
            'password_baru' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->password_baru);
        $user->save();

        if ($user->role == 'admin') {
            return redirect()->route('beranda')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->route('penilaian')->with('success', 'Password berhasil diubah');
        }
    }
}
