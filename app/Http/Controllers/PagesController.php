<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex() {
		return view('pages.welcome');
	}

	public function getAbout() {
		$first = 'Digital';
		$last = 'SOP';

		$fullname = $first . " " . $last;
		$email = 'bpo@telkom.co.id';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		return view('pages.about')->withData($data);
	}

	public function getLogin() {
		return view('pages.login');
	}

}