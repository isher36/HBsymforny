<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{
    /**
     * @Route("/{page}", name="blog_homepage",
     * defaults={"page":1},
     * requirements={"page":"\d+"})
     */
    public function indexAction(Request $request, $page)
    {      
        return $this->render('blog/index.html.twig', [
            'page' => $page,
        ]);
    }

    /**
     * @Route("/detail/{id}", name="blog_detail_homepage",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function detailAction(Request $request,$id)
    {
        $article = [
            'id' => $id,
            'titre' => 'hello world',
            'contenu'=> 'Lorem <strong>ipsum</strong>...',
            'date' => new \DateTime(),
            ];


        return $this->render('blog/detail.html.twig', [
                'article' => $article,
            ]);
    }
    /**
     * @Route("/edit/{id}", name="blog_edit_homepage",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function EditAction(Request $request,$id)
    {
        return $this->render('blog/edit.html.twig', [
                'id' => $id,
            ]);
    }
    /**
     * @Route("/add/{id}", name="blog_add_homepage",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function AddAction(Request $request,$id)
    {
        return $this->render('blog/add.html.twig', [
                'id' => $id,
            ]);
    }
    /**
     * @Route("/remove/{id}", name="blog_remove_homepage",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function RemoveAction(Request $request,$id)
    {
        return $this->render('blog/remove.html.twig', [
                'id' => $id,
            ]);
    }
}
