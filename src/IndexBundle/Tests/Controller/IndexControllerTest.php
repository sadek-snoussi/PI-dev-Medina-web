<?php

namespace IndexBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testAcceuil()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Acceuil');
    }

}
