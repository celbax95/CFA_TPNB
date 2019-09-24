<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route(path="/",
     *      name="home",
     *      schemes={"https"})
     * @return Response
     */
    public function index(): Response {
        $annoucements = AnnoucementArray::get();
        $homeAnnoucements = [$annoucements[0],$annoucements[1]];

        return $this->render('home/index.html.twig', [
            'annoucements' => $homeAnnoucements,
        ]);
    }
}