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
      Schema::create('messages', function (Blueprint $table) {
    $table->id();
    $table->text('content');
    $table->boolean('is_admin_message')->default(false);
    $table->boolean('is_read')->default(false);
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Relación con users
    $table->foreignId('role_id')->nullable()->constrained()->onDelete('cascade'); // Relación con roles
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
