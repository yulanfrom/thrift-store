public function up(): void
{
    Schema::create('carts', function (Blueprint $table) {

        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('product_id')
              ->constrained()
              ->onDelete('cascade');

        $table->integer('qty')->default(1);

        $table->timestamps();

    });
}