<?php

namespace App\Controller;
use App\Entity\Theses;
use App\Entity\Ecoles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {


         //J’utilise l’entity manager, objet fournis par Symfony
         $entityManager = $this->getDoctrine()->getManager();
         //Je récupère le repository de Book
         $ecolesRepository = $entityManager->getRepository(Ecoles::class);
         $ecoles = $ecolesRepository->findAll();
            
         if(empty($ecoles)){
           

             $ecol1 = new Ecoles();
             $ecol1->setNom("Université de  Montpellier");
             $ecol1->setLien("https://sciences.edu.umontpellier.fr");
             $entityManager->persist($ecol1);


             $ecol2 = new Ecoles();
             $ecol2->setNom("Université Montpellier 3");
             $ecol2->setLien("https://www.univ-montp3.fr");
             $entityManager->persist($ecol2);

             $ecol3 = new Ecoles();
             $ecol3->setNom("Université Paris Sorbonne");
             $ecol3->setLien("https://www.sorbonne-universite.fr");
             $entityManager->persist($ecol3);

            








             $these1 = new Theses();
             $these1->setTitre("Titre thése N°1");
             $these1->setAccroche("phase d'accroche");
             $these1->setDescription("Analyse chez les cyanobactéries de la sélectivité/redondance des glutathion-S-transférases 
             conservées par l'évolution: role dans la fixation du CO2 et la résistance aux stress 
             (températures, radiations et polluants)");
             $these1->setContact("bobb@gmail.fr");
             $these1->setEcoles($ecol1);
             $entityManager->persist($these1);


             $these2 = new Theses();
             $these2->setTitre("Titre thése N°2");
             $these2->setAccroche("phase d'accroche");
             $these2->setDescription("Developmental epigenetics to better understand carbon cycle on earth 
             deciphering the roles of Jumonji domain containing proteins in Podospora anserina");
             $these2->setContact("billl@gmail.fr");
             $these2->setEcoles($ecol2);
             $entityManager->persist($these2);

             $these3 = new Theses();
             $these3->setTitre("Titre thése N°3");
             $these3->setAccroche("phase d'accroche");
             $these3->setDescription("Etude des mécanismes de biosynthèse des synthétases de peptides non-ribosomiques
             par biologie de synthèse");
             $these3->setContact("melou@gmail.fr");
             $these3->setEcoles($ecol3);
             $entityManager->persist($these3);
             
             $these4 = new Theses();
             $these4->setTitre("Titre thése N°4");
             $these4->setAccroche("phase d'accroche");
             $these4->setDescription("Etude des mécanismes de biosynthèse des synthétases de peptides non-ribosomiques
             par biologie de synthèse");
             $these4->setContact("melou@gmail.fr");
             $these4->setEcoles($ecol1);
             $entityManager->persist($these3);
             
             
             $entityManager->flush();
         }
        return $this->render('article/index.html.twig', [
            'ecoles' => $ecolesRepository->findAll(),
            //'controller_name' => 'ArticleController',
        ]);
    }
}
