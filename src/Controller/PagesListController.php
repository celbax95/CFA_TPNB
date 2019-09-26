<?php


namespace App\Controller;


use App\Entity\Annoucement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesListController extends AbstractController
{
    /**
     * @Route(path="/annoucement/{pageIndex}",
     *     name="pageList",
     *     requirements={"pageIndex"="[0-9]+"},
     *     defaults={"pageIndex"="1"},
     *     schemes={"https"})
     */
    public function index(String $pageIndex): Response {
        $repo = $this->getDoctrine()->getRepository(Annoucement::class);

        $annoucements = $repo->findAll();

        return $this->render('pageList/index.html.twig', [
            'annoucements' => $annoucements,
        ]);
    }
}