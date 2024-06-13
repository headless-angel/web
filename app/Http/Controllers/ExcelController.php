<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\ExcelData;

class ExcelController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Save to database if necessary
        foreach ($sheetData as $row) {
            ExcelData::create([
                'data' => json_encode($row),
            ]);
        }

        return view('dashboard', ['sheetData' => $sheetData]);
    }

    public function preview(Request $request)
    {
        // Implement preview logic if needed
    }
}
