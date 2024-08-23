<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    protected $table = 'service_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false; // Disable default timestamps

    protected $fillable = [
        'username', 'password', 'first_name', 'last_name', 'house_number',
        'road', 'sub_district', 'district', 'province', 'postal_code',
        'user_picture', 'user_phone', 'created_date', 'created_by', 'updated_date', 'updated_by'
    ];
}
