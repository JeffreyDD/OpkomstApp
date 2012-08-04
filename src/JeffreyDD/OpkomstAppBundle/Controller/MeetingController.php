<?php

namespace JeffreyDD\OpkomstAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JeffreyDD\OpkomstAppBundle\Entity\Meeting;
use JeffreyDD\OpkomstAppBundle\Form\MeetingType;

/**
 * Meeting controller.
 *
 */
class MeetingController extends Controller
{
    /**
     * Lists all Meeting entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('JDDOpAppBundle:Meeting')->findAll();

        return $this->render('JDDOpAppBundle:Meeting:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Meeting entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JDDOpAppBundle:Meeting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Meeting entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JDDOpAppBundle:Meeting:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Meeting entity.
     *
     */
    public function newAction()
    {
        $entity = new Meeting();
        $form   = $this->createForm(new MeetingType(), $entity);

        return $this->render('JDDOpAppBundle:Meeting:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Meeting entity.
     *
     */
    public function createAction()
    {
        $entity  = new Meeting();
        $request = $this->getRequest();
        $form    = $this->createForm(new MeetingType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('meeting_show', array('id' => $entity->getId())));
            
        }

        return $this->render('JDDOpAppBundle:Meeting:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Meeting entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JDDOpAppBundle:Meeting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Meeting entity.');
        }

        $editForm = $this->createForm(new MeetingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JDDOpAppBundle:Meeting:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Meeting entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JDDOpAppBundle:Meeting')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Meeting entity.');
        }

        $editForm   = $this->createForm(new MeetingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('meeting_edit', array('id' => $id)));
        }

        return $this->render('JDDOpAppBundle:Meeting:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Meeting entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JDDOpAppBundle:Meeting')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Meeting entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('meeting'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
