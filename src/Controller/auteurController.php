<?php


namespace App\Controller;

use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class auteurController extends abstractController
{

    /**
     * @Route("/twig_auteurs", name="twig_auteurs")
     */

    public function twigAuteurs(AuteurRepository $auteursRepository)
    {
        $auteurs = $auteursRepository->findall();
        return $this->render('auteurs.html.twig', [
            'auteurs' => $auteurs
        ]);
    }

    /**
     * @Route("/twig_auteur/{id}", name="twig_auteur")
     */

    public function twigAuteur(AuteurRepository $auteurRepository, $id)
    {
        $auteur = $auteurRepository->find($id);
        return $this->render('auteur.html.twig', [
            'auteur' => $auteur
        ]);
    }
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------

     /**
     * @Route("/auteurs_by_name", name="auteurs_by_name")
     */


    public function getAuteursByName(AuteurRepository $auteurRepository)
    {
        $word = 'm';

        //auteurRepository contient une instance de la classe 'AuteurRepository'
        //generalement on obtient une instance de classe (ou un objet) en utilisant le mot clé "new"
        //ici, grace a symfony, on obtient l'instance de la classe repository en la passant simplement en parametre
        $auteurs = $auteurRepository->getByName($word);

        //Appelle le bookRepository(en le passant en parametre de la méthode)
        //appelle la méthode qu'on a créé dans le bookRepository ("getByGenre()")
        //Cette méthode est sensé nous retourner tous les livres en fonction d'un genre
        //elle va donc executer une requete SELECT en base de données
        return $this->render('selectby.html.twig', [
            'auteurs'=>$auteurs
        ]);
    }
}