<?php

namespace App\Controller;

use DateTime;
use App\Entity\Depense;
use App\Entity\Categorie;
use App\Form\ExpenseFormType;
use App\Form\CategorieFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    /**
     * @Route("/tableau-de-bord", name="dashboard")
     */
    public function index(Request $request): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('login');
        }


        // CREATE OPERATION FORM

        $depenses = $this->getDoctrine()->getRepository(Depense::class)->findBy(array('user_id' => $this->getUser()->getId()));

        $depense = new Depense();
        $newExpenseForm = $this->createForm(ExpenseFormType::class, $depense);

        $newExpenseForm->handleRequest($request);

        if($newExpenseForm->isSubmitted()){
            $depense->setUserId($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($depense);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }

        // END CREATE OPERATION FORM

        // CREATE CATEGORIE FORM

        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findBy(array('user_id' => $this->getUser()->getId()));

        $categorie = new Categorie();
        $newCategorieForm = $this->createForm(CategorieFormType::class, $categorie);

        $newCategorieForm->handleRequest($request);

        if($newCategorieForm->isSubmitted()){
            $categorie->setUserId($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('dashboard');
        }

        // END CREATE CATEGORIE FORM
        
        return $this->render('dashboard/index.html.twig', [
            'newExpenseForm' => $newExpenseForm->createView(),
            'newCategorieForm' => $newCategorieForm->createView(),
            'depenses' => $depenses
        ]);
    }
}
