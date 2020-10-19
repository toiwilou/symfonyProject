<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(\Swift_Mailer $mailer)
    {
        $req = Request::createFromGlobals();
        $test = var_dump($req->request);

        $tester = $req->request->get("firstname");

        $message = (new \Swift_Message('Nouveau contact'))->setFrom("toiwilouhassane@gmail.com")->setTo('toiwismart@gmail.com')
        ->setBody("salut je suis un test de " . $req->request->get("firstname"));

        $mailer->send($message);

        return $this->render('reservation/index.html.twig', [
            "test" => $test,
            "tester" => $tester
        ]);
    }
}
