<?php


namespace App\Controller;


use App\Entity\Annoucement;
use App\Repository\AnnoucementRepository;
use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route(path="/",
     *      name="home",
     *      schemes={"https"})
     * @return Response
     */
    public function index(): Response {
        $homeAnnoucements = $this->userManager->find2Annoucement();

        return $this->render('home/index.html.twig', [
            'annoucements' => $homeAnnoucements,
        ]);
    }
}