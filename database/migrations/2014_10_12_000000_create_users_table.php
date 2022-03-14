<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('الأسم الأول');
            $table->string('الأسم الأخير');
			$table->string('الدرجة العلمية')->nullable();
			$table->string('الشهادة العلمية')->nullable();
			$table->bigInteger('العمر');
            $table->string('الأيميل')->unique();
            $table->string('كلمة السر');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
