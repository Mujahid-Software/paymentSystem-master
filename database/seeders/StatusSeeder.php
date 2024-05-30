<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            'ADMIN',
            'ACTIVE',
            'NOT_ACTIVE',
            'BLOCKED',
            'SUCCESSFULL',
            'FAILED',
        ];

        foreach ($statuses as $status) {
            $statusName = strtoupper(str_replace(' ', '_', $status));
            Status::updateOrCreate(['name' => $statusName]);
        }
    }
}
