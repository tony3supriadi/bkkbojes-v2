<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        'defaults'       => [
            'title'        => "Bursa Kerja Khusus | SMK Negeri 1 Bojongsari",
            'titleBefore'  => false,
            'description'  => 'BKK merupakan bursa kerja khusus yang dikembangkan oleh SMK Negeri 1 Bojongsari yang digunakan untuk menunjang dan merekam karir alumni.',
            'separator'    => ' - ',
            'keywords'     => ['Bursa Kerja Khusus', 'Lowongan Pekerjaan', 'Loker', 'SMK Negeri 1 Bojongsari', 'Lowongan Kerja Purbalingga'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'        => "Bursa Kerja Khusus | SMK Negeri 1 Bojongsari",
            'description'  => 'BKK merupakan bursa kerja khusus yang dikembangkan oleh SMK Negeri 1 Bojongsari yang digunakan untuk menunjang dan merekam karir alumni.',
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'        => "Bursa Kerja Khusus | SMK Negeri 1 Bojongsari",
            'description'  => 'BKK merupakan bursa kerja khusus yang dikembangkan oleh SMK Negeri 1 Bojongsari yang digunakan untuk menunjang dan merekam karir alumni.',
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
