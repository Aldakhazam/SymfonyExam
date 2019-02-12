<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;

class EventPageController extends AbstractController
{
    /**
     * @Route("/event/page", name="event_page")
     */
    public function index(Request $request)
    {
        $event = new Event();

        $form = $this->createFormBuilder($event)
            ->add('civilite',  ChoiceType::class, array('placeholder'=>'Sélectionner une civilité', 'choices'=>array( "Homme"=>0, "Femme"=>1, "Non Binaire"=>-1)))
            ->add('lastname', TextType::class)
            ->add('firstname', TextType::class)
            ->add('email', TextType::class)
            ->add('telephone', TextType::class)
            ->add('newsletter', CheckboxType::class)
            ->add('save', SubmitType::class, ['label' => 'Envoyer'])
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('event_page');
        }

        return $this->render('event_page/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
