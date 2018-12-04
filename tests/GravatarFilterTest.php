<?php

use alexeevdv\twig\GravatarFilter;

class GravatarFilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider templatesDataProvider
     */
    public function testRendering($template, $expectedResult)
    {
        $loader = new Twig_Loader_Array([
            'default' => '{{ "email@example.org" | gravatar }}',
            'size' => '{{ "email@example.org" | gravatar({"size": 500}) }}',
            'forceDefault' => '{{ "email@example.org" | gravatar({"forceDefault": true}) }}',
            'defaultImage' => '{{ "email@example.org" | gravatar({"defaultImage": "mm"}) }}',
            'defaultImageUrl' => '{{ "email@example.org" | gravatar({"defaultImage": "https://domain.org/image.jpg"}) }}',
            'rating' => '{{ "email@example.org" | gravatar({"rating": "pg"}) }}',
            'extension' => '{{ "email@example.org" | gravatar({"extension": true}) }}',
            'all' => '{{ "email@example.org" | gravatar({"size": 500, "forceDefault": true, "defaultImage": "mm", "rating": "pg", "extension": true}) }}',
        ]);
        $twig = new Twig_Environment($loader, array_merge(array('debug' => true, 'cache' => false, 'autoescape' => false), []));
        $twig->addExtension(new GravatarFilter());
        $this->assertEquals($expectedResult, $twig->render($template));
    }

    public function templatesDataProvider()
    {
        return [
            ['default', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b'],
            ['size', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b?s=500'],
            ['forceDefault', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b?f=y'],
            ['defaultImage', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b?d=mm'],
            ['defaultImageUrl', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b?d=https%253A%252F%252Fdomain.org%252Fimage.jpg'],
            ['rating', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b?r=pg'],
            ['extension', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b.jpg'],
            ['all', 'https://secure.gravatar.com/avatar/8fbf4bd0581c9ccc67c560dea9931a1b.jpg?s=500&f=y&d=mm&r=pg'],
        ];
    }
}
