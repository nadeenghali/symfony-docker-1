<?php

namespace App\Entity;

use App\Repository\RecipientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource as ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=RecipientRepository::class)
 */
class Recipient
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @Assert\NotBlank (message="Recipient name cannot be blank", allowNull=false)
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @Assert\NotBlank (message="Address cannot be blank", allowNull=false)
	 * @ORM\Column(type="string", length=255)
	 */
	private $address;

	/**
	 * @ORM\ManyToOne(targetEntity=Country::class)
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $country;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	public function setAddress(string $address): self
	{
		$this->address = $address;

		return $this;
	}

	public function getCountry(): ?Country
	{
		return $this->country;
	}

	public function setCountry(?Country $country): self
	{
		$this->country = $country;

		return $this;
	}
}
