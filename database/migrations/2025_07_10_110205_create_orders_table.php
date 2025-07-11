<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('g_number')->index();
            $table->dateTime('date')->index();
            $table->date('last_change_date')->nullable();
            $table->string('supplier_article')->index();
            $table->string('tech_size');
            $table->bigInteger('barcode')->index();
            $table->decimal('total_price', 15, 2);
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->string('warehouse_name')->index();
            $table->string('oblast')->index();
            $table->bigInteger('income_id')->index();
            $table->string('odid');
            $table->bigInteger('nm_id')->index();
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->boolean('is_cancel')->default(false);
            $table->date('cancel_dt')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
