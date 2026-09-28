<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Director;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class CompanyProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_only_shows_published_content(): void
    {
        Product::create([
            'name' => 'NPK Unggulan', 'slug' => 'npk-unggulan', 'description' => 'Nutrisi untuk tanaman.',
            'nitrogen' => 11, 'phosphorus' => 6, 'potassium' => 31, 'netto' => '10 kg/sak',
            'category' => 'Pupuk NPK', 'is_published' => true,
        ]);
        Product::create([
            'name' => 'Produk Draft', 'slug' => 'produk-draft', 'description' => 'Belum tayang.',
            'nitrogen' => 1, 'phosphorus' => 1, 'potassium' => 1, 'netto' => '1 kg',
            'category' => 'Draft', 'is_published' => false,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('NPK Unggulan')
            ->assertDontSee('Produk Draft');
    }

    public function test_product_detail_shows_formula_and_packaging(): void
    {
        $product = Product::create([
            'name' => 'AgrinovaX NPK 11-6-31', 'slug' => 'agrinnovax-11-6-31',
            'description' => 'Formulasi nutrisi tanaman.', 'nitrogen' => 11, 'phosphorus' => 6,
            'potassium' => 31, 'netto' => '10 kg/sak', 'certification' => null,
            'category' => 'Pupuk NPK', 'is_published' => true,
        ]);

        $this->get(route('products.show', $product->slug))
            ->assertOk()
            ->assertSee('11')
            ->assertSee('31')
            ->assertSee('10 kg/sak')
            ->assertSee('Sertifikasi');
    }

    public function test_article_detail_displays_escaped_article_content(): void
    {
        $article = Article::create([
            'title' => 'Nutrisi tanaman', 'slug' => 'nutrisi-tanaman', 'excerpt' => 'Mengenal unsur hara.',
            'content' => "Nutrisi yang seimbang.\n\nPerhatikan kebutuhan tanaman.",
            'is_published' => true, 'published_at' => now(),
        ]);

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee('Nutrisi yang seimbang.')
            ->assertSee('Perhatikan kebutuhan tanaman.');
    }

    public function test_only_admins_can_open_content_management(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)->get(route('admin.dashboard'))->assertForbidden();

        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin)->get(route('admin.dashboard'))->assertOk();
    }

    public function test_admin_content_lists_and_forms_render(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin);

        $this->get(route('admin.products.index'))->assertOk();
        $this->get(route('admin.products.create'))->assertOk();
        $this->get(route('admin.articles.index'))->assertOk();
        $this->get(route('admin.articles.create'))->assertOk();
        $this->get(route('admin.directors.index'))->assertOk();
        $this->get(route('admin.directors.create'))->assertOk();
    }

    public function test_public_collection_pages_render_and_home_links_to_them(): void
    {
        Director::create(['name' => 'Fahmi Rosyadi', 'position' => 'Direktur', 'sort_order' => 1]);

        $this->get(route('products.index'))->assertOk();
        $this->get(route('articles.index'))->assertOk();
        $this->get(route('directors.index'))->assertOk()->assertSee('Fahmi Rosyadi');
        $this->get(route('about'))->assertOk();
        $this->get(route('contact'))->assertOk();
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('products.index'))
            ->assertSee(route('articles.index'))
            ->assertSee(route('directors.index'));
    }

    public function test_admin_seeder_creates_login_account_from_config(): void
    {
        Config::set('albera.admin.name', 'Admin ALBERA');
        Config::set('albera.admin.email', 'admin@albera.test');
        Config::set('albera.admin.password', 'Kredensial-Aman-2026');

        $this->seed(AdminUserSeeder::class);

        $admin = User::where('email', 'admin@albera.test')->firstOrFail();

        $this->assertTrue($admin->is_admin);
        $this->assertTrue(password_verify('Kredensial-Aman-2026', $admin->password));
    }

    public function test_admin_login_redirects_to_content_dashboard(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@albera.test',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $this->post(route('login'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard', absolute: false));
    }

    public function test_admin_can_create_product_with_optional_certification(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->post(route('admin.products.store'), [
            'name' => 'Pupuk Kebun',
            'description' => 'Formulasi untuk kebutuhan tanaman.',
            'nitrogen' => 12,
            'phosphorus' => 8,
            'potassium' => 24,
            'netto' => '5 kg/sak',
            'certification' => '',
            'category' => 'Pupuk NPK',
            'is_published' => '1',
        ])->assertRedirect(route('admin.products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Pupuk Kebun',
            'nitrogen' => 12,
            'phosphorus' => 8,
            'potassium' => 24,
            'certification' => null,
        ]);
    }
}
