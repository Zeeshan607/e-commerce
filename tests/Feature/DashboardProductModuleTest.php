<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Services\GlobalHelpersService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\DataTables\ProductsDataTable;
use Mockery;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class DashboardProductModuleTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        // Setup code here, runs before each test
        // Create and log in a user if authentication is required
        $admin = Admin::factory()->create();
        $this->actingAs($admin,"admin"); // Logs in the admin

    }
    /**
     * A basic feature test example.
     */
    public function test_index_method_renders_datatables_view(): void
    {

        // Mock the DataTable to isolate the controller logic
        $dataTableMock = Mockery::mock(ProductsDataTable::class);

        // Expect the `render` method to be called once with the correct view
        $dataTableMock->shouldReceive('render')
            ->once()
            ->with('admin.sidebar.products.index')
            ->andReturn('rendered-view');

        // Bind the mock to the container
        $this->instance(ProductsDataTable::class, $dataTableMock);

        // Act - Call the index route
        $response = $this->get(route('dashboard.product.index')); // Replace with your actual route name

        // Assert the response content matches the expected output
        $response->assertStatus(200);
        $response->assertSee('rendered-view');
    }

    public function test_if_it_can_create_a_product(): void
    {
        // Disable exception handling to see full error traces
        $this->withoutExceptionHandling();

        // Fake the storage for image upload
        Storage::fake('public');
        //create category
        $category = Category::factory()->create();
        // Prepare the form data
        $formData = [
            "name"=>'test product 1',
            "slug"=>"test-product-1",
            "description"=>"test product 1 description",
            'images' => [UploadedFile::fake()->image('test-image.jpg')], // Simulate an image file
            'cost'=>9999.99,
            'price'=>1200.99,
            'category_id'=>$category->id,
        ];
        $ImgName = GlobalHelpersService::processImageName($formData['images'][0],"webp");
        // Act - Submit a POST request to the store route
        $response = $this->post(route('dashboard.product.store'), $formData);

        //dump response and session
        $response->dump();
        $response->dumpSession(); // See session errors

        // Assert that there are no validation errors
        $response->assertSessionHasNoErrors();

        // Assert - Check if the product was created in the database
        $this->assertDatabaseHas('products', [
            'name' => 'test product 1',
            'slug' => 'test-product-1',
            'price' => 1200.99,
        ]);

        // Assert that the file was uploaded to the correct location
        Storage::disk('public')->assertExists('products/test-product-1/'. $ImgName);

        // Assert that the response redirects to the correct page with a success message
        $response->assertRedirect(route('dashboard.product.index'));
        $response->assertSessionHas('success','Product created successfully');

    }

}
