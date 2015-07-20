<?php

class grid_orderitens_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $arquivo;
   var $tit_doc;
   var $delim_dados;
   var $delim_line;
   var $delim_col;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function grid_orderitens_csv()
   {
      $this->nm_data   = new nm_data("en_us");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
     global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_orderitens.php" ; 
      $this->arquivo     = "sc_csv";
      $this->arquivo    .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo    .= "_grid_orderitens";
      $this->arquivo    .= ".csv";
      $this->tit_doc    = "grid_orderitens.csv";
      $this->delim_dados = "\"";
      $this->delim_col   = ";";
      $this->delim_line  = "\r\n";
   }

   //----- 
   function grava_arquivo()
   {
     global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_orderitens']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_orderitens']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_orderitens']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->orderid = $Busca_temp['orderid']; 
          $tmp_pos = strpos($this->orderid, "##@@");
          if ($tmp_pos !== false)
          {
              $this->orderid = substr($this->orderid, 0, $tmp_pos);
          }
          $this->productid = $Busca_temp['productid']; 
          $tmp_pos = strpos($this->productid, "##@@");
          if ($tmp_pos !== false)
          {
              $this->productid = substr($this->productid, 0, $tmp_pos);
          }
          $this->quantity = $Busca_temp['quantity']; 
          $tmp_pos = strpos($this->quantity, "##@@");
          if ($tmp_pos !== false)
          {
              $this->quantity = substr($this->quantity, 0, $tmp_pos);
          }
          $this->unitprice = $Busca_temp['unitprice']; 
          $tmp_pos = strpos($this->unitprice, "##@@");
          if ($tmp_pos !== false)
          {
              $this->unitprice = substr($this->unitprice, 0, $tmp_pos);
          }
          $this->total = $Busca_temp['total']; 
          $tmp_pos = strpos($this->total, "##@@");
          if ($tmp_pos !== false)
          {
              $this->total = substr($this->total, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['csv_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['csv_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['csv_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['csv_name']);
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT productid, quantity, unitprice, total, orderid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT productid, quantity, unitprice, total, orderid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT productid, quantity, unitprice, total, orderid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT productid, quantity, unitprice, total, orderid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT productid, quantity, unitprice, total, orderid from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT productid, quantity, unitprice, total, orderid from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['productid'] = "" . $this->Ini->Nm_lang['lang_orderitens_fild_productid'] . "";
      $this->New_label['quantity'] = "" . $this->Ini->Nm_lang['lang_orderitens_fild_quantity'] . "";
      $this->New_label['unitprice'] = "" . $this->Ini->Nm_lang['lang_orderitens_fild_unitprice'] . "";
      $this->New_label['total'] = "" . $this->Ini->Nm_lang['lang_orderitens_fild_total'] . "";
      $this->New_label['orderid'] = "" . $this->Ini->Nm_lang['lang_orderitens_fild_orderid'] . "";

      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo, "w");
      while (!$rs->EOF)
      {
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->productid = $rs->fields[0] ;  
         $this->productid = (string)$this->productid;
         $this->quantity = $rs->fields[1] ;  
         $this->quantity = (string)$this->quantity;
         $this->unitprice = $rs->fields[2] ;  
         $this->unitprice =  str_replace(",", ".", $this->unitprice);
         $this->unitprice = (strpos(strtolower($this->unitprice), "e")) ? (float)$this->unitprice : $this->unitprice; 
         $this->unitprice = (string)$this->unitprice;
         $this->total = $rs->fields[3] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->orderid = $rs->fields[4] ;  
         $this->orderid = (string)$this->orderid;
         //----- lookup - productid
         $this->look_productid = $this->productid; 
         $this->Lookup->lookup_productid($this->look_productid, $this->productid) ; 
         $this->look_productid = ($this->look_productid == "&nbsp;") ? "" : $this->look_productid; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);

      $rs->Close();
   }
   //----- productid
   function NM_export_productid()
   {
         nmgp_Form_Num_Val($this->look_productid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->look_productid);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- quantity
   function NM_export_quantity()
   {
         nmgp_Form_Num_Val($this->quantity, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->quantity);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- unitprice
   function NM_export_unitprice()
   {
         nmgp_Form_Num_Val($this->unitprice, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->unitprice);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }
   //----- total
   function NM_export_total()
   {
         nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->delim_col : "";
      $conteudo = str_replace($this->delim_dados, $this->delim_dados . $this->delim_dados, $this->total);
      $this->csv_registro .= $col_sep . $this->delim_dados . $conteudo . $this->delim_dados;
      $this->NM_prim_col++;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_orderitens']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - <?php echo $this->Ini->Nm_lang['lang_tble_orderitens'] ?> :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">CSV</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_orderitens_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="grid_orderitens.php"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
