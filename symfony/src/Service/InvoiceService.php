<?php

namespace App\Service;

use App\Entity\Invoice;
use App\Repository\InvoiceRepository;
use Doctrine\ORM\EntityNotFoundException;

class InvoiceService
{
	/**  @var InvoiceRepository $invoiceRepo*/
	protected $invoiceRepo;

	public function __construct(InvoiceRepository $invoiceRepo) {
		$this->invoiceRepo = $invoiceRepo;
	}

	/**
	 * @param string $id
	 *
	 * @return Invoice
	 * @throws EntityNotFoundException
	 */
	public function getById(string $id): Invoice
	{
		$invoice = $this->invoiceRepo->findOneBy(['id' => $id]);
		if (!$invoice) {
			throw new EntityNotFoundException("Could not find invoice.");
		}

		return $invoice;
	}
}