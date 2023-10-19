<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_buku = Buku::paginate(10);
        $data_buku_sorted = Buku::all()->sortByDesc('id');

        $jumlah_buku = count($data_buku);

        $no=1;

        $length = Buku::count('id');
        $harga = Buku::sum('harga');

        return view('index',  compact('data_buku', 'data_buku_sorted','no','length','harga','jumlah_buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'=>'required|string',
            'penulis'=>'required||string|max:30',
            'harga'=>'required|numeric',
            'tgl_terbit'=>'required|date'
        ]);
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        
        $date = Carbon::createFromFormat('m/d/Y', $request->tgl_terbit);
        $formattedDate = $date->format('Y-m-d');
        $buku->tgl_terbit = $formattedDate;
        
        $buku->save();
        return redirect('/buku')->with('pesan', 'Buku Berhasil di Tambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $buku = Buku::find($id);
        return view('detail', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $buku = Buku::find($id);
        return view('update', compact('buku'));
    }

    public function updatedata(Request $request, $id)
    {
        $this->validate($request, [
            'judul'=>'required|string',
            'penulis'=>'required||string|max:30',
            'harga'=>'required|numeric',
            'tgl_terbit'=>'required|date'
        ]);

        $buku = Buku::find($id);
        
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;

        $date = Carbon::createFromFormat('m/d/Y', $request->tgl_terbit);
        $formattedDate = $date->format('Y-m-d');
        $buku->tgl_terbit = $formattedDate;

        $buku->save();
        return redirect('/buku')->with('pesan', 'Buku Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Buku Berhasil di Delete');
    }

    public function search(Request $request){
        $data_buku = Buku::where(function($query) use ($request) {
            $query->where('judul', 'like', '%' . $request->kata . '%')
                  ->orWhere('penulis', 'like', '%' . $request->kata . '%');
        })->paginate(10);        $data_buku_sorted = Buku::all()->sortByDesc('id');

        $jumlah_buku = count($data_buku);

        $no=1;

        $length = Buku::count('id');
        $harga = Buku::sum('harga');

        return view('index',  compact('data_buku', 'data_buku_sorted','no','length','harga','jumlah_buku'));
    }
}
