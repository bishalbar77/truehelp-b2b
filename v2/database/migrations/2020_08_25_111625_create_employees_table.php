<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('gender');
            $table->string('source_name')->nullable();
            $table->string('dob');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address');
            $table->string('api_key')->nullable();
            $table->string('device_id')->nullable();
            $table->string('last_seen')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('send_otp')->default(1);
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
