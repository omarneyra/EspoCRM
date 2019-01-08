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
 * @package    \PhpOffice\PhpSpreadsheet\Writer\Ods
 * @copyright  Copyright (c) 2006 - 2014 \PhpOffice\PhpSpreadsheet\Spreadsheet (http://www.codeplex.com/\PhpOffice\PhpSpreadsheet\Spreadsheet)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */


/**
 * \PhpOffice\PhpSpreadsheet\Writer\Ods\Settings
 *
 * @category   \PhpOffice\PhpSpreadsheet\Spreadsheet
 * @package    \PhpOffice\PhpSpreadsheet\Writer\Ods
 * @copyright  Copyright (c) 2006 - 2014 \PhpOffice\PhpSpreadsheet\Spreadsheet (http://www.codeplex.com/\PhpOffice\PhpSpreadsheet\Spreadsheet)
 * @author     Alexander Pervakov <frost-nzcr4@jagmort.com>
 */
class \PhpOffice\PhpSpreadsheet\Writer\Ods\Settings extends \PhpOffice\PhpSpreadsheet\Writer\Ods\WriterPart
{
    /**
     * Write settings.xml to XML format
     *
     * @param   \PhpOffice\PhpSpreadsheet\Spreadsheet                   $p\PhpOffice\PhpSpreadsheet\Spreadsheet
     * @return  string                     XML Output
     * @throws  \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function write(\PhpOffice\PhpSpreadsheet\Spreadsheet $p\PhpOffice\PhpSpreadsheet\Spreadsheet = null)
    {
        if (!$p\PhpOffice\PhpSpreadsheet\Spreadsheet) {
            $p\PhpOffice\PhpSpreadsheet\Spreadsheet = $this->getParentWriter()->get\PhpOffice\PhpSpreadsheet\Spreadsheet();
        }

        $objWriter = null;
        if ($this->getParentWriter()->getUseDiskCaching()) {
            $objWriter = new \PhpOffice\PhpSpreadsheet\Shared\XMLWriter(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter::STORAGE_DISK, $this->getParentWriter()->getDiskCachingDirectory());
        } else {
            $objWriter = new \PhpOffice\PhpSpreadsheet\Shared\XMLWriter(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter::STORAGE_MEMORY);
        }

        // XML header
        $objWriter->startDocument('1.0', 'UTF-8');

        // Settings
        $objWriter->startElement('office:document-settings');
            $objWriter->writeAttribute('xmlns:office', 'urn:oasis:names:tc:opendocument:xmlns:office:1.0');
            $objWriter->writeAttribute('xmlns:xlink', 'http://www.w3.org/1999/xlink');
            $objWriter->writeAttribute('xmlns:config', 'urn:oasis:names:tc:opendocument:xmlns:config:1.0');
            $objWriter->writeAttribute('xmlns:ooo', 'http://openoffice.org/2004/office');
            $objWriter->writeAttribute('office:version', '1.2');

            $objWriter->startElement('office:settings');
                $objWriter->startElement('config:config-item-set');
                    $objWriter->writeAttribute('config:name', 'ooo:view-settings');
                    $objWriter->startElement('config:config-item-map-indexed');
                        $objWriter->writeAttribute('config:name', 'Views');
                    $objWriter->endElement();
                $objWriter->endElement();
                $objWriter->startElement('config:config-item-set');
                    $objWriter->writeAttribute('config:name', 'ooo:configuration-settings');
                $objWriter->endElement();
            $objWriter->endElement();
        $objWriter->endElement();

        return $objWriter->getData();
    }
}
