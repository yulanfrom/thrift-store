<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('receiver_name')->after('user_id');

            $table->string('phone')->after('receiver_name');

            $table->text('address')->after('phone');

            $table->enum('payment_method', [
                'COD',
                'Transfer Bank',
                'E-Wallet'
            ])->after('address');

            $table->enum('payment_status', [
                'Belum Bayar',
                'Menunggu Verifikasi',
                'Sudah Bayar'
            ])->default('Belum Bayar')->after('payment_method');

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'receiver_name',
                'phone',
                'address',
                'payment_method',
                'payment_status'
            ]);

        });
    }
};