<?php


namespace CodePress\CodeCategory\Testing;

use CodePress\CodeCategory\Models\Category;
use Tests\TestCase;

class AdminCategoriesTest extends TestCase
{

    public function test_can_visit_admin_categories_page()
    {
        $response = $this->get('/admin/categories');

        $response->assertSee('Categories');
    }

    public function test_categories_listing()
    {
        Category::create(['name' => 'Category 1', 'active' => true]);
        Category::create(['name' => 'Category 2', 'active' => true]);
        Category::create(['name' => 'Category 3', 'active' => true]);
        Category::create(['name' => 'Category 4', 'active' => true]);

        $this->get('/admin/categories')
            ->assertSee('Category 1')
            ->assertSee('Category 2')
            ->assertSee('Category 3')
            ->assertSee('Category 4');
    }

}