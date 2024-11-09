<?php

namespace Drupal\custom_image_upload\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

class ImageUploadController extends ControllerBase {
  public function uploadImage(Request $request) {

    $uploaded_file = $request->files->get('file');
    if (!$uploaded_file) {
      return new JsonResponse(['error' => 'No file uploaded.'], 400);
    }

    $data = file_get_contents($uploaded_file->getPathname());
    $filename = $uploaded_file->getClientOriginalName();

    $file = File::create([
      'uri' => 'public://' . $filename,
    ]);

    file_put_contents($file->getFileUri(), $data);
    $file->setPermanent();
    $file->save();

    if ($file) {

        $file_url = \Drupal::service('file_url_generator')->generateAbsoluteString($file->getFileUri());

        return new JsonResponse([
          'message' => 'File uploaded successfully.',
          'file_id' => $file->id(),
          'file_uuid' => $file->uuid(),
          'file_url' => $file_url,
      ]);
      
    } else {
      return new JsonResponse(['error' => 'File upload failed.'], 500);
    }
  }
}
