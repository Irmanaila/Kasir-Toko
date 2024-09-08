<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function barang()
    {
        $barang = Barang::forCurrentUser()
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('kasir.barang', compact('barang'));
    }


    public function tambah(Request $request)
    {
        $file = $request->file('foto');

        $NamaFoto = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('foto_barang'), $NamaFoto);

        Barang::create([
            'user_id' => Auth::id(),
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'foto' => $NamaFoto,
        ]);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan.');
    }

    public function hapus($id_barang)
    {
        $barang = Barang::where('id_barang', $id_barang)->first();
        $barang->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }

    public function edit(Request $request, $id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
    
        // Variabel untuk menyimpan nama foto yang baru
        $updateNamaFoto = $barang->foto;
    
        if ($request->hasFile('updateFoto')) {
            $file = $request->file('updateFoto');
            $updateNamaFoto = time() . '_' . $file->getClientOriginalName();
    
            $file->move(public_path('foto_barang'), $updateNamaFoto);
    
            // Hapus foto lama
            if ($barang->foto && file_exists(public_path('foto_barang/' . $barang->foto))) {
                unlink(public_path('foto_barang/' . $barang->foto));
            }
        }
    
        // Update data barang
        $barang->update([
            'kode_barang' => $request->input('updateKodeBarang', $barang->kode_barang),
            'nama_barang' => $request->input('updateNamaBarang', $barang->nama_barang),
            'stok' => $request->input('updateStok', $barang->stok),
            'harga_modal' => $request->input('updateHargaModal', $barang->harga_modal),
            'harga_jual' => $request->input('updateHargaJual', $barang->harga_jual),
            'foto' => $updateNamaFoto,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Barang berhasil diperbarui.');
    }
    
}
