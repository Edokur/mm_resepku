<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        $resep = DB::table('resep')->get();
        return view('allresep', compact('resep'), [
            'title' => 'Semua Resep'
        ]);
    }
    public function resepsaya()
    {
        $id = auth()->user()->id;
        $resep = DB::table('resep')
            ->where('user_id', $id)
            ->get();
        // dd($resep);
        return view('resepsaya', compact('resep'), [
            'title' => 'Resep Pribadi'
        ]);
    }

    public function vaddresep()
    {
        return view('addresep');
    }

    public function storeresep(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah_pembuatan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasfile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('image/'), $filename);
        }

        $bahan = json_encode($request->bahan);
        $langkah_pembuatan = json_encode($request->langkah_pembuatan);

        $resep = new Resep();
        $resep->judul = $request->judul;
        $resep->user_id = auth()->user()->id;
        $resep->deskripsi = $request->deskripsi;
        $resep->bahan = $bahan;
        $resep->langkah_pembuatan = $langkah_pembuatan;
        $resep->photo = $filename;
        $resep->save();

        return redirect()->route('dashboard')
            ->with('success', 'Product created successfully.');
    }

    public function detailresep($id)
    {
        $resep = DB::table('resep')->find($id);
        $bahan = json_decode($resep->bahan);
        $langkah = json_decode($resep->langkah_pembuatan);

        return view('detailresep', compact('resep'), [
            'title' => 'Semua Resep',
            'bahan' => $bahan,
            'langkah' => $langkah
        ]);
    }
}
