<?php

namespace Pinpon\Eversign;

use Eversign\Document as EversignDocument;
use Eversign\File;
use Eversign\Recipient;
use Eversign\Signer;

class Document
{
    private EversignDocument $document;

    public function __construct()
    {
        $this->document = new EversignDocument();
    }

    public function fileFromBase64(string $name, string $base64): static
    {
        $file = new File();
        $file->setName($name);
        $file->setFileBase64($base64);

        $this->document->appendFile($file);

        return $this;
    }

    public function fileFromPath(string $name, string $path): static
    {
        $file = new File();
        $file->setName($name);
        $file->setFilePath($path);

        $this->document->appendFile($file);

        return $this;
    }

    public function fileFromUrl(string $name, string $url): static
    {
        $file = new File();
        $file->setName($name);
        $file->setFileUrl($url);

        $this->document->appendFile($file);

        return $this;
    }

    public function recipient(string $name, string $email, ?string $lang = null): static
    {
        $recipient = new Recipient();
        $recipient->setName($name);
        $recipient->setEmail($email);
        $recipient->setLanguage($lang ?? config('app.locale', 'en'));

        $this->document->appendRecipient($recipient);

        return $this;
    }

    public function requester(string $requesterName, $requesterEmail): static
    {
        $this->document->setCustomRequesterName($requesterName);
        $this->document->setCustomRequesterEmail($requesterEmail);

        return $this;
    }

    public function sandbox(bool $sandbox = true): static
    {
        $this->document->setSandbox($sandbox);

        return $this;
    }

    public function signer(string $name, string $email, ?string $lang = null, bool $deliverEmail = false)
    {
        $signer = new Signer();
        $signer->setName($name);
        $signer->setEmail($email);
        $signer->setLanguage($lang ?? config('app.locale', 'en'));
        $signer->setDeliverEmail($deliverEmail);

        $this->document->appendSigner($signer);

        return $this;
    }

    public function title(string $title): static
    {
        $this->document->setTitle($title);

        return $this;
    }

    public function dump(): static
    {
        dump($this);

        return $this;
    }

    public function send()
    {
        app()->make('eversign')->sendDocument($this->document);
    }
}
