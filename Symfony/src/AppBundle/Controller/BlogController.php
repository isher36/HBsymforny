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
        // replace this example code with whatever you need
        return $this->render('blog/index.html.twig', [
            //'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => $page,
        ]);
    }

    /**
     * @Route("/detail/{page}", name="blog_detail_homepage",
     * defaults={"page":1},
     * requirements={"page":"\d+"})
     */
    public function detailAction(Request $request,$page)
    {
        return $this->render('blog/detail.html.twig', [
                'page' => $page,
            ]);
    }
}
