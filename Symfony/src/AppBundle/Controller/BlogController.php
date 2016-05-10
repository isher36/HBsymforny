<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;

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
        $articles = [
            ['id' => 1,
            'titre' => 'hello world 1',
            'contenu'=> 'Lorem <strong>ipsum</strong>...',
            'date' => new \DateTime(),
            'image'=> 'https://robohash.org/hello',
            ],
            [
            'id' => 2,
            'titre' => 'hello world 2',
            'contenu'=> 'Lorem <strong>ipsum</strong>...',
            'date' => new \DateTime(),
            'image'=> 'https://robohash.org/hello',
            ],
                        [
            'id' => 3,
            'titre' => 'hello world 3',
            'contenu'=> 'Lorem <strong>ipsum</strong>...',
            'date' => new \DateTime(),
            'image'=> 'https://robohash.org/hello',
            ]
            ];

        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
            'page' => $page,
        ]);
    }

    /**
     * @Route("/detail/{id}", name="blog_detail",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function detailAction(Request $request,$id)
    {
        $repA = $this->getDoctrine()->getManager()->getRepository('AppBundle:Article');

        $article = $repA->find($id);


        return $this->render('blog/detail.html.twig', [
                'article' => $article,
            ]);
    }
    /**
     * @Route("/edit/{id}", name="blog_edit",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function editAction(Request $request,$id)
    {
        return $this->render('blog/edit.html.twig', [
                'id' => $id,
            ]);
    }
    /**
     * @Route("/add/{id}", name="blog_add",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function addAction(Request $request,$id)
    {
        $article = new Article();
        $article->setAuteur('moi')
                ->setContenu('Lorem ipsum')
                ->setTitre('hello world ;)');

        //$doctrine =$this->getDoctrine();
        //$em = $doctrine->getManager();

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        try {
            $em->flush();
            return  $this->redirectToRoute('blog_detail',['id'=>$article->getId()]);
        }
        catch(\PDOException $e){
            exit($e->getMessage());
        }
        //return $this->render('blog/add.html.twig', [
        //        'id' => $id,
        //        'article' => $article,
        //    ]);
    }
    /**
     * @Route("/remove/{id}", name="blog_remove",
     * defaults={"id":1},
     * requirements={"id":"\d+"})
     */
    public function removeAction(Request $request,$id)
    {
        return $this->render('blog/remove.html.twig', [
                'id' => $id,
            ]);
    }

    public function footerAction(Request $request)
    {
        $articles = [
            ['id' => 1,
            'titre' => 'hello world 1',
            'contenu'=> 'Lorem <strong>ipsum</strong>...',
            'date' => new \DateTime(),
            'image'=> 'https://robohash.org/hello',
            ],
            [
            'id' => 2,
            'titre' => 'hello world 2',
            'contenu'=> 'Lorem <strong>ipsum</strong>...',
            'date' => new \DateTime(),
            ]
            ];

        return $this->render('blog/footer.html.twig', [
            'articles' => $articles,
        ]);
    }
}
