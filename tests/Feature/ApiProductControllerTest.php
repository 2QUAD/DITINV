<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa a URL da API de produtos.
     */
    public function test_can_fetch_products(): void
    {
        $this->withoutExceptionHandling();

        $product = $this->createProduct();

        $response = $this->get('api/products/');

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertDontSee('Test Product 2'); // Assegure-se de criar 'Test Product 2' se necessário
    }

    /**
     * Testa a URL da API de produtos com string de consulta.
     */
    public function test_can_filter_products_by_category(): void
    {
        $category = $this->createCategory();
        $product = $this->createProduct($category);

        // Cria um produto em outra categoria para garantir que ele não seja retornado
        $otherCategory = $this->createCategory(['name' => 'Other Category']);
        $this->createProduct($otherCategory);

        $response = $this->get('api/products?category_id=' . $category->id);

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertDontSee('Test Product 2'); // Assegure-se de criar 'Test Product 2' se necessário
    }

    /**
     * Cria um produto.
     *
     * @param \App\Models\Category|null $category
     * @return \App\Models\Product
     */
    public function createProduct(?Category $category = null): Product
    {
        $category = $category ?? $this->createCategory();
        return Product::factory()->create([
            'name' => 'Test Product',
            'category_id' => $category->id,
            'unit_id' => $this->createUnit()->id
        ]);
    }

    /**
     * Cria uma categoria.
     *
     * @param array $attributes
     * @return \App\Models\Category
     */
    protected function createCategory(array $attributes = []): Category
    {
        return Category::factory()->create(array_merge([
            'name' => 'Speakers'
        ], $attributes));
    }

    /**
     * Cria uma unidade.
     *
     * @return \App\Models\Unit
     */
    protected function createUnit(): Unit
    {
        return Unit::factory()->create([
            'name' => 'piece'
        ]);
    }
}
