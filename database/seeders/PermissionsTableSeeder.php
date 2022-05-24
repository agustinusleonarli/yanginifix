<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission for posts
        Permission::create(['name' => 'posts.index']);
        Permission::create(['name' => 'posts.create']);
        Permission::create(['name' => 'posts.edit']);
        Permission::create(['name' => 'posts.delete']);

        //permission for events
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.delete']);

        //permission for photos
        Permission::create(['name' => 'photos.index']);
        Permission::create(['name' => 'photos.create']);
        Permission::create(['name' => 'photos.delete']);

        //permission for videos
        Permission::create(['name' => 'videos.index']);
        Permission::create(['name' => 'videos.create']);
        Permission::create(['name' => 'videos.edit']);
        Permission::create(['name' => 'videos.delete']);

        //permission for sliders
        Permission::create(['name' => 'sliders.index']);
        Permission::create(['name' => 'sliders.create']);
        Permission::create(['name' => 'sliders.delete']);

        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);

        //permission for visimisi
        Permission::create(['name' => 'visimisis.index']);
        Permission::create(['name' => 'visimisis.create']);
        Permission::create(['name' => 'visimisis.edit']);
        Permission::create(['name' => 'visimisis.delete']);

         //permission for kurikulum
         Permission::create(['name' => 'kurikulums.index']);
         Permission::create(['name' => 'kurikulums.create']);
         Permission::create(['name' => 'kurikulums.edit']);
         Permission::create(['name' => 'kurikulums.delete']);

         //permission for dosen
         Permission::create(['name' => 'dosens.index']);
         Permission::create(['name' => 'dosens.create']);
         Permission::create(['name' => 'dosens.edit']);
         Permission::create(['name' => 'dosens.delete']);

         //permission for fasilitas
         Permission::create(['name' => 'saranas.index']);
         Permission::create(['name' => 'saranas.create']);
         Permission::create(['name' => 'saranas.edit']);
         Permission::create(['name' => 'saranas.delete']);

         //permission for penghargaan
         Permission::create(['name' => 'penghargaans.index']);
         Permission::create(['name' => 'penghargaans.create']);
         Permission::create(['name' => 'penghargaans.edit']);
         Permission::create(['name' => 'penghargaans.delete']);

         //permission for prodi
         Permission::create(['name' => 'prodis.index']);
         Permission::create(['name' => 'prodis.create']);
         Permission::create(['name' => 'prodis.edit']);
         Permission::create(['name' => 'prodis.delete']);
    }
}