<?php
namespace Macademy\Trainee\Block\Adminhtml\Grid\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Macademy\Trainee\Model\Status $options,
        array $data = []
    ) {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');

        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id' => 'edit_form',
                    'enctype' => 'multipart/form-data',
                    'action' => $this->getData('action'),
                    'method' => 'post'
                ]
            ]
        );

        $form->setHtmlIdPrefix('review_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => $model->getId() ? __('Edit Review') : __('Add Review'),
                'class'  => 'fieldset-wide'
            ]
        );

        if ($model->getId()) {
            $fieldset->addField('review_id', 'hidden', ['name' => 'review_id']);
        }

        $fieldset->addField(
            'customer_name',
            'text',
            [
                'name'     => 'customer_name',
                'label'    => __('Customer Name'),
                'id'       => 'customer_name',
                'title'    => __('Customer Name'),
                'required' => true,
                'class'    => 'required-entry',
            ]
        );

        $fieldset->addField(
            'customer_email',
            'text',
            [
                'name'     => 'customer_email',
                'label'    => __('Customer Email'),
                'id'       => 'customer_email',
                'title'    => __('Customer Email'),
                'required' => true,
                'class'    => 'required-entry validate-email',
            ]
        );

        $fieldset->addField(
            'rating',
            'select',
            [
                'name'     => 'rating',
                'label'    => __('Rating'),
                'id'       => 'rating',
                'title'    => __('Rating'),
                'values'   => [
                    ['value' => 1, 'label' => __('1 Star')],
                    ['value' => 2, 'label' => __('2 Stars')],
                    ['value' => 3, 'label' => __('3 Stars')],
                    ['value' => 4, 'label' => __('4 Stars')],
                    ['value' => 5, 'label' => __('5 Stars')]
                ],
                'required' => true,
            ]
        );

        $fieldset->addField(
            'review',
            'textarea',
            [
                'name'     => 'review',
                'label'    => __('Review'),
                'id'       => 'review',
                'title'    => __('Review'),
                'required' => true,
                'style'    => 'height:200px;',
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name'   => 'status',
                'label'  => __('Status'),
                'id'     => 'status',
                'title'  => __('Status'),
                'values' => [
                    ['value' => 'pending', 'label' => __('Pending')],
                    ['value' => 'approved', 'label' => __('Approved')],
                    ['value' => 'rejected', 'label' => __('Rejected')]
                ],
                'required' => true,
            ]
        );

        $fieldset->addField(
            'created_at',
            'date',
            [
                'name'        => 'created_at',
                'label'       => __('Created At'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'disabled'    => true,
            ]
        );

        $fieldset->addField(
            'updated_at',
            'date',
            [
                'name'        => 'updated_at',
                'label'       => __('Updated At'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'disabled'    => true,
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
