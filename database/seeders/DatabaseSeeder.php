<?php

namespace Database\Seeders;

use App\Models\Brosur;
use App\Models\ContactInfo;
use App\Models\Keunggulan;
use App\Models\Qna;
use App\Models\Section;
use App\Models\Setting;
use App\Models\User;
use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@skolahkoperasi.test'],
            ['name' => 'Admin LPK Sekolah Koperasi', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        collect([
            'site_name' => 'LPK Sekolah Koperasi',
            'meta_description' => 'LPK Sekolah Koperasi adalah pusat pelatihan dan pendidikan bidang perkoperasian untuk membangun kompetensi, menguatkan koperasi, dan mewujudkan ekonomi berkeadilan.',
            'accent_color' => '#1f7a3a',
        ])->each(fn (string $value, string $key) => Setting::updateOrCreate(['key' => $key], ['value' => $value]));

        Section::updateOrCreate(
            ['slug' => 'hero'],
            [
                'title' => 'Membangun Kompetensi, Menguatkan Koperasi, Mewujudkan Ekonomi Berkeadilan',
                'content' => 'Pusat pelatihan dan pendidikan bidang perkoperasian untuk pengurus, pengawas, anggota koperasi, serta lembaga yang ingin tumbuh profesional dan berintegritas.',
                'image_path' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1600&auto=format&fit=crop',
                'cta_label' => 'Lihat Program Pelatihan',
                'cta_url' => '#brochures',
                'is_active' => true,
            ]
        );

        VisiMisi::updateOrCreate(['type' => 'visi', 'order' => 1], ['content' => 'Menjadi pusat pelatihan dan pendidikan perkoperasian yang membentuk SDM koperasi kompeten, mandiri, profesional, demokratis, dan berpihak pada kesejahteraan anggota serta masyarakat.']);

        foreach ([
            'Menyelenggarakan pendidikan perkoperasian berkualitas yang memadukan teori, praktik, dan nilai-nilai koperasi.',
            'Meningkatkan kemampuan pengelola, pengawas, anggota, dan kader koperasi melalui pelatihan profesional.',
            'Mendorong kemandirian, kewirausahaan, partisipasi ekonomi anggota, dan tata kelola koperasi demokratis.',
            'Memperkuat jejaring kolaborasi antar koperasi, lembaga, dan pemangku kepentingan.',
        ] as $index => $mission) {
            VisiMisi::updateOrCreate(['type' => 'misi', 'order' => $index + 1], ['content' => $mission]);
        }

        foreach ([
            ['icon' => '📘', 'title' => 'Pendidikan', 'description' => 'Program belajar tentang perkoperasian secara teori dan praktik.'],
            ['icon' => '🎓', 'title' => 'Pelatihan', 'description' => 'Meningkatkan kemampuan dan keterampilan pengelola, pengawas, dan anggota koperasi.'],
            ['icon' => '👥', 'title' => 'Pengembangan SDM', 'description' => 'Membangun sumber daya manusia koperasi yang kompeten, profesional, dan berintegritas.'],
            ['icon' => '📈', 'title' => 'Konsultasi & Pendampingan', 'description' => 'Mendampingi koperasi dalam pengelolaan, kelembagaan, dan pengembangan usaha.'],
            ['icon' => '🤝', 'title' => 'Jaringan & Kolaborasi', 'description' => 'Memperkuat jejaring antar koperasi, lembaga, dan pemangku kepentingan.'],
        ] as $index => $item) {
            Keunggulan::updateOrCreate(['order' => $index + 1], [...$item, 'is_active' => true]);
        }

        foreach ([
            ['title' => 'Pendidikan Dasar Perkoperasian', 'description' => 'Kelas pengantar nilai, prinsip, keanggotaan sukarela, dan tata kelola koperasi modern.', 'image_path' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop', 'cta_label' => 'Daftar Pendidikan'],
            ['title' => 'Pelatihan Manajemen Koperasi', 'description' => 'Pelatihan administrasi, organisasi, pelayanan anggota, dan pengelolaan usaha koperasi.', 'image_path' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1200&auto=format&fit=crop', 'cta_label' => 'Daftar Pelatihan'],
            ['title' => 'Akuntansi & Keuangan Koperasi', 'description' => 'Kelas pencatatan transaksi, laporan keuangan, kontrol kas, dan akuntabilitas koperasi.', 'image_path' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1200&auto=format&fit=crop', 'cta_label' => 'Daftar Kelas'],
            ['title' => 'Konsultasi & Pendampingan Koperasi', 'description' => 'Pendampingan kelembagaan, pengembangan usaha, demokrasi anggota, dan kolaborasi.', 'image_path' => 'https://images.unsplash.com/photo-1556761175-4b46a572b786?q=80&w=1200&auto=format&fit=crop', 'cta_label' => 'Minta Pendampingan'],
        ] as $index => $item) {
            Brosur::updateOrCreate(['order' => $index + 1], [...$item, 'cta_url' => 'https://skolah.com/daftar', 'is_active' => true]);
        }

        foreach ([
            ['question' => 'Siapa yang cocok mengikuti program LPK Sekolah Koperasi?', 'answer' => 'Pengurus, pengawas, anggota koperasi, kader koperasi, komunitas usaha, lembaga desa, dan pemangku kepentingan yang ingin memperkuat kompetensi perkoperasian.'],
            ['question' => 'Apa saja fokus pembelajaran yang tersedia?', 'answer' => 'Pendidikan koperasi, pelatihan manajemen, pengembangan SDM, akuntansi koperasi, konsultasi, pendampingan, jaringan, dan kolaborasi.'],
            ['question' => 'Apakah materi bisa disesuaikan kebutuhan lembaga?', 'answer' => 'Bisa. Program dapat disusun sesuai kebutuhan koperasi, level peserta, tujuan lembaga, dan tantangan operasional yang sedang dihadapi.'],
            ['question' => 'Bagaimana cara mendaftar?', 'answer' => 'Pilih program pelatihan, klik tombol daftar, atau hubungi kontak resmi untuk konsultasi jadwal dan kebutuhan kelas.'],
        ] as $index => $item) {
            Qna::updateOrCreate(['order' => $index + 1], [...$item, 'is_active' => true]);
        }

        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'address' => 'Pusat Pelatihan & Pendidikan Bidang Perkoperasian',
                'phone' => '+62 812 3456 7890',
                'email' => 'halo@sekolahkoperasi.id',
                'whatsapp_number' => '6281234567890',
                'maps_embed_url' => 'https://www.google.com/maps?q=Bandung&output=embed',
            ]
        );
    }
}
