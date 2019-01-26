<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\LoginType;
use App\Form\SignupType;
use App\Form\ForgottenPasswordType;
use App\Form\ResetPasswordType;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends AbstractController {

    /**
     * @Route("/connexion", name="login")
     */
    public function login(Request $request){
        $form = $this->createForm(LoginType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
        }

        return $this->render('login.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inscription", name="signup")
     */
    public function signup(Request $request){
        $form = $this->createForm(SignupType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
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