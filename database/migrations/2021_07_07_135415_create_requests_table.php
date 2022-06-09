<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vehicle_id')->on('vehicles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('stakeholder_id')->on('stakeholders')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('approval_take')->nullable();
            $table->tinyInteger('approval_use')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
