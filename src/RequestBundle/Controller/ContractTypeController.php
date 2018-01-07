<?php

namespace RequestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use RequestBundle\Entity\ContractType;
use RequestBundle\Form\ContractTypeType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use JMS\Serializer\SerializerBuilder;
/**
 * ContractTypeController class.
 */
class ContractTypeController extends Controller
{
    /**
     * @param Request $request
     * 
     * @Route("/contractTypeList", name="contractTypeList")
     */
    public function contractTypeListAction(Request $request)
    {
        $contractType = new ContractType();
        $form = $this->createContractTypeForm($contractType);
        
        return $this->render(
                            'RequestBundle:ContractType:contractTypeList.html.twig', 
                              array(
                                  'contractTypeList' => $this->getContractTypeList(),
                                  'form' => $form->createView(),
                                )
                            );
    }
    
   /**
     * 
     * @param Request $request
     * 
     * @Route("/contractTypeCreate", name="contractTypeCreate")
     * @Method({"POST"})
     */
    public function contractTypeCreate(Request $request)
    {
        $contractType = new ContractType();
        $form = $this->createContractTypeForm($contractType);
        $form->handleRequest($request);
        if($form->isValid())
        {            
            $em = $this->getDoctrine()->getManager();
            $em->persist($contractType);
            $em->flush();
           
            
            return new JsonResponse(array(
                'message' => 'success',
                ),200);
        }
        
        return new JsonResponse(
                    array(
                        'message' => 'Error',
                        'form' => $this->renderView('RequestBundle:ContractType:contractTypeForm.html.twig', array('form' => $form->createView()))),
                        400);
    }
    
    /**
     * @Route("/getContractTypeJsonList", name="getContractTypeJsonList", options={"expose"=true})
     * @Method({"GET"})
     */
    public function getContractTypeJsonListAction(Request $request)
    {
        $serializer = SerializerBuilder::create()->build();
        $data = $serializer->serialize($this->getContractTypeList(), 'json');
        return new JsonResponse($data);
    }
    
    /**
     * 
     * @param Request $request
     * @param int     $id
     * 
     * @Route("/contractTypeDelete/{id}", name="contractTypeDelete", requirements={"id" = "\d+"})
     * @Method({"GET"})
     */
    public function contractTypeDeleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository("RequestBundle:ContractType");
        $contractType = $repository->find($id);
        if(null == $contractType) {
            throw new NotFoundHttpException("Contract Type with ".$id." doesn't exist");
        }
        $em->remove($contractType);
        $em->flush();
    }
    
    /**
     * createContractTypeForm
     */
    private function createContractTypeForm(ContractType $contractType)
    {
        $form = $this->createForm(ContractTypeType::class, $contractType, 
                array(
                    'action' => $this->generateUrl("contractTypeCreate"),
                    'method' => 'POST',
                )
            );
        
        return $form;
    }
    
    /**
     * @return array.
     */
    private function getContractTypeList()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository("RequestBundle:ContractType");
        $contractTypeList = $repository->findAll();
        return $contractTypeList;
    }
}
