<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->comment('名称');
            $table->string('password')->comment('密码');
            $table->string('avatar')->nullable()->comment('头像');
            $table->tinyInteger('is_banned')->default(0)->index()->comment('是否禁止用户');
            $table->integer('login_count')->default(0)->comment('登录次数');
            $table->tinyInteger('role_id')->comment('角色');
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
        Schema::dropIfExists('admins');
    }
}
