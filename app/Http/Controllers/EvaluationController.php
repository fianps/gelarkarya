<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomForm;
use App\Models\Participant;
use App\Models\Evaluator;
use App\Models\Score;
use App\Models\Lomba;
use App\Models\User;
use App\Imports\EvaluatorImport;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{
    //
    public function penilai(Request $request)
    {
        if ($request->has('search')) {
            $evaluators = Evaluator::where('name', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $evaluators = Evaluator::all();
        }
        $lombas = Lomba::all();
        return view('admin.evaluator.index', [
            'title' => 'Data Penilai',
            'link' => '/data-penilai',
            'evaluators' => $evaluators,
            'lombas' => $lombas,
        ]);
    }

    // make store email to user table and others to evaluator table
    public function penilaiStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user['password'] = bcrypt('password');
        $user['role'] = 'penilai';
        User::create($user);

        $evaluator['name'] = $request['name'];
        $evaluator['kategori'] = $request['kategori'];
        if ($request['pekerjaan'] || $request['alamat']) {
            $evaluator['pekerjaan'] = $request['pekerjaan'];
            $evaluator['alamat'] = $request['alamat'];
        }
        Evaluator::create($evaluator);

        return redirect('/data-penilai')->with('success', 'Data Penilai Berhasil Ditambahkan');
    }

    public function penilaiImport(Request $request)
    {
        $request->validate([
            'file-excel' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file-excel');
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('data_penilai', $fileName);

        Excel::import(new EvaluatorImport, public_path('/data_penilai/' . $fileName));

        return redirect('/data-penilai')->with('success', 'Data Penilai Berhasil Ditambahkan');
    }

    public function penilaiDestroy($id)
    {
        $evaluator = Evaluator::find($id);
        $user = User::where('name', $evaluator->name)->get();
        $evaluator->delete();
        $user[0]->delete();
        return redirect('/data-penilai')->with('success', 'Data Penilai Berhasil Dihapus');
    }

    public function penilaiIndeks(Request $request)
    {
        if ($request->has('search')) {
            $customForms = CustomForm::where('kategori', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $customForms = CustomForm::all();
        }
        $lombas = Lomba::all();
        return view('admin.evaluator.score-index', [
            'title' => 'Indeks Penilaian',
            'link' => '/indeks-nilai',
            'customForms' => $customForms,
            'lombas' => $lombas,
        ]);
    }

    public function penilaiIndeksStore(Request $request)
    {
        $request->validate([
            'indeks' => 'required',
            'kategori' => 'required',
        ]);

        // if there is already input with the same value in kategori column, then return error
        $customForm = CustomForm::where('kategori', $request['kategori'])->get();
        if ($customForm->count() > 0) {
            return redirect('/indeks-nilai')->with('error', 'Indeks Penilaian Sudah Ada');
        } else {
            if ($request['kategori'] == 'Pilih Kategori') {
                return redirect('/indeks-nilai')->with('error', 'Kategori Belum Dipilih');
            } else {
                $input['indeks'] = $request['indeks'];
                $input['kategori'] = $request['kategori'];
                CustomForm::create($input);
                return redirect('/indeks-nilai')->with('success', 'Indeks Penilaian Berhasil Ditambahkan');
            }
        }
    }

    public function penilaiIndeksDestroy($id)
    {
        $customForm = CustomForm::find($id);
        $customForm->delete();
        return redirect('/indeks-nilai')->with('success', 'Indeks Penilaian Berhasil Dihapus');
    }

    public function evaluator(Request $request)
    {
        $evals = Score::where('penilai', auth()->user()->name)->get();
        $evaluator = Evaluator::where('name', auth()->user()->name)->get();
        if ($request->has('search')) {
            $participants = Participant::where('kelompok', 'LIKE', '%' . $request->search . '%')->where('kategori', $evaluator[0]->kategori)->get();
        } else {
            $participants = Participant::where('kategori', $evaluator[0]->kategori)->get();
        }
        return view('evaluator.index', [
            'title' => 'Data Lengkap',
            'link' => '/penilaian',
            'evaluator' => $evaluator,
            'participants' => $participants,
            'evals' => $evals,
        ]);
    }

    public function evaluatorDetail($id)
    {
        $participant = Participant::find($id);
        // retirive data of the indeks column only from custom_forms table
        $customForms = CustomForm::where('kategori', $participant->kategori)->get();
        $customForms = $customForms->pluck('indeks');
        $indeks = $customForms[0];
        $penilai = $participant->penilai;
        $penilai = explode(', ', $penilai);
        return view('evaluator.detail', [
            'title' => 'Detail Peserta',
            'link' => '/penilaian',
            'participant' => $participant,
            'customForms' => $customForms,
            'indeks' => $indeks,
            'penilai' => $penilai,
        ]);
    }

    public function evaluatorStore(Request $request)
    {
        $participant = Participant::find($request->id);
        $score = Score::where('kelompok', $participant->kelompok)->get();
        $score = $score->pluck('penilai');
        $request->validate([
            'nilai' => 'required',
        ]);
        
        if ($score->contains(auth()->user()->name)) {
            return redirect('/penilaian')->with('error', 'Anda Sudah Menilai Peserta Ini');
        } else {
            $input['nilai'] = array_sum($request['nilai']) / count($request['nilai']);
            $input['penilai'] = auth()->user()->name;
            $input['kelompok'] = $participant->kelompok;
            Score::create($input);
        }

        if ($participant->nilai == null) {
            $participant['penilai'] = auth()->user()->name;
            $participant['nilai'] = array_sum($request['nilai']) / count($request['nilai']);
            $participant->update();
        } else {
            $participant['penilai'] = $participant->penilai . ', ' . auth()->user()->name;
            $participant['nilai'] = ($participant->nilai + array_sum($request['nilai']) / count($request['nilai'])) / 2;
            $participant->update();
        }

        return redirect('/penilaian')->with('success', 'Nilai Berhasil Ditambahkan');
    }

    public function finalis(Request $request)
    {
        $evaluator = Evaluator::where('name', auth()->user()->name)->get();
        if ($request->has('search')) {
            $finalists = Participant::where('kelompok', 'LIKE', '%' . $request->search . '%')->where('kategori', $evaluator[0]->kategori)->orderBy('nilai', 'desc')->take(10)->get();
        } else {
            $finalists = Participant::where('kategori', $evaluator[0]->kategori)->orderBy('nilai', 'desc')->take(10)->get();
        }
        return view('evaluator.finalis', [
            'title' => 'Data Finalis',
            'link' => '/finalis',
            'finalists' => $finalists,
        ]);
    }
}
