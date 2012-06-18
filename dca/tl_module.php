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


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['mootoolsnav'] = '{title_legend},name,headline,type;mootoolsnav_config;{nav_legend},levelOffset,showLevel,hardLimit,showProtected;{reference_legend:hide},defineRoot;{template_legend:hide},navigationTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


	
/**
 * Add fields to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['mootoolsnav_config'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_theme']['mootoolsnav'],
	'exclude' 		=> true,
	'inputType' 		=> 'multiColumnWizard',
	'eval' 			=> array
	(
		'columnFields' => array
		(
			'level' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_module']['navigation_level'],
				'inputType'             => 'text',
				'eval' 					=> array('style' => 'width:50px', 'mandatory'=>true, 'rgxp'=>'digit', 'unique'=>true)
			),
			
			'event' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_module']['navigation_event'],
				'inputType'             => 'select',
				'options'            	=> array
				(
					'mouseover'    	=> 'MouseOver',
					'click'       	=> 'Klick',
				),
				'eval' 				=> array('style' => 'width:250px', 'mandatory'=>true)
			),
			
			'direction' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_module']['navigation_direction'],
				'inputType'             => 'select',
				'options'            	=> array
				(
					'bottom'     	=> 'Bottom',
					'right'       => 'Right',
					'left'     	=> 'Left',
					'top'     	=> 'Top',
				),
				'eval' 			=> array('style' => 'width:200px', 'mandatory'=>true)
			),
			
			'keepopen' => array
			(		
					'label'          	=> &$GLOBALS['TL_LANG']['tl_module']['keepopen'],
					'exclude'        	=> true,
					'inputType'  		=> 'checkbox',
					'eval'          	=> array('mandatory'=>true)
			),
 
			
		)
	)
);

