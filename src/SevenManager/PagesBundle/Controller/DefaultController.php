<?php

namespace SevenManager\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SevenManager\PagesBundle\Document\Task;


/**
 * Class DefaultController
 *
 * @package SevenManager\PagesBundle\Controller
 */
class DefaultController extends Controller
{

    /**
     * @param $name
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('SevenManagerPagesBundle:Default:index.html.twig', array('name' => $name));
    }

    /**
     * @return Response
     */
    public function createAction()
    {
        // Get Documents
        $documentManager = $this->get('doctrine_phpcr')->getManager();
        $rootTask = $documentManager->find(null, '/tasks');

        $task = new Task();
        $task->setDescription('Finish CMF project');
        $task->setParentDocument($rootTask);

        $documentManager->persist($task);
        $documentManager->flush();

        return new Response('Created task "'.$task->getDescription().'"');
    }

    /**
     * @param $name
     *
     * @return Response
     */
    public function showAction($name)
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('PagesBundle:Task');
        $task = $repository->find('/tasks/'.$name);

        if (!$task) {
            throw $this->createNotFoundException('No task found with name '.$name);
        }

        return new Response('['.($task->isDone() ? 'x' : ' ').'] '.$task->getDescription());
    }

    /**
     * @param $name
     *
     * @return Response
     */
    public function updateAction($name)
    {
        $documentManager = $this->get('doctrine_phpcr')->getManager();
        $repository = $documentManager->getRepository('PagesBundle:Task');
        $task = $repository->find('/tasks/'.$name);

        if (!$task) {
            throw $this->createNotFoundException('No task found for name '.$name);
        }

        if (!$task->isDone()) {
            $task->setDone(true);
        }

        $documentManager->flush();

        return new Response('[x] '.$task->getDescription());
    }

    /**
     * @param $name
     *
     * @return Response
     */
    public function deleteAction($name)
    {
        $documentManager = $this->get('doctrine_phpcr')->getManager();
        $repository = $documentManager->getRepository('PagesBundle:Task');
        $task = $repository->find('/tasks/'.$name);

        if (!$task) {
            throw $this->createNotFoundException('No task found for name '.$name);
        }

        $documentManager->remove($task);
        $documentManager->flush();

        return new Response('[x] Successfully deleted');
    }

    /**
     * @param $id
     */
    public function getAction($id)
    {
        $repository = $this->get('doctrine_phpcr')->getRepository('PagesBundle:Task');

        // query by the id (full path)
        $task = $repository->find($id);

        // query for one task matching be name and done
        $task = $repository->findOneBy(array('name' => 'foo', 'done' => false));

        // query for all tasks matching the name, ordered by done
        $tasks = $repository->findBy(
            array('name' => 'foo'),
            array('done' => 'ASC')
        );
    }
}
