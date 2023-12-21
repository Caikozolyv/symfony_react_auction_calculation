<?php

namespace App\Controller;

use App\Entity\Fee;
use App\Entity\Vehicle;
use App\Form\VehicleType;
use App\Entity\LuxuryVehicle;
use App\Entity\OrdinaryVehicle;
use App\Services\FeeCalculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, FeeCalculator $feeCalculator): Response
    {
        // Intializing form fields
        $vehicle = new Vehicle(0);
        $fees = new Fee(0, 0, 0, 0, 0, 0);
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);
        if ($request->isMethod('POST')) {
            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                $price = $data->getPrice();
                $vehicle = $data->getType() == 1 ? new OrdinaryVehicle($price) : new LuxuryVehicle($price);
                $fees = $feeCalculator->calculateTotalFees($vehicle);
                // Use object for facility of use
                $fees = new Fee(
                    $fees["price"], 
                    $fees["user_fees"], 
                    $fees["special_fees"], 
                    $fees["association_fees"], 
                    $fees["storage_costs"],
                    $fees["total_price"]
                );
            }
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form,
            'fees' => $fees
        ]);
    }
}