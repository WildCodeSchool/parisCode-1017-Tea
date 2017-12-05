<?php
/**
 * Created by PhpStorm.
 * User: LN-T
 * Date: 28/11/2017
 * Time: 16:22
 */

namespace Tea\Controllers;

use Tea\Model\Repository\RoleManager;

class RoleController extends Controller
{
    public function getAction()
    {
        $manager = new RoleManager();
        $roles = $manager->getAll();
    }

}