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
        Schema::create('admin_generate_link', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('unique_string');
            $table->string('link');
            // $table->timestamps();
            $table->date('created_at');
            $table->date('expired_at');
            $table->foreign('admin_id')->references('admin_id')->on('admins')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_generate_link');
    }
};
