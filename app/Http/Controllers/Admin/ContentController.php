<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brosur;
use App\Models\ContactInfo;
use App\Models\Keunggulan;
use App\Models\Qna;
use App\Models\Section;
use App\Models\Setting;
use App\Models\VisiMisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function hero(): View
    {
        return view('admin.forms.hero', ['hero' => Section::firstOrCreate(['slug' => 'hero'])]);
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'cta_label' => ['required', 'string', 'max:100'],
            'cta_url' => ['required', 'string', 'max:255'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', File::image()->max(4 * 1024)],
        ]);

        unset($data['image']);
        $hero = Section::firstOrCreate(['slug' => 'hero']);

        if ($request->hasFile('image')) {
            $this->deleteUploadedFile($hero->image_path);
            $data['image_path'] = Storage::disk('s3')->url($request->file('image')->store('admin/hero', 's3'));
        }

        $hero->update([...$data, 'is_active' => true]);

        return back()->with('success', 'Hero berhasil disimpan.');
    }

    public function vision(): View
    {
        return view('admin.forms.vision', [
            'vision' => VisiMisi::firstOrCreate(['type' => 'visi', 'order' => 1], ['content' => '']),
            'missions' => VisiMisi::where('type', 'misi')->orderBy('order')->get(),
        ]);
    }

    public function updateVision(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'vision' => ['required', 'string'],
            'missions' => ['nullable', 'array'],
            'missions.*' => ['nullable', 'string'],
        ]);

        VisiMisi::updateOrCreate(['type' => 'visi', 'order' => 1], ['content' => $data['vision']]);
        VisiMisi::where('type', 'misi')->delete();

        foreach (array_values(array_filter($data['missions'] ?? [])) as $index => $mission) {
            VisiMisi::create(['type' => 'misi', 'content' => $mission, 'order' => $index + 1]);
        }

        return back()->with('success', 'Visi dan misi berhasil disimpan.');
    }

    public function benefits(): View
    {
        return view('admin.forms.benefits', ['items' => Keunggulan::orderBy('order')->get()]);
    }

    public function storeBenefit(Request $request): RedirectResponse
    {
        Keunggulan::create($this->validateBenefit($request));
        return back()->with('success', 'Keunggulan berhasil ditambah.');
    }

    public function updateBenefit(Request $request, Keunggulan $benefit): RedirectResponse
    {
        $benefit->update($this->validateBenefit($request));
        return back()->with('success', 'Keunggulan berhasil diperbarui.');
    }

    public function destroyBenefit(Keunggulan $benefit): RedirectResponse
    {
        $benefit->delete();
        return back()->with('success', 'Keunggulan berhasil dihapus.');
    }

    public function brochures(): View
    {
        return view('admin.forms.brochures', ['items' => Brosur::orderBy('order')->get()]);
    }

    public function storeBrochure(Request $request): RedirectResponse
    {
        Brosur::create($this->validateBrochure($request));
        return back()->with('success', 'Brosur berhasil ditambah.');
    }

    public function updateBrochure(Request $request, Brosur $brochure): RedirectResponse
    {
        $brochure->update($this->validateBrochure($request, $brochure));
        return back()->with('success', 'Brosur berhasil diperbarui.');
    }

    public function destroyBrochure(Brosur $brochure): RedirectResponse
    {
        $this->deleteUploadedFile($brochure->image_path);
        $brochure->delete();
        return back()->with('success', 'Brosur berhasil dihapus.');
    }

    public function qnas(): View
    {
        return view('admin.forms.qnas', [
            'items' => Qna::orderBy('order')->get(),
            'qnaSection' => Section::firstOrCreate(['slug' => 'qna']),
        ]);
    }

    public function updateQnaImage(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'image_path' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', File::image()->max(4 * 1024)],
        ]);

        unset($data['image']);
        $section = Section::firstOrCreate(['slug' => 'qna']);

        if ($request->hasFile('image')) {
            $this->deleteUploadedFile($section->image_path);
            $data['image_path'] = Storage::disk('s3')->url($request->file('image')->store('admin/qna', 's3'));
        }

        $section->update($data + ['is_active' => true]);

        return back()->with('success', 'Gambar QnA berhasil disimpan.');
    }

    public function storeQna(Request $request): RedirectResponse
    {
        Qna::create($this->validateQna($request));
        return back()->with('success', 'QnA berhasil ditambah.');
    }

    public function updateQna(Request $request, Qna $qna): RedirectResponse
    {
        $qna->update($this->validateQna($request));
        return back()->with('success', 'QnA berhasil diperbarui.');
    }

    public function destroyQna(Qna $qna): RedirectResponse
    {
        $qna->delete();
        return back()->with('success', 'QnA berhasil dihapus.');
    }

    public function contact(): View
    {
        return view('admin.forms.contact', ['contact' => ContactInfo::firstOrCreate(['id' => 1])]);
    }

    public function updateContact(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'address' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'maps_embed_url' => ['nullable', 'string'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
        ]);

        ContactInfo::updateOrCreate(['id' => 1], $data);

        return back()->with('success', 'Kontak berhasil disimpan.');
    }

    public function settings(): View
    {
        return view('admin.forms.settings', ['settings' => Setting::pluck('value', 'key')]);
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string'],
            'accent_color' => ['required', 'string', 'max:20'],
            'logo' => ['nullable', File::image()->max(2 * 1024)],
        ]);

        if ($request->hasFile('logo')) {
            $this->deleteUploadedFile(Setting::where('key', 'logo')->value('value'));
            $data['logo'] = Storage::disk('s3')->url($request->file('logo')->store('admin/branding', 's3'));
        } else {
            unset($data['logo']);
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }

    private function validateBenefit(Request $request): array
    {
        return $request->validate([
            'icon' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }

    private function validateBrochure(Request $request, ?Brosur $brochure = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'detail' => ['nullable', 'string'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', File::image()->max(4 * 1024)],
            'duration' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'target_participants' => ['nullable', 'string'],
            'cta_url' => ['required', 'url', 'max:500'],
            'cta_label' => ['required', 'string', 'max:100'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        unset($data['image']);

        if ($request->hasFile('image')) {
            $this->deleteUploadedFile($brochure?->image_path);
            $data['image_path'] = Storage::disk('s3')->url($request->file('image')->store('admin/brochures', 's3'));
        }

        return $data + ['is_active' => $request->boolean('is_active')];
    }

    private function validateQna(Request $request): array
    {
        return $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => $request->boolean('is_active')];
    }

    private function deleteUploadedFile(?string $url): void
    {
        if (! $url) {
            return;
        }

        if (str_starts_with($url, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $url));
            return;
        }

        $awsUrl = rtrim((string) config('filesystems.disks.s3.url'), '/').'/';

        if ($awsUrl !== '/' && str_starts_with($url, $awsUrl)) {
            Storage::disk('s3')->delete(str_replace($awsUrl, '', $url));
        }
    }
}
