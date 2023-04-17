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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->string('name');
            $table->string('email',50)->unique();
            $table->bigInteger('contact_no')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',999);
            $table->integer('is_active')->default(1)->comment('1=>Active, 2=>InActive');
            $table->rememberToken();
            $table->timestamps();
            $table->string("created_by",10)->nullable();
            $table->string("updated_by",10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
