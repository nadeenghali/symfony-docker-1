<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource as ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $created_at;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $sent_at;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $paid_at;

	/**
	 * @Assert\GreaterThanOrEqual(value=0, message="VAT cannot be less than 0.")
	 * @ORM\Column(type="float", options={"default" : 0.0})
	 */
	private $net_amount;

	/**
	 * @Assert\GreaterThanOrEqual(value=0, message="Gross amt cannot be less than 0.")
	 * @ORM\Column(type="float", options={"default" : 0.0})
	 */
	private $gross_amount;

	/**
	 * @Assert\GreaterThanOrEqual(value=0, message="Tax amt cannot be less than 0.")
	 * @ORM\Column(type="float", options={"default" : 0.0})
	 */
	private $tax_amount;

	/**
	 * @ORM\OneToMany(targetEntity=InvoiceItem::class, mappedBy="invoice")
	 */
	private $invoiceItems;

	/**
	 * @ORM\ManyToOne(targetEntity=Recipient::class)
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $recipient;

	public function __construct()
	{
		$this->invoiceItems = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getCreatedAt(): ?\DateTimeInterface
	{
		return $this->created_at;
	}

	public function setCreatedAt(\DateTimeInterface $created_at): self
	{
		$this->created_at = $created_at;

		return $this;
	}

	public function getSentAt(): ?\DateTimeInterface
	{
		return $this->sent_at;
	}

	public function setSentAt(?\DateTimeInterface $sent_at): self
	{
		$this->sent_at = $sent_at;

		return $this;
	}

	public function getPaidAt(): ?\DateTimeInterface
	{
		return $this->paid_at;
	}

	public function setPaidAt(?\DateTimeInterface $paid_at): self
	{
		$this->paid_at = $paid_at;

		return $this;
	}

	public function getNetAmount(): ?float
	{
		return $this->net_amount;
	}

	public function setNetAmount(float $net_amount): self
	{
		$this->net_amount = $net_amount;

		return $this;
	}

	public function getGrossAmount(): ?float
	{
		return $this->gross_amount;
	}

	public function setGrossAmount(float $gross_amount): self
	{
		$this->gross_amount = $gross_amount;

		return $this;
	}

	public function getTaxAmount(): ?float
	{
		return $this->tax_amount;
	}

	public function setTaxAmount(float $tax_amount): self
	{
		$this->tax_amount = $tax_amount;

		return $this;
	}

	/**
	 * @return Collection|InvoiceItem[]
	 */
	public function getInvoiceItems(): Collection
	{
		return $this->invoiceItems;
	}

	public function addInvoiceItem(InvoiceItem $invoiceItem): self
	{
		if (!$this->invoiceItems->contains($invoiceItem)) {
			$this->invoiceItems[] = $invoiceItem;
			$invoiceItem->setInvoice($this);
		}

		return $this;
	}

	public function removeInvoiceItem(InvoiceItem $invoiceItem): self
	{
		if ($this->invoiceItems->contains($invoiceItem)) {
			$this->invoiceItems->removeElement($invoiceItem);
			// set the owning side to null (unless already changed)
			if ($invoiceItem->getInvoice() === $this) {
				$invoiceItem->setInvoice(null);
			}
		}

		return $this;
	}

	public function getRecipient(): ?Recipient
	{
		return $this->recipient;
	}

	public function setRecipient(?Recipient $recipient): self
	{
		$this->recipient = $recipient;

		return $this;
	}
}
