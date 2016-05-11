<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;
use AppBundle\Entity\Image;
use AppBundle\Entity\Commentaire;

//use AppBundle\Form\ArticleType;

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
        $repA = $this->getDoctrine()->getManager()->getRepository('AppBundle:Article');

        $articles = $repA->findAll();

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
        $em = $this->getDoctrine()->getManager();
        $repA = $em->getRepository('AppBundle:Article');
                
        $article = $repA->find($id);

        $repC =$em->getRepository('AppBundle:Commentaire');

        $coms = $repC->findBy(array('article' => $article),array('dateCreation' => 'desc'));
        
        return $this->render('blog/detail.html.twig', [
                'article' => $article,
                'coms' => $coms
            ]);
    }
    /**
     * @Route("/edit/{id}", name="blog_edit",
     * requirements={"id":"\d+"})
     */
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $repA = $em->getRepository('AppBundle:Article');

        $article = $repA->find($id);
        if ( $article->getImage() == null)
        {
            $img = new Image();
            $img->setAlt('mon image')
                ->setUrl("https://robohash.org/" . md5(uniqid()));

            $article->setImage($img);
            $em->flush();
        }

        $com = new Commentaire();
        $com->setAuteur('toto')->setContenu('Ceci est un commentaire !!!');

        $com->setArticle($article);
        $em->persist($com);

        $com2 = new Commentaire();
        $com2->setAuteur('tata')->setContenu('Ceci est un autre commentaire !!!');
        $com2->setArticle($article);
        $em->persist($com2);

        try{
            $em->flush();
        }
        catch(\PDOException $e){
            exit($e->getMessage());
        }




        // $form = $this->createForm(ArticleType::class , $article);

        return $this->render('blog/edit.html.twig', [
                    'id' => $id,
                    'article' => $article,
                     //'form' => $form->createView(),
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
                ->setTitre('hello world ;)')
                ->setImage('https://robohash.org/hello');

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
        $em = $this->getDoctrine()->getManager();
        $repA = $this->getDoctrine()->getManager()->getRepository('AppBundle:Article');

        $article = $repA->find($id);

        try {
            $em->remove($article);
            $em->flush();
            return  $this->redirectToRoute('blog_homepage');
        }
        catch(\PDOException $e){
            exit($e->getMessage());
        }

        //return $this->render('blog/remove.html.twig', [
        //        'article' => $article,
        //    ]);
    }

    public function footerAction(Request $request)
    {
        $repA = $this->getDoctrine()->getManager()->getRepository('AppBundle:Article');

        $articles = $repA->findBy(array(),array('dateCreation' => 'desc'),3,0);

        return $this->render('blog/footer.html.twig', [
            'articles' => $articles,
        ]);
    }
}
