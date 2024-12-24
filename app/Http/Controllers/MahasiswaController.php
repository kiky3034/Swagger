<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0",
 *     description="Dokumentasi API untuk proyek Anda."
 * )
 */

class MahasiswaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/mahasiswa",
     *     summary="Dapatkan daftar semua mahasiswa",
     *     description="Mengembalikan daftar semua mahasiswa",
     *     operationId="getMahasiswa",
     *     tags={"Mahasiswa"},
     *     @OA\Response(
     *         response=200,
     *         description="Daftar mahasiswa",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Mahasiswa")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); // Mengambil semua data dari tabel 'mahasiswa'
        return response()->json($mahasiswas);
    }

    /**
     * @OA\Post(
     *     path="/api/mahasiswa",
     *     summary="Tambahkan mahasiswa baru",
     *     description="Menambahkan mahasiswa baru ke dalam database",
     *     operationId="addMahasiswa",
     *     tags={"Mahasiswa"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Mahasiswa")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Mahasiswa berhasil ditambahkan"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Permintaan tidak valid"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'email' => 'required|email|unique:mahasiswa,email',
            'jurusan' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }
}