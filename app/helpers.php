<?php

function flash($title = null, $message = null) {

	$flash = app('App\Http\Flash');

	if (func_num_args() == 0) {
		return $flash;
	}

	return $flash->info($title, $message);
}

function flyer_path(App\Flyer $flyer) {

	return $flyer->zip . '/' . str_replace(' ', '-', $flyer->street);

}

function link_to($body, $path, $type) {

	if(is_object($path)) {

		$action = '/' . $path->getTable();	

		if(in_array($type, ['PUT', 'PATCH', 'DELETE'])) {
			$action .= '/' . $path->getKey();
		}

	} else {
		$action = $path;
	}

	$csrf = csrf_field();
		// $method_field = method_field('DELETE');	
	return <<<EOT


		<form method="POST" action="{$action}">
			<input type="hidden" name="_method" value="{$type}">
			$csrf

			<button type="submit">{$body}</button>
		</form>

EOT;
}