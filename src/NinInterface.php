<?php
/**
 * This file is part of the vasildakov/nin project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://github.com/vasildakov/nin GitHub
 */
namespace VasilDakov\Nin;

/**
 * Interface NinInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface NinInterface
{
    public static function isValid($value);

    public function getValue();
}