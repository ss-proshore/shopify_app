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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('product_id')->unique();
            $table->text('body_html')->nullable();
            $table->string('vendor');
            $table->string('product_type');
            $table->timestamps();
            $table->string('handle');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('template_suffix')->nullable();
            $table->string('status');
            $table->string('published_scope');
            $table->string('tags')->nullable();
            $table->string('admin_graphql_api_id')->nullable();
            $table->json('variants')->nullable();
            $table->json('options')->nullable();
            $table->json('images')->nullable();
            $table->json('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
