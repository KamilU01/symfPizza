<?php
namespace App\Controller;

use App\Entity\DddMenuPizza;
use App\Entity\DddMenuPizzaGroups;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PizzaController extends AbstractController {
    /**
     *  @Route("/", name="pizza_list")
     *  @Method({"GET"})
     */
    public function index() {

        $pizzas = $this->getDoctrine()
        ->getRepository(DddMenuPizza::class)
        ->findAll();

        return $this->render('pizza/index.html.twig', array
        ('pizzas' => $pizzas));
    }

    /**
     * @Route("/pizza/new", name="new_pizza")
     * @Method({"GET", "POST"})
     */
    public function new(Request $request){
        $pizza = new DddMenuPizza();
        
        $form = $this->createFormBuilder($pizza)
        ->add('name', TextType::class, array('label' => 'Nazwa pizzy:', 'attr' => array('class' => 'form-control')))
        ->add('description', TextareaType::class, array('label' => 'Składniki:', 'attr' => array('class' => 'form-control')))
        ->add('groupid', EntityType::class, [
            'class' => DddMenuPizzaGroups::class,
            'choice_label' => 'name',
            'choice_value' => 'id',
            'label' => 'Kategoria',
            'attr' => array('class' => 'form-control col-md-3')
        ])
        ->add('sprice', NumberType::class, array('label' => 'Cena małej pizzy:', 'html5' => true, 'property_path' => 'sprice', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'step' => 0.01)))
        ->add('mprice', NumberType::class, array('label' => 'Cena średniej pizzy:', 'html5' => true, 'property_path' => 'mprice', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'step' => 0.01)))
        ->add('lprice', NumberType::class, array('label' => 'Cena dużej pizzy:', 'html5' => true, 'property_path' => 'lprice', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'step' => 0.01)))
        ->add('papryczki', IntegerType::class, array('label' => 'Ostrość:', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'max' => 4, 'step' => 1)))
        ->add('save', SubmitType::class, array('label' => 'Nazwa pizzy', 'label' => 'Zapisz', 'attr' => array('class' => 'btn btn-primary mt-3')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $pizza = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pizza);
            $entityManager->flush();

            $this->addFlash(
            'success',
            'Pizza została dodana do bazy danych'
            );

            return $this->redirectToRoute('pizza_list');
        }

        return $this->render('pizza/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/pizza/edit/{id}/{groupid}", name="edit_article")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id){
        $pizza = new DddMenuPizza();
        $pizza = $this->getDoctrine()->getRepository(DddMenuPizza::class)->find($id);

        $form = $this->createFormBuilder($pizza)
        ->add('name', TextType::class, array('label' => 'Nazwa pizzy:', 'attr' => array('class' => 'form-control')))
        ->add('description', TextareaType::class, array('label' => 'Składniki:', 'attr' => array('class' => 'form-control')))
        ->add('groupid', EntityType::class, [
            'class' => DddMenuPizzaGroups::class,
            'choice_label' => 'name',
            'choice_value' => 'id',
            'label' => 'Kategoria',
            'attr' => array('class' => 'form-control col-md-3')
        ])
        ->add('sprice', NumberType::class, array('label' => 'Cena małej pizzy:', 'html5' => true, 'property_path' => 'sprice', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'step' => 0.01)))
        ->add('mprice', NumberType::class, array('label' => 'Cena średniej pizzy:', 'html5' => true, 'property_path' => 'mprice', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'step' => 0.01)))
        ->add('lprice', NumberType::class, array('label' => 'Cena dużej pizzy:', 'html5' => true, 'property_path' => 'lprice', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'step' => 0.01)))
        ->add('papryczki', IntegerType::class, array('label' => 'Ostrość:', 'attr' => array('class' => 'form-control col-md-3', 'min' => 0, 'max' => 4, 'step' => 1)))
        ->add('save', SubmitType::class, array('label' => 'Nazwa pizzy', 'label' => 'Zapisz', 'attr' => array('class' => 'btn btn-primary mt-3')))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash(
            'success',
            'Pizza została pomyślnie edytowana'
            );

            return $this->redirectToRoute('pizza_list');
        }

        return $this->render('pizza/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/pizza/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        $pizza = $this->getDoctrine()->getRepository(DddMenuPizza::class)->find($id);
  
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($pizza);
        $entityManager->flush();

        $this->addFlash(
            'success',
            'Pizza została usunięta z bazy danych'
        );
  
        $response = new Response();
        $response->send();
      }
}