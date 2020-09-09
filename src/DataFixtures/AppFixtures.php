<?php

namespace App\DataFixtures;

use App\Entity\Maisons;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

       // $maison = new Maisons();
        //$maison->setTitre('Maison de campagne');
        //$maison->setDescription('Maison de charme en bordure de rivière');
       // $maison->setChambres('4');
        //$maison->setPrix('263000');
        //$maison->setSuperficie('120');
        //$maison->setImg1('maision1-1.png');
        //$maison->setImg2('maision1-2.png');
        //$maison->setImg3('maision1-3.png');

       // $manager->persist($maison);
       // $manager->flush();

       for($i = 1; $i <= 10; $i++)
       {
   
           
           $maison = new Maisons();
           $maison->setTitre('Maison n°'.$i);
           $maison->setDescription('Description de la maison n°' .$i);
           $maison->setChambres(random_int(1,6));
           $maison->setPrix(random_int(150,3800));
           $maison->setSuperficie(random_int(90,300) );
           $maison->setImg1('maision'.$i.'-1.png');
           $maison->setImg2('maision'.$i.'-2.png');
           $maison->setImg3('maision'.$i.'-3.png');
   
           $manager->persist($maison);
           $manager->flush();
       }
    }

    
}
