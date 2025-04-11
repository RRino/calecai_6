<?php

namespace Database\Factories;

use DateTime;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\ActivityFaker;
use App\Helpers\ValidModelValues;

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
        $actvityFaker = new ActivityFaker(
            '-1 year',
            '+1 year',
            [1 => 0.4, 2 => 0.4, 7 => 0.1]
        );
        $date_format = 'd-m-Y';
        $max_absolute_attendee = 50;
        $min_attendee = fake()->numberBetween(1, $max_absolute_attendee);

        return [
            'tipo_volantino' =>
                fake()->randomElement(
                    ValidModelValues::getValues('tipo_volantinos', 'tipo_volantino')
                ),
            'socio' =>
                fake()->randomElement(ValidModelValues::getValues('tipo_socios', 'tipo_socio')),
            // issue: il codice 0 solleva eccezione, 10 mostra contenitore vuoto
            // 'tipo_attivita' => fake()->randomElement(ValideModelValues::getValues('tipo_attivitas', 'tipo_attivita')),
            'tipo_attivita' =>
                fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'tipo_iscrizione' =>
                fake()->randomElement(
                    ValidModelValues::getValues('tipo_iscriziones', 'tipo_iscrizione')
                ),
            'titolo' => fake()->sentence(),
            'descrizione' => fake()->paragraph(),
            'note' => fake()->paragraph(),
            'numerominimo' => $min_attendee,
            'numeromassimo' => fake()->numberBetween($min_attendee + 5, $max_absolute_attendee),
            'nome' => fake()->firstName(),
            'cognome' => fake()->lastName(),
            'telefono' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'qualifica' =>
                fake()->randomElement(
                    ValidModelValues::getValues('tipo_qualificas', 'tipo_qualifica')
                ),
            'specializzazione' =>
                fake()->randomElement(
                    ValidModelValues::getValues(
                        'tipo_specializzaziones',
                        'tipo_specializzazione'
                    )
                ),
            'data_inizio' => $actvityFaker->getStartDay(),
            'data_fine' => $actvityFaker->getEndDay(),
            'calendario' =>
                fake()->randomElement(
                    ValidModelValues::getValues(
                        'tipo_calendarios',
                        'tipo_calendario'
                    )
                ),
            'inizio_iscrizioni' => $actvityFaker->getStartEnrollmentDay(),
            'fine_iscrizioni' => $actvityFaker->getEndEnrollmentDay(),
            'luogoritrovo' => fake()->word(),
            'oraritrovo' => $actvityFaker->getStartDay()->format('Y-m-d h:II'),
            'tipologiatrasporto' => fake()->word(),
            'difficolta' => fake()->randomElement(
                ValidModelValues::getValues(
                    'tipo_difficoltas',
                    'tipo_difficolta'
                )
            ),
            'lunghezza' => fake()->word(),
            'dislivello' => fake()->word(),
            'durata' => fake()->word(),
            'quotaminima' => fake()->numberBetween(1, 100),
            'quotamassima' => fake()->numberBetween(1, 100),
            'a_spinta' => fake()->word(),
            'portage' => fake()->word(),
            'image_file' => fake()->randomElement(['1.png', '2.png', '3.png', '4.png', '5.png']),
            'pdf_file' => fake()->randomElement(['1.pdf', '2.pdf', '3.pdf', '4.pdf', '5.pdf']),
            'link_volantino' => fake()->url(),
            'email_user' => fake()->unique()->safeEmail(),
            'presentazione' => fake()->word(),
            'data_presentazione' => $actvityFaker->getLauchDay(),
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