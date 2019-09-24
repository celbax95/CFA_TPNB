<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route(path="/annoucement/{annouceId}/detail",
     *     name = "pageDetail",
     *     requirements={"annouceId"="[0-9]+"},
     *     schemes={"https"})
     * @param String $annouceId
     * @return Response
     */
    public function index(String $annouceId): Response {

        $annoucement = AnnoucementArray::get()[$annouceId];

        return $this->render('detail/index.html.twig', [
            'annoucement'=>$annoucement,
        ]);
    }
}