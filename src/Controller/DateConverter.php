<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
class DateConverter extends AbstractController {
        
    public function euToUs($date){
        $conversion = explode("/", $date);
        $laDate = $conversion[2]."-".$conversion[1]."-".$conversion[0];

        return new Response(
            $laDate,
            Response::HTTP_OK,
            ['content-type' => 'string']
        );
    }
}