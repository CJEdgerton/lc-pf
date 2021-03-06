<?php

namespace App;

use App\AddPhotoToFlyer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Mockery as m;

class AddPhotoToFlyerTest extends \TestCase
{

	/** @test */
	function it_processes_a_form_to_add_a_photo_to_a_flyer()
	{
		$flyer = factory(Flyer::class)->create();

		$file = m::mock(UploadedFile::class, [
			'getClientOriginalName' => 'foo',
			'getClientOriginalExtension' => 'jpg'
		]);

		$file->shouldReceive('move')
			->once()
			->with('flyer_data/photos', 'nowfoo.jpg ');

		$thumbnail = m::mock(Thumbnail::class);

		$thumbnail->shouldReceive('make')
					->once()
					->with('flyer_data/photos/nowfoo.jpg', 'flyer_data/photos/tn-nowfoo.jpg');

		$form = new AddPhotoToFlyer($flyer, $file, $thumbnail);

		$form->save(); 

		$this->assertCount(1, $flyer->photos);
	}
}

function time() {
	return 'now';
}

function sha1($path)
{
	return $path;
}