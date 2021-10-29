<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LieuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lieus')->insert([
            'meta_description' => 'Ceci est la metadescription',
            'image' => '/images/1635239217.jpg',
            'alt_image' => 'Photo nocturne du Tokyo Skytree',
            'nom' => 'Tokyo Skytree',
            'description' => "La Tokyo SkyTree est une tour japonaise de diffusion numérique, inaugurée en 2012 dans le quartier de Sumida aux abords d'Asakusa, au nord-est de la capitale. Elle est l'une des plus hautes du monde, avec un point culminant à 634 mètres. Ses deux observatoires ainsi que le centre commercial à son pied font, depuis son ouverture, partie des principales attractions de Tokyo.",
            'prix' => 4100.00,
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12958.627135224153!2d139.8107004!3d35.7100627!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7d1d4fb31f43f72a!2sTokyo%20Skytree!5e0!3m2!1sfr!2sfr!4v1632771437492!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'user_id' => 1,
            'categorie_id' => 1,
            'region_id' => 1,
            'created_at' => now()
        ]);

        DB::table('lieus')->insert([
            'meta_description' => '',
            'image' => '/images/1634473735.jpg',
            'alt_image' => 'Photo de Kinkaku-ji, le temple du pavillon d\'or',
            'nom' => 'Kinkaku-ji, le temple du pavillon d\'or',
            'description' => "Officiellement dénommé Rokuon-ji ou « temple du jardin des cerfs », le Kinkaku-ji surnommé le temple d’or est un temple bouddhiste zen situé au nord-ouest de Kyoto. Sa conception originale est rehaussée par un pavillon recouvert de feuilles d’or.",
            'prix' => 0.00,
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13066.778298003206!2d135.7292431!3d35.03937!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee4272b1c22645f!2sKinkaku-ji!5e0!3m2!1sfr!2sfr!4v1634473534913!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'user_id' => 1,
            'categorie_id' => 1,
            'region_id' => 3,
            'created_at' => now()

        ]);

        DB::table('lieus')->insert([
            'meta_description' => '',
            'image' => '/images/1635431841.jpg',
            'alt_image' => 'Photo d\'un plat de unagi',
            'nom' => 'Obana',
            'description' => "Fabuleux restaurant servant le plat traditionnel Unadon qui se compose d'anguille grillée et laquée avec une sauce accompagnée de riz.",
            'prix' => 7300.00,
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12955.120008840113!2d139.7968912!3d35.7316287!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x75da5e39a74ffcbb!2sObana!5e0!3m2!1sfr!2sfr!4v1635431755222!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'user_id' => 1,
            'categorie_id' => 2,
            'region_id' => 1,
            'created_at' => now()
        ]);

        DB::table('lieus')->insert([
            'meta_description' => '',
            'image' => '/images/1635436513.jpg',
            'alt_image' => 'Photo du mont Fuji à la levée du jour',
            'nom' => 'Mont Fuji',
            'description' => "L'un des symboles les plus emblématiques du Japon, les voyageurs du monde entier se rendent en masse dans les préfectures de Shizuoka et Yamanashi pour apercevoir cette montagne impressionnante. Pour les Japonais cependant, le mont Fuji est depuis longtemps un site d'importance spirituelle et une source d'inspiration artistique.",
            'prix' => 1000.00,
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1494276.3281982609!2d138.05115491520507!3d34.808069516500346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019629a42fdc899%3A0xa6a1fcc916f3a4df!2sMont%20Fuji!5e0!3m2!1sfr!2sfr!4v1635435941069!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'user_id' => 1,
            'categorie_id' => 1,
            'region_id' => 4,
            'created_at' => now()
        ]);

        DB::table('lieus')->insert([
            'meta_description' => '',
            'image' => '/images/1635493305.jpg',
            'alt_image' => 'Photo nocturne du temple Sensō-ji',
            'nom' => 'Sensō-ji',
            'description' => "On connaît surtout Asakusa pour son fameux temple Senso-ji, très visité par les touristes. Sa grande porte Kaminarimon à l'entrée voit ainsi passer 30 millions de personnes chaque année. Senso-ji est le plus vieux temple bouddhiste de Tokyo, situé dans le quartier d'Asakusa au bord de la rivière Sumida. Érigé en l'honneur de la déesse Kannon, il est aujourd'hui l'un des lieux touristiques préférés de la capitale pour ses couleurs flamboyantes et l'atmosphère populaire et commerçante qui y règne.",
            'prix' => 0.00,
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12957.862573594963!2d139.7966553!3d35.7147651!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6c0d289a8292810d!2sSanctuaire%20Asakusa!5e0!3m2!1sfr!2sfr!4v1635492853958!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'user_id' => 1,
            'categorie_id' => 1,
            'region_id' => 3,
            'created_at' => now()
        ]);

        DB::table('lieus')->insert([
            'meta_description' => '',
            'image' => '/images/1635493305.jpg',
            'alt_image' => 'Photo du panneau d\'entrée du musée Ghibli',
            'nom' => 'Musée Ghibli',
            'description' => "Le musée Ghibli est un musée commercial consacré aux réalisations du studio Ghibli. Il est situé au Japon, sur le terrain du parc d'Inokashira à Mitaka dans la banlieue de Tokyo. Il présente en plus des expositions, un café, un magasin, un toit végétal et une salle de cinéma.",
            'prix' => 9500.00,
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12960.87438298281!2d139.5704317!3d35.696238!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4de155903f849205!2sMus%C3%A9e%20Ghibli!5e0!3m2!1sfr!2sfr!4v1635494042804!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'user_id' => 1,
            'categorie_id' => 1,
            'region_id' => 3,
            'created_at' => now()
        ]);
        
    }
}
