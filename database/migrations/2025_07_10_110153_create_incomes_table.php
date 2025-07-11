<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('income_id')->index();
            $table->string('number')->nullable();
            $table->date('date');
            $table->date('last_change_date')->nullable();
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->bigInteger('barcode')->index();
            $table->integer('quantity')->default(0);
            $table->decimal('total_price', 15, 2)->default(0);
            $table->date('date_close')->nullable();
            $table->string('warehouse_name')->index();
            $table->bigInteger('nm_id')->index();
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
        Schema::dropIfExists('incomes');
    }
}
