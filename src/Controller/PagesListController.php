<?php


namespace App\Controller;


use App\Entity\Annoucement;
use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesListController extends AbstractController
{
    const NB_PER_PAGE = 2;

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
    public function index(String $pageIndex): Response
    {
        $start = ((int)$pageIndex-1)*self::NB_PER_PAGE;
        $end = $start + self::NB_PER_PAGE;

        $annoucements = $this->userManager->findAnnoucementsFromTo($start, $end);

        $totalPages = ceil($this->userManager->findRecordsSize() / self::NB_PER_PAGE);

        return $this->render('pageList/index.html.twig', [
            'annoucements' => $annoucements,
            'currentPage' => $pageIndex,
            'totalPages' => $totalPages,
        ]);
    }
}