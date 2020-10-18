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
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('mobile')->unique();
            $table->string('gender');
            $table->string('dob');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('student_code')->nullable();
            $table->string('co_relation')->nullable();
            $table->string('parent_email')->nullable();
            $table->string('parent_mobile')->nullable();
            $table->string('parent_first_name')->nullable();
            $table->string('parent_middle_name')->nullable();
            $table->string('parent_last_name')->nullable();
            $table->string('parent_dob')->nullable();
            $table->string('parent_gender')->nullable();
            $table->string('source_name')->default('B2B');
            $table->string('emp_status')->default('I');
            $table->string('employee_types_id')->default('Employee');
            $table->integer('is_active')->default(0);
            $table->integer('send_otp')->default(1);
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
