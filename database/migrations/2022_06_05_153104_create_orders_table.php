<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('number_of_classes');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_telephone');
            $table->string('buyer_name')->nullable();
            $table->string('unvan')->nullable();
            $table->string('tckn')->nullable();
            $table->string('vergi_no')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->string('address');
            $table->string('price');
            $table->string('token')->nullable();
            $table->string('status')->default('Waiting For Payment');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
