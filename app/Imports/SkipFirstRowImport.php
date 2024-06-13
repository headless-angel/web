<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SkipFirstRowImport implements ToArray, WithStartRow
{
    public function array(array $row)
    {
        return $row;
    }

    public function startRow(): int
    {
        return 2;
    }
}

