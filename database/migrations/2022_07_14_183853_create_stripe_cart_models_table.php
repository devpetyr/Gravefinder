<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripeCartModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_cart_models', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('payment');
            $table->string('card_id');
            $table->string('balance_transaction');
            $table->string('payment_method');
            $table->string('receipt_url');
            $table->integer('card_last_four');
            $table->string('all_data',10000);
            $table->integer('is_active')->default(1);
            $table->integer('is_deleted')->default(0);
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
        Schema::dropIfExists('stripe_cart_models');
    }
}
