<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupants', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('total_occupant')->default(0);
            $table->decimal("charge", 8, 0)->default(0);
            $table->timestamp('pay_date')->nullable();
            $table->foreignId('room_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('occupants');
    }
}
