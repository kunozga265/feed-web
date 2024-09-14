<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->id();
            $table->integer("type");
            $table->string("name");
            $table->double("dm")->nullable();
            $table->double("cp")->nullable();
            $table->double("ndf")->nullable();
            $table->double("fat")->nullable();
            $table->double("adf")->nullable();
            $table->double("phosphorus")->nullable();
            $table->double("calcium")->nullable();
            $table->double("sodium")->nullable();
            $table->double("chlorine")->nullable();
            $table->double("potassium")->nullable();
            $table->double("magnesium")->nullable();
            $table->double("sulphur")->nullable();
            $table->double("cobalt")->nullable();
            $table->double("copper")->nullable();
            $table->double("iodine")->nullable();
            $table->double("iron")->nullable();
            $table->double("manganese")->nullable();
            $table->double("selenium")->nullable();
            $table->double("zinc")->nullable();
            $table->double("vitamin_a")->nullable();
            $table->double("vitamin_d")->nullable();
            $table->double("vitamin_e")->nullable();
            $table->double("energy")->nullable();
            $table->double("percentage")->nullable();
            $table->double("cost")->nullable();
            $table->double("net_energy")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};
