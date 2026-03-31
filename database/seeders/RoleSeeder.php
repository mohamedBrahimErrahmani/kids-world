<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $admin = Role::create(['name' => 'Admin', 'slug' => 'admin', 'description' => 'Full System Access']);
            $editor = Role::create(['name' => 'Editor', 'slug' => 'editor', 'description' => 'Content Management']);
            $parent = Role::create(['name' => 'Parent', 'slug' => 'parent', 'description' => 'Standard User']);

            $permissions = [
                'manage_users' => 'Ability to CRUD users',
                'manage_products' => 'Ability to CRUD products',
                'manage_blog' => 'Ability to CRUD blog posts',
                'view_analytics' => 'Access to dashboard analytics',
            ];

            foreach ($permissions as $slug => $group) {
                $permission = Permission::create([
                    'name' => ucwords(str_replace('_', ' ', $slug)),
                    'slug' => $slug,
                    'group' => $group
                ]);

                $admin->permissions()->attach($permission->id);
                if (in_array($slug, ['manage_products', 'manage_blog'])) {
                    $editor->permissions()->attach($permission->id);
                }
            }
        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
            throw $e;
        }
    }
}
