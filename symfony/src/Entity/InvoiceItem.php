<?php

namespace App\Entity;

use App\Repository\InvoiceItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource as ApiResource;

/**
 * @ORM\Entity(repositoryClass=InvoiceItemRepository::class)
 */
class InvoiceItem
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity=Invoice::class, inversedBy="invoiceItems")
	 */
	private $invoice;

	/**
	 * @ORM\ManyToOne(targetEntity=Item::class)
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $item;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getInvoice(): ?Invoice
	{
		return $this->invoice;
	}

	public function setInvoice(?Invoice $invoice): self
	{
		$this->invoice = $invoice;

		return $this;
	}

	public function getItem(): ?Item
	{
		return $this->item;
	}

	public function setItem(?Item $item): self
	{
		$this->item = $item;

		return $this;
	}
}
