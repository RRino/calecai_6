<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attivita>
 */
class AttivitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_day = fake()->dateTimeInInterval('now', '+6 months');
        return [
            'tipo_volantino' => 0,
            'socio' => fake()->word(),
            'tipo_attivita' => 1,
            'tipo_iscrizione' => '3',
            'titolo' => fake()->sentence(),
            'descrizione' => fake()->paragraph(),
            'note' => fake()->paragraph(),
            'numerominimo' => fake()->numberBetween(1, 100),
            'numeromassimo' => fake()->numberBetween(1, 100),
            'nome' => fake()->firstName(),
            'cognome' => fake()->lastName(),
            'telefono' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'qualifica' => fake()->word(),
            'specializzazione' => fake()->word(),
            'data_inizio' => $start_day,
            'data_fine' => fake()->dateTimeInInterval($start_day, '+2 days'),
            'calendario' => 0,
            'inizio_iscrizioni' => fake()->dateTimeInInterval($start_day, '-1 month'),
            'fine_iscrizioni' => fake()->dateTimeInInterval($start_day, '-1 days'),
            'luogoritrovo' => fake()->word(),
            'oraritrovo' => fake()->time(),
            'tipologiatrasporto' => fake()->word(),
            'difficolta' => fake()->word(),
            'lunghezza' => fake()->word(),
            'dislivello' => fake()->word(),
            'durata' => fake()->word(),
            'quotaminima' => fake()->numberBetween(1, 100),
            'quotamassima' => fake()->numberBetween(1, 100),
            'a_spinta' => fake()->word(),
            'portage' => fake()->word(),
            'image_file' => fake()->imageUrl(),
            'pdf_file' => fake()->filePath(),
            'link_volantino' => fake()->url(),
            'email_user' => fake()->unique()->safeEmail(),
            'presentazione' => fake()->word(),
            'data_presentazione' => fake()->dateTimeInInterval($start_day, '-6 days'),
            'contatti' => fake()->word(),
            'altro' => fake()->word(),
            'altriorganizzatori' => fake()->word(),            
            'altricosti' => fake()->word(),
            'linkluogo' => fake()->url(),
            'link_modulo_esterno' => fake()->url(),
            'user_email' => fake()->unique()->safeEmail(),
            'clic' => fake()->numberBetween(1, 100),
            'order' => 0,
            'published' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
