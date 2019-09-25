<?php


namespace App\Controller;


use App\DTO\AddAnnoucement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request) : Response {
        $addAnnoucement = new AddAnnoucement();
        $form = $this->createForm('App\Form\AddAnnoucementType', $addAnnoucement);
        $form->handleRequest($request);

        // Submitted
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('home');
        }

        return $this->render('add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}