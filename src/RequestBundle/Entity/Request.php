<?php

namespace RequestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table(name="request")
 * @ORM\Entity(repositoryClass="RequestBundle\Repository\RequestRepository")
 */
class Request
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="date_demande", type="date")
     */
    private $dateDemande;

    /**
     * @ORM\Column(name="intitule_poste1", type="string", length=255)
     */
    private $intitulePoste1;
    
    /**
     * @ORM\Column(name="intitule_poste2", type="string", length=255)
     */
    private $intitulePoste2;
    
    /**
     * @ORM\ManyToOne(targetEntity="ContractType")
     * @ORM\JoinColumn(name="type_contrat", referencedColumnName="id")
     */
    private $typeContrat;
}

