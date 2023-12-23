<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class BulkExport implements FromQuery, WithHeadings, WithMapping
{

    public $search;
    public $number = 0;


    public function __construct($data = [])
    {
        $this->search = empty($data['search']) ? null : $data['search'];
    }


    public function query($data = [])
    {
        $query = User::Where(['type' => 'user']);
        return $query;
    }

    public function map($user): array
    {
        $this->number += 1;
        return [
            $this->number,
            $user->name,
            $user->email,
            $user->status,
        ];
    }


    public function headings(): array
    {
        return [
            'No',
            'Name',
            'Email',
            'status',
        ];
    }
}
