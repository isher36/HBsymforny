<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/blog/{page}", name="blog_homepage",
     * defaults={"page":1},
     * requirements={"page":"\d+"})
     */
    public function indexAction(Request $request, $page)
    {
        // replace this example code with whatever you need
        return $this->render('blog/index.html.twig', [
            //'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => $page,
        ]);
    }
}
