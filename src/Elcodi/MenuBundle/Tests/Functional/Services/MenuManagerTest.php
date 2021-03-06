<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\MenuBundle\Tests\Functional\Services;

use Elcodi\CoreBundle\Tests\Functional\WebTestCase;
use Elcodi\MenuBundle\Services\MenuManager;

/**
 * Class MenuManager
 */
class MenuManagerTest extends WebTestCase
{
    /**
     * Returns the callable name of the service
     *
     * @return string service name
     */
    public function getServiceCallableName()
    {
        return [
            'elcodi.core.menu.service.menu_manager',
            'elcodi.menu_manager',
        ];
    }

    /**
     * Load fixtures of these bundles
     *
     * @return array Bundles name where fixtures should be found
     */
    protected function loadFixturesBundles()
    {
        return [
            'ElcodiMenuBundle',
        ];
    }

    /**
     * @var MenuManager
     *
     * Menu manager
     */
    protected $menuManager;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();

        $this->menuManager = $this
            ->container
            ->get('elcodi.menu_manager');
    }

    /**
     * Test load structure
     */
    public function testLoadAdminMenu()
    {
        $this->assertEquals(
            $this->menuManager->loadMenuByCode('menu-admin'),
            [
                1 => [
                    'id'       => 1,
                    'name'     => 'vogue',
                    'url'      => null,
                    'subnodes' => [
                        2 => [
                            'id'       => 2,
                            'name'     => 'him',
                            'url'      => 'elcodi.dev/him',
                            'subnodes' => []
                        ],
                        3 => [
                            'id'       => 3,
                            'name'     => 'her',
                            'url'      => 'elcodi.dev/her',
                            'subnodes' => []
                        ]
                    ]
                ]
            ]
        );
    }

    /**
     * Test load structure
     */
    public function testLoadFrontMenu()
    {
        $this->assertEquals(
            $this->menuManager->loadMenuByCode('menu-front'),
            [
                2 => [
                    'id'       => 2,
                    'name'     => 'him',
                    'url'      => 'elcodi.dev/him',
                    'subnodes' => []
                ],
                3 => [
                    'id'       => 3,
                    'name'     => 'her',
                    'url'      => 'elcodi.dev/her',
                    'subnodes' => []
                ]
            ]
        );
    }
}
