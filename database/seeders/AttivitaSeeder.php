<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attivita;

class AttivitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attivita::factory()
            ->count(50)
            ->create();
    }
}
            
            /*
            ->create([
                'email' => fake()->unique()->safeEmail(),
                'titolo' => fake()->sentence(),
                'data_inizio' => fake()->dateTime(),
                'data_fine' => fake()->dateTime(),
                'telefono' => fake()->phoneNumber(),
                'nome' => fake()->firstName(),
                'cognome' => fake()->lastName(),
                'qualifica' => fake()->word(),
                'calendario' => fake()->word(),
                'altro' => fake()->word(),
                'specializzazione' => fake()->word(),
                'altriorganizzatori' => fake()->word(),
                'tipologia' => fake()->word(),
                'difficolta' => fake()->word(),
                'durata' => fake()->word(),
                'socio' => fake()->word(),
                'a_spinta' => fake()->word(),
                'portage' => fake()->word(),
                'dislivello' => fake()->word(),
                'quotaminima' => fake()->numberBetween(1, 100),
                'quotamassima' => fake()->numberBetween(1, 100),
                'numerominimo' => fake()->numberBetween(1, 100),
                'numeromassimo' => fake()->numberBetween(1, 100),
                'altricosti' => fake()->word(),
                'tipologiatrasporto' => fake()->word(),
                'oraritrovo' => fake()->time(),
                'luogoritrovo' => fake()->word(),
                'linkluogo' => fake()->url(),
                'link_modulo_esterno' => fake()->url(),
                'descrizione' => fake()->paragraph(),
                'note' => fake()->paragraph(),
                'image1_file' => fake()->imageUrl(),
                'image2_file' => fake()->imageUrl(),
            ]);
    }
}*/