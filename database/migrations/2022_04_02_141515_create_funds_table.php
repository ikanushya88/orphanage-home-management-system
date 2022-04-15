<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('feed_id');
            $table->string('transaction_id');
            $table->double('amount');
            $table->text('purchase_units')->nullable();
            $table->text('payer')->nullable();
            $table->text('links')->nullable();
            $table->string('admin_reference')->nullable();
            $table->string('status')->comment('CREATED|COMPLETED|CANCELLED|PAID');
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
        Schema::dropIfExists('funds');
    }
};
