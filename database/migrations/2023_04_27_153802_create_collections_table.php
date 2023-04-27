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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('collection_id');
            $table->string('handle');
            $table->string('title');
            $table->timestamp('updated_at');
            $table->timestamp('published_at');
            $table->string('body_html')->nullable();
            $table->string('sort_order');
            $table->string('template_suffix')->nullable();
            $table->integer('products_count');
            $table->string('collection_type');
            $table->string('published_scope');
            $table->string('admin_graphql_api_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
};
