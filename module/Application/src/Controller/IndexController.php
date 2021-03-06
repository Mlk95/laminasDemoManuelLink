<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

// Controller in Zend bzw. Lamina starten mit Großbuchstaben(capital letter).
class IndexController extends AbstractActionController
{

    // Actions wiederum starten mit Kleinbuchstaben (lower case letter)
    public function indexAction(): ViewModel
    {
        return new ViewModel();
    }
}
