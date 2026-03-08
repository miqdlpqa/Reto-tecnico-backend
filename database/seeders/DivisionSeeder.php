<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{

    public function run(): void
    {
        // Divisiones principales - Dirección general (nivel 1)
        $direccionGeneral = Division::create([
            'name' => 'Dirección general',
            'parent_id' => null,
            'level' => 1,
            'collaborators' => 1,
            'ambassador' => 'Jordyn Herwitz'
        ]);

        // Subdivisiones de Dirección general (nivel 2)
        $ceo = Division::create([
            'name' => 'CEO',
            'parent_id' => $direccionGeneral->id,
            'level' => 2,
            'collaborators' => 11,
            'ambassador' => 'Carla Siphron'
        ]);

        $producto = Division::create([
            'name' => 'Producto',
            'parent_id' => $direccionGeneral->id,
            'level' => 2,
            'collaborators' => 4,
            'ambassador' => null
        ]);

        $operaciones = Division::create([
            'name' => 'Operaciones',
            'parent_id' => $direccionGeneral->id,
            'level' => 2,
            'collaborators' => 6,
            'ambassador' => null
        ]);

        // Subdivisiones de CEO (nivel 3)
        Division::create([
            'name' => 'CEO Operations',
            'parent_id' => $ceo->id,
            'level' => 3,
            'collaborators' => 11,
            'ambassador' => 'Terry Press'
        ]);

        Division::create([
            'name' => 'CEO Strategy',
            'parent_id' => $ceo->id,
            'level' => 3,
            'collaborators' => 3,
            'ambassador' => 'Kierra Rosser'
        ]);

        // Subdivisiones de Producto (nivel 3)
        Division::create([
            'name' => 'Product Development',
            'parent_id' => $producto->id,
            'level' => 3,
            'collaborators' => 7,
            'ambassador' => null
        ]);

        Division::create([
            'name' => 'Product Management',
            'parent_id' => $producto->id,
            'level' => 3,
            'collaborators' => 6,
            'ambassador' => null
        ]);

        // Subdivisiones de Operaciones (nivel 3)
        Division::create([
            'name' => 'Operations HR',
            'parent_id' => $operaciones->id,
            'level' => 3,
            'collaborators' => 11,
            'ambassador' => null
        ]);

        Division::create([
            'name' => 'Operations Finance',
            'parent_id' => $operaciones->id,
            'level' => 3,
            'collaborators' => 5,
            'ambassador' => null
        ]);

        // Divisiones adicionales de nivel 2
        Division::create([
            'name' => 'Growth',
            'parent_id' => $direccionGeneral->id,
            'level' => 2,
            'collaborators' => 3,
            'ambassador' => null
        ]);

        $strategy = Division::create([
            'name' => 'Strategy',
            'parent_id' => $direccionGeneral->id,
            'level' => 2,
            'collaborators' => 8,
            'ambassador' => null
        ]);

        // Subdivisiones de Strategy (nivel 3)
        Division::create([
            'name' => 'Market Analysis',
            'parent_id' => $strategy->id,
            'level' => 3,
            'collaborators' => 5,
            'ambassador' => 'Diana Fuentes'
        ]);

        Division::create([
            'name' => 'Business Planning',
            'parent_id' => $strategy->id,
            'level' => 3,
            'collaborators' => 3,
            'ambassador' => null
        ]);

        // Más divisiones principales (nivel 1)
        $marketing = Division::create([
            'name' => 'Marketing',
            'parent_id' => null,
            'level' => 1,
            'collaborators' => 9,
            'ambassador' => 'Sofia Mendez'
        ]);

        $ventas = Division::create([
            'name' => 'Ventas',
            'parent_id' => null,
            'level' => 1,
            'collaborators' => 14,
            'ambassador' => null
        ]);

        // Subdivisiones de Marketing (nivel 2)
        Division::create([
            'name' => 'Digital Marketing',
            'parent_id' => $marketing->id,
            'level' => 2,
            'collaborators' => 6,
            'ambassador' => 'Lucas Peña'
        ]);

        Division::create([
            'name' => 'Content Team',
            'parent_id' => $marketing->id,
            'level' => 2,
            'collaborators' => 3,
            'ambassador' => 'Maria Santos'
        ]);

        // Subdivisiones de Ventas (nivel 2)
        $ventasNorte = Division::create([
            'name' => 'Ventas Norte',
            'parent_id' => $ventas->id,
            'level' => 2,
            'collaborators' => 7,
            'ambassador' => 'Eduardo Vega'
        ]);

        Division::create([
            'name' => 'Ventas Sur',
            'parent_id' => $ventas->id,
            'level' => 2,
            'collaborators' => 7,
            'ambassador' => null
        ]);

        // Subdivisiones de Ventas Norte (nivel 3)
        Division::create([
            'name' => 'Ventas CDMX',
            'parent_id' => $ventasNorte->id,
            'level' => 3,
            'collaborators' => 4,
            'ambassador' => 'Alejandra Ruiz'
        ]);

        // División de Recursos Humanos (nivel 1)
        $rh = Division::create([
            'name' => 'Recursos Humanos',
            'parent_id' => null,
            'level' => 1,
            'collaborators' => 11,
            'ambassador' => 'Patricia Valdez'
        ]);

        // Subdivisiones de Recursos Humanos (nivel 2)
        Division::create([
            'name' => 'Recruitment',
            'parent_id' => $rh->id,
            'level' => 2,
            'collaborators' => 4,
            'ambassador' => 'Ivan Morales'
        ]);

        Division::create([
            'name' => 'Training & Development',
            'parent_id' => $rh->id,
            'level' => 2,
            'collaborators' => 3,
            'ambassador' => 'Rosa Jimenez'
        ]);

        Division::create([
            'name' => 'Compensation & Benefits',
            'parent_id' => $rh->id,
            'level' => 2,
            'collaborators' => 4,
            'ambassador' => null
        ]);

        // División de Customer Success (nivel 1)
        $customerSuccess = Division::create([
            'name' => 'Customer Success',
            'parent_id' => null,
            'level' => 1,
            'collaborators' => 8,
            'ambassador' => 'Monica Castro'
        ]);

        // Subdivisiones de Customer Success (nivel 2)
        Division::create([
            'name' => 'Customer Support',
            'parent_id' => $customerSuccess->id,
            'level' => 2,
            'collaborators' => 5,
            'ambassador' => 'Jorge Nunez'
        ]);

        Division::create([
            'name' => 'Account Management',
            'parent_id' => $customerSuccess->id,
            'level' => 2,
            'collaborators' => 3,
            'ambassador' => null
        ]);
    }
}
