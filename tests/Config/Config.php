<?php

namespace Tests\Config;

class Config {
    public ?string $resourceUrl = null;
    public ?string $user = null;
    public ?string $password = null;

    public function __construct() {
        $this->setConfig();
    }

    public function isConfigured(): bool {
        return !is_null($this->resourceUrl) && !is_null($this->user) && !is_null($this->password);
    }

    private function setConfig() {
        $filePath = __DIR__ . '/../../.samples/config.json';
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $config = json_decode($jsonContent, true);

            foreach ($config['values'] as $value) {
                if ($value['key'] === 'resourceurl') {
                    $this->resourceUrl = $value['value'];
                }
                if ($value['key'] === 'user') {
                    $this->user = $value['value'];
                }
                if ($value['key'] === 'password') {
                    $this->password = $value['value'];
                }
            }
        } else {
            error_log('config file not found, please create one at ../../.samples/config.json');
        }
    }
}
