<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LegalController extends AbstractController {

    /**
     * @Route("/cgu", name="tou")
     */
    public function tou(){
        return $this->render('tou.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="ln")
     */
    public function ln(){
        return $this->render('ln.html.twig');
    }

}