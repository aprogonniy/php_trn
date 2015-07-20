<?php

class grid_products_dependent_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $xls_dados;
   var $xls_workbook;
   var $xls_col;
   var $xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $arquivo;
   var $tit_doc;
   //---- 
   function grid_products_dependent_xls()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_products_dependent.php"; 
      set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
      require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
      $this->xls_col    = 0;
      $this->nm_data    = new nm_data("en_us");
      $this->arquivo    = "sc_xls";
      $this->arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->arquivo   .= "_grid_products_dependent";
      $this->arquivo   .= ".xls";
      $this->tit_doc    = "grid_products_dependent.xls";
      $this->xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      $this->xls_dados = new PHPExcel();
      $this->xls_dados->setActiveSheetIndex(0);
      $this->Nm_ActiveSheet = $this->xls_dados->getActiveSheet();
      if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
      {
          $this->Nm_ActiveSheet->setRightToLeft(true);
      }
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_products_dependent']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_products_dependent']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_products_dependent']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->categoryid = $Busca_temp['categoryid']; 
          $tmp_pos = strpos($this->categoryid, "##@@");
          if ($tmp_pos !== false)
          {
              $this->categoryid = substr($this->categoryid, 0, $tmp_pos);
          }
          $this->shippingid = $Busca_temp['shippingid']; 
          $tmp_pos = strpos($this->shippingid, "##@@");
          if ($tmp_pos !== false)
          {
              $this->shippingid = substr($this->shippingid, 0, $tmp_pos);
          }
          $this->measure = $Busca_temp['measure']; 
          $tmp_pos = strpos($this->measure, "##@@");
          if ($tmp_pos !== false)
          {
              $this->measure = substr($this->measure, 0, $tmp_pos);
          }
          $this->name = $Busca_temp['name']; 
          $tmp_pos = strpos($this->name, "##@@");
          if ($tmp_pos !== false)
          {
              $this->name = substr($this->name, 0, $tmp_pos);
          }
          $this->taxable = $Busca_temp['taxable']; 
          $tmp_pos = strpos($this->taxable, "##@@");
          if ($tmp_pos !== false)
          {
              $this->taxable = substr($this->taxable, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['xls_name']))
      {
          $this->arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['xls_name'];
          $this->tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['xls_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['xls_name']);
          $this->xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT name, price, picture, onhandquantity, categoryid, subcategoryid, shippingid, measure, productid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT name, price, picture, onhandquantity, categoryid, subcategoryid, shippingid, measure, productid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT name, price, picture, onhandquantity, categoryid, subcategoryid, shippingid, measure, productid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT name, price, picture, onhandquantity, categoryid, subcategoryid, shippingid, measure, productid from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT name, price, LOTOFILE(picture, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as picture, onhandquantity, categoryid, subcategoryid, shippingid, measure, productid from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT name, price, picture, onhandquantity, categoryid, subcategoryid, shippingid, measure, productid from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->New_label['name'] = "" . $this->Ini->Nm_lang['lang_products_fild_name'] . "";
      $this->New_label['price'] = "" . $this->Ini->Nm_lang['lang_products_fild_price'] . "";
      $this->New_label['picture'] = "" . $this->Ini->Nm_lang['lang_products_fild_picture'] . "";
      $this->New_label['onhandquantity'] = "" . $this->Ini->Nm_lang['lang_products_fild_onhandquantity'] . "";
      $this->New_label['productid'] = "" . $this->Ini->Nm_lang['lang_products_fild_productid'] . "";
      $this->New_label['shippingid'] = "" . $this->Ini->Nm_lang['lang_products_fild_shippingid'] . "";
      $this->New_label['measure'] = "" . $this->Ini->Nm_lang['lang_products_fild_measure'] . "";
      $this->New_label['categoryid'] = "" . $this->Ini->Nm_lang['lang_products_fild_categoryid'] . "";
      $this->New_label['subcategoryid'] = "" . $this->Ini->Nm_lang['lang_products_fild_subcategoryid'] . "";
      $this->New_label['taxable'] = "" . $this->Ini->Nm_lang['lang_products_fild_taxable'] . "";

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['name'])) ? $this->New_label['name'] : ""; 
          if ($Cada_col == "name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->xls_col))->setAutoSize(true);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['price'])) ? $this->New_label['price'] : ""; 
          if ($Cada_col == "price" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->xls_col))->setAutoSize(true);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['picture'])) ? $this->New_label['picture'] : ""; 
          if ($Cada_col == "picture" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getFont()->setBold(true);
              $this->xls_col++;
          }
          $SC_Label = (isset($this->New_label['onhandquantity'])) ? $this->New_label['onhandquantity'] : ""; 
          if ($Cada_col == "onhandquantity" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
             if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = mb_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
              $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $SC_Label);
              $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getFont()->setBold(true);
              $this->Nm_ActiveSheet->getColumnDimension($this->calc_cell($this->xls_col))->setAutoSize(true);
              $this->xls_col++;
          }
      } 
      while (!$rs->EOF)
      {
         $this->xls_col = 0;
         $this->xls_row++;
         $this->name = $rs->fields[0] ;  
         $this->price = $rs->fields[1] ;  
         $this->price =  str_replace(",", ".", $this->price);
         $this->price = (strpos(strtolower($this->price), "e")) ? (float)$this->price : $this->price; 
         $this->price = (string)$this->price;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->picture = "";  
              if (is_file($rs_grid->fields[2])) 
              { 
                  $this->picture = file_get_contents($rs_grid->fields[2]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->picture = $this->Db->BlobDecode($rs->fields[2]) ;  
         } 
         else
         { 
             $this->picture = $rs->fields[2] ;  
         } 
         $this->onhandquantity = $rs->fields[3] ;  
         $this->onhandquantity = (string)$this->onhandquantity;
         $this->categoryid = $rs->fields[4] ;  
         $this->categoryid = (string)$this->categoryid;
         $this->subcategoryid = $rs->fields[5] ;  
         $this->subcategoryid = (string)$this->subcategoryid;
         $this->shippingid = $rs->fields[6] ;  
         $this->shippingid = (string)$this->shippingid;
         $this->measure = $rs->fields[7] ;  
         $this->measure = (string)$this->measure;
         $this->productid = $rs->fields[8] ;  
         $this->productid = (string)$this->productid;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if (isset($this->NM_Row_din[$this->xls_row]))
         { 
             $this->Nm_ActiveSheet->getRowDimension($this->xls_row)->setRowHeight($this->NM_Row_din[$this->xls_row]);
         } 
         $rs->MoveNext();
      }
      if (isset($this->NM_Col_din))
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      $rs->Close();
      $objWriter = new PHPExcel_Writer_Excel5($this->xls_dados);
      $objWriter->save($this->xls_f);
   }
   //----- name
   function NM_export_name()
   {
         $this->name = html_entity_decode($this->name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->name = strip_tags($this->name);
         if (!NM_is_utf8($this->name))
         {
             $this->name = mb_convert_encoding($this->name, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->name);
         $this->xls_col++;
   }
   //----- price
   function NM_export_price()
   {
         if (!NM_is_utf8($this->price))
         {
             $this->price = mb_convert_encoding($this->price, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->price))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getNumberFormat()->setFormatCode('#,##0.00');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->price);
         $this->xls_col++;
   }
   //----- picture
   function NM_export_picture()
   {
         if (empty($this->picture))
         { 
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, ' ');
             $this->xls_col++;
             return;
         } 
         $in_picture = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_picture_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".jpg";
         $_SESSION['scriptcase']['sc_num_img']++;
         $arq_picture = fopen($in_picture, "w");
         if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
         { 
             $nm_tmp = nm_conv_img_access(substr($this->picture, 0, 12));
             if (substr($nm_tmp, 0, 4) == "*nm*")
             { 
                 $this->picture = nm_conv_img_access($this->picture);
             } 
         } 
         if (substr($this->picture, 0, 4) == "*nm*")
         { 
             $this->picture = substr($this->picture, 4);
             $this->picture = base64_decode($this->picture);
         } 
         $img_pos_bm = strpos($this->picture, "BM");
         if (!$img_pos_bm === FALSE && $img_pos_bm == 78)
         { 
             $this->picture = substr($this->picture, $img_pos_bm);
         } 
         fwrite($arq_picture, $this->picture);
         fclose($arq_picture);
         $md5_picture  = md5($this->picture);
         if (is_file($in_picture) && !$this->Ini->Gd_missing)
         { 
             $out_picture = $this->Ini->path_imag_temp . "/sc_picture_" . $md5_picture . ".jpg";
             $tmp_picture = fopen($in_picture, "r");
             $reg_picture = fread($tmp_picture, filesize($in_picture));
             fclose($tmp_picture);
             $arq_picture = fopen($this->Ini->root . $out_picture, "w");
             fwrite($arq_picture, $reg_picture);
             fclose($arq_picture);
             $in_picture = $this->Ini->root . $out_picture;
             $sc_obj_img = new nm_trata_img($in_picture);
             $sc_obj_img->setWidth(100);
             $sc_obj_img->setHeight(100);
             $sc_obj_img->setManterAspecto(true);
             $sc_obj_img->createImg($this->Ini->root . $out_picture);
         } 
         if (is_file($in_picture))
         { 
             $sc_obj_img = new nm_trata_img($in_picture);
             $nm_image_altura  = $sc_obj_img->getHeight();
             $nm_image_largura = $sc_obj_img->getWidth();
             $objDrawing = new PHPExcel_Worksheet_Drawing();
             $objDrawing->setPath($in_picture);
             $objDrawing->setHeight($nm_image_altura);
             $col = $this->calc_cell($this->xls_col);
             $objDrawing->setCoordinates($col . $this->xls_row);
             $objDrawing->setWorksheet($this->Nm_ActiveSheet);
             if (!isset($this->NM_Col_din[$col]) || $this->NM_Col_din[$col] < $nm_image_largura)
             { 
                 $this->NM_Col_din[$col] = $nm_image_largura;
             } 
             if (!isset($this->NM_Row_din[$this->xls_row]) || $this->NM_Row_din[$this->xls_row] < $nm_image_altura)
             { 
                 $this->NM_Row_din[$this->xls_row] = $nm_image_altura;
             } 
         } 
         else 
         { 
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, ' ');
         } 
         $this->xls_col++;
   }
   //----- onhandquantity
   function NM_export_onhandquantity()
   {
         if (!NM_is_utf8($this->onhandquantity))
         {
             $this->onhandquantity = mb_convert_encoding($this->onhandquantity, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->onhandquantity))
         {
             $this->Nm_ActiveSheet->getStyle($this->calc_cell($this->xls_col) . $this->xls_row)->getNumberFormat()->setFormatCode('#,##0');
         }
         $this->Nm_ActiveSheet->setCellValue($this->calc_cell($this->xls_col) . $this->xls_row, $this->onhandquantity);
         $this->xls_col++;
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['xls_file']);
      if (is_file($this->xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_products_dependent']['xls_file'] = $this->xls_f;
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_tble_products'] ?> :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<form name="Fdown" method="get" action="grid_products_dependent_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="nm_tit_doc" value="<?php echo NM_encode_input($this->tit_doc); ?>"> 
<input type="hidden" name="nm_name_doc" value="<?php echo NM_encode_input($this->Ini->path_imag_temp . "/" . $this->arquivo) ?>"> 
</form>
<FORM name="F0" method=post action="grid_products_dependent.php"> 
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
