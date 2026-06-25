<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Brosur;
use App\Models\ContactInfo;
use App\Models\Keunggulan;
use App\Models\Qna;
use App\Models\Section;
use App\Models\Setting;
use App\Models\VisiMisi;
use Illuminate\Contracts\View\View;

class LandingPageController extends Controller
{
    public function __invoke(): View
    {
        $settings = Setting::query()->pluck('value', 'key')->all() ?: config('company.settings');
        $heroSection = Section::query()->where('slug', 'hero')->where('is_active', true)->first();

        return view('landing', [
            'settings' => $settings,
            'navigation' => config('company.navigation'),
            'hero' => [
                'headline' => $heroSection?->title ?? config('company.hero.headline'),
                'subheading' => $heroSection?->content ?? config('company.hero.subheading'),
                'cta_label' => $heroSection?->cta_label ?? config('company.hero.cta_label'),
                'cta_target' => ltrim((string) ($heroSection?->cta_url ?? config('company.hero.cta_target')), '#'),
                'image_path' => $heroSection?->image_path ?? config('company.hero.image_path'),
            ],
            'vision' => VisiMisi::query()->where('type', 'visi')->orderBy('order')->value('content') ?? config('company.vision'),
            'missions' => VisiMisi::query()->where('type', 'misi')->orderBy('order')->pluck('content')->all() ?: config('company.missions'),
            'benefits' => Keunggulan::query()->where('is_active', true)->orderBy('order')->get()->toArray() ?: config('company.benefits'),
            'brochures' => Brosur::query()->where('is_active', true)->orderBy('order')->get()->toArray() ?: config('company.brochures'),
            'qnas' => Qna::query()->where('is_active', true)->orderBy('order')->get()->toArray() ?: config('company.qnas'),
            'qnaImage' => Section::query()->where('slug', 'qna')->where('is_active', true)->value('image_path') ?: 'https://picsum.photos/seed/koperasi-qna/700/520',
            'contact' => ContactInfo::query()->first()?->toArray() ?: config('company.contact'),
        ]);
    }
}
