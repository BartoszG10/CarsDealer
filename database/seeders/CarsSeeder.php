<?php

namespace Database\Seeders;

use App\Models\cars;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Wygeneruj 20 losowych samochodów
        for ($i = 0; $i < 20; $i++) {
            cars::create([
                'image_path' => 'pictures/example_image.jpg',
                'name' => 'Car ' . ($i + 1),
                'model' => 'Model ' . ($i + 1),
                'fuelType' => $this->getRandomFuelType(),
                'yearOfProduction' => $this->getRandomYear(),
                'transmission' => $this->getRandomTransmission(),
                'driveType' => $this->getRandomDriveType(),
                'addInfo' => 'Dodatkowe informacje',
                'price' => rand(10000, 50000), // Losowa cena od 10 000 do 50 000
            ]);
        }
    }

    /**
     * Wybierz losowy typ paliwa.
     *
     * @return string
     */
    private function getRandomFuelType()
    {
        $fuelTypes = ['Petrol', 'Diesel', 'Electric', 'LPG'];

        return $fuelTypes[array_rand($fuelTypes)];
    }

    /**
     * Wygeneruj losowy rok produkcji.
     *
     * @return int
     */
    private function getRandomYear()
    {
        return rand(2000, 2023); // Losowy rok od 2000 do 2023
    }

    /**
     * Wybierz losowy typ skrzyni biegów.
     *
     * @return string
     */
    private function getRandomTransmission()
    {
        $transmissions = ['Automatic', 'Manual'];

        return $transmissions[array_rand($transmissions)];
    }

    /**
     * Wybierz losowy typ napędu.
     *
     * @return string
     */
    private function getRandomDriveType()
    {
        $driveTypes = ['Front-wheel drive', 'Rear-wheel drive', 'All-wheel drive'];

        return $driveTypes[array_rand($driveTypes)];
    }
}