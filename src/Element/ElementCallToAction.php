<?php

namespace Soulandwolf\Elements\CallToAction\Element;


use DNADesign\Elemental\Models\BaseElement;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\DropdownField;

class ElementCallToAction extends BaseElement
{
    public function getType()
    {
        return self::$singular_name;
    }

    /**
     * @return string
     */
    private static $icon = 'font-icon-right-dir';

    /**
     * @return string
     */
    private static $table_name = 'ElementCallToAction';

    /**
     * @return string
     */
    private static $singular_name = 'CTA-Element';

    /**
     * @return string
     */
    private static $plural_name = 'CTA-Elements';

    private static $db = [
        'HTML' => 'HTMLText',
        'Color' => 'Varchar(255)',
    ];

    private static $has_one = [
        'ReadMoreLink' => Link::Class
    ];

    private static $field_labels = [
        'Title' => 'Title',
        'Sort' 	=>	'Sorting'
    ];

    public function FieldLabels($includerelations = true)
    {
        $labels = parent::fieldLabels($includerelations=true);
        $labels['Color'] = _t(__CLASS__ . '.ColorLabel', 'Color');
        $labels['ReadMoreLink'] = _t(__CLASS__ . '.ReadMoreLinkLabel', 'ReadMoreLink');
    }

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {

            // Style: Description for default style (describes Layout thats used, when no special style is selected)
            $Style = $fields->dataFieldByName('Style');
            $StyleDefaultDescription = $this->owner->config()->get('styles_default_description', Config::UNINHERITED);
            if ($Style && $StyleDefaultDescription) {
                $Style->setDescription($StyleDefaultDescription);
            }

            // ReadMoreLink: use Linkfield
            $ReadMoreLink = LinkField::create('ReadMoreLinkID', 'Link');
            $fields->replaceField('ReadMoreLinkID', $ReadMoreLink);


            $colors = $this->config()->get('colors');
            if ($colors && count($colors) > 0) {
                $colorDropdown = DropdownField::create('Color', _t(__CLASS__.'.COLOR', 'Color variation'), $colors);

                $fields->insertBefore($colorDropdown, 'HTML');

                $colorDropdown->setEmptyString(_t(__CLASS__.'.CUSTOM_COLORS', 'Select a color...'));
            } else {
                $fields->removeByName('Color');
            }



        });
        $fields = parent::getCMSFields();
        return $fields;
    }

    public function ReadmoreLinkClass() {
        return $this->config()->get('readmore_link_class');
    }

    public function getRawContent()
    {
        $html = $this->owner->HTML;
        return strip_tags($html);
    }
}
