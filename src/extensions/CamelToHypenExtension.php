<?php

namespace squirreldev\twigextensions\extensions;

use Twig\Extension\AbstractExtension;
use squirreldev\twigextensions\traits\TwigExtensionTrait;

class CamelToHypenExtension extends AbstractExtension {

    use TwigExtensionTrait;

    /**
     * @return string
     */
    public function getName() {
        return Craft::t('twigextensions', 'String Extension');
    }

    public function getFilters() {
        return [
            $this->addFilter('camelToHypens'),
        ];
    }

    public function camelToHypens($string) {
        $pattern = '/(([A-Z]{1}))/';
        return preg_replace_callback(
            $pattern,
            function ($matches) {
                return "-" . strtolower($matches[0]);
            },
            $string
        );
    }

}