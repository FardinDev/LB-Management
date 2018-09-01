<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Classic MEDUNA UM 1540 SHPD ',
            'pack_size' => '5',
            'sizeIn' => 'LTR',
            'quantity' => rand(0, 50),
            ]);
        Product::create([
            'name' => 'Classic MEDUNA UM 1540 SHPD ',
            'pack_size' => '20',
            'sizeIn' => 'LTR',
            'quantity' => rand(0, 50),
            ]);


        Product::create([
            'name' => 'Classic MEDUNA UM 2050 SHPD ',
            'pack_size' => '5',
            'sizeIn' => 'LTR',
            'quantity' => rand(0, 50),
            ]);
        Product::create([
            'name' => 'Classic MEDUNA UM 2050 SHPD ',
            'pack_size' => '20',
            'sizeIn' => 'LTR',
            'quantity' => rand(0, 50),
            ]);





            Product::create([
                'name' => 'Classic FENJA UL 2EP ',
                'pack_size' => '1',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]);
            Product::create([
                'name' => 'Classic FENJA UL 2EP ',
                'pack_size' => '5',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]);
            Product::create([
                'name' => 'Classic FENJA UL 2EP ',
                'pack_size' => '15',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]);            
            

          
            Product::create([
                'name' => 'Classic FENJA UL 3EP ',
                'pack_size' => '5',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]);   
            Product::create([
                'name' => 'Classic FENJA UL 3EP ',
                'pack_size' => '15',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]);      
                   

            Product::create([
                'name' => 'Classic FENJA HL 2 ',
                'pack_size' => '1',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]); 
            Product::create([
                'name' => 'Classic FENJA HL 2 ',
                'pack_size' => '5',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]); 
            Product::create([
                'name' => 'Classic FENJA HL 2 ',
                'pack_size' => '25',
                'sizeIn' => 'KG',
                'quantity' => rand(0, 50),
                ]); 

                           

    }
}
