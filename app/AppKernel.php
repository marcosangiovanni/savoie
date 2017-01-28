<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            //Bundle per la gestione degli utenti loggati
            new FOS\UserBundle\FOSUserBundle(),
            
			//Symfony original installation
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            
			//Main App
            new AppBundle\AppBundle(),

			// These are the other bundles the SonataAdminBundle relies on
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // Storage and SonataAdminBundle
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            
			// Bundle for REST application
			new FOS\RestBundle\FOSRestBundle(),
			new JMS\SerializerBundle\JMSSerializerBundle(),
			
			// To implement oauth2 authentication			
            new FOS\OAuthServerBundle\FOSOAuthServerBundle(),
            
			//Cors manager (tipically for swagger disable in prod ENV)
			new Nelmio\CorsBundle\NelmioCorsBundle(),
			
			//Doctrine plugin containing usefull extension (translatable,timestampable)
			new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
			
			//Gestione dei form con dati spazioni per inserimento con gmaps
			new Looptribe\FormSpatialBundle\LooptribeFormSpatialBundle(),
		    
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
