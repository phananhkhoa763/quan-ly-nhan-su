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
            $table->increments('id');
            $table->string('name',255);
            $table->string('email',255)->unique();
            $table->string('password');
            $table->string('avatar',255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone',20);
            $table->dateTime('birthday');
            $table->string('address',255);
            $table->string('cmnd',255)->comment = 'chung minh nhan dan';
            $table->string('place_of_origin',255)->comment = 'quen quan ';
            $table->string('ethnicity',255)->comment = 'dan toc';
            $table->string('sobhxh',255)->comment = 'so bao hiem xa hoi';
            $table->tinyInteger('gender')->nullable();
            $table->integer('position_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('user_type')->nullable()->comment = '1.admin , 2:user';
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
