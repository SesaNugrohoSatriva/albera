<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Director;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Product::firstOrCreate(['slug' => 'agrinnovax-npk-11-6-31'], [
            'name' => 'AgrinovaX® NPK 11-6-31',
            'description' => 'Pupuk anorganik dengan formulasi unsur hara makro yang dirancang untuk membantu memenuhi kebutuhan nutrisi tanaman pada berbagai fase pertumbuhan.',
            'nitrogen' => 11,
            'phosphorus' => 6,
            'potassium' => 31,
            'netto' => '10 kg/sak',
            'certification' => null,
            'category' => 'Pupuk premium khusus sawit',
            'is_published' => true,
        ]);

        Product::firstOrCreate(['slug' => 'agrinnovax-npk-15-20-20'], [
            'name' => 'AgrinovaX® NPK 15-20-20',
            'description' => 'Pupuk anorganik yang ditujukan untuk mendukung pemenuhan kebutuhan unsur hara tanaman secara efektif sebagai bagian dari program pemupukan.',
            'nitrogen' => 15,
            'phosphorus' => 20,
            'potassium' => 20,
            'netto' => '30 gram/sachet',
            'certification' => null,
            'category' => 'Pupuk larut air',
            'is_published' => true,
        ]);

        Article::firstOrCreate(['slug' => 'pentingnya-nutrisi-tanaman'], [
            'title' => 'Pentingnya Nutrisi Tanaman dalam Mendukung Produktivitas',
            'excerpt' => 'Pemenuhan unsur hara menjadi salah satu bagian penting dalam pengelolaan pertumbuhan dan produktivitas tanaman.',
            'content' => "Pertumbuhan tanaman dipengaruhi oleh banyak faktor, termasuk ketersediaan unsur hara yang dibutuhkan pada setiap fase pertumbuhannya. Pemenuhan nutrisi yang seimbang menjadi salah satu bagian dari praktik budidaya yang baik.\n\nProgram pemupukan sebaiknya mempertimbangkan jenis tanaman, kondisi lahan, serta rekomendasi agronomis. Dengan informasi yang tepat, petani dapat merencanakan pemupukan secara lebih terarah dan efisien.",
            'is_published' => true,
            'published_at' => now(),
        ]);

        Article::firstOrCreate(['slug' => 'mengenal-peran-npk'], [
            'title' => 'Mengenal Peran NPK dalam Pemenuhan Unsur Hara',
            'excerpt' => 'Nitrogen, fosfor, dan kalium memiliki fungsi berbeda yang saling mendukung kebutuhan nutrisi tanaman.',
            'content' => "NPK merupakan singkatan dari nitrogen (N), fosfor (P), dan kalium (K), tiga unsur hara makro yang umum dicantumkan pada produk pupuk. Angka pada formulasi menunjukkan persentase kandungan masing-masing unsur.\n\nKebutuhan tanaman dapat berbeda bergantung pada komoditas, fase pertumbuhan, dan kondisi tanah. Karena itu, pemilihan formulasi dan cara aplikasi perlu disesuaikan dengan rekomendasi agronomis dan petunjuk pada kemasan.",
            'is_published' => true,
            'published_at' => now()->subDays(3),
        ]);

        Article::firstOrCreate(['slug' => 'albera-solusi-agrokimia'], [
            'title' => 'PT Albera dan Pengembangan Solusi Agrokimia',
            'excerpt' => 'Mengenal arah pengembangan produk dan komitmen perusahaan dalam mendukung sektor pertanian.',
            'content' => "PT. Agro Lestari Berkah Nusantara (ALBERA) bergerak di bidang agrokimia dengan fokus pada produk pupuk anorganik. Perusahaan berupaya menjaga konsistensi mutu dan menyediakan informasi produk yang jelas bagi pelanggan.\n\nALBERA terus membangun kemitraan dengan petani, distributor, dan pelaku usaha pertanian untuk mendukung kebutuhan sektor pertanian Indonesia.",
            'is_published' => true,
            'published_at' => now()->subDays(7),
        ]);

        foreach ([
            ['Fahmi Rosyadi', 'Direktur', 1],
            ['Deby Hastono', 'Manajer Operasional', 2],
            ['Muslih Riza', 'Technical Service', 3],
            ['Amin Luthfy', 'Admin / Finance', 4],
        ] as [$name, $position, $sortOrder]) {
            Director::firstOrCreate(['name' => $name], [
                'position' => $position,
                'sort_order' => $sortOrder,
            ]);
        }

        $this->call(LoginUserSeeder::class);
    }
}
