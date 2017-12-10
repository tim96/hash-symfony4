<?php declare(strict_types=1);

namespace App\Controller;

use App\Dto\Base64Dto;
use App\Dto\HashDto;
use App\Dto\PasswordGenerateDto;
use App\Form\Base64Type;
use App\Form\HashType;
use App\Form\PasswordGenerateType;
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

    public function about()
    {
        return $this->render('index/about.html.twig');
    }

    public function base64(Request $request)
    {
        $result = null;
        $form = $this->createForm(Base64Type::class, new Base64Dto());

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            /** @var Base64Dto $data */
            $data = $form->getData();

            if ($data->isConvertFromBase64()) {
                $result = base64_decode($data->getText());
            } else {
                $result = base64_encode($data->getText());
            }
        }

        return $this->render('index/base64.html.twig', ['form' => $form->createView(), 'result' => $result]);
    }

    // added action postfix because method json already exist in parent controller
    public function jsonAction()
    {
        return $this->render('index/json.html.twig');
    }

    public function password(Request $request)
    {
        $results = [];
        $form = $this->createForm(PasswordGenerateType::class, new PasswordGenerateDto());

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $results = $this->get('manager.password_generator')->generate($form->getData());
        }

        return $this->render('index/password.html.twig', ['form' => $form->createView(), 'results' => $results]);
    }
}
