<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AuthenticationSchemeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\AuthenticationScheme;
use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\AuthenticationSchemes;

class AuthenticationSchemeTest extends EntityTest {
    public function testCreateAuthenticationScheme(): void {
        $data = [
            "type" => "oauth2",
            "name" => "OAuth 2.0 Bearer Token",
            "description" => "Authentication scheme using OAuth 2.0 Bearer Token",
            "spec_uri" => "https://tools.ietf.org/html/rfc6750",
            "documentation_uri" => "https://developer.datev.de/auth"
        ];

        $scheme = new AuthenticationScheme($data);

        $this->assertInstanceOf(AuthenticationScheme::class, $scheme);
    }

    public function testCreateAuthenticationSchemes(): void {
        $data = [
            [
                "type" => "oauth2",
                "name" => "OAuth 2.0"
            ],
            [
                "type" => "httpbasic",
                "name" => "HTTP Basic"
            ]
        ];

        $schemes = new AuthenticationSchemes($data);

        $this->assertInstanceOf(AuthenticationSchemes::class, $schemes);
        $this->assertCount(2, $schemes->getValues());
    }
}
