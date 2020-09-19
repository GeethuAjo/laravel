
<?php

use Illuminate\Database\Seeder;
use App\Directory;
class DirectoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	
    	$data = [
    	[
    	'name' => 'Directory 1',
    	]

        ];
    	foreach ($data as $key => $value) {
    		$array = [];
    		$exist = Directory::where('name',$value['name'])->count();
    		if(!$exist){
    			$array =
    			[
    			'name'  => $value['name'],
    			];
    			Directory::create($array);
    		}
    		
    	}
    }
}