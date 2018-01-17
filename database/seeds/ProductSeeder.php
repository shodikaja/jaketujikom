<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Header;
use App\quotes;
use App\background_quotes;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             $Product = Product::create([
            'nama_product' => 'Jeans',
            'detail' =>'<!DOCTYPE html>
  						<html>
						<head>
						</head>
						<body>
						<p>Bahan&nbsp; : Levis</p>	
						<p>Ukuran : 39-41</p>
						<p>Warna&nbsp; : Navy , Black</p>
						<p>Harga&nbsp; : 234 K</p>
						</body>
						</html>',
            'cover'=>'']);
              $Product2 = Product::create([
            'nama_product' => 'Caduroy',
            'detail' =>'<!DOCTYPE html>
  						<html>
						<head>
						</head>
						<body>
						<p>Bahan&nbsp; : Levis</p>	
						<p>Ukuran : 39-41</p>
						<p>Warna&nbsp; : Navy , Black</p>
						<p>Harga&nbsp; : 234 K</p>
						</body>
						</html>',
            'cover'=>'']);
               $Product3 = Product::create([
            'nama_product' => 'Cutbray',
            'detail' =>'<!DOCTYPE html>
  						<html>
						<head>
						</head>
						<body>
						<p>Bahan&nbsp; : Levis</p>	
						<p>Ukuran : 39-41</p>
						<p>Warna&nbsp; : Navy , Black</p>
						<p>Harga&nbsp; : 234 K</p>
						</body>
						</html>',
            'cover'=>'']);
                $Product4 = Product::create([
            'nama_product' => 'Pencil',
            'detail' =>'<!DOCTYPE html>
  						<html>
						<head>
						</head>
						<body>
						<p>Bahan&nbsp; : Levis</p>	
						<p>Ukuran : 39-41</p>
						<p>Warna&nbsp; : Navy , Black</p>
						<p>Harga&nbsp; : 234 K</p>
						</body>
						</html>',
            'cover'=>'']);
                 $Product5 = Product::create([
            'nama_product' => 'Joger',
            'detail' =>'<!DOCTYPE html>
  						<html>
						<head>
						</head>
						<body>
						<p>Bahan&nbsp; : Levis</p>	
						<p>Ukuran : 39-41</p>
						<p>Warna&nbsp; : Navy , Black</p>
						<p>Harga&nbsp; : 234 K</p>
						</body>
						</html>',
            'cover'=>'']);
                  $Product6 = Product::create([
            'nama_product' => 'Short Jeans',
            'detail' =>'<!DOCTYPE html>
  						<html>
						<head>
						</head>
						<body>
						<p>Bahan&nbsp; : Levis</p>	
						<p>Ukuran : 39-41</p>
						<p>Warna&nbsp; : Navy , Black</p>
						<p>Harga&nbsp; : 234 K</p>
						</body>
						</html>',
            'cover'=>'']);


            $quotes = quotes::create([
            'text'=>'Dengan Mencintai Dan Mengunakan Product Local Dengan Tidak Sadar Anda Membantu Meningkatkan Product Local Mentuk Menembus Pasar Internasional']);
            $quotes2 = quotes::create([
            'text'=>'Aku Adalah Hujan , Dan Aku Suka Hujan , Jika Kamu Tidak Suka Tak Mengapa , Silahkan Berteduh']);
            $quotes3 = quotes::create([
            'text'=>'Aku Berpikiran Kepada Orang Lain Itu Orang Baik , Namun Orang Lain Berpikiran Saya Orang Jahat , Jadi Walaupun Saya Orang Jahat Namun Selalu Berpikiran Baik , Namun Sebaliknya Dengan Orang Lain , Orang Baik Namun Selalu Berpikiran Jahat']);

            $Header = Header::create([
            'text_besar'=>'PansCompant.cloth',
            'text_kecil'=>'Kualitas Teratas Harga Mengah Kebawah , Silahkan Datang Dan Buktikan Sendiri']);

			$background_quotes = background_quotes::create([
            'text'=>'PansCompant.cloth',
            'background'=>'']);
    }
}
 