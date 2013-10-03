<?php

namespace Symfony\Cmf\Bundle\MenuBundle\Tests\WebTest\Voter;

use Symfony\Cmf\Component\Testing\Functional\BaseTestCase as BaseBaseTestCase;

abstract class BaseTestCase extends BaseBaseTestCase
{
    public function setUp()
    {
        $this->db('PHPCR')->loadFixtures(array(
            'Symfony\Cmf\Bundle\MenuBundle\Tests\Resources\DataFixtures\PHPCR\LoadMenuData',
        ));
        $this->client = $this->createClient();
    }

    protected function assertCurrentItem($crawler, $title)
    {
        $res = $crawler->filter('li.current:contains("'.$title.'")')->count();
        $this->assertEquals(1, $res, 'Failed matching current menu item "'.$title.'", got '.$crawler->html());
    }
}
