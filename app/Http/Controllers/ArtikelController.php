<?php
namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $Artikel = Artikel::all()->toArray();
        return array_reverse($Artikel);      
    }

    public function store(Request $request)
    {
        $Artikel = new Artikel([
            'nama_penulis' => $request->input('nama_penulis'),
            'isi' => $request->input('isi'),
            'foto' => $request->input('foto')
        ]);
        $Artikel->save();

        return response()->json($request);
    }

    public function show($id)
    {
        $Artikel = Artikel::find($id);
        return response()->json($Artikel);
    }

    public function update($id, Request $request)
    {
        $Artikel = Artikel::find($id);
        $Artikel->update($request->all());

        return response()->json('Artikel updated!');
    }

    public function destroy($id)
    {
        $Artikel = Artikel::find($id);
        $Artikel->delete();

        return response()->json('Artikel deleted!');
    }
}