<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type;
use AppBundle\Entity\Article;
use AppBundle\Entity\Image;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Categorie;

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
        }

        $article->setTitre('update');

        //$repC = $em->getRepository('AppBundle:Categorie');

        //$cat = $repC->find(1) ;
        //$article->addCategory($cat);

        //$com = new Commentaire();
        //$com->setAuteur('toto')->setContenu('Ceci est un commentaire !!!');

        //$com->setArticle($article);
        //$em->persist($com);

        //$com2 = new Commentaire();
        //$com2->setAuteur('tata')->setContenu('Ceci est un autre commentaire !!!');
        //$com2->setArticle($article);
        //$em->persist($com2);

        try{
            $em->flush();
        }
        catch(\PDOException $e){
            exit($e->getMessage());
        }



        $formBuilder = $this->createFormBuilder($article);
        $formBuilder -> add('titre', Type\TextType::class)
                ->add('contenu', Type\TextareaType::class)
                ->add('auteur', Type\TextType::class)
                ->add('dateCreation', Type\DateType::class)
                ->add('publication', Type\CheckboxType::class , ['required' => false])
                //->add('image',  new Image() )
                ->add('submit', Type\SubmitType::class, ['label' => 'Envoyer'])
                ;

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

        $formBuilder = $this->createFormBuilder($article);
        $formBuilder -> add('titre', Type\TextType::class)
                ->add('contenu', Type\TextareaType::class)
                ->add('auteur', Type\TextType::class)
                ->add('dateCreation', Type\DateType::class)
                 ->add('publication', Type\CheckboxType::class , ['required' => false])
                //->add('image', new \AppBundle\Entity\ImageType() )
                ->add('submit', Type\SubmitType::class, ['label' => 'Envoyer'])
                ;

        $form = $formBuilder->getForm();

        //$article->setAuteur('moi')
        //        ->setContenu('Lorem ipsum')
        //        ->setTitre('hello world ;)')    ;

        //$img = new Image();
        //$img->setAlt('mon image')
        //    ->setUrl("https://robohash.org/" . md5(uniqid()));
        //$article->setImage($img);
        //$em = $this->getDoctrine()->getManager();
        //$repC = $em->getRepository('AppBundle:Categorie');
        //$cat = $repC->find(2) ;
        //$article->addCategory($cat);

        //$em->persist($article);
        //try {
        //    $em->flush();
        //    return  $this->redirectToRoute('blog_detail',['id'=>$article->getId()]);
        //}
        //catch(\PDOException $e){
        //    exit($e->getMessage());
        //}

        return $this->render('blog/add.html.twig', [
              //  'id' => $id,
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
