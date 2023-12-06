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
        Schema::create('productdetails2', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('rate', 8, 2); // Assuming a decimal with 8 digits, 2 after the decimal point
            $table->decimal('totalAmount', 10, 2); // Adjust the precision and scale as needed
            $table->string('pic')->nullable(); // Assuming the picture file name; nullable allows for an empty value
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdetails_table2');
    }
};
