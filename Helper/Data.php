<?php

namespace Swissup\FontAwesome\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var string
     */
    const CONFIG_PATH_ENABLED = 'swissup_fontawesome/general/enabled';

    /**
     * @var string
     */
    const CONFIG_PATH_USE_CDN = 'swissup_fontawesome/general/use_cdn';

    /**
     * @var string
     */
    const CONFIG_PATH_CDN_EMBED_CODE = 'swissup_fontawesome/general/cdn_embed_code';

    /**
     * @var string
     */
    const ASSET_REMOTE_URL = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';

    /**
     * @var string
     */
    const ASSET_REMOTE_PRELOAD_URL = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0';

    /**
     * @var string
     */
    const ASSET_EMBED_URL = 'https://use.fontawesome.com/';

    /**
     * @var string
     */
    const ASSET_LOCAL_URL = 'Swissup_FontAwesome::font-awesome-4.7.0/css/font-awesome.min.css';

    /**
     * @var string
     */
    const ASSET_LOCAL_PRELOAD_URL = 'Swissup_FontAwesome::font-awesome-4.7.0/fonts/fontawesome-webfont.woff2?v=4.7.0';

    /**
     * Retrieve isFontAwesomeEnabled flag
     *
     * @return boolean
     */
    public function isFontAwesomeEnabled()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Retrieve canUseCdn flag
     *
     * @return boolean
     */
    public function canUseCdn()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_USE_CDN,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Retrieve font awesome cdn embed code
     *
     * @return string
     */
    public function getCdnEmbedCode()
    {
        return $this->scopeConfig->getValue(
            self::CONFIG_PATH_CDN_EMBED_CODE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get basic font awesome asset object
     *
     * @param array $data
     * @return \Magento\Framework\DataObject
     */
    protected function getBaseAsset(array $data = [])
    {
        $asset = new \Magento\Framework\DataObject([
            'properties' => [],
            'name' => 'swissup_fontawesome'
        ]);
        $asset->addData($data);

        return $asset;
    }

    /**
     * Get basic font awesome asset to preload
     *
     * @param array $data
     * @return \Magento\Framework\DataObject
     */
    protected function getBasePreloadAsset(array $data = [])
    {
        $asset = $this->getBaseAsset([
            'type' => '',
            'name' => 'swissup_fontawesome_preload',
            'properties' => [
                'attributes' => 'rel="preload" as="font" crossorigin="anonymous"',
            ],
        ]);
        $asset->addData($data);

        return $asset;
    }

    /**
     * Get remote font awesome asset object
     *
     * @return \Magento\Framework\DataObject
     */
    public function getRemoteAsset()
    {
        if (($embed = $this->getCdnEmbedCode())) {
            // match the following strings:
            //  1. <link rel="stylesheet" href="https://use.fontawesome.com/28b0d407b2.css">
            //  2. <script src="https://use.fontawesome.com/77ca4931fd.js"></script>
            //  3. https://use.fontawesome.com/77ca4931fd.js
            //  4. 77ca4931fd.js

            $regex = '/[\w]+\.(css|js)/';
            preg_match($regex, $embed, $result);
            if (!$result) {
                $url  = $embed . '.js';
                $type = 'js';
            } else {
                $url  = $result[0];
                $type = $result[1];
            }
            $url = self::ASSET_EMBED_URL . $url;
        } else {
            $url  = self::ASSET_REMOTE_URL;
            $type = 'css';
        }

        $asset = $this->getBaseAsset([
            'url'  => $url,
            'type' => $type,
            'preload' => $this->getBasePreloadAsset([
                'url' => self::ASSET_REMOTE_PRELOAD_URL,
            ]),
        ]);

        return $asset;
    }

    /**
     * Get local font awesome data object
     *
     * @return \Magento\Framework\DataObject
     */
    public function getLocalAsset()
    {
        $asset = $this->getBaseAsset([
            'url'  => self::ASSET_LOCAL_URL,
            'type' => 'css',
            'preload' => $this->getBasePreloadAsset([
                'url' => self::ASSET_LOCAL_PRELOAD_URL,
            ]),
        ]);
        return $asset;
    }
}
