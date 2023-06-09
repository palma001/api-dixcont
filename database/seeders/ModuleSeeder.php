<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')
            ->insert([
                [
                    'link' => 'Billing',
                    'title' => 'Facturar',
                    'icon' => 'shopping_cart',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Product',
                    'title' => 'Productos',
                    'icon' => 'format_list_bulleted',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Invoice',
                    'title' => 'Lista de facturas',
                    'icon' => 'receipt_long',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'BoxReport',
                    'title' => 'Reporte de caja',
                    'icon' => 'list_alt',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Category',
                    'title' => 'Categorias',
                    'icon' => 'category',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'PaymentMethod',
                    'title' => 'Metodos de pago',
                    'icon' => 'payments',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'InvoiceType',
                    'title' => 'Tipos de factura',
                    'icon' => 'book',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Coin',
                    'title' => 'Moneda',
                    'icon' => 'book',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'User',
                    'title' => 'Usuarios',
                    'icon' => 'person',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Seller',
                    'title' => 'Vendedores',
                    'icon' => 'person',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Client',
                    'title' => 'Clientes',
                    'icon' => 'person',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Role',
                    'title' => 'Roles',
                    'icon' => 'group',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'LivingRoom',
                    'title' => 'Sala de estar',
                    'icon' => 'room_preferences',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'Taxe',
                    'title' => 'Impuestos',
                    'icon' => 'generating_tokens',
                    'user_created_id' => 1
                ],
                [
                    'link' => 'TypeOfService',
                    'title' => 'Tipo de servicios',
                    'icon' => 'room_service',
                    'user_created_id' => 1
                ]
            ]);
    }
}
