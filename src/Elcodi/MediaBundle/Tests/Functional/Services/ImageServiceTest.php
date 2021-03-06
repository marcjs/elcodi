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

namespace Elcodi\MediaBundle\Tests\Functional\Services;

use Symfony\Component\HttpFoundation\File\File;

use Elcodi\CoreBundle\Tests\Functional\WebTestCase;
use Elcodi\MediaBundle\Entity\Interfaces\ImageInterface;

/**
 * Class ImageServiceTest
 */
class ImageServiceTest extends WebTestCase
{
    /**
     * Returns the callable name of the service
     *
     * @return string service name
     */
    public function getServiceCallableName()
    {
        return [
            'elcodi.core.media.service.image_manager',
            'elcodi.image_manager'
        ];
    }

    /**
     * Test image object creation
     */
    public function testCreateImage()
    {
        $imagePath = realpath(dirname(__FILE__)) . '/images/image-10-10.gif';
        $file = new File($imagePath);

        /**
         * @var ImageInterface $image
         */
        $image = $this
            ->container
            ->get('elcodi.core.media.service.image_manager')
            ->createImage($file);

        $this->assertInstanceOf('Elcodi\MediaBundle\Entity\Interfaces\ImageInterface', $image);
        $this->assertEquals($image->getWidth(), 10);
        $this->assertEquals($image->getHeight(), 10);
        $this->assertEquals($image->getContentType(), 'image/gif');
        $this->assertEquals($image->getExtension(), 'gif');
        $this->assertEquals($image->getSize(), 102);
    }
}
