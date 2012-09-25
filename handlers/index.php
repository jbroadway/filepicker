<?php

/**
 * Very simple Filepicker.io integration.
 *
 * Usage:
 *
 * 1. Add your API key to `apps/filepicker/conf/config.php`.
 *
 * 2. Create an upload field like this:
 *
 *     {! filepicker/my_field_name?mimetypes=image/* !}
 *
 * To enable drag & drop, use:
 *
 *     {! filepicker/my_field_name?dragdrop=1 !}
 *
 * Or from any handler, use:
 *
 *     echo $this->run ('filepicker/my_field_name', array (
 *         'mimetypes' => 'image/*',
 *         'option-services'  => 'COMPUTER,DROPBOX,GOOGLE_DRIVE,URL',
 *         'dragdrop'  => true,
 *         'onchange'  => 'console.log(event)'
 *     ));
 *
 * See here for all available options:
 *
 * https://developers.filepicker.io/docs/web/#widgets-open
 *
 * Note that you can skip the `data-fp-` prefix on option names.
 */

$page->add_script ('http://api.filepicker.io/v0/filepicker.js', 'tail');
$page->add_script (
	sprintf (
		'<script>filepicker.setKey("%s");</script>',
		$appconf['General']['api_key']
	),
	'tail'
);

if (isset ($data['dragdrop'])) {
	$dragdrop = true;
	unset ($data['dragdrop']);
} else {
	$dragdrop = false;
}

if (isset ($data['onchange'])) {
	$onchange = $data['onchange'];
	unset ($data['onchange']);
} else {
	$onchange = false;
}

echo $tpl->render (
	'filepicker/index',
	array (
		'field_name' => count ($this->params) ? $this->params[0] : 'attachment',
		'dragdrop' => $dragdrop,
		'onchange' => $onchange,
		'options' => $data
	)
);

?>