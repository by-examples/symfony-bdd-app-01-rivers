<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\River;
use AppBundle\Form\RiverType;

/**
 * River controller.
 *
 * @Route("/admin/river")
 */
class RiverController extends Controller
{

    /**
     * Lists all River entities.
     *
     * @Route("/", name="admin_river")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:River')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new River entity.
     *
     * @Route("/", name="admin_river_create")
     * @Method("POST")
     * @Template("AppBundle:River:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new River();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_river_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a River entity.
     *
     * @param River $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(River $entity)
    {
        $form = $this->createForm(new RiverType(), $entity, array(
            'action' => $this->generateUrl('admin_river_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new River entity.
     *
     * @Route("/new", name="admin_river_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new River();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a River entity.
     *
     * @Route("/{id}", name="admin_river_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:River')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find River entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing River entity.
     *
     * @Route("/{id}/edit", name="admin_river_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:River')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find River entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a River entity.
    *
    * @param River $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(River $entity)
    {
        $form = $this->createForm(new RiverType(), $entity, array(
            'action' => $this->generateUrl('admin_river_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing River entity.
     *
     * @Route("/{id}", name="admin_river_update")
     * @Method("PUT")
     * @Template("AppBundle:River:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:River')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find River entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_river_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a River entity.
     *
     * @Route("/{id}", name="admin_river_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:River')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find River entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_river'));
    }

    /**
     * Creates a form to delete a River entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_river_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
