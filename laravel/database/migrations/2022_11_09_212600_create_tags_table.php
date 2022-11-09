<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->nullable()->constrained();
            $table->foreignId('tag_id')->nullable()->constrained();
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
        Schema::table('post_tag',function(Blueprint $table){
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['post_id']);
        });
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
    }
}
