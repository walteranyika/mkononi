<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('amount', 15, 2);
            $table->float('total_amount_to_repay', 15, 2);
            $table->integer('duration');
            $table->float('interest', 15, 2)->nullable();
            $table->float('monthly_repayment_amount', 15, 2)->nullable();
            $table->float('admin_fee', 15, 2)->nullable();
            $table->string('code')->nullable();
            $table->boolean('processed')->default(0)->nullable();
            $table->boolean('repaid')->default(0);
            $table->float('monthly_interest', 15, 2)->nullable();
            $table->float('admin_fee_percentage', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
