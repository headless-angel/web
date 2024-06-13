<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Scheme;
use App\Imports\SkipFirstRowImport;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        $schemes = Scheme::all(); // Fetch all schemes from the database
        return view('dashboard', ['schemes' => $schemes]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excelFile');

        // Import the file and skip the first row
        $data = Excel::toArray(new SkipFirstRowImport, $file);

        // Pass the data to the view for preview
        return view('preview', ['data' => $data[0]]);
    }

    public function finalizeUpload(Request $request)
    {
        $data = json_decode($request->input('data'), true);

        foreach ($data as $row) {
            Scheme::create([
                'scheme_code' => $row[0],
                'scheme_name' => $row[1],
                'central_state_scheme' => $row[2],
                'financial_year' => $row[3],
                'state_disbursement' => $this->castToNumeric($row[4]),
                'central_disbursement' => $this->castToNumeric($row[5]),
                'total_disbursement' => $this->castToNumeric($row[6]),
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Data uploaded successfully!');
    }

    private function castToNumeric($value)
    {
        return is_numeric($value) ? (float) $value : null;
    }
}
