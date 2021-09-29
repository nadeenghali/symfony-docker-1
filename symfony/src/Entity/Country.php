<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource as ApiResource;

/**
 * @ApiResource(
 *    collectionOperations={"get"},
 *    itemOperations={"get"}
 *    )
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @Assert\NotBlank (message="Country name cannot be blank", allowNull=false)
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @Assert\GreaterThanOrEqual(value=0, message="VAT cannot be less than 0.")
	 * @ORM\Column(type="float")
	 */
	private $vat;

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

	public function getVat(): ?float
	{
		return $this->vat;
	}

	public function setVat(float $vat): self
	{
		$this->vat = $vat;

		return $this;
	}
}
