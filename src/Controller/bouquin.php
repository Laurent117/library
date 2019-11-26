<?php


namespace App\Controller;


use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class bouquin extends abstractController
{

    /**
     * @Route("/twig_bouquin/{'id'}", name="twig_bouquin")
     */

    public function twigBouquin(BookRepository $bookRepository)
    {

        $book = $bookRepository->findby(array('id'));
        return $this->render('livre.html.twig', [
            'book' => $book
        ]);
    }
}