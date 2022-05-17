<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\Order;
use App\Entity\Client;
use App\Form\RegistrationType;
use Symfony\Component\Form\Form;
use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LandingPageController extends AbstractController
{
  /**
   * @Route("/", name="landing_page")
   * @throws \Exception
   */
  public function index(Request $request, EntityManagerInterface $manager, ItemRepository $itemRepository)
  {
    $client = new Client();

    $form = $this->createForm(RegistrationType::class, $client);
    $form->handleRequest($request);


    // $form = $this->createFormBuilder($client)
    //     ->add('client', RegistrationType::class)
    //     ->add('item', ItemType::class)
    //     ->getForm();

    $items = $itemRepository->findAll();

    if ($form->isSubmitted() && $form->isValid()) {
      $item = $itemRepository->find($request->request->get('product'));
      $order = new Order();
      /* dd($form->getData()); */


      $order->addItem($item);
      $order->setClient($client);
      $manager->persist($client);
      $manager->persist($order);
      $manager->flush();

      return $this->strip();
      /* return $this->redirectToRoute('confirmation'); */
    }

    return $this->render('landing_page/index_new.html.twig', [
      'form' => $form->createView(),
      'items' => $items
    ]);
  }
  /**
   * @Route("/confirm", name="confirmation")
   */
  public function confirmation()
  {
    return $this->render('landing_page/confirmation.html.twig', []);
  }

  /**
   * @Route("/confirm", name="confirmation")
   */
  public function strip()
  {




    \Stripe\Stripe::setApiKey('sk_test_51KyCa3LXAGPQEcRRikOsph6z7ZC9UgpXUVdB9SGHKjfHkbtWzm2i72NuX4gpMDILEgNqDJT1ffj4j3HR4RjrrDiy00ZyTqHjfo');

    $YOUR_DOMAIN = 'http://127.0.0.1:3306/public';

    $session = \Stripe\Checkout\Session::create([
      'line_items' => [[
        # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        'price' => 'price_1L0QBkLXAGPQEcRRQBC01MYH',
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => $YOUR_DOMAIN . '/success.html',
      'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
    ]);
    return new RedirectResponse($session->url);
  }

}
