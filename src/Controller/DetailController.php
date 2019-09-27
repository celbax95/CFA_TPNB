<?php


namespace App\Controller;


use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route(path="/{_locale}/annoucement/{annouceId}/detail",
     *     name = "pageDetail",
     *     requirements={
     *     "annouceId"="[0-9]+",
     *     "_locale" : "|fr|en"},
     *     schemes={"https"})
     * @param String $annouceId
     * @return Response
     */
    public function index(String $annouceId): Response {
        $annoucement = $this->userManager->findAnnoucementById($annouceId)[0];

        return $this->render('detail/index.html.twig', [
            'annoucement'=>$annoucement,
        ]);
    }
}