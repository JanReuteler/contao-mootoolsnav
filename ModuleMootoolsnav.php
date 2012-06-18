<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Andreas Schempp 2008-2012
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @author     Jan Reuteler <jan.reuteler@iserv.ch> 
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


class ModuleMootoolsnav extends ModuleNavigation
{
	protected $strTemplate = 'mod_mootoolsnav';

	
	protected function compile()
	{
		parent::compile();
		
		if ($this->cssID[0] == '')
		{
			$arrCssID = $this->cssID;
			$arrCssID[0] = 'mootoolsnav'.$this->id;
			$this->cssID = $arrCssID;
		}
		
		
		$arrConfig = array();
		
		foreach(deserialize($this->mootoolsnav_config, true) as $arrRow)
		{
			$arrConfig[$arrRow['level']] = $arrRow;
		}

		$this->Template->mootoolsnav_config = $arrConfig;
		$this->Template->mootoolsnav_id = $this->cssID[0];
		
		$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/mootoolsnav/html/mootoolsnav.js';
	}
}