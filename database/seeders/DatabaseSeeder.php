<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\PromoCode;
use App\Models\Shirt;
use App\Models\ShirtPhoto;
use App\Models\ShirtSize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User; // Add User model
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Baju',
                'icon' => database_path('seeders/seeder-assets/kategori/baju.jpg')
            ],
            [
                'name' => 'Hoodie',
                'icon' => database_path('seeders/seeder-assets/kategori/hoodie.jpg')
            ],
            [
                'name' => 'Jaket',
                'icon' => database_path('seeders/seeder-assets/kategori/jaket.jpg')
            ],
            [
                'name' => 'Kemeja',
                'icon' => database_path('seeders/seeder-assets/kategori/kemeja.jpg')
            ],
        ];

        foreach ($categories as $category) {
            $iconPath = $category['icon'];
            $extension = pathinfo($iconPath, PATHINFO_EXTENSION);
            $filename = 'seeder-assets/kategori/' . Str::slug($category['name']) . '.' . $extension;

            // Copy file to storage
            if (file_exists($iconPath)) {
                Storage::disk('public')->putFileAs(
                    dirname($filename),
                    $iconPath,
                    basename($filename)
                );

                $category['icon'] = $filename;
            }

            Category::create($category);
        }

        $brands = [
            [
                'name' => 'Adidas',
                'logo' => database_path('seeders/seeder-assets/brand/adidas.jpg')
            ],
        ];

        foreach ($brands as $brand) {
            $logoPath = $brand['logo'];
            $extension = pathinfo($logoPath, PATHINFO_EXTENSION);
            $filename = 'seeder-assets/brand/' . Str::slug($brand['name']) . '.' . $extension;

            // Copy file to storage
            if (file_exists($logoPath)) {
                Storage::disk('public')->putFileAs(
                    dirname($filename),
                    $logoPath,
                    basename($filename)
                );

                $brand['logo'] = $filename;
            }

            Brand::create($brand);
        }

        $promoCodes = [
            [
                'code' => 'WELCOME2024',
                'discount_amount' => 50000
            ],
            [
                'code' => 'TAHUNBARU',
                'discount_amount' => 100000
            ],
            [
                'code' => 'SPESIAL10',
                'discount_amount' => 75000
            ],
        ];

        foreach ($promoCodes as $promoCode) {
            PromoCode::create($promoCode);
        }

        $shirts = [
            [
                'name' => 'MONOGRAM TRACK TOP',
                'thumbnail' => database_path('seeders/seeder-assets/baju/baju7.mp4'),


                'about'=>  'Jaket olahraga dengan desain klasik yang diberi sentuhan modern. Dihiasi pola monogram khas Adidas, jaket ini memiliki resleting penuh, kerah tinggi, dan material ringan yang nyaman dipakai sehari-hari atau untuk olahraga santai. Cocok untuk tampil sporty dan stylish.\n\nDesainnya mencakup motif monogram yang menampilkan pola khas monogram dengan kesan mewah dan berkelas, pola logo ikonik Adidas yang berulang, serta garis 3-Stripe yang menjadi ciri khas Adidas untuk tampilan sporty. Potongan klasik dengan fit reguler membuatnya nyaman digunakan sehari-hari atau saat olahraga ringan.\n\nJaket ini dibuat dari bahan berkualitas tinggi seperti polyester daur ulang, mendukung keberlanjutan lingkungan, dengan material yang lembut, ringan, nyaman di kulit, dan memberikan kehangatan yang cukup.\n\nFitur-fitur lainnya meliputi resleting penuh untuk kemudahan pemakaian dan pengaturan ventilasi, kerah tinggi untuk perlindungan ekstra terhadap angin, serta kantong samping yang praktis untuk menyimpan barang kecil seperti kunci atau smartphone.\n\nJaket ini cocok untuk olahraga santai seperti jogging, yoga, atau pergi ke gym, sekaligus dapat digunakan sebagai pakaian casual untuk gaya sehari-hari yang modis.\n\nTersedia dalam berbagai warna dengan kombinasi warna netral dan aksen logo monogram, serta ukuran yang beragam mulai dari S hingga XL untuk memenuhi kebutuhan berbagai tipe tubuh.',
                'price' => 150000,
                'stock' => 100,
                'is_popular' => false,
                'category_id' => 3,
                'brand_id' => 1,
                'photos' => [
                    database_path('seeders/seeder-assets/baju/baju2.jpg'),
                    database_path('seeders/seeder-assets/baju/baju3.jpg'),
                    database_path('seeders/seeder-assets/baju/baju4.jpg'),
                    database_path('seeders/seeder-assets/baju/baju5.jpg'),
                    database_path('seeders/seeder-assets/baju/baju6.jpg'),
                    database_path('seeders/seeder-assets/baju/baju1.jpg')

                ],
                'sizes' => ['S', 'M', 'L', 'XL']
            ],
            [
                'name' => 'NEUCLASSICS HOODIE',
                'thumbnail' => database_path('seeders/seeder-assets/hoodie/hoodie1.jpg'),
                'about' => 'hoodie dari Adidas yang menggabungkan desain klasik dengan sentuhan modern. Dengan desain yang simpel namun tetap stylish, hoodie ini menjadi pilihan tepat untuk berbagai kegiatan santai dan olahraga ringan, serta cocok digunakan sehari-hari. Dirancang dengan detail ikonik Adidas, termasuk logo klasik yang memperkuat kesan sporty dan elegan, hoodie ini menawarkan keseimbangan sempurna antara kenyamanan dan gaya',
                'price' => 299000,
                'stock' => 75,
                'is_popular' => true,
                'category_id' => 2,
                'brand_id' => 1,
                'photos' => [
                    database_path('seeders/seeder-assets/hoodie/hoodie2.jpg'),
                    database_path('seeders/seeder-assets/hoodie/hoodie3.jpg'),
                    database_path('seeders/seeder-assets/hoodie/hoodie4.jpg'),
                    database_path('seeders/seeder-assets/hoodie/hoodie5.jpg'),
                    database_path('seeders/seeder-assets/hoodie/hoodie7.jpg'),
                    database_path('seeders/seeder-assets/hoodie/hoodie6.jpg')
                ],
                'sizes' => ['M', 'L', 'XL', 'XXL']
            ],
            [
                'name' => 'ADICOLOR TREFOIL TEE',
                'thumbnail' => database_path('seeders/seeder-assets/jaket/jaket1.jpg'),
                'about' => 'kaos ikonik dari Adidas yang menonjolkan desain klasik dengan logo Trefoil yang legendaris. Kaos ini menjadi simbol gaya retro dan tradisi merek Adidas yang sudah dikenal luas, menawarkan tampilan yang timeless dan mudah dikenali di seluruh dunia. Dengan desain yang sederhana namun penuh karakter, Adicolor Trefoil Tee memberikan kesan modis dan fungsional, serta memancarkan warisan desain Adidas yang kuat.',
                'price' => 325000,
                'stock' => 60,
                'is_popular' => false,
                'category_id' => 1,
                'brand_id' => 1,
                'photos' => [
                    database_path('seeders/seeder-assets/jaket/jaket2.jpg'),
                    database_path('seeders/seeder-assets/jaket/jaket3.jpg'),
                    database_path('seeders/seeder-assets/jaket/jaket4.jpg'),
                    database_path('seeders/seeder-assets/jaket/jaket5.jpg'),
                    database_path('seeders/seeder-assets/jaket/jaket6.jpg'),
                ],
                'sizes' => ['M', 'L', 'XL']
            ],
            [
                'name' => 'MONO SATIN SHIRT',
                'thumbnail' => database_path('seeders/seeder-assets/jaket/jaket10.jpg'),
                'about' => 'kemeja dengan bahan satin yang memberikan sentuhan mewah dan elegan, namun tetap mempertahankan gaya sporty khas Adidas. Kemeja ini dirancang untuk memberikan kenyamanan sekaligus tampilan yang modis, cocok untuk mereka yang ingin tampil stylish tanpa mengorbankan kenyamanan.',
                'price' => 350000,
                'stock' => 60,
                'is_popular' => true,
                'category_id' => 4,
                'brand_id' => 1,
                'photos' => [
                    database_path('seeders/seeder-assets/kemeja/kemeja4.jpg'),
                    database_path('seeders/seeder-assets/kemeja/kemeja5.jpg'),
                    database_path('seeders/seeder-assets/kemeja/kemeja6.jpg'),
                    database_path('seeders/seeder-assets/kemeja/kemeja7.jpg'),
                    database_path('seeders/seeder-assets/kemeja/kemeja8.jpg'),
                ],
                'sizes' => ['M', 'L', 'XL', 'XXL']
            ],
        ];

        foreach ($shirts as $shirtData) {
            $photos = $shirtData['photos'];
            $sizes = $shirtData['sizes'];

            // Handle thumbnail upload
            $thumbPath = $shirtData['thumbnail'];
            $extension = pathinfo($thumbPath, PATHINFO_EXTENSION);
            $filename = 'seeder-assets/' . Str::slug($shirtData['name']) . '-thumb.' . $extension;

            if (file_exists($thumbPath)) {
                Storage::disk('public')->putFileAs(
                    dirname($filename),
                    $thumbPath,
                    basename($filename)
                );
                $shirtData['thumbnail'] = $filename;
            }

            unset($shirtData['photos'], $shirtData['sizes']);
            $shirt = Shirt::create($shirtData);

            // Handle multiple photos
            foreach ($photos as $index => $photoPath) {
                if (file_exists($photoPath)) {
                    $extension = pathinfo($photoPath, PATHINFO_EXTENSION);
                    $filename = 'seeder-assets/' . Str::slug($shirt->name) . '-' . ($index + 1) . '.' . $extension;

                    Storage::disk('public')->putFileAs(
                        dirname($filename),
                        $photoPath,
                        basename($filename)
                    );

                    ShirtPhoto::create([
                        'shirt_id' => $shirt->id,
                        'photo' => $filename
                    ]);
                }
            }

            foreach ($sizes as $size) {
                ShirtSize::create([
                    'shirt_id' => $shirt->id,
                    'size' => $size
                ]);
            }
        }

         // Seed Admin User
         $admin = [
            'name' => 'Admin',
            'image' => 'path_to_default_admin_image.jpg', // You can specify a path or leave it empty
            'email' => 'admin@example.com', // Admin email
            'email_verified_at' => now(), // Set email verified timestamp
            'password' => Hash::make('admin_password'), // Set a hashed password
            'remember_token' => Str::random(60), // Generate a random remember token
            'created_at' => now(),
            'updated_at' => now(),
        ];

        User::create($admin);
    }
}
