<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchType;

class SearchController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function home(Request $request){
        $form = $this->createForm(SearchType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();    
            return $this->redirectToRoute('search');
        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/rechercher", name="search")
     */
    public function search(Request $request){
        $form = $this->createForm(SearchType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
        }

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}