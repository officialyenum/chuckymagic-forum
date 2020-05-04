<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 7.0',
            'slug' => str_slug('Laravel 7.0')
        ]);
        Channel::create([
            'name' => 'Vue Js 3',
            'slug' => str_slug('Vue Js 3')
        ]);
        Channel::create([
            'name' => 'Angular 7',
            'slug' => str_slug('Angular 7')
        ]);

        Channel::create([
            'name' => 'Node Js',
            'slug' => str_slug('Node Js')
        ]);
    }
}
