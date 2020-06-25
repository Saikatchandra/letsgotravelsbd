<?php
    
    use App\User;
    use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Master',
            'email' => 'ceo@smartsoftware.com.bd',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
        ]);
    }
}
