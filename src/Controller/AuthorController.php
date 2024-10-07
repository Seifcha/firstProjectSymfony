<?php

namespace App\Controller;

use ContainerJD6jLh6\getAuthorControllerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AuthorRepository;

class AuthorController extends AbstractController
{
   private $AuthorRepository ;
   public function __construct(AuthorRepository $AuthorRepository)
   {
    $this -> AuthorRepository = $AuthorRepository ;
   }

    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/authorr/{name}', name: 'app_showAuthor', defaults:['name' => 'seif, safe'], methods:['GET'])]
    public function showAuthor($name): Response
    {
        return $this->render('author/index.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route('/listAuthors', name: 'app_listAuthors', methods:['GET'])]
    public function listAuthor(): Response
    {
        $authors = $this -> AuthorRepository -> listAuthors();
        return $this->render('author/list.html.twig', [
          'authors' =>  $authors

        ]);
    }


    #[Route('/authorDetail/{id}', name: 'app_Details')]
    public function authorDetails($id): Response
    {
        $author = $this -> AuthorRepository -> authorById($id);
        return $this->render('author/showAuthor.html.twig', [
            // 'author' => $this->authors[$id],
          'author' => $author

        ]);
    }
}
