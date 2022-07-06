<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class CreateMesaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesais', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personel_id')->unsigned();
            $table->string('start');
            $table->string('end')->nullable()->default('Hala Çalışıyor');
            $table->decimal('total',20,2)->nullable()->default(0);
            $table->string('notes')->nullable()->default('Not Yok');
            $table->timestamps();

            $table->foreign('personel_id')->references('id')->on('personels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesais');
    }
}
