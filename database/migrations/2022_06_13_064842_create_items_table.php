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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->integer('price');
            $table->string('currency');
            $table->string('year');
            $table->timestamps();
        });

        DB::table('items')->insert(
            ([
                ['item' => 'Başvuru hizmet ücreti','price' => '1500', 'currency' => 'TL', 'year' => '2022'],
                ['item' => 'Başvuru resmi ücreti','price' => '380', 'currency' => 'TL', 'year' => '2022'],
                ['item' => 'Başvuru ek sınıf resmi ücreti','price' => '380', 'currency' => 'TL', 'year' => '2022'],
                ['item' => 'Başvuru ek sınıf hizmet ücreti','price' => '120', 'currency' => 'TL', 'year' => '2022'],
                ['item' => 'Tescil resmi ücreti','price' => '1020', 'currency' => 'TL', 'year' => '2022'],
            ])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
