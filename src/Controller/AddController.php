<?php


namespace App\Controller;


use App\DTO\AddAnnoucement;
use App\Entity\Annoucement;
use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddController extends AbstractController
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @Route(path="/{_locale}/annoucement/add",
     *     name="addPage",
     *     requirements={"_locale" : "|fr|en",},
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

            $annoucement = new Annoucement($addAnnoucement->getTitle(),
            $addAnnoucement->getPrice() * 100,
            $addAnnoucement->getContent());

            $this->userManager->save($annoucement);

            return $this->redirectToRoute('home');
        }

        return $this->render('add/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}