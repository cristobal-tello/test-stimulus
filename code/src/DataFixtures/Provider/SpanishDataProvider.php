<?php

namespace App\DataFixtures\Provider;

class SpanishDataProvider
{
    private const DNI_LETTERS = 'TRWAGMYFPDXBNJZSQVHLCKE';

    public function Dni(): string
    {
        $numbers = str_pad((string) random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
        $letter = self::DNI_LETTERS[$numbers % 23];
        return $numbers . $letter;
    }

    public function Ciudad(): string
    {
        $cities = [
            'Madrid',
            'Barcelona',
            'Valencia',
            'Seville',
            'Zaragoza',
            'Málaga',
            'Murcia',
            'Palma',
            'Las Palmas',
            'Bilbao',
            'Alicante',
            'Córdoba',
            'Valladolid',
            'Vigo',
            'Gijón',
            'Vitoria-Gasteiz',
            'La Coruña',
            'Granada',
            'Elche',
            'Oviedo',
            'Badalona',
            'Cartagena',
            'Terrassa',
            'Jerez de la Frontera',
            'Sabadell',
            'Santa Cruz de Tenerife',
            'Móstoles',
            'Alcalá de Henares',
            'Pamplona',
            'Fuenlabrada',
            'Almería',
            'Leganés',
            'San Sebastián',
            'Santander',
            'Burgos',
            'Castellón de la Plana',
            'Albacete',
            'Getafe',
            'Alcorcón',
            'Logroño',
            'Badajoz',
            'Salamanca',
            'Huelva',
            'Marbella',
            'Lleida',
            'Tarragona',
            'León',
            'Cádiz',
            'Jaén',
            'Ourense',
            'Lugo',
            'Santiago de Compostela',
            'Girona',
            'Cáceres',
            'Melilla',
            'Ceuta',
            'Guadalajara',
            'Toledo',
            'Pontevedra',
            'Palencia',
            'Ferrol',
            'Orihuela',
            'Avilés',
            'Coslada',
            'Talavera de la Reina',
            'El Puerto de Santa María',
            'Cornellà de Llobregat',
            'Arona',
            'San Fernando',
            'Roquetas de Mar',
            'Torrevieja',
            'Mijas',
            'Parla',
            'Rubí',
            'Manresa',
            'Fuengirola',
            'Benidorm',
            'Ponferrada',
            'Rivas-Vaciamadrid',
            'Majadahonda',
            'Algeciras',
            'Sanlúcar de Barrameda',
            'Estepona',
            'Torremolinos',
            'Collado Villalba',
            'Zamora',
            'Ávila',
            'Cuenca',
            'Segovia',
            'Benalmádena',
            'Gandía',
            'Arrecife',
            'Elda',
            'Mollet del Vallès',
            'Cerdanyola del Vallès',
            'Granollers',
            'Motril',
            'Vélez-Málaga',
            'Valdemoro'
        ];

        return $cities[array_rand($cities)];
    }
}
