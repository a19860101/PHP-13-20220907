<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            // $table->unsignedBigInteger('category_id')->nullable()->after('title');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->foreignId('category_id')->nullable()->after('title')->constrained()->nullOnDelete();
            // $table->cascadeOnDelete();
            // $table->restrictOnDelete();
            // $table->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
