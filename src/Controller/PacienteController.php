<?php

namespace App\Controller;

use App\Entity\Paciente;
use App\Form\PacienteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PacienteController extends Controller
{
    /**
     * @Route("/paciente", name="listar_paciente")
     * @Template("paciente/index.html.twig")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $pacientes = $em->getRepository(Paciente::class)->findAll();

        return [
            'pacientes' => $pacientes
        ];
    }

    /**
     * @param Request $request
     *
     * @Route("/paciente/cadastrar", name="cadastrar_paciente")
     * @Template("paciente/create.html.twig")
     * @return Response
     */
    public function create(Request $request)
    {
        $paciente = new Paciente();

        $form = $this->createForm(PacienteType::class, $paciente);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($paciente);
            $em->flush();

            $this->addFlash('success', "Paciente cadastrado!");
            return $this->redirectToRoute('listar_paciente');
        }

        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @param Request $request
     * @return Response
     * @Template("paciente/update.html.twig")
     * @Route("paciente/editar/{id}", name="editar_paciente")
     */
    public function update(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository(Paciente::class)->find($id);

        $form = $this->createForm(PacienteType::class, $paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($paciente);
            $em->flush();

            $this->get("session")->getFlashBag()->set("success", "O Paciente " . $paciente->getNome() . " foi alterado com sucesso!");
            return $this->redirectToRoute("listar_paciente");
        }

        return [
            'paciente' => $paciente,
            'form' => $form->createView()
        ];
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return array
     * @Route("paciente/visualizar/{id}", name="visualizar_paciente")
     * @Template("paciente/view.html.twig")
     */
    public function view(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository(Paciente::class)->find($id);

        return [
            'paciente' => $paciente
        ];
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @Route("paciente/apagar/{id}", name="apagar_paciente")
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $paciente = $em->getRepository(Paciente::class)->find($id);

        if (!$paciente) {
            $mensagem = "Paciente não foi encontrado!";
            $tipo = "warning";
        } else {
            $em->remove($paciente);
            $em->flush();
            $mensagem = "Paciente foi excluído com sucesso!";
            $tipo = "success";
        }

        $this->get('session')->getFlashBag()->set($tipo, $mensagem);
        return $this->redirectToRoute("listar_paciente");
    }
}