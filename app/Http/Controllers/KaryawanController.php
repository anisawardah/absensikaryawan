<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Menampilkan semua karyawan
    public function index()
    {
        return Karyawan::all();
    }

    // Menambah karyawan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_karyawan' => 'required|string|max:255|unique:karyawans',
            'email' => 'required|email|max:255|unique:karyawans',
            'departemen' => 'required|string|max:255',
        ]);

        return Karyawan::create($validatedData);
    }

    // Menampilkan detail karyawan
    public function show($id)
    {
        return Karyawan::findOrFail($id);
    }

    // Mengupdate data karyawan
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'jabatan' => 'sometimes|required|string|max:255',
            'nomor_karyawan' => 'sometimes|required|string|max:255|unique:karyawans,nomor_karyawan,'.$id,
            'email' => 'sometimes|required|email|max:255|unique:karyawans,email,'.$id,
            'departemen' => 'sometimes|required|string|max:255',
        ]);

        $karyawan->update($validatedData);

        return $karyawan;
    }

    // Menghapus karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return response()->json(['message' => 'Karyawan berhasil dihapus']);
    }
}