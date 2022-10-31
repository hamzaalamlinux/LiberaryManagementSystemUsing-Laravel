<?php
/** created by hamza alam */
namespace App\Repository\Panelty;

interface IPaneltyRepository
{
  public function  Panelties();
  public  function GetPanelties();
  public function Update($amount);
}
