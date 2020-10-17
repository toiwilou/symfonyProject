<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    /**
     * @Route("/", name="courses")
     */
    public function index()
    {
        // Tableau des cours
        $courses = [
            "course1" => [
                "titleCourse" => "Node.js",
                "daysCourse" => "Du lundi 28 séptembre au vendredi 04 octobre 2020",
                "intDay" => 28,
                "intMonth" => 9,
                "intYear" => 2020,
                "description" => "Un cours de Node.js, qui est une technologie backend pour le développement web à base de JavaScript. 
                Cette plateforme propose plusieurs module comme HTTP, Express, Mongoose,... qui rendent le développement plus intuitif."
            ],
            "course2" => [
                "titleCourse" => "Laravel",
                "daysCourse" => "Du lundi 19 au vendredi 23 octobre 2020",
                "intDay" => 19,
                "intMonth" => 10,
                "intYear" => 2020,
                "description" => "Laravel est un framework PHP très utilisé pour le développement d'applications web. Une analyse montre
                que Laravel reste, du moins pour le moment, au premier rang du classement des tchnologie PHP par sa légèreté et
                les différents services qu'elle propose comme les services déjà présents (Apache, Nginx, MySQL,...), une facilité pour la 
                virtualisation,..."
            ],
            "course3" => [
                "titleCourse" => "CDP (Continuous data protection)",
                "daysCourse" => "Du 28 séptembre au 04 octobre 2020",
                "intDay" => 26,
                "intMonth" => 10,
                "intYear" => 2020,
                "description" => "Il s'agit d'une solution de protection de données. Le principe est de capturer la moindre modification 
                de données d’un système de stockage primaire pour la copier vers un autre système de stockage entièrement séparé et ce à 
                travers un réseau."
            ],
            "course4" => [
                "titleCourse" => "JAVA J2E",
                "daysCourse" => "Du 23 au 27 novembre 2020 et reprend le 18 jusqu'au 22 janvier 2021",
                "intDay" => 23,
                "intMonth" => 11,
                "intYear" => 2020,
                "description" => "Java est le premier langage de programmation que j'ai appris et reste mon préféré par le fait que j'ai 
                une très bonne base. En effet c'est un langage orienté objet qui est réputé pour sa rigueur. La plateforme Java EE est 
                une technologie orienté web à base de Java trés utilisé en entreprise pour sa sécurité."
            ],
            "course5" => [
                "titleCourse" => "C#",
                "daysCourse" => "Du 22 au 26 février et repend le 22 jusqu'au 26 mars 2021",
                "intDay" => 22,
                "intMonth" => 2,
                "intYear" => 2021,
                "description" => "langage de programmation orientée objet destiné à développer sur la plateforme Microsoft .NET. Il est 
                dérivé du C++ et très proche du Java dont il reprend la syntaxe générale ainsi que les concepts, y ajoutant des notions 
                telles que la surcharge des opérateurs, les indexeurs et les délégués. Il est utilisé notamment pour développer des 
                applications web sur la plateforme ASP.NET."
            ],
            "course6" => [
                "titleCourse" => "Python",
                "daysCourse" => "Du 19 au 23 avril et reprend le 25 jusqu'au 28 mai 2021",
                "intDay" => 19,
                "intMonth" => 4,
                "intYear" => 2021,
                "description" => "Un langage de programmation interprété, multi-paradigme et multiplateformes, Il favorise la 
                programmation impérative structurée, fonctionnelle et orientée objet. Il est doté d'un typage dynamique fort, 
                d'une gestion automatique de la mémoire par ramasse-miettes et d'un système de gestion d'exceptions ; il est 
                ainsi similaire à Perl, Ruby, Scheme, Smalltalk et Tcl."
            ],
            "course7" => [
                "titleCourse" => "ROR (Ruby on Rails)",
                "daysCourse" => "Du 21 au 25 juin 2021",
                "intDay" => 21,
                "intMonth" => 6,
                "intYear" => 2021,
                "description" => "Également appelé RoR ou Rails, c'est un framework web libre écrit en Ruby. Il suit le motif de 
                conception modèle-vue-contrôleur (MVC). Il propose une structure qui permet de développer rapidement et intuitivement. 
                Cependant, il impose un grand niveau d'abstraction dans la programmation qui apporte en contrepartie l'économie d'écrire 
                soi-même la plupart des routines obligatoires d'une application web."
            ],
            "course8" => [
                "titleCourse" => "Android",
                "daysCourse" => "Du 28 juin au 02 juillet et reprend le 05 jusqu'au 09 juillet 2021",
                "intDay" => 28,
                "intMonth" => 6,
                "intYear" => 2021,
                "description" => "Android est un système d'exploitation mobile fondé sur le noyau Linux et développé par Google, 
                permettant de développer principalement des applications mobile souvent avec les technologies 
                Java, Kotlin, React native,..."
            ]
        ];

        // Récupération de la date courante
        $date = getdate();

        // Fonction de traduction des mois en Français
        function getStrDayFr($day){
            switch($day){
                case 1:
                    return "janvier";
                break;
                case 2:
                    return "février";
                break;
                case 3:
                    return "mars";
                break;
                case 4:
                    return "avril";
                break;
                case 5:
                    return "mai";
                break;
                case 6:
                    return "juin";
                break;
                case 7:
                    return "juillet";
                break;
                case 8:
                    return "août";
                break;
                case 9:
                    return "séptembre";
                break;
                case 10:
                    return "octobre";
                break;
                case 11:
                    return "novembre";
                break;
                case 12:
                    return "décembre";
                break;
            }
        }

        // Fonction de renvoie du prochain cours
        foreach($courses as $course){
            if(intval($course["intDay"]) >= $date["mday"] && intval($course["intMonth"]) >= $date["mon"]) {
                $test = "Lundi le " . $course["intDay"] . " " . getStrDayFr(intval($course["intMonth"]));
            break;
            }
        }

        return $this->render('courses/index.html.twig', [
            "courses" => $courses,
            "date" => $date,
            "test" => $test
        ]);
    }
}
