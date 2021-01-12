<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLoginAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_login_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->longText('auth1_token')->nullable();
            $table->longText('auth1_tokenSecret')->nullable();
            $table->longText('auth2_token')->nullable();
            $table->longText('auth2_refreshToken')->nullable();
            $table->timestamp('auth2_expiresIn')->nullable();
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
        Schema::dropIfExists('social_login_accounts');
    }
}
