<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\RegistrationType;
use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Stripe\Stripe;

class LandingPageController extends AbstractController
{
  /**
   * @Route("/", name="landing_page")
   * @throws \Exception
   */
  public function index(Request $request, EntityManagerInterface $manager)
  {
    $client = new Client();

    $form = $this->createForm(RegistrationType::class, $client);
    $form->handleRequest($request);


    // $form = $this->createFormBuilder($client)
    //     ->add('client', RegistrationType::class)
    //     ->add('item', ItemType::class)
    //     ->getForm();

    if ($form->isSubmitted() && $form->isValid()) {
      $client = $form->getData();
      $manager->persist($client);
      $manager->flush();

      return $this->redirectToRoute('confirmation');
    }

    return $this->render('landing_page/index_new.html.twig', [
      'form' => $form->createView(),
    ]);
  }
  /**
   * @Route("/confirm", name="confirmation")
   */
  public function confirmation()
  {
    return $this->render('landing_page/confirmation.html.twig', []);
  }

  public function strip()
  {


    require 'vendor/autoload.php';
    $app = new \Slim\App;

    $app->add(function ($request, $response, $next) {
      \Stripe\Stripe::setApiKey('pk_test_51KyCa3LXAGPQEcRR5auUNejWWUbvYbiNAW3JHd4gZKJ8HHiGUKRqIhqiXMupO1MdsZ6sXynV2Tg8EtFNzcKEJFzS00StRWwbJJ');
      return $next($request, $response);
    });

    $app->post('/create-checkout-session', function (Request $request, Response $response) {
      $session = \Stripe\Checkout\Session::create([
        'line_items' => [[
          'price_data' => [
            'currency' => 'usd',
            'product_data' => [
              'name' => 'T-shirt',
            ],
            'unit_amount' => 2000,
          ],
          'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => '/landing_page/confirmation.html.twig',

      ]);

      return $response->withHeader('Location', $session->url)->withStatus(303);
    });

    $app->run();
  }
}
