<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BinaryDocument.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Common\Documents;

use Psr\Http\Message\ResponseInterface;

/**
 * Binäres Download-Dokument (z. B. PDF/ZIP aus hr:payrollreports)
 * inkl. Content-Type und Dateiname aus dem Content-Disposition-Header.
 */
final class BinaryDocument {
    public function __construct(
        public readonly string $content,
        public readonly string $contentType,
        public readonly ?string $filename = null
    ) {}

    public static function fromResponse(ResponseInterface $response): self {
        $filename = null;
        $disposition = $response->getHeaderLine('Content-Disposition');

        if ($disposition !== '' && preg_match('/filename\*?=(?:UTF-8\'\')?"?([^";]+)"?/i', $disposition, $matches)) {
            $filename = trim($matches[1]);
        }

        return new self(
            (string) $response->getBody(),
            $response->getHeaderLine('Content-Type'),
            $filename
        );
    }

    public function getSize(): int {
        return strlen($this->content);
    }

    /**
     * Schreibt den Inhalt in eine Datei.
     */
    public function saveTo(string $path): bool {
        return file_put_contents($path, $this->content) !== false;
    }
}
