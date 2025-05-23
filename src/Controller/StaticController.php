<?php
namespace App\Controller;

use App\Core\View;

class StaticController
{
    public function home(): void
    {
        View::render('static/home', [
            'title'  => 'AEROSYSTEMS – Технологии будущего',
            'styles' => ['../../public/static/styles.css'],
        ]);
    }

    public function about(): void
    {
        View::render('static/about', [
            'title'         => 'О компании – AEROSYSTEMS',
            'styles'        => ['/static/styles.css'],
            'galleryImages' => [
                'poland_f-35_reveal.webp',
                'raptor.jpg',
                'rafale.jpg',
                'f15.jpg',
                'nasams.jpeg',
                'm142.jpg',
                'mrap1.webp',
                'bradley1.webp',
                'ampv.jpg',
            ],
        ]);
    }
    public function services(): void
    {
        View::render('static/services', [
            'title'  => 'Услуги – AEROSYSTEMS',
            'styles' => ['../../public/static/styles.css'],
        ]);
    }

    public function contact(): void
    {
        View::render('static/contact', [
            'title'  => 'Контакты – AEROSYSTEMS',
            'styles' => ['../../public/static/styles.css'],
        ]);
    }
}
