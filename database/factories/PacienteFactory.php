<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Paciente;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PacienteFactory extends Factory
{
   
    protected $model = Paciente::class;
    
    public function definition(): array
    {

     

        return [
            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'identificacion' => Str::random(10),
            'correo'=>$this->faker->unique()->safeEmail(),
            'entidad' => $this->faker->randomElement(['Y','X','R','Z']),
            'fecha_de_nacimiento' =>$this->faker->date('Y-m-d','2005-01-01'),
            'genero' => $this->faker->randomElement(['F','M']),
            'telefono' => $this->faker->phoneNumber(),
            'direccion' => $this->faker->address(),
            'tipo_de_sangre' => $this->faker->randomElement(['a','b','c','d']),
            'alergias' => $this->faker->optional()->sentence(),
            'contacto_emergencia' => $this->faker->phoneNumber(),
            'observaciones' => $this->faker->optional()->paragraph()

        ];
    }
}
