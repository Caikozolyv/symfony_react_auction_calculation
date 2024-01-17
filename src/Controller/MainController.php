<?php

namespace App\Controller;

use App\Entity\Fee;
use App\Entity\LuxuryVehicle;
use App\Entity\OrdinaryVehicle;
use App\Services\FeeCalculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController'
        ]);
    }

    /**
     * POST API
     * Take price and type
     * Return fees as JSON 
     */
    #[Route('/fees', name: 'app_api')]
    public function apiFees(Request $request, FeeCalculator $feeCalculator, SerializerInterface $serializer)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if(!empty($data)) {
            $price = intval($data['price']);
            $type = intval($data['type']);
            $vehicle = $type === 1 ? new OrdinaryVehicle($price) : new LuxuryVehicle($price);  
            $fees = $feeCalculator->calculateTotalFees($vehicle);
            return new JsonResponse(json_encode($fees));
    
        }
        return new JsonResponse($serializer->serialize(new Fee(), 'json'));
    }
}