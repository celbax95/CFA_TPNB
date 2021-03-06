<?php


namespace App\Controller;


use App\Entity\Annoucement;
use App\Repository\AnnoucementRepository;
use App\Service\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     * @Route(path="/{_locale}",
     *      name="home",
     *      requirements={"_locale" : "|fr|en",},
     *      schemes={"https"})
     *
     * @return Response
     */
    public function index(): Response {
        $homeAnnoucements = $this->userManager->find2Annoucements();

        return $this->render('home/index.html.twig', [
            'annoucements' => $homeAnnoucements,
        ]);
    }
}