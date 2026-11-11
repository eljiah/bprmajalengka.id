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
    public function index(AntiFraudService $antiFraud): View
    {
        return $this->renderLanding($antiFraud);
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

    private function renderLanding(AntiFraudService $antiFraud, string $activePage = ''): View
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

        $complaintCaptcha = $antiFraud->generateCaptcha();
        $complaintFormLoadToken = $antiFraud->generateFormLoadToken();

        return view('landing', compact(
            'settings',
            'allProducts',
            'productsByCat',
            'branches',
            'articles',
            'reports',
            'complaintCaptcha',
            'complaintFormLoadToken',
            'activePage'
        ));
    }
}
