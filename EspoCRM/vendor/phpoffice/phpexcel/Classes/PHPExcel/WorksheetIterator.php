<?php
/**
 * \PhpOffice\PhpSpreadsheet\Spreadsheet
 *
 * Copyright (c) 2006 - 2014 \PhpOffice\PhpSpreadsheet\Spreadsheet
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   \PhpOffice\PhpSpreadsheet\Spreadsheet
 * @package    \PhpOffice\PhpSpreadsheet\Spreadsheet
 * @copyright  Copyright (c) 2006 - 2014 \PhpOffice\PhpSpreadsheet\Spreadsheet (http://www.codeplex.com/\PhpOffice\PhpSpreadsheet\Spreadsheet)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */


/**
 * \PhpOffice\PhpSpreadsheet\Worksheet\Iterator
 *
 * Used to iterate worksheets in \PhpOffice\PhpSpreadsheet\Spreadsheet
 *
 * @category   \PhpOffice\PhpSpreadsheet\Spreadsheet
 * @package    \PhpOffice\PhpSpreadsheet\Spreadsheet
 * @copyright  Copyright (c) 2006 - 2014 \PhpOffice\PhpSpreadsheet\Spreadsheet (http://www.codeplex.com/\PhpOffice\PhpSpreadsheet\Spreadsheet)
 */
class \PhpOffice\PhpSpreadsheet\Worksheet\Iterator implements Iterator
{
    /**
     * Spreadsheet to iterate
     *
     * @var \PhpOffice\PhpSpreadsheet\Spreadsheet
     */
    private $_subject;

    /**
     * Current iterator position
     *
     * @var int
     */
    private $_position = 0;

    /**
     * Create a new worksheet iterator
     *
     * @param \PhpOffice\PhpSpreadsheet\Spreadsheet         $subject
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $subject = null)
    {
        // Set subject
        $this->_subject = $subject;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        unset($this->_subject);
    }

    /**
     * Rewind iterator
     */
    public function rewind()
    {
        $this->_position = 0;
    }

    /**
     * Current \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     *
     * @return \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     */
    public function current()
    {
        return $this->_subject->getSheet($this->_position);
    }

    /**
     * Current key
     *
     * @return int
     */
    public function key()
    {
        return $this->_position;
    }

    /**
     * Next value
     */
    public function next()
    {
        ++$this->_position;
    }

    /**
     * More \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet instances available?
     *
     * @return boolean
     */
    public function valid()
    {
        return $this->_position < $this->_subject->getSheetCount();
    }
}
