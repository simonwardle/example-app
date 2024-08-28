<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job //extends Model
{
    use HasFactory;
    public static function all(): array
    {

        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '£50,000'
            ],
            [
                'id' => 2,
                'title' => 'Developer',
                'salary' => '£60,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '£70,000'
            ]
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);

        if(!$job){
            abort(404);
        }

        return $job;
    }
}
