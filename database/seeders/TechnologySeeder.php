<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'https://cdn.freebiesupply.com/logos/large/2x/php-logo-svg-vector.svg',
            'https://logowik.com/content/uploads/images/vue2883.jpg',
            'https://tl.vhv.rs/dpng/s/35-358510_javascript-logo-hd-png-download.png',
            'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png',
            'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/2300px-React-icon.svg.png',
            'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png',
            'https://logowik.com/content/uploads/images/tailwind-css3232.logowik.com.webp',
            'https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/HTML5_Badge.svg/800px-HTML5_Badge.svg.png',
            'https://seeklogo.com/images/C/css3-logo-8724075274-seeklogo.com.png',
            'https://e7.pngegg.com/pngimages/72/936/png-clipart-sass-cascading-style-sheets-preprocessor-less-postcss-meng-miscellaneous-text-thumbnail.png',
        ];
        $technologies = ['php', 'Vue', 'Js', 'Laravel', 'React', 'Bootstrap', 'Tailwind', 'Html', 'Css', 'Scss'];
        foreach ($technologies as $key => $technology) {
            $newTechonology = new Technology();
            $newTechonology->name = $technology;
            $newTechonology->image = $images[$key];
            $newTechonology->save();
        }
    }
}
