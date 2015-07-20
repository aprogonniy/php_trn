<?php
class grid_country_lookup
{
//  
   function lookup_tax(&$tax) 
   {
      $conteudo = "" ; 
      if ($tax == "Y")
      { 
          $conteudo = "Yes";
      } 
      if ($tax == "N")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $tax = $conteudo; 
      } 
   }  
}
?>
