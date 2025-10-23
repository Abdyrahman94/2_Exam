<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // 🆔 ESAS ID - Her user üçin birlik san
            $table->id();
            
            // 👤 USER-ÝŇ ADY - Mysal: "Aýdym", "Merdan"
            $table->string('name');
            
            // 📧 EMAIL - Login üçin ulanylýar, BIRLIKLI bolmaly
            $table->string('email')->unique();
            
            // 🔐 PASSWORD - Giriş paroly, şifrlenen ýaly saklanylýar
            $table->string('password');
            
            // 🎭 ROLE (TÄZE) - Admin ýa-da Müşderi
            // 'admin' - Admin panel girip biler
            // 'client' - Diňe sahypa görüp biler
            $table->enum('role', ['admin', 'client'])->default('client');

            // 🍪 REMEMBER_TOKEN - "Meni ýatda sakla" üçin token
            // NULL bolup biler - user "ýatda sakla" basmasa
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
