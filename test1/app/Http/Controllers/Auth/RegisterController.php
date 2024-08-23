<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ServiceUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:service_user'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'house_number' => ['nullable', 'string', 'max:255'],
            'road' => ['nullable', 'string', 'max:255'],
            'sub_district' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:10'],
            'user_phone' => ['nullable', 'string', 'max:15'],
            'user_picture' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    protected function create(array $data)
    {
        // Handle file upload
        $userPicturePath = null;
        if (isset($data['user_picture']) && $data['user_picture']->isValid()) {
            $userPicturePath = $data['user_picture']->store('pictures');
        }

        return ServiceUser::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'house_number' => $data['house_number'] ?? null,
            'road' => $data['road'] ?? null,
            'sub_district' => $data['sub_district'] ?? null,
            'district' => $data['district'] ?? null,
            'province' => $data['province'] ?? null,
            'postal_code' => $data['postal_code'] ?? null,
            'user_phone' => $data['user_phone'] ?? null,
            'user_picture' => $userPicturePath,
            'created_date' => now(),
            'created_by' => null, // or replace with a specific user ID if needed
        ]);
    }
}
