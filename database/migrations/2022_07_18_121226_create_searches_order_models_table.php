<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchesOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searches_order_models', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('invoice_number');
            $table->string('payment_method');
            $table->string('amount');
            $table->string('receipt_url')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('card_id')->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('order_id')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('status')->default(1);
            $table->tinyInteger('is_active')->default('1');
            $table->tinyInteger('is_deleted')->default('0');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('searches_order_models');
    }
}
