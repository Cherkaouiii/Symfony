<?php

namespace ErUserBundle\Security;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * LoginSuccessHandler class.
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * $router Router 
     */
    protected $router;
    
    /**
     * $authorizationChecker AuthorizationChecker 
     */
    protected $authorizationChecker;
    
    /**
     * 
     * @param Router               $router
     * @param AuthorizationChecker $authorizationChecker
     */
    public function __construct(Router $router, AuthorizationChecker $authorizationChecker) {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
    }
    
    /**
     * @param Request        $request
     * @param TokenInterface $token
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
       $response = null;
       if ($this->authorizationChecker->isGranted('ROLE_ADMIN')) {
           $response = new RedirectResponse($this->router->generate('admin_page')); 
       } else if ($this->authorizationChecker->isGranted("ROLE_USER")) {
           $response = new RedirectResponse($this->router->generate('user_home'));
       }
       
       return $response;
    }
}
