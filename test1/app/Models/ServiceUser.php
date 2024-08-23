<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'service_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false; // Disable default timestamps

    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'house_number',
        'road',
        'sub_district',
        'district',
        'province',
        'postal_code',
        'user_picture',
        'user_phone',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by',
    ];

    protected $hidden = [
        'password',
    ];

    // Optionally, if you want to customize authentication columns
    public function getAuthPassword()
    {
        return $this->password;
    }
}
