<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;


class LogController extends Controller
{

    public function viewLogs(Request $request)
    {
        $date = new Carbon($request->get('date', today()));
        $filePath = storage_path("logs/laravel-{$date->format('Y-m-d')}.log");
        $data = [];

        if (File::exists($filePath)) {
            $data = [
                'lastModified' => new Carbon(File::lastModified($filePath)),
                'size' => File::size($filePath),
                'file' => File::get($filePath),
            ];
        }
        return view('logs', compact('date', 'data'));
    }

    public function clearLogs()
    {
        exec('rm -f ' . storage_path('logs/*.log'));

        exec('rm -f ' . base_path('*.log'));

        $unitPath = storage_path("logs/laravel-" . Carbon::now()->format('Y-m-d') . ".log");
        File::put($unitPath, 'log has just been cleared');

        return 'log has been cleared';
    }

    // public function showLogs()
    // {
    //     return $this->viewLogsw();
    // }
}
