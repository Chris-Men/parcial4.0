<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'cafe con crema batida',
                'descripcion' => 'Descripción del Producto 1',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/cafe con crema batida.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'cafe descafeinado',
                'descripcion' => 'Descripción del Postre 1',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/cafe descafeinado.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'cafe espeso',
                'descripcion' => 'Descripción del Producto 3',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/cafe espeso.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'cafe helado',
                'descripcion' => 'Descripción del Producto 4',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/cafe helado.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'cafe negro',
                'descripcion' => 'Descripción del Producto 5',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/cafe negro.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'capuchino',
                'descripcion' => 'Descripción del Producto 6',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/capuchino.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'chocolate con leche',
                'descripcion' => 'Descripción del Producto 7',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/chocolate con leche.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'frozen de cafe',
                'descripcion' => 'Descripción del Producto 8',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/frozen de cafe.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'frozen de fresa',
                'descripcion' => 'Descripción del Producto 9',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/frozen de fresa.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'tostaccino',
                'descripcion' => 'Descripción del Producto 10',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'imagenes/tostaccino.jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'Bebida 11',
                'descripcion' => 'Descripción del Producto 11',
                'stock' => 10,
                'precio' => 29.99,
                'imagen' => 'images/Bebida (11).jpg',
                'id_categoria' => 1,
            ],
            [
                'nombre' => 'Postre 1',
                'descripcion' => 'Descripción del Postre 1',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (1).jpg',
                'id_categoria' => 2,
            ],[
                'nombre' => 'Postre 2',
                'descripcion' => 'Descripción del Postre 2',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (2).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 3',
                'descripcion' => 'Descripción del Postre 3',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (3).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 4',
                'descripcion' => 'Descripción del Postre 4',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (4).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 5',
                'descripcion' => 'Descripción del Postre 5',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (5).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 6',
                'descripcion' => 'Descripción del Postre 6',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (6).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 7',
                'descripcion' => 'Descripción del Postre 7',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (7).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 8',
                'descripcion' => 'Descripción del Postre 8',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (8).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 9',
                'descripcion' => 'Descripción del Postre 9',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (9).jpg',
                'id_categoria' => 2,
            ],
            [
                'nombre' => 'Postre 10',
                'descripcion' => 'Descripción del Postre 10',
                'stock' => 5,
                'precio' => 19.99,
                'imagen' => 'images/Postre (10).jpg',
                'id_categoria' => 2,
            ],
            // ... Agrega más productos según sea necesario
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
