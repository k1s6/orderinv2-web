<?php

namespace App\Http\Controllers\MobileAPI;

use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Logging\Exception;
use App\Http\Controllers\Controller;
use Database\Seeders\UserdumpSeeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MobileUserController extends Controller
{
    public function signinEmail(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('password');

        // cek email exist atau tidak
        $isExist = json_decode($this->isExistEmail($request)->getContent(), true);

        // jika email tidak exist
        if ($isExist['status'] !== 'success') {
            return response()->json(['status' => 'error', 'message' => 'Username tidak terdaftar'], 400);
        }

        // get password
        $dbPass = User::select("password")->where('email', $email)->limit(1)->get();

        // jika password tidak cocok
        if (!password_verify($password, $dbPass[0]->password)) {
            return response()->json(['status' => 'error', 'message' => 'Password tidak cocok'], 400);
        }


        return response()->json(['status' => 'success', 'message' => 'Login Berhasil'], 200);
     
    }

    public function login(Request $request)
    {
        
        // Validasi data yang diterima
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        // // // Jika validasi gagal, kirimkan pesan kesalahan
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        // // Mendapatkan data dari request
        $data = $request->only('username', 'password');

        // // Mencari user berdasarkan email
        $user = User::where('email', $data['username'])->first();

        // Jika user tidak ditemukan atau password tidak sesuai
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah',
            ], 401);
        }
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah',
            ], 400);
        }

        // Jika login berhasil
        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
        ]);
    }

    public function isExistEmail(Request $request)
    {
        $email = $request->input("username");

        $isExist = User::select("email")->where('email', '=', $email)->limit(1)->exists();

        if ($isExist) {
            return response()->json(['status' => 'success'], 200);
        } else {
            return response()->json(['status' => 'error'], 400);
        }
    }

    public function addUserData()
    {
        try {
            $seeder = new UserdumpSeeder();
            $seeder->run();
            echo "User data seeding successful!";
        } catch (Exception $e) {
            echo "User data seeding failed: " . $e->getMessage();
        }
    }
}