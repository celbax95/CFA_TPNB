<?php


namespace App\Controller;


use App\Entity\Annoucement;
use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesListController extends AbstractController
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route(path="/annoucement/{pageIndex}",
     *     name="pageList",
     *     requirements={"pageIndex"="[0-9]+"},
     *     defaults={"pageIndex"="1"},
     *     schemes={"https"})
     */
    public function index(String $pageIndex): Response {
        $annoucements =$this->userManager->findAllAnnoucements();

        return $this->render('pageList/index.html.twig', [
            'annoucements' => $annoucements,
        ]);
    }
}