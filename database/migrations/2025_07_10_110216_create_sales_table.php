<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');
            $table->date('date')->index();
            $table->date('last_change_date')->nullable();
            $table->string('supplier_article')->index();
            $table->string('tech_size');
            $table->bigInteger('barcode')->index();
            $table->decimal('total_price', 15, 2);
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->boolean('is_supply')->default(false);
            $table->boolean('is_realization')->default(false);
            $table->decimal('promo_code_discount', 10, 2)->nullable();
            $table->string('warehouse_name')->index();
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name')->index();
            $table->bigInteger('income_id')->index();
            $table->string('sale_id')->index();
            $table->string('odid')->nullable();
            $table->decimal('spp', 5, 2);
            $table->decimal('for_pay', 10, 2);
            $table->decimal('finished_price', 10, 2);
            $table->decimal('price_with_disc', 10, 2);
            $table->bigInteger('nm_id')->index();
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->boolean('is_storno')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
