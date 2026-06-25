<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_returns_successful_response(): void
    {
        $this->get('/')->assertOk()->assertSee('Skolah Koperasi');
    }

    public function test_admin_login_page_returns_successful_response(): void
    {
        $this->get('/admin/login')->assertOk()->assertSee('Masuk');
    }

    public function test_guest_admin_dashboard_redirects_to_login(): void
    {
        $this->get('/admin/dashboard')->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_and_open_dashboard(): void
    {
        User::factory()->create([
            'email' => 'admin@example.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->post('/admin/login', [
            'email' => 'admin@example.test',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->get('/admin/dashboard')->assertOk()->assertSee('Dashboard');
    }
}
