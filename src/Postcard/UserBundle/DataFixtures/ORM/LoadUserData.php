<?php
namespace Postcard\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Postcard\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
	private $container;

	private $userManager;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
		$this->userManager = $container->get('fos_user.user_manager');
	}

	public function load(ObjectManager $manager)
	{
		$user1 = $this->userManager->createUser();
		$user1->setUsername('john');
		$user1->setEmail('john@bensaidj.com');
		$user1->setPlainPassword('nimporte');
		$user1->setEnabled(true);

		$this->userManager->updateUser($user1, false);

		$user2 = $this->userManager->createUser();
		$user2->setUsername('tony');
		$user2->setEmail('tony@bensaidj.com');
		$user2->setPlainPassword('nimporte');
		$user2->setEnabled(true);

		$this->userManager->updateUser($user2, false);

		$user3 = $this->userManager->createUser();
		$user3->setUsername('tessa');
		$user3->setEmail('tessa@bensaidj.com');
		$user3->setPlainPassword('nimporte');
		$user3->setEnabled(true);

		$this->userManager->updateUser($user3);

		$this->addReference('john', $user1);
		$this->addReference('tony', $user2);
		$this->addReference('tessa', $user3);
	}

	public function getOrder()
	{
		return 10;
	}
}
