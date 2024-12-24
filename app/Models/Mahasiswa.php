<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Mahasiswa",
 *     description="Model Mahasiswa",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="nama",
 *         type="string",
 *         description="Nama mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="nim",
 *         type="string",
 *         description="Nomor Induk Mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="jurusan",
 *         type="string",
 *         description="Jurusan mahasiswa"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Waktu pembuatan record"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Waktu pembaruan record"
 *     )
 * )
 */
class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Menyebutkan nama tabel jika berbeda dari konvensi
    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];

    // Jika Anda menggunakan timestamps (created_at dan updated_at) maka tidak perlu menambah atribut ini
    // Jika tidak ingin menggunakan timestamps, Anda bisa menambahkan:
    // public $timestamps = false;
}