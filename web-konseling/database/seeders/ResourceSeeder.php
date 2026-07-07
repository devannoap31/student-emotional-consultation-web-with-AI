<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            // Video Baru dari User (Cara menghadapi masalah di kampus)
            [
                'title' => 'Cara Menghadapi Masalah di Kampus (Part 1)',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=rRIYYdoah0Q', 
                'category' => 'Akademik',
                'description' => 'Tips dan trik jitu mengatasi tekanan akademik dan sosial di dunia perkuliahan.',
                'thumbnail_url' => 'https://img.youtube.com/vi/rRIYYdoah0Q/0.jpg'
            ],
            [
                'title' => 'Mengatasi Stres Belajar Mahasiswa',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=qRi9drHS09A', 
                'category' => 'Akademik',
                'description' => 'Solusi jitu ketika kamu merasa kewalahan dengan beban studi.',
                'thumbnail_url' => 'https://img.youtube.com/vi/qRi9drHS09A/0.jpg'
            ],
            [
                'title' => 'Membangun Relasi Baik di Kampus',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=q2D9S0-KXYQ', 
                'category' => 'Sosial',
                'description' => 'Tips bersosialisasi dan berteman di lingkungan kampus tanpa mengorbankan dirimu sendiri.',
                'thumbnail_url' => 'https://img.youtube.com/vi/q2D9S0-KXYQ/0.jpg'
            ],
            [
                'title' => 'Ketika Tugas Menumpuk: Apa yang Harus Dilakukan?',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=fLa8Uw04QaY', 
                'category' => 'Akademik',
                'description' => 'Manajemen waktu dan skala prioritas untuk mahasiswa tingkat akhir.',
                'thumbnail_url' => 'https://img.youtube.com/vi/fLa8Uw04QaY/0.jpg'
            ],
            [
                'title' => 'Cara Bangkit dari Kegagalan Akademik',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=R0on0Hat2AY', 
                'category' => 'Internal',
                'description' => 'Berdamai dengan nilai jelek atau kegagalan mata kuliah.',
                'thumbnail_url' => 'https://img.youtube.com/vi/R0on0Hat2AY/0.jpg'
            ],
            // Video Baru dari User (Gaya Aldi Taher / Menghibur)
            [
                'title' => 'Tetap Santai Menghadapi Masalah ala Aldi Taher',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=jl2xfxE0zh0', 
                'category' => 'Regulasi',
                'description' => 'Ambil sisi positif dan tetap optimis dalam melihat persoalan hidup.',
                'thumbnail_url' => 'https://img.youtube.com/vi/jl2xfxE0zh0/0.jpg'
            ],
            [
                'title' => 'Pola Pikir Santai Mengatasi Tekanan',
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=re0PkdRqNng', 
                'category' => 'Regulasi',
                'description' => 'Mencari hiburan dan jangan terlalu overthinking terhadap hal di luar kendalimu.',
                'thumbnail_url' => 'https://img.youtube.com/vi/re0PkdRqNng/0.jpg'
            ],
            // Artikel (Telah diganti sumbernya)
            [
                'title' => 'Cara Mengatasi Overthinking yang Bisa Dicoba',
                'type' => 'artikel',
                'url' => 'https://www.halodoc.com/artikel/ini-cara-mengatasi-overthinking-yang-bisa-dicoba',
                'category' => 'Internal',
                'description' => 'Panduan kesehatan untuk mengenali pola pikir negatif dan menghentikan overthinking (Sumber: Halodoc).',
                'thumbnail_url' => null
            ],
            // Kontak Hotline Tetap
            [
                'title' => 'Hotline Bantuan Darurat (Krisis)',
                'type' => 'kontak',
                'url' => 'tel:119',
                'category' => 'Krisis',
                'description' => 'Layanan Sejiwa (119 ext 8). Hubungi segera jika Anda butuh pertolongan darurat atau merasa dalam bahaya.',
                'thumbnail_url' => null
            ]
        ];

        foreach ($resources as $res) {
            \App\Models\Resource::create($res);
        }
    }
}
