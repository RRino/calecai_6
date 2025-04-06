<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $date_format = 'Y-m-d';
        $start_day = fake()->dateTimeBetween('-1 year', '+1 year');
        $end_day = new DateTime(($start_day->format($date_format)));
        $end_day->modify('+7 days');
        $end_days = [
            $start_day,
            $start_day,
            $start_day,
            fake()->dateTimeBetween($start_day, $end_day)
        ];
        $end_day = $end_days[array_rand($end_days)];
        $sooner_enrollment_day = new DateTime($start_day->format($date_format));
        $sooner_enrollment_day->modify('-3 months');
        $later_enrollment_day = new DateTime($start_day->format($date_format));
        $later_enrollment_day->modify('-1 week');
        $start_enrollment_day = fake()->dateTimeBetween(
            $sooner_enrollment_day,
            $later_enrollment_day
        );
        $end_enrollment_day =
            fake()->dateTimeBetween($later_enrollment_day, $start_day);

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
                    ValidModelValues::getValues('tipo_specializzaziones', 'tipo_specializzazione')
                ),
            'data_inizio' => $start_day,
            'data_fine' => $end_day,
            'calendario' =>
                fake()->randomElement(
                    ValidModelValues::getValues('tipo_calendarios', 'tipo_calendario')
                ),
            'inizio_iscrizioni' => $start_enrollment_day,
            'fine_iscrizioni' => fake()->dateTimeBetween(
                $start_enrollment_day,
                $end_enrollment_day
            ),
            'luogoritrovo' => fake()->word(),
            'oraritrovo' => $start_day->format('Y-m-d h:II'),
            'tipologiatrasporto' => fake()->word(),
            'difficolta' => fake()->randomElement(
                ValidModelValues::getValues('tipo_difficoltas', 'tipo_difficolta')
            ),
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
            'data_presentazione' => $sooner_enrollment_day->format($date_format),
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

class ValidModelValues
{
    public static function getValues(string $table, string $column)
    {
        $values = DB::table($table)->pluck($column);
        return $values;
    }
}
