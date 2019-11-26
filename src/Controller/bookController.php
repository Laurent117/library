<?php


namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class bookController extends abstractController
{

    /**
     * @Route("/twig_books", name="twig_books")
     */

    public function twigBooks(BookRepository $bookRepository)
    {
        $books = $bookRepository->findAll();
        return $this->render('index.html.twig', [
            'books' => $books
        ]);
    }

    /**
     * @Route("/twig_book/{id}", name="twig_book")
     */

    public function twigBook(BookRepository $bookRepository, $id)
    {

        $book = $bookRepository->find($id);
        return $this->render('livre.html.twig', [
            'book' => $book
        ]);
    }
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------



    /**
     * @Route("/books_by_genre", name="books_by_genre")
     */

    public function getBooksByGenre(Bookrepository $bookRepository)
    {
        $books = $bookRepository->getByGenre();
        //Appelle le bookRepository(en le passant en parametre de la méthode)
        //appelle la méthode qu'on a créé dans le bookRepository ("getByGenre()")
        //Cette méthode est sensé nous retourner tous les livres en fonction d'un genre
        //elle va donc executer une requete SELECT en base de données
        var_dump($books); die;
    }
}