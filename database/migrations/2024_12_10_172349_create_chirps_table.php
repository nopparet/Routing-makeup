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
        Schema::create('chirps', function (Blueprint $table) { //schema ตรงกับฐานข้อมูล สร้างฟังชั่นอะไร เทเบิ้ลอะไรแต่ละประเภท
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('message'); //เพิ่มคอลัม แมสเส็จ การเชื่อมโยงกับยูสเซอร์ของใครของมัน
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
