<?php

namespace Swissup\FontAwesome\Observer;

class AddPageAssets implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Magento\Framework\View\Page\Config
     */
    protected $pageConfig;

    /**
     * @var \Swissup\FontAwesome\Helper\Data
     */
    protected $helper;

    /**
     */
    public function __construct(
        \Magento\Framework\View\Page\Config $pageConfig,
        \Swissup\FontAwesome\Helper\Data $helper
    ) {
        $this->pageConfig = $pageConfig;
        $this->helper = $helper;
    }

    /**
     * Add FontAwesome assets according to module config
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->helper->isFontAwesomeEnabled()) {
            return;
        }

        if ($this->helper->canUseCdn()) {
            $this->addRemoteAsset($this->helper->getRemoteAsset());
        } else {
            $this->addLocalAsset($this->helper->getLocalAsset());
        }
    }

    protected function addRemoteAsset($asset)
    {
        $this->pageConfig->addRemotePageAsset(
            $asset->getUrl(),
            $asset->getType(),
            $asset->getProperties(),
            $asset->getName()
        );
    }

    protected function addLocalAsset($asset)
    {
        $this->pageConfig->addPageAsset(
            $asset->getUrl(),
            $asset->getProperties(),
            $asset->getName()
        );
    }
}
