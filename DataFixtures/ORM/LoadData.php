<?php

namespace Gajdaw\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Gajdaw\ExampleMenuBundle\Entity\Menu;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file(
            __DIR__ . DIRECTORY_SEPARATOR . '..' .
            DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
            'data/menu.xml'
        );
        foreach ($xml->option as $s) {
            $Menu = new Menu();
            $Menu->setTitle($s->title);
            $Menu->setContents($s->contents);
            $manager->persist($Menu);
        }
        $manager->flush();
    }
}
