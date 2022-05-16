<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Order;
use App\Entity\Item;
use App\Form\RegistrationType;
use App\Repository\ItemRepository;
use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
            dd($form->getData());

            $order = new Order();

            // $order->addItem($item);
        

            $manager->persist($client);
            $manager->flush();

            return $this->redirectToRoute('confirmation');
        }

        return $this->render('landing_page/index_new.html.twig', [
            'form' => $form->createView(),
            'items' => $items,
        ]);
    }
    /**
     * @Route("/confirm", name="confirmation")
     */
    public function confirmation()
    {
        return $this->render('landing_page/confirmation.html.twig', []);
    }
}
