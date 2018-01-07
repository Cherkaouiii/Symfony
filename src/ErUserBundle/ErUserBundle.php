<?php

namespace ErUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * ErUserBundle class.
 */
class ErUserBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
