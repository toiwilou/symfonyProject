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

        $name = $req->request->get("firstname");
        
        // Récupérations des données
        $nom = $req->request->get("sexe") . " " . $req->request->get("firstname") . " " . $req->request->get("lastname");
        $phone = $req->request->get("phone");
        $email = $req->request->get("email");
        $reservation = $req->request->get("reservation");
        $message = $req->request->get("message");

        // Prépation du message reçu
        $monMessage = $message . "
        
- Télephone : " . $phone . "
- email : " . $email . "
- Reservation : " . $reservation; 
        
        // Message de remerciement
        $message_complet ="Merci " . $req->request->get("sexe") . " " . $req->request->get("firstname") . " " . $req->request->get("lastname") . "
pour avoir rempli ce formulaire, votre reservation a été bien prise en compte ! vous pouvez vérifier vos emails.";

        // Message pour l'utilisateur
        $texte = "Bonjour " . $nom . "
        
Merci pour votre visite. Veuillez trouver ci-joint le récapitulatif de votre reservation : 
    
    - Nom : " . $nom . "
    - Téléphone : " . $phone . " 
    - Email : " . $email . "
    - Type de reservation : " . $reservation . "
    - Message : " . $message . "

Ceci est un mail automatique, merci de ne pas répondre.

Codialement

Adresse : 13 rue saint georges 94480 Ablon-sur-Seine 
Email : toiwilouhassane@gmail.com
Téléphone : 0623524131";

        // fonction sendMail
        function sendMail($emailUser, $emailAdmin, $object, $content, $mail){  

            $textMail = (new \Swift_Message($object))->setFrom($emailAdmin)->setTo($emailUser)
            ->setBody($content);

            $mail->send($textMail);
        }

        // Accusé de réception pour l'utilisateur
        sendMail($email, "toiwilousymfony@gmail.com", "Reservation", $texte, $mailer);

        // Réception du message
        sendMail("toiwismart@gmail.com", $email, "Message de " . $nom, $monMessage, $mailer);

        return $this->render('reservation/index.html.twig', [
            "message" => $message_complet,
            "nom" => $name,
        ]);
    }
}
