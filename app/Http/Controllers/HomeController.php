<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Branch;
use App\Models\Product;
use App\Models\PublicationReport;
use App\Models\Setting;
use App\Services\AntiFraudService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return $this->renderLanding();
    }

    public function pengaduan(AntiFraudService $antiFraud): View
    {
        $settings = Setting::getAllKeyValues();
        $complaintCaptcha = $antiFraud->generateCaptcha();
        $complaintFormLoadToken = $antiFraud->generateFormLoadToken();

        return view('pengaduan', compact(
            'settings',
            'complaintCaptcha',
            'complaintFormLoadToken'
        ));
    }

    public function pengajuanKredit(): View
    {
        $settings = Setting::getAllKeyValues();
        $creditProducts = Product::active()->where('category', 'kredit')->get();

        return view('pengajuan-kredit', compact(
            'settings',
            'creditProducts'
        ));
    }

    private function renderLanding(string $activePage = ''): View
    {
        $settings = Setting::getAllKeyValues();

        $allProducts = Product::active()->get();
        $productsByCat = [
            'tabungan' => $allProducts->where('category', 'tabungan')->values(),
            'deposito' => $allProducts->where('category', 'deposito')->values(),
            'kredit' => $allProducts->where('category', 'kredit')->values(),
        ];

        $branches = Branch::active()->get();
        $articles = Article::published()->take(6)->get();
        $reports = PublicationReport::active()->get();
        $publicReports = $reports->map(fn (PublicationReport $report) => [
            'id' => (string) $report->id,
            'title' => $report->title,
            'category' => $report->category,
            'period' => $report->period,
            'size' => $report->file_size,
            'summary' => $report->description,
            'filePath' => $report->file_path ? asset(ltrim($report->file_path, '/')) : null,
        ])->values();

        return view('landing', compact(
            'settings',
            'allProducts',
            'productsByCat',
            'branches',
            'articles',
            'reports',
            'publicReports',
            'activePage'
        ));
    }
}
