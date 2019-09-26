<?php


namespace App\Controller;


use App\Entity\Annoucement;
use App\Repository\AnnoucementRepository;
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
        $repo = $this->getDoctrine()->getRepository(Annoucement::class);

        $homeAnnoucements = $repo->find2();

        return $this->render('home/index.html.twig', [
            'annoucements' => $homeAnnoucements,
        ]);
    }
}