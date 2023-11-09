<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Identity;
use App\Models\Keluarga;
use App\Models\master\StatusUser;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Penghargaan;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::create([
        //     'nama' =>  'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'admin'
        // ]);

        User::create([
            'nama' =>  'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        User::create([
            'nama' =>  'Kepala',
            'email' => 'kepala@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'kepala'
        ]);


        User::create([
            'nama' =>  'HR',
            'email' => 'hr@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'hr'
        ]);

        User::factory(20)->create();

        Identity::create([
            'user_id' => 1,
            'departemen_id' => 1,
            'jabatan_id' => 2,
            'nik' => '123456890',
            'tempat_lahir' => 'Cisaat',
            'tanggal_lahir' => '2018/01/02',
            'alamat' => 'Indonesia no.14',
            'npwp' => '1203210943',
            'rekening' => '392198483',
            'hp' => '0312939123',
            'tahun_bekerja' => '2021/05/01',
            'statususer_id' => 1,
            'golongan_id' => 1,
        ]);

        Identity::create([
            'user_id' => 2,
            'departemen_id' => 2,
            'jabatan_id' => 1,
            'nik' => '1234568901',
            'tempat_lahir' => 'Cisaat',
            'tanggal_lahir' => '2018/01/03',
            'alamat' => 'Indonesia no.14',
            'npwp' => '1203210943',
            'rekening' => '392198483',
            'hp' => '0312939123',
            'tahun_bekerja' => '2021/07/01',
            'statususer_id' => 1,
            'golongan_id' => 1,
        ]);

        Identity::create([
            'user_id' => 3,
            'departemen_id' => 2,
            'jabatan_id' => 1,
            'nik' => '1234531231',
            'tempat_lahir' => 'Cisaat',
            'tanggal_lahir' => '2018/01/04',
            'alamat' => 'Indonesia no.14',
            'npwp' => '12036546453',
            'rekening' => '3924131',
            'hp' => '0312939123',
            'tahun_bekerja' => '2021/09/01',
            'statususer_id' => 1,
            'golongan_id' => 1,
        ]);

        $this->call(DepartemenSeeder::class);

        $this->call(JabatanSeeder::class);

        $this->call(JenisCutiSeeder::class);

        $this->call(JenisPelatihanSeeder::class);

        $this->call(PeranPelatihanSeeder::class);

        $this->call(JenisPublikasiSeeder::class);

        $this->call(PeranPublikasiSeeder::class);

        $this->call(KeteranganKeluargaSeeder::class);

        $this->call(JenjangPendidikanSeeder::class);

        $this->call(IdentifierSeeder::class);

        $this->call(GolonganSeeder::class);

        $this->call(StatusUserSeeder::class);

        Keluarga::factory(10)->create();

        Pelatihan::factory(10)->create();

        Pendidikan::factory(12)->create();

        Pengalaman::factory(11)->create();

        Publikasi::factory(15)->create();

        Penghargaan::factory(13)->create();
    }
}
