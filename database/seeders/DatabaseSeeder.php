<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Account::factory(10)
            ->create()
            ->each(function (Account $account) {
                User::factory()->owner_role()->for($account)->create();

                User::factory()->count(random_int(1, 3))
                    ->admin_role()->for($account)->create();

                User::factory()->count(random_int(3, 10))
                    ->employee_role()->for($account)->create();
            });
    }
}
