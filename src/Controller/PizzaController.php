<?php
namespace App\Controller;

use App\Entity\DddMenuPizza;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

}