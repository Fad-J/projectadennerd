<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{   
    public function landing()
    {
        $totalBuku = DB::table('books')->count();

        $totalUser = DB::table('users')->count();

        $totalKategori = DB::table('books')
                            ->distinct()
                            ->count('Kategori');

        return view('landing',[
            'totalBuku' => $totalBuku,
            'totalUser' => $totalUser,
            'totalKategori' => $totalKategori
        ]);
    }

    public function awal()
    {
        return view('login');
    }

    public function admin()
    {
        $totalBuku = DB::table('books')->count();

        $totalUser = DB::table('user')
                        ->where('status','user')
                        ->count();

        $sedangPinjam = DB::table('peminjaman')
                            ->where('status','Dipinjam')
                            ->count();

        return view('admin.dashboard',[
            'totalBuku' => $totalBuku,
            'totalUser' => $totalUser,
            'sedangPinjam' => $sedangPinjam
        ]);
    }

    public function user()
    {
        $totalBuku = DB::table('books')->count();

        $bukuSaya = DB::table('peminjaman')
                        ->where('username', session()->get('username'))
                        ->where('status', 'Dipinjam')
                        ->count();

        $bukuTerbaru = DB::table('books')
                            ->latest('idbuku')
                            ->take(3)
                            ->get();

        return view('user.dashboard',[
            'totalBuku' => $totalBuku,
            'bukuSaya' => $bukuSaya,
            'bukuTerbaru' => $bukuTerbaru
        ]);
    }

    public function katalog()
    {
        $books = DB::table('books')->get();

        return view('user.katalog', [
            'books' => $books
        ]);
    }

    public function searchBuku(Request $request)
    {
        $books = DB::table('books')
                    ->where('NamaBuku','like',
                    '%'.$request->keyword.'%')
                    ->get();

        return response()->json($books);
    }

    public function detail($id)
    {
        $book = DB::table('books')
                ->where('idbuku', $id)
                ->first();

        if(!$book)
        {
            abort(404);
        }

        return view('user.detail', [
            'book' => $book
        ]);
    }

    public function pinjam($id)
    {
        $book = DB::table('books')
                    ->where('idbuku', $id)
                    ->first();

        $cek = DB::table('peminjaman')
        ->where('username', session()->get('username'))
        ->where('idbuku', $id)
        ->where('status', 'Dipinjam')
        ->first();

        if($cek)
        {
            return back()->with(
                'error',
                'Anda masih meminjam buku ini'
            );
        }

        if($book->qty <= 0)
        {
            return back()->with('error', 'Stok buku habis');
        }

        DB::table('peminjaman')->insert([
            'username' => session()->get('username'),
            'idbuku' => $id,
            'tanggal_pinjam' => date('Y-m-d'),
            'status' => 'Dipinjam'
        ]);

        DB::table('books')
            ->where('idbuku', $id)
            ->update([
                'qty' => $book->qty - 1
            ]);

        return back()->with('success', 'Buku berhasil dipinjam');
    }

    public function riwayat()
    {
        $data = DB::table('peminjaman')
                    ->join('books', 'peminjaman.idbuku', '=', 'books.idbuku')
                    ->where('username', session()->get('username'))
                    ->get();

        return view('user.riwayat', [
            'data' => $data
        ]);
    }

    public function datapeminjaman()
    {
        $data = DB::table('peminjaman')
                    ->join('books', 'peminjaman.idbuku', '=', 'books.idbuku')
                    ->get();

        return view('admin.peminjaman', [
            'data' => $data
        ]);
    }

    public function kembalikan($id)
    {
        $pinjam = DB::table('peminjaman')
                    ->where('id', $id)
                    ->first();

        if($pinjam->status == 'Dikembalikan')
        {
            return back();
        }

        $book = DB::table('books')
                    ->where('idbuku', $pinjam->idbuku)
                    ->first();

        DB::table('peminjaman')
            ->where('id', $id)
            ->update([
                'status' => 'Dikembalikan'
            ]);

        DB::table('books')
            ->where('idbuku', $pinjam->idbuku)
            ->update([
                'qty' => $book->qty + 1
            ]);

        return redirect('/admin/peminjaman');
    }

    public function home()
    {
        return view('home');
    }

    public function index()
    {
        $books = DB::table('books')->get();
        return view('index', ['books' => $books]);
    }

    public function cari($id)
    {
        $books = DB::table('books')
                    ->where('idbuku', $id)
                    ->get();

        return view('index', ['books' => $books]);
    }

    public function tambah(Request $request)
    {
        $filename = time().'_'.
                    $request->file('file')
                    ->getClientOriginalName();

        $request->file('file')->storeAs('public', $filename);

        DB::table('books')->insert([
            'idbuku' => $request->idbuku,
            'NamaBuku' => $request->NamaBuku,
            'NamaPengarang' => $request->NamaPengarang,
            'Kategori' => $request->Kategori,
            'qty' => $request->qty,
            'Image' => $filename
        ]);

        return redirect('/home');
    }

    public function hapus($id)
    {
        $cekPinjam = DB::table('peminjaman')
                ->where('idbuku',$id)
                ->where('status','Dipinjam')
                ->count();

        if($cekPinjam > 0)
        {
            return back()->with(
                'error',
                'Buku masih dipinjam user'
            );
        }

        $book = DB::table('books')
                    ->where('idbuku', $id)
                    ->first();

        if ($book && $book->Image) {
            Storage::delete('public/' . $book->Image);
        }

        DB::table('books')
            ->where('idbuku', $id)
            ->delete();

        return redirect('/home');
    }

    public function show($id)
    {
        $books = DB::table('books')
                    ->where('idbuku', $id)
                    ->get();

        return view('update', ['books' => $books]);
    }

    public function edit(Request $request, $id)
    {
        $book = DB::table('books')
                    ->where('idbuku', $id)
                    ->first();

        $data = [
            'NamaBuku' => $request->NamaBuku,
            'NamaPengarang' => $request->NamaPengarang,
            'Kategori' => $request->Kategori,
            'qty' => $request->qty
        ];

        if ($request->hasFile('file')) {

            if ($book && $book->Image) {
                Storage::delete('public/' . $book->Image);
            }

            $filename = time().'_'.
                        $request->file('file')
                        ->getClientOriginalName();

            $request->file('file')->storeAs('public', $filename);

            $data['Image'] = $filename;
        }

        DB::table('books')
            ->where('idbuku', $id)
            ->update($data);

        return redirect('/home');
    }

    public function signin()
    {
        return view('signin');
    }

   public function registrasi(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|min:6|max:50'
        ]);

        $username = strip_tags(trim($request->username));
        $password = trim($request->password);
        $cek = DB::table('user')
                ->where('username',$username)
                ->first();

        if($cek)
        {
            return back()->with(
                'error',
                'Username sudah digunakan'
            );
        }

        $cryptpassword = Hash::make($password);

        $split = str_split($cryptpassword, 30);

        DB::table('user')->insert([
            'username' => $username,
            'password' => $split[0],
            'extend' => $split[1],
            'status' => 'user'
        ]);

        return redirect('/')
                ->with(['success' => 'Username dan Password telah terdaftar.']);
    }

   public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = strip_tags(trim($request->username));
        $password = trim($request->password);

        $datauser = DB::table('user')
                        ->where('username', $user)
                        ->first();

        if ($datauser) {

            $combine = $datauser->password . $datauser->extend;

            if (Hash::check($password, $combine)) {

                $request->session()->put('username', $datauser->username);
                $request->session()->put('status', $datauser->status);

                if($datauser->status == 'admin')
                {
                    return redirect('/admin');
                }
                else
                {
                    return redirect('/user');
                }
            }
        }

        return redirect('/login')
                ->with(['error' => 'Username atau Password salah.']);
    }

    public function searchAdmin(Request $request)
    {
        $books = DB::table('books')
                    ->where(
                        'NamaBuku',
                        'like',
                        '%' . $request->keyword . '%'
                    )
                    ->get();

        return response()->json($books);
    }

    Public function logout()
    {
    session()->forget('username');
    session()->forget('status');

    return redirect('/login');
    }
}
