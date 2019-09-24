<?php


namespace App\Controller;


use http\Message\Body;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddController extends AbstractController
{
    /**
     * @Route(path="/annoucement/add",
     *     name="addPage",
     *     methods={"GET","POST"},
     *     schemes={"https"})
     * @return Response
     */
    public function index() : Response {
        return $this->render('add/index.html.twig', [
        ]);
    }

}