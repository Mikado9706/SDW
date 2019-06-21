<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\LoginType;
use App\Form\SignupType;
use App\Form\ForgottenPasswordType;
use App\Form\ResetPasswordType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthenticationController extends AbstractController {

    /**
     * @Route("/inscription", name="signup")
     */
    public function signup(Request $request, UserPasswordEncoderInterface $encoder){
        $form = $this->createForm(SignupType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formUser = $form->getData();

            $dateConverter = new DateConverter();

            $date = $this->forward('App\Controller\DateConverter::euToUs', [
                'date'  => $formUser['birthDate']
            ]);

            $user = new User();
            $user->setLastname($formUser['lastname']);
            $user->setFirstname($formUser['firstname']);
            $user->setEmail($formUser['email']);
            $user->setBirthdate($date->getContent());
            $user->setPassword($encoder->encodePassword($user, $formUser['password']));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('signup.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mot-de-passe-oublie", name="forgottenPassword")
     */
    public function forgottenPassword(Request $request){
        $form = $this->createForm(ForgottenPasswordType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
        }

        return $this->render('forgottenPassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/reinitialiser-votre-mot-de-passe", name="resetPassword")
     */
    public function resetPassword(Request $request){
        $form = $this->createForm(ResetPasswordType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
        }

        return $this->render('resetPassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}