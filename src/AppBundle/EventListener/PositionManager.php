<?php
namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Position;
use AppBundle\Entity\Lastposition;

class PositionManager
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $position = $args->getEntity();

        // only act on some "Product" entity
        if (!$position instanceof Position) {
            return;
        }
		
		$user = $position->getUser();
		
		$em = $args->getEntityManager();
		$repository = $em->getRepository('AppBundle:Lastposition');
		$lastposition = $repository->findOneBy(array('user_id' => $user->getId()));
		
		if(!$lastposition){
			$lastposition = new Lastposition();
			$lastposition->setUser($user);
		}

		//Update with last position
		$lastposition->setPosition($position->getPosition());
		
		//Entity manager
	    $em->persist($lastposition);
	    $em->flush();

    }
}