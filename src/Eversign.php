<?php

namespace Pinpon\Eversign;

use Eversign\Client;
use Eversign\Document as EversignDocument;
use Exception;

class Eversign
{
    private Client $client;

    public function __construct(private readonly string $apiKey)
    {
        $this->client = new Client($this->apiKey);
    }

    public static function make(string $apiKey): self
    {
        return new self($apiKey);
    }

    /**
     * @throws Exception
     */
    public function setBusinessId(int $businessId): static
    {
        $this->client->setSelectedBusinessById($businessId);

        return $this;
    }

    public function document(): Document
    {
        return (new Document())->sandbox(config('eversign.sandbox'));
    }

    public function sendDocument(EversignDocument $document)
    {
        return $this->client->createDocument($document);
    }
}
