<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SidemenuSectionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleAdminsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(PermissionAdminsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SidemenuItemsTableSeeder::class);
        $this->call(RoleSideMenuSectionsTableSeeder::class);
        $this->call(RoleSideMenuItemsTableSeeder::class);
        $this->call(RolesSidemenuItemsTableSeeder::class);
        $this->call(RolesSidemenuSectionsTableSeeder::class);
        $this->call(StatisticsPagesTableSeeder::class);
        $this->call(StatisticsSectionsTableSeeder::class);
        $this->call(StatisticsWidgetsTableSeeder::class);
        $this->call(RolesStatisticsWidgetsTableSeeder::class);
        $this->call(RolesStatisticsSectionsTableSeeder::class);
    }
}
