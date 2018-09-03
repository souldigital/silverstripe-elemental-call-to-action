<?php

namespace Derralf\Elements\CallToAction\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * Class LeftAndMainExtension.
 */
class LeftAndMainExtension extends Extension
{
    public function init()
    {
        Requirements::css('derralf/element-call-to-action: icons/icons.css');
    }
}
