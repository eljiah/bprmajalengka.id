<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Closure;

class BranchController extends Controller
{
    public function index(Request $request): View
    {
        $query = Branch::query();

        if ($request->filled('search')) {
            $s = $request->query('search');
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('address', 'like', "%{$s}%")
                  ->orWhere('phone', 'like', "%{$s}%");
            });
        }

        $branches = $query->orderByDesc('is_main')->orderBy('sort_order')->paginate(15)->withQueryString();

        return view('admin.branches.index', compact('branches'));
    }

    public function create(): View
    {
        return view('admin.branches.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'maps_url' => ['nullable', 'url', 'max:2048', $this->googleMapsUrlRule()],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'hours' => ['required', 'string', 'max:100'],
            'is_main' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_main'] = $request->has('is_main');
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        Branch::create($validated);

        return redirect()->route('admin.branches.index')
            ->with('success', "Kantor Kas '{$validated['name']}' berhasil ditambahkan!");
    }

    public function edit(Branch $branch): View
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'maps_url' => ['nullable', 'url', 'max:2048', $this->googleMapsUrlRule()],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'hours' => ['required', 'string', 'max:100'],
            'is_main' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $validated['is_main'] = $request->has('is_main');
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        $branch->update($validated);

        return redirect()->route('admin.branches.index')
            ->with('success', "Kantor Kas '{$branch->name}' berhasil diperbarui!");
    }

    public function destroy(Branch $branch): RedirectResponse
    {
        $name = $branch->name;
        $branch->delete();

        return redirect()->route('admin.branches.index')
            ->with('success', "Kantor Kas '{$name}' telah dihapus.");
    }

    public function toggleStatus(Branch $branch): RedirectResponse
    {
        $branch->update(['is_active' => !$branch->is_active]);

        $statusText = $branch->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Status kantor kas '{$branch->name}' berhasil {$statusText}.");
    }

    private function googleMapsUrlRule(): Closure
    {
        return static function (string $attribute, mixed $value, Closure $fail): void {
            if (!is_string($value)) {
                $fail('Gunakan tautan HTTPS Google Maps atau maps.app.goo.gl.');
                return;
            }

            $parts = parse_url($value);
            if (!is_array($parts)) {
                $fail('Gunakan tautan HTTPS Google Maps atau maps.app.goo.gl.');
                return;
            }

            $host = strtolower($parts['host'] ?? '');
            $allowedHosts = [
                'goo.gl',
                'maps.app.goo.gl',
                'google.com',
                'www.google.com',
                'maps.google.com',
                'google.co.id',
                'www.google.co.id',
                'maps.google.co.id',
            ];

            if (($parts['scheme'] ?? '') !== 'https'
                || isset($parts['user'])
                || isset($parts['pass'])
                || (isset($parts['port']) && $parts['port'] !== 443)
                || !in_array($host, $allowedHosts, true)) {
                $fail('Gunakan tautan HTTPS Google Maps atau maps.app.goo.gl.');
            }
        };
    }
}
