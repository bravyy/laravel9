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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 191);
            $table->string('title', 191);
            $table->string('page_title', 191)->nullable();
            $table->text('body')->nullable();
            $table->boolean('published')->unsigned();
            $table->boolean('show_in_menu')->unsigned();
            $table->timestamps();

            $table->index('slug', 'pages_slug_ix');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
