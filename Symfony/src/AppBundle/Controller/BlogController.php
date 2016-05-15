<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type;
use AppBundle\Entity\Article;
use AppBundle\Entity\Image;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Categorie;
use AppBundle\Form;

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
        $repC = $this->getDoctrine()->getManager()->getRepository('AppBundle:Categorie');

        //$articles = $repA->findAll();
        //$articles = $repA->getArticleIndex();

        $categories = $repC->getCategorieIndex();
        $totalA = $repA->getTotalArticle();

        return $this->render('blog/index.html.twig', [
            //'articles' => $articles,
            'categories' => $categories,
            'page' => $page,
            'totalArticle' => $totalA,
        ]);
    }

    /**
     * @Route("/detail/{id}", name="blog_detail",
     * defaults={"id":1},requirements={"id":"\d+"})
     * @method("GET")
     */
    public function detailAction(Request $request,$id)
    {
        // on recup l'article en base
        $em = $this->getDoctrine()->getManager();
        $repA = $em->getRepository('AppBundle:Article');
        $article = $repA->find($id);

        $com = new Commentaire();

        $form = $this->createForm(Form\CommentaireType::class, $com) ;

        return $this->render('blog/detail.html.twig', [
                'article' => $article,
                'form' => $form->createView(),
            ]);
    }
    /**
     * @Route("/detail/{id}", name="blog_detailPost",
     * defaults={"id":1},requirements={"id":"\d+"})
     * @method("POST")
     */
    public function detailActionPost(Request $request,$id)
    {
        $article = $this->getArticleFromForm($id);
        $commentaire =new Commentaire();
        $form = $this->createForm(Form\CommentaireType::class, $commentaire) ;
        $form->handleRequest($request);
        $commentaire->setArticle($article);

        return $this->updateObjetInDb($form,$commentaire,"blog_detail","blog/detail.html.twig") ;
    }
    /**
     * @Route("/edit/{id}", name="blog_edit",requirements={"id":"\d+"})
     * @method("GET")
     */
    public function editAction(Request $request,$id)
    {
        $article = $this->getArticleFromForm($id);
        $form = $this->createForm(Form\ArticleType::class,$article) ;

        return $this->render('blog/edit.html.twig', [
                    'id' => $id,
                    'article' => $article,
                    'form' => $form->createView(),
            ]);
    }
    /**
     * @Route("/edit/{id}", name="blog_editPost",
     * requirements={"id":"\d+"})
     * @method("POST")
     */
    public function editPostAction(Request $request,$id)
    {
        $article = $this->getArticleFromForm($id);
        $form = $this->createForm(Form\ArticleType::class,$article) ;
        $form->handleRequest($request);

        return $this->updateObjetInDb($form,$article,"blog_detail","blog/edit.html.twig");
    }

    /**
     * @Route("/add/{id}", name="blog_add",
     * defaults={"id":1},requirements={"id":"\d+"})
     * @method("Get")
     */
    public function addAction(Request $request,$id)
    {
        $session = $this->get("session");
        $article = new Article();
        $form = $this->createForm(Form\ArticleType::class,$article) ;

        return $this->render('blog/add.html.twig', [
                    'id' => $article->getId(),
                    'article' => $article,
                    'form' => $form->createView(),
            ]);
    }
    /**
     * @Route("/add/{id}", name="blog_addPost",
     * defaults={"id":1},requirements={"id":"\d+"})
     * @method("POST")
     */
    public function addActionPOST(Request $request,$id)
    {
        $article = $this->getArticleFromForm($id);
        $form = $this->createForm(Form\ArticleType::class,$article) ;
        $form->handleRequest($request);

        return $this->updateObjetInDb($form,$article,"blog_detail","blog/add.html.twig") ;
    }
    /**
     * Get Article from Id
     * @param mixed $id
     * @return mixed
     */
    private function getArticleFromForm($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repA = $em->getRepository('AppBundle:Article');
        $article = $repA->find($id);

        return $article;
    }
    /**
     * Summary of updateObjetInDb
     * @param mixed $form
     * @param mixed $objet
     * @param mixed $view vues de retour
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    private function updateObjetInDb($form,$objet,$viewDest,$twigRetour)
    {
        $session = $this->get("session");
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($objet);
            try {
                $em->flush();
                $session->getFlashBag() -> add ('info' ,utf8_encode ('données enregistré avec succés'));
                return  $this->redirectToRoute($viewDest,['id'=>$objet->getId()]);
            }
            catch(\PDOException $e){
                exit($e->getMessage());
            }
        }

        return $this->render('blog/'.$twigRetour, [
                    'id' => $objet->getId(),
                    'article' => $objet,
                    'form' => $form->createView(),
            ]);
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
