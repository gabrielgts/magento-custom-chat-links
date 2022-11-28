<?php
/**
 * Copyright © Gtstudio All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gtstudio\ChatLinks\Block\Magento\Framework\View\Element;

use Magento\Store\Model\ScopeInterface;

use Magento\Framework\{
    View\Element\Template\Context,
    App\Config\ScopeConfigInterface,
    View\Element\Template as CoreTemplate
};

class Template extends CoreTemplate
{

    private $scopeConfig;

    /**
     * Constructor
     *
     * @param Context  $context
     * @param ScopeConfigInterface $scopeConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->getConfig('custom_chat_links/options/enabled');
    }

    public function isActive($type) : bool
    {
        return (bool)$this->getConfig("custom_chat_links/{$type}/active");
    }

    /**
     * @return string
     */
    public function getUser($type): string
    {
        return (string)$this->getConfig("custom_chat_links/{$type}/user");
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return (string)$this->getConfig('custom_chat_links/general/message');
    }

    public function getChatUrl($chat): string
    {
        $url = '';

        try {

            switch ($chat) {
                case 'whatsapp':
                    $number = preg_replace('/\D/', '', $this->getUser($chat));
                    $url = "https://api.whatsapp.com/send?phone=55{$number}&text=" . rawurlencode($this->getMessage());
                    break;

                case 'telegran':
                    $url = "https://t.me/{$this->getUser($chat)}&text=" . rawurlencode($this->getMessage());
                    break;

                default:
                    $url = '#';
                    break;
            }
            return $url;

        } catch (\Exception $e) {
            return '#';
        }
    }

    private function getConfig($path)
    {
        return $this->scopeConfig->getValue(
            $path,
            ScopeInterface::SCOPE_STORE
        );
    }
}

