<?php
/*
 * Created on   : Sat Jan 11 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DiagnosticsFixtures.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Mocks\Fixtures;

/**
 * Mock-Fixtures für Diagnostics Endpoints.
 * Struktur entspricht der echten DATEV API Antwort.
 */
class DiagnosticsFixtures {
    public static function getEcho(): array {
        return [
            'id' => 'echo-' . uniqid(),
            'echo_message' => 'DATEV API Mock is available',
        ];
    }

    public static function getEchoWithMessage(string $message = 'Test'): array {
        return [
            'id' => 'echo-' . uniqid(),
            'echo_message' => $message,
        ];
    }

    public static function getAllResponses(): array {
        return [
            'GET:/datev/api/diagnostics/v1/echo' => [
                'statusCode' => 200,
                'body' => self::getEcho(),
            ],
            'GET:/datev/api/diagnostics/v1/echo/*' => [
                'statusCode' => 200,
                'body' => self::getEchoWithMessage(),
            ],
            'POST:/datev/api/diagnostics/v1/echo' => [
                'statusCode' => 200,
                'body' => self::getEcho(),
            ],
        ];
    }
}
