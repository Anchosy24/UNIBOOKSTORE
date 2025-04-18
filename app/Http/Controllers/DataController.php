<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Barryvdh\DomPDF\Facade\Pdf;

class DataController extends Controller
{
    public function index() {
        $imagePath = public_path('image');
        $images = collect(File::files($imagePath))
                    ->map(function ($file) {
                        return asset('image/' . $file->getFilename());
                    });
        $bukuTerbaru = Buku::orderByDesc('created_at')->limit(3)->get();
        $totalStok = Buku::sum('stok');
        $jumlahPenerbit = Penerbit::count();
        $stokTipis = Buku::where('stok', '<', 15)->orderByDesc('stok')->count();
    
        return view('index', [
            'images' => $images,
            'bukuTerbaru' => $bukuTerbaru,
            'totalStok' => $totalStok,
            'jumlahPenerbit' => $jumlahPenerbit,
            'stokTipis' => $stokTipis,
        ]);
    }

    #Pengelolaan Buku
    public function indexBuku() {
        $buku = Buku::orderByDesc('updated_at')->get();
        return view('admin.indexBuku', [
            'buku' => $buku,
        ]);
    }

    public function formBuku() {
        $penerbit = Penerbit::all();
        return view('admin.formBuku', [
            'penerbit' => $penerbit,
        ]);
    }

    public function addBuku (Request $request) {
        $globalValidatorData = [
            'id' => ['required', Rule::unique('bukus', 'id')],
            'kategori' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_penerbit' => 'required',
        ];

        $globalValidator = Validator::make($request->all(), $globalValidatorData);

        if ($globalValidator->fails()) {
            return redirect()->back()->with('error', 'Terdapat ID Buku yang Sama dalam data!!!')->withInput();
        }

        $data = $request->all();

        try{
            $buku = Buku::create($data);
        }
        catch(Exception $e){
            return redirect()->back()->withError($e)->withInput()->with('error', 'Cek pada form Buku apakah ada kesalahan yang terjadi');
        }

        return redirect()->route('indexBuku')->with('success', 'Data Buku berhasil ditambahkan');
    }

    public function editBuku($id){
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        return view('admin.formBuku', [
            'penerbit' => $penerbit,
            'buku' => $buku,
        ]);
    }

    public function updateBuku(Request $request, $id){
        $globalValidatorData = [
            'kategori' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_penerbit' => 'required',
        ];

        $globalValidator = Validator::make($request->all(), $globalValidatorData);

        if ($globalValidator->fails()) {
            return redirect()->back()->withErrors($globalValidator)->withInput();
        }

        $buku = Buku::findOrFail($id);

        $buku->update([
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_penerbit' => $request->id_penerbit,
        ]);

        return redirect()->route('indexBuku')->with('success', 'Data Buku berhasil diperbarui');
    }

    public function deleteBuku($id){
        $buku = Buku::findOrFail($id);

        $buku->delete();
        return redirect()->route('indexBuku')->with('success', 'Data Buku berhasil dihapus');
    }

    #Pengelolaan Penerbit
    public function indexPenerbit() {
        $penerbit = Penerbit::all();
        return view('admin.indexPenerbit', [
            'penerbit' => $penerbit,
        ]);
    }

    public function addPenerbit (Request $request) {
        $globalValidatorData = [
            'id' => ['required', Rule::unique('penerbits', 'id')],
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required',
        ];

        $globalValidator = Validator::make($request->all(), $globalValidatorData);

        if ($globalValidator->fails()) {
            return redirect()->back()->with('error', 'Terdapat ID Penerbit yang Sama dalam data!!!')->withInput();
        }

        $data = $request->all();

        try{
            $penerbit = Penerbit::create($data);
        }
        catch(Exception $e){
            return redirect()->back()->withError($e)->withInput()->with('error', 'Cek pada form penerbit apakah ada kesalahan yang terjadi');
        }

        return redirect()->route('indexPenerbit')->with('success', 'Data Penerbit berhasil ditambahkan');
    }

    public function editPenerbit($id){
        $penerbit = Penerbit::findOrFail($id);
        return view('admin.formPenerbit', compact('penerbit'));
    }

    public function updatePenerbit(Request $request, $id){
        $globalValidatorData = [
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required',
        ];

        $globalValidator = Validator::make($request->all(), $globalValidatorData);

        if ($globalValidator->fails()) {
            return redirect()->back()->withErrors($globalValidator)->withInput();
        }

        $penerbit = Penerbit::findOrFail($id);

        $penerbit->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('indexPenerbit')->with('success', 'Data Penerbit berhasil diperbarui');
    }

    public function deletePenerbit($id){
        $penerbit = Penerbit::findOrFail($id);
        $penerbitdipakai = Buku::where('id_penerbit', $id)->exists();
        
        if($penerbitdipakai){
            return redirect()->back()->with('error', 'Data Penerbit tidak dapat dihapus karena telah digunakan pada data lain!');
        }

        $penerbit->delete();
        return redirect()->route('indexPenerbit')->with('success', 'Data Penerbit berhasil dihapus');
    }

    #Laporan Pengadaan
    public function pengadaan() {
        $today = now()->format('Y-m-d');            
        $bukuTerbaru = Buku::whereDate('created_at', $today)->orderByDesc('created_at')->get();
        $stokTipis = Buku::where('stok', '<', 15)->orderByDesc('stok')->get();
    
        return view('admin.pengadaan', [
            'bukuTerbaru' => $bukuTerbaru,
            'stokTipis' => $stokTipis,
        ]);
    }

    public function cetakLaporan() {
        $today = now()->format('Y-m-d');            
        $bukuTerbaru = Buku::whereDate('created_at', $today)->orderByDesc('created_at')->get();
        $stokTipis = Buku::where('stok', '<', 15)->orderByDesc('stok')->get();
    
        $pdf = PDF::loadView('laporan-pdf', [
            'bukuTerbaru' => $bukuTerbaru,
            'stokTipis' => $stokTipis,
            ''
        ]);

        return $pdf->stream('Laporan Pengadaan UNIBOOKSTORE '.$today.'.pdf');
    }
}
