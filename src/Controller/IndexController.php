<?php declare(strict_types=1);

namespace App\Controller;

use App\Dto\HashDto;
use App\Form\HashType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function hash(Request $request)
    {
        $result = null;
        $form = $this->createForm(HashType::class, new HashDto());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var HashDto $data */
            $data = $form->getData();
            $result = $this->get('manager.hash')->generate($data);
        }

        return $this->render('index/hash.html.twig', [
            'form' => $form->createView(),
            'result' => $result
        ]);
    }
}
