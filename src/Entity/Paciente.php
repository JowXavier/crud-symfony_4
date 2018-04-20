<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PacienteRepository")
 */
class Paciente
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $nome_mae;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $nome_pai;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Campo nome não pode ser vazio!")
     */
    private $email;

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

    public function __construct() {
        $this->data = \DateTime::createFromFormat('d-m-Y', date('d-m-Y'));
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Paciente
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Paciente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeMae()
    {
        return $this->nome_mae;
    }
    
    /**
     * @param string $nomeMae
     * @return Paciente
     */
    public function setNomeMae($nome_mae)
    {
        $this->nome_mae = $nome_mae;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomePai()
    {
        return $this->nome_pai;
    }
    
    /**
     * @param string $nomePai
     * @return Paciente
     */
    public function setNomePai($nome_pai)
    {
        $this->nome_pai = $nome_pai;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param string $nomePai
     * @return Paciente
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return Paciente
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
     * @return Paciente
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
