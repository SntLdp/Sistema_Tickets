<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Services\ReportExportService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function __construct(private readonly ReportExportService $exportService) {}

    public function daily(Request $request): View
    {
        $date = $request->query('date', now()->toDateString());
        $summary = $this->exportService->dailySummary($date);

        return view('engineer.reports.daily', $summary);
    }

    public function exportPdf(Request $request)
    {
        return $this->exportService->toPdf($request->query('date', now()->toDateString()));
    }

    public function exportExcel(Request $request)
    {
        return $this->exportService->toExcel($request->query('date', now()->toDateString()));
    }
}
