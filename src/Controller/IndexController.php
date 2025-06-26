<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function home(): Response
    {
        $names = ['Cody', 'Charlie', 'Jayden', 'Beatrice', 'Violet', 'Stephen', 'Celia', 'Leona' ];

        $idx = random_int(0, count($names)-1);

        return $this->render('index/index.html.twig', [
            'firstname' => $names[$idx],
        ]);
    }

}
