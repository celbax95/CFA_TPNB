<?php


namespace App\Controller;


use App\DTO\AddAnnoucement;
use App\Entity\Annoucement;
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

            $manager = $this->getDoctrine()->getManager();

            $Annoucement = new Annoucement($addAnnoucement->getTitle(),
            $addAnnoucement->getPrice() * 100,
            $addAnnoucement->getContent());

            // Save query
            $manager->persist($Annoucement);

            // Execute query
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}