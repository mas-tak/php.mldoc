<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('documents')->truncate();
	    DB::table('documents')->insert([[
	        'name'=>'Github Flavored Markdown',
	        'path'=>dirname(__FILE__, 3) .'/storage/documents/gfm.md',
	        'type'=>'md',
	    ], [
	        'name'=>'reStrycturedText',
	        'path'=>dirname(__FILE__, 3) .'/storage/documents/rst.rst',
	        'type'=>'rst',
		]]);
    }
}
