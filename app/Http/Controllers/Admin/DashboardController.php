<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brosur;
use App\Models\Keunggulan;
use App\Models\Qna;
use App\Models\Setting;
use App\Models\Section;
use App\Models\VisiMisi;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'keunggulan' => Keunggulan::count(),
            'brosur' => Brosur::count(),
            'qna' => Qna::count(),
            'visi' => VisiMisi::where('type','visi')->count(),
        ];

        $latest = [
            'hero' => Section::where('slug','hero')->first(),
            'contact' => Setting::where('key','site_name')->value('value') ?? config('company.settings.site_name'),
        ];

        return view('admin.dashboard', [
            'siteName' => Setting::where('key', 'site_name')->value('value') ?? config('company.settings.site_name'),
            'sections' => [
                ['label' => 'Hero Section', 'route' => 'admin.hero.edit'],
                ['label' => 'Visi dan Misi', 'route' => 'admin.vision.edit'],
                ['label' => 'Kenapa Kami', 'route' => 'admin.benefits.index'],
                ['label' => 'Brosur Pelatihan', 'route' => 'admin.brochures.index'],
                ['label' => 'QnA', 'route' => 'admin.qnas.index'],
                ['label' => 'Kontak', 'route' => 'admin.contact.edit'],
                ['label' => 'Pengaturan Umum', 'route' => 'admin.settings.edit'],
            ],
            'stats' => $stats,
            'latest' => $latest,
        ]);
    }
}
