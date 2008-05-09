<?php

class Ztask_View_Helper_HtmlLinkArray
{
    /**
     * Generates a 'link' html.
     *
     * @param  string $name The form element name for which the label is being generated
     * @param  string $value The label text
     * @param  array $attribs Form element attributes (used to determine if disabled)
     * @return string The element XHTML.
     */
    public function htmlLinkArray(array $param )
    {
        return
        	'<A href="' . $param['url'] .
        	'" ALT = "' . $param['alt'] .
        	'">' . $param['text'] . '</A>';
    }
}
