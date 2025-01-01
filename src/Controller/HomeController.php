<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\component\Routing\Attribute\Route;

class HomeController
{
  #[Route('/')]
  public function index() {
    return new Response("<h1>Hello, world!</h1>");
  }
}
?>
