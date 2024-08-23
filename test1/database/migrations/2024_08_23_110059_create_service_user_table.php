<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceUserTable extends Migration
{
    public function up()
    {
        Schema::create('service_user', function (Blueprint $table) {
            $table->increments('user_id'); // Auto-incrementing primary key
            $table->string('username', 50)->unique(); // Unique username
            $table->binary('password'); // Binary type for storing hashed password
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('house_number', 20)->nullable();
            $table->string('road', 100)->nullable();
            $table->string('sub_district', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('user_picture', 255)->nullable();
            $table->string('user_phone', 20)->nullable();
            $table->dateTime('created_date');
            $table->unsignedInteger('created_by')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_user');
    }
}
