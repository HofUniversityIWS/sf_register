<?php
namespace Evoweb\SfRegister\ViewHelpers\Form;

/***************************************************************
 * Copyright notice
 *
 * (c) 2011-15 Sebastian Fischer <typo3@evoweb.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Viewhelper to render a selectbox with values
 * in given steps from start to end value
 * <code title="Usage">
 * {namespace register=Evoweb\SfRegister\ViewHelpers}
 * <register:form.rangeSelect property="day" start="1" end="31"/>
 * </code>
 */
class RangeSelectViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper
{
    /**
     * Value to start range with
     *
     * @var integer
     */
    protected $start = 0;

    /**
     * Value to end range with
     *
     * @var integer
     */
    protected $end = PHP_INT_MAX;

    /**
     * Step to increase value of each option
     *
     * @var integer
     */
    protected $step = 1;

    /**
     * In case of a value lower then 10 and digits
     * defined as 2 the label get prepended with a 0
     *
     * @var integer
     */
    protected $digits = 2;

    /**
     * Initialize arguments.
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerUniversalTagAttributes();
        $this->registerArgument('name', 'string', 'Name of input tag');
        $this->registerArgument('value', 'mixed', 'Value of input tag');
        $this->registerTagAttribute('multiple', 'string', 'if set, multiple select field');
        $this->registerTagAttribute('size', 'string', 'Size of input field');
        $this->registerTagAttribute(
            'disabled',
            'string',
            'Specifies that the input element should be disabled when the page loads'
        );
        $this->registerArgument(
            'property',
            'string',
            'Name of Object Property. If used in conjunction with <f:form object="...">'
            . ',"name" and "value" properties will be ignored.'
        );
        $this->registerArgument(
            'selectAllByDefault',
            'boolean',
            'If specified options are selected if none was set before.',
            false,
            false
        );
        $this->registerArgument(
            'errorClass',
            'string',
            'CSS class to set if there are errors for this view helper',
            false,
            'f3-form-error'
        );
        $this->registerArgument(
            'start',
            'integer',
            'Start value',
            true
        );
        $this->registerArgument(
            'end',
            'integer',
            'End value',
            true
        );
        $this->registerArgument(
            'step',
            'integer',
            'Step value',
            false,
            1
        );
        $this->registerArgument(
            'digits',
            'integer',
            'Digits value',
            false,
            2
        );
    }

    /**
     * Rendering of selectbox
     *
     * @return string
     */
    public function render()
    {
        $this->start = (int)$this->arguments['start'];
        $this->end = (int)$this->arguments['end'];
        $this->step = (int)$this->arguments['step'];
        $this->digits = (int)$this->arguments['digits'];

        return parent::render();
    }

    /**
     * Get values and lables for the options
     *
     * @return array an associative array of options
     */
    protected function getOptions()
    {
        $options = [];

        for ($current = $this->start; $current <= $this->end;) {
            $options[$current] = sprintf('%0' . $this->digits . 's', $current);

            $current += $this->step;
            if ($current > $this->end) {
                break;
            }
        }

        return $options;
    }
}
