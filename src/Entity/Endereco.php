<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnderecoRepository")
 */
class Endereco
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="integer")
     */
    private $paciente_id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $nome_bairro;

    /**
     * @var string
     *
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime", name="data")
     */
    private $data;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Endereco
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    /**
     * @param string $paciente_id
     * @return Endereco
     */
    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param string $rua
     * @return Endereco
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeBairro()
    {
        return $this->rua;
    }

    /**
     * @param string $nome_bairro
     * @return Endereco
     */
    public function setNomeBairro($nome_bairro)
    {
        $this->nome_bairro = $nome_bairro;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @param string $status
     * @return Endereco
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * @param string $data
     * @return Endereco
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
