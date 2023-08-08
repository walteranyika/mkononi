<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('pin')->nullable();
            $table->boolean('pin_reset')->default(0)->nullable();
            $table->boolean('enabled')->default(0)->nullable();
            $table->float('six_month_royalties', 15, 2);
            $table->float('loan_limit', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
