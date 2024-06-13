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
        $schemes = Scheme::all();
        return view('dashboard', ['schemes' => $schemes]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'sample_excel_sheet' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('sample_excel_sheet');

        $data = Excel::toArray(new SkipFirstRowImport, $file);
        // print_r($data);

        return view('preview', ['data' => $data[0]]);
    }

    public function finalizeUpload(Request $request)
{
    $data = json_decode($request->input('data'), true);

    foreach ($data as $row) {
        $id = $row[0];
        $schemeData = [
            'scheme_code' => $row[1],
            'scheme_name' => $row[2],
            'central_state_scheme' => $row[3],
            'financial_year' => $row[4],
            'state_disbursement' => $this->castToNumeric($row[5]),
            'central_disbursement' => $this->castToNumeric($row[6]),
            'total_disbursement' => $this->castToNumeric($row[7]),
        ];

        $existingScheme = Scheme::find($id);

        if ($existingScheme) {
            $existingScheme->update($schemeData);
        } else {
            Scheme::create(array_merge(['id' => $id], $schemeData));
        }
    }

    return redirect()->route('dashboard')->with('success', 'Data uploaded successfully!');
}


    private function castToNumeric($value)
    {
        return is_numeric($value) ? (float) $value : null;
    }
}
