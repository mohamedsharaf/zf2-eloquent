<?php
/**
 * ZF2Eloquent (https://github.com/mohamedsharaf/zf2-eloquent)
 * Eloquent ORM Module for Zend Framework 2 which integrates Illuminate\Database
 * from Laravel Framework with ZF2.
 *
 * @link      https://github.com/mohamedsharaf/zf2-eloquent
 * @copyright Copyright (c) 2014 Mohamed Sharaf
 * @license   http://opensource.org/licenses/MIT MIT License
 * @author    Mohamed Sharaf <m@mohamedsharaf.net> 2014
 */

namespace ZF2Eloquent\Validator;

use Zend\Validator\Exception;

/**
 * Confirms a record exists in a table.
 */
class RecordExists extends EloquentDb
{

    public function isValid($value)
    {
        /*
         * Check for an adapter being defined. If not, throw an exception.
         */

        $valid = true;
        $this->setValue($value);

        $result = $this->query($value);
        if (!$result) {
            $valid = false;
            $this->error(self::ERROR_NO_RECORD_FOUND);
        }

        return $valid;
    }
}
