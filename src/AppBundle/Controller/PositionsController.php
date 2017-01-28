<?php

namespace AppBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Position;
use CrEOF\Spatial\PHP\Types\Geometry\Point;

class PositionsController extends FOSRestController
{

	// [GET] /positions/{id}
	public function getPositionAction($id)
    {
    	//Find USER By Token
    	$logged_user = $this->get('security.context')->getToken()->getUser();
		
		//Check is granted
		$is_granted = $this->get('security.context')->isGranted('ROLE_USER');
		
		//Find position data
		$position = $this->getDoctrine()->getRepository('AppBundle:Position')->find($id);
		if(!$position){
			throw $this->createNotFoundException('No position found for id '.$id);
		}else{
			$view = $this->view($position, 200);
        	return $this->handleView($view);
		}
    } 
    
	// [GET] /positions
	// Set search parameters
    public function getPositionsAction(){
        $position = $this->getDoctrine()->getRepository('AppBundle:Position')->findAll();
		if(!$position){
			throw $this->createNotFoundException('No collection found');
		}else{
			$view = $this->view($position, 200);
        	return $this->handleView($view);
		}
    }

	// "post_positions"           
	// [POST] /positions
    public function postPositionsAction(){
			
		//Find USER By Token
    	$logged_user = $this->get('security.context')->getToken()->getUser();
		
		//Create new point
		$request = $this->getRequest();
		$point = new Point($request->get('x'),$request->get('y'));
		
    	$position = new Position();

		$position->setPosition($point);
		$position->setUser($logged_user);

		//Entity manager
		$em = $this->getDoctrine()->getManager();
	    $em->persist($position);
	    $em->flush();
		
    } 

	// "put_positions"             
	// [PUT] /positions/{id}
    public function putPositionAction($id)
    {}

	// "delete_positions"          
	// [DELETE] /positions/{id}
    public function deletePositionAction($id)
    {}

}