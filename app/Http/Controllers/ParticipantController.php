<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Lomba;

class ParticipantController extends Controller
{
    //make index for data peserta
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $participants = Participant::where('kelompok', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $participants = Participant::all();
        }
        return view('admin.participant.index', [
            'title' => 'Data Peserta',
            'link' => '/data-peserta',
            'participants' => $participants,
        ]);
    }

    public function detail($id)
    {
        $participant = Participant::find($id);
        return view('admin.participant.detail', [
            'title' => 'Detail Peserta',
            'link' => '/data-peserta',
            'participant' => $participant,
        ]);
    }

    public function edit($id)
    {
        $participant = Participant::find($id);
        return view('admin.participant.edit', [
            'title' => 'Edit Data Peserta',
            'link' => '/data-peserta',
            'participant' => $participant,
        ]);
    }

    public function update(Request $request, $id)
    {
        $participant = Participant::find($id);
        $participant->update($request->all());
        return redirect('/data-peserta')->with('success', 'Data Peserta Berhasil Diubah');
    }

    public function destroy($id)
    {
        $participant = Participant::find($id);
        $participant->delete();
        return redirect('/data-peserta')->with('success', 'Data Peserta Berhasil Dihapus');
    }

    // For User
    public function daftarCreate($id)
    {
        $lombas = lomba::all();
        //get id from lomba
        $lomba = Lomba::find($id);
        return view('landing.daftar.index', [
            'title' => 'Pendaftaran',
            'lombas' => $lombas,
            'lomba' => $lomba,
        ]);
    }

    // store method for participant with kategori from participant == kategori from lomba
    public function daftarStore(Request $request)
    {
        $lomba = Lomba::find($request->id);

        $input = $request->all();
        if ($request->hasFile('thumbnail', 'sk', 'foto', 'karya')) {
            $request->file('thumbnail')->storeAs('public/pendaftar/thumbnail', $request->file('thumbnail')->getClientOriginalName());
            $input['thumbnail'] = $request->file('thumbnail')->getClientOriginalName();

            $request->file('sk')->storeAs('public/pendaftar/sk', $request->file('sk')->getClientOriginalName());
            $input['sk'] = $request->file('sk')->getClientOriginalName();

            $request->file('foto')->storeAs('public/pendaftar/foto', $request->file('foto')->getClientOriginalName());
            $input['foto'] = $request->file('foto')->getClientOriginalName();

            $request->file('karya')->storeAs('public/pendaftar/karya', $request->file('karya')->getClientOriginalName());
            $input['karya'] = $request->file('karya')->getClientOriginalName();
        }

        $input['kategori'] = $lomba->kategori;
        Participant::create($input);

        return redirect('/')->with('success', 'Pendaftaran Berhasil');
    }

    public function downloadKarya($id)
    {
        $participant = Participant::find($id);
        return response()->download(storage_path('app/public/pendaftar/karya/' . $participant->karya));
    }

    public function downloadSk($id)
    {
        $participant = Participant::find($id);
        return response()->download(storage_path('app/public/pendaftar/sk/' . $participant->sk));
    }

    public function downloadFoto($id)
    {
        $participant = Participant::find($id);
        return response()->download(storage_path('app/public/pendaftar/foto/' . $participant->foto));
    }

    public function hasilKarya()
    {
        $lombas = Lomba::all();
        // get top 10 participant order by nilai desc
        $terbaiks = Participant::orderBy('nilai', 'desc')->take(10)->get();
        foreach ($terbaiks as $terbaik) {
            if ($terbaik->nilai == null) {
                return abort(404);
            }
        }
        // get top 10 participant where jenjang == sma and order by nilai desc
        $smas = Participant::where('jenjang', 'sma')->orderBy('nilai', 'desc')->take(10)->get();
        $smps = Participant::where('jenjang', 'smp')->orderBy('nilai', 'desc')->take(10)->get();
        $sds = Participant::where('jenjang', 'sd')->orderBy('nilai', 'desc')->take(10)->get();
        return view('landing.hasil-karya.index', [
            'title' => 'Hasil Karya',
            'lombas' => $lombas,
            'terbaiks' => $terbaiks,
            'smas' => $smas,
            'smps' => $smps,
            'sds' => $sds,
        ]);
    }

    public function hasilKaryaDetail($id)
    {
        $lombas = Lomba::all();
        $karya = Participant::find($id);
        return view('landing.hasil-karya.detail', [
            'title' => 'Detail Karya',
            'karya' => $karya,
            'lombas' => $lombas,
        ]);
    }

    public function hasilLomba()
    {
        $lombas = Lomba::all();
        $participants = Participant::orderBy('nilai', 'desc')->get();
        foreach ($participants as $participant) {
            if ($participant->nilai == null) {
                return abort(404);
            }
        }
        // get all jenjang from participant
        $kategori = Participant::select('kategori')->distinct()->get();
        return view('landing.hasil-lomba.index', [
            'title' => 'Hasil Lomba',
            'lombas' => $lombas,
            'participants' => $participants,
            'kategori' => $kategori,
        ]);
    }

    public function getKategori($kategori)
    {
        $peserta = Participant::where('kategori', $kategori)->get();
        return response()->json($peserta);
    }
}
