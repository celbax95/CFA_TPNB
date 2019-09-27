<?php


namespace App\Controller;


use App\DTO\AddUser;
use App\Entity\User;
use App\Service\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $userManager;

    private $encoder;

    public function __construct(UserManager $userManager, UserPasswordEncoderInterface $encoder)
    {
        $this->userManager = $userManager;
        $this->encoder = $encoder;
    }

    /**
     * @Route(path="/register",
     *     name="register",
     *     requirements={"_locale" : "|fr|en",},
     *     methods={"GET","POST"},
     *     schemes={"https"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response {
        $addUser = new AddUser();
        $form = $this->createForm('App\Form\RegisterType', $addUser);
        $form->handleRequest($request);

        $emailConfirm = true;
        $passwordConfirm = true;

        // Submitted
        if ($form->isSubmitted() && $form->isValid()) {
            if ($addUser->getEmail() == $addUser->getEmailConfirm()) {
                $emailConfirm = false;
            }

            if ($addUser->getPassword() == $addUser->getPasswordConfirm()) {
                $passwordConfirm = false;
            }

            if (!$emailConfirm && !$passwordConfirm) {
                $user = new User();
                $user->setEmail($addUser->getEmail());
                $user->setPassword($addUser->getPassword());

                $user->setPassword($this->encoder->encodePassword($user, $user->getPassword()));

                $this->userManager->saveUser($user);

                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}