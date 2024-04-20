<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;
use App\Models\Lomba;
use Carbon\Carbon;

class PostController extends Controller
{
    //
    public function berita(Request $request)
    {
        if ($request->has('search')) {
            $beritas = Berita::where('judul', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $beritas = Berita::all();
        }
        return view('admin.post.berita.index', [
            'title' => 'Berita',
            'link' => '/berita',
            'beritas' => $beritas,
        ]);
    }

    public function beritaCreate()
    {
        return view('admin.post.berita.create', [
            'title' => 'Berita',
            'link' => '/berita',
        ]);
    }

    // make store method for berita
    public function beritaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        $input = $request->all();
        if ($request->hasFile('gambar')) {
            // get original file name
            $fileName = $request->file('gambar')->getClientOriginalName();
            // upload file
            $request->file('gambar')->storeAs('public/berita', $fileName);
            $input['gambar'] = $fileName;
        }
        Berita::create($input);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function beritaStoreJadwal(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tgl_pendaftaran' => 'required',
            'tgl_seleksi1' => 'required',
            'tgl_seleksi2' => 'required',
            'tgl_pengumuman' => 'required',
        ]);

        $input = $request->all();
        $input['judul'] = 'Jadwal';
        if ($request->hasFile('gambar')) {
            // get original file name
            $fileName = $request->file('gambar')->getClientOriginalName();
            // upload file
            $request->file('gambar')->storeAs('public/berita', $fileName);
            $input['gambar'] = $fileName;
        }
        Berita::create($input);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function beritaUpdateJadwal(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'tgl_pendaftaran' => 'required',
            'tgl_seleksi1' => 'required',
            'tgl_seleksi2' => 'required',
            'tgl_pengumuman' => 'required',
        ]);

        $berita = Berita::find($id);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            // get original file name
            $fileName = $request->file('gambar')->getClientOriginalName();
            // upload file
            $request->file('gambar')->storeAs('public/berita', $fileName);
            $input['gambar'] = $fileName;
        }
        $berita->update($input);

        return redirect('/berita')->with('success', 'Berita berhasil diupdate');
    }

    public function beritaDetail($id)
    {
        $berita = Berita::find($id);
        return view('admin.post.berita.detail', [
            'title' => 'Berita',
            'link' => '/berita',
            'berita' => $berita,
        ]);
    }

    public function beritaEdit($id)
    {
        $berita = Berita::find($id);
        return view('admin.post.berita.edit', [
            'title' => 'Berita',
            'link' => '/berita',
            'berita' => $berita,
        ]);
    }

    public function beritaUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $berita = Berita::find($id);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            // get original file name
            $fileName = $request->file('gambar')->getClientOriginalName();
            // upload file
            $request->file('gambar')->storeAs('public/berita', $fileName);
            $input['gambar'] = $fileName;
        }
        $berita->update($input);

        return redirect('/berita')->with('success', 'Berita berhasil diupdate');
    }

    public function beritaDestroy($id)
    {
        Berita::destroy($id);
        return redirect('/berita')->with('success', 'Berita berhasil dihapus');
    }

    public function lomba(Request $request)
    {
        if ($request->has('search')) {
            $lombas = Lomba::where('kategori', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $lombas = Lomba::all();
        }
        return view('admin.post.lomba.index', [
            'title' => 'Lomba',
            'link' => '/lomba',
            'lombas' => $lombas,
        ]);
    }

    public function lombaCreate()
    {
        return view('admin.post.lomba.create', [
            'title' => 'Lomba',
            'link' => '/lomba',
        ]);
    }
    
    public function lombaStore(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $input = $request->all();
        Lomba::create($input);

        return redirect('/lomba')->with('success', 'Lomba berhasil ditambahkan');
    }

    public function lombaDetail($id)
    {
        $lomba = Lomba::find($id);
        return view('admin.post.lomba.detail', [
            'title' => 'Lomba',
            'link' => '/lomba',
            'lomba' => $lomba,
        ]);
    }

    public function lombaEdit($id)
    {
        $lomba = Lomba::find($id);
        return view('admin.post.lomba.edit', [
            'title' => 'Lomba',
            'link' => '/lomba',
            'lomba' => $lomba,
        ]);
    }

    public function lombaUpdate(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
            'tanggal_akhir' => 'required',
        ]);

        $lomba = Lomba::find($id);
        $input = $request->all();
        $lomba->update($input);

        return redirect('/lomba')->with('success', 'Lomba berhasil diupdate');
    }

    public function lombaDestroy($id)
    {
        Lomba::destroy($id);
        return redirect('/lomba')->with('success', 'Lomba berhasil dihapus');
    }

    // Page For User
    public function beritaUser($id)
    {
        $lombas = Lomba::all();
        $berita = Berita::find($id);
        return view('landing.informasi.berita', [
            'title' => $berita->judul,
            'berita' => $berita,
            'lombas' => $lombas,
        ]);
    }

    public function lombaUser($id)
    {
        $lombas = Lomba::all();
        $lomba = Lomba::find($id);
        return view('landing.informasi.lomba', [
            'title' => 'Lomba',
            'lomba' => $lomba,
            'lombas' => $lombas,
        ]);
    }

    // Page For Jadwal
    public function jadwal()
    {
        $lombas = Lomba::all();
        // only get the oldest tanggal_akhir from lomba
        $berita = Berita::where('judul', 'Jadwal')->first();
        if ($berita == null) {
            return abort(404);
        }
        $lomba = Lomba::select('tanggal_akhir')->orderBy('tanggal_akhir', 'asc')->first();
        $lomba = Carbon::parse($lomba->tanggal_akhir)->format('d F Y');
        return view('landing.informasi.jadwal', [
            'title' => 'Jadwal',
            'berita' => $berita,
            'lomba' => $lomba,
            'lombas' => $lombas,
        ]);
    }
}

