<?php

namespace TechSolve\TextTranslation\Block\Adminhtml;

class Translation extends \Magento\Backend\Block\Widget\Container
{
    /**
     * @var string
     */
    protected $_template = 'translation/translation.phtml';

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Backend\Block\Widget\Context $context,array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * Prepare button and grid
     *
     * @return \Magento\Catalog\Block\Adminhtml\Product
     */
    protected function _prepareLayout()
    {


        $addButtonProps = [
        'id' => 'add_new',
        'label' => __('Add New'),
        'class' => 'add primary',
        'button_class' => '',
        'onclick' => "setLocation('" . $this->_getCreateUrl() . "')",
        ];
        $this->buttonList->add('add_new', $addButtonProps);


        $this->setChild(
            'grid',
            $this->getLayout()->createBlock('TechSolve\TextTranslation\Block\Adminhtml\Translation\Grid', 'mcfadyen.translation.grid')
            );
        return parent::_prepareLayout();
    }

    /**
     *
     *
     * @param string $type
     * @return string
     */
    protected function _getCreateUrl()
    {
        return $this->getUrl(
            'texttranslation/*/new'
            );
    }

    /**
     * Render grid
     *
     * @return string
     */
    public function getGridHtml()
    {
        return $this->getChildHtml('grid');
    }

}
