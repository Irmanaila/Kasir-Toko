<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\detailPenjualan;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function penjualan()
    {
        $barang = Barang::forCurrentUser()->get();
        $barangTerpilih = session()->get('barangTerpilih');
        $keranjang = session()->get('keranjang', []);

        $totalKeseluruhan = 0;

        foreach ($keranjang as &$barang) {
            $barang['total_item'] = $barang['harga_jual'] * $barang['kuantitas'];
            $totalKeseluruhan += $barang['total_item'];
        }

        // Kirim data ke view
        return view('kasir.penjualan', [
            'barang' => $barang,
            'barangTerpilih' => $barangTerpilih,
            'keranjang' => $keranjang,
            'totalKeseluruhan' => $totalKeseluruhan,
        ]);
    }

    public function riwayatPenjualan()
    {
        $penjualan = Penjualan::forCurrentUser()
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();
        return view('kasir.riwayat-penjualan', compact('penjualan'));
    }

    public function detailPenjualan($id)
    {
        $penjualan = Penjualan::with('detailPenjualan')->findOrFail($id);
        // dd($penjualan);
        return view('kasir.detail-penjualan', compact('penjualan'));
    }



    public function pilihBarang(Request $request)
    {
        $kodeBarang = $request->input('kode_barang');

        $barang = Barang::where('kode_barang', $kodeBarang)->forCurrentUser()->first();

        if ($barang) {
            session()->put('barangTerpilih', $barang);
            return redirect()->back()->with('success', 'Barang Tersedia.');
        } else {
            return redirect()->back()->with('error', 'Barang tidak ditemukan atau tidak tersedia.');
        }
    }


    public function tambahBarangkePenjualan(Request $request)
    {
        $barangTerpilih = session()->get('barangTerpilih');
        $barang = Barang::where('id_barang', $barangTerpilih->id_barang)->forCurrentUser()->first();

        $keranjang = session()->get('keranjang', []);
        $keranjang[] = [
            'foto' => $barang->foto,
            'barang_id' => $barang->id_barang,
            'nama_barang' => $barang->nama_barang,
            'kuantitas' => $request->kuantitas,
            'harga_jual' => $barang->harga_jual,
        ];

        session()->put('keranjang', $keranjang);
        // dd(session()->get('keranjang'));


        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function hapusBarang(Request $request)
    {
        $keranjang = session()->get('keranjang', []);

        foreach ($keranjang as $index => $item) {
            if ($item['barang_id'] == $request->barang_id) {
                unset($keranjang[$index]);
                break;
            }
        }

        session()->put('keranjang', $keranjang);

        return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang!');
    }

    public function transaksi(Request $request)
    {
        $penjualan = Penjualan::create([
            'user_id' => Auth::id(),
            'total_transaksi' => $request->total_transaksi,
            'uang_diterima' => $request->uang_diterima,
            'kembalian' => $request->kembalian,
            'tanggal_transaksi' =>  Carbon::now(),
        ]);

        // dd($penjualan->id_penjualan);
        $keranjang = session()->get('keranjang', []);
        // dd($keranjang);
        foreach ($keranjang as $item) {
            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id_penjualan,
                'barang_id' => $item['barang_id'],
                'kuantitas' => $item['kuantitas'],
                'harga_jual' => $item['harga_jual'],
            ]);
        }

        session()->forget('keranjang');
        session()->forget('barangTerpilih');

        return redirect()->back()->with('success', 'Transaksi Berhasil');
    }
}
