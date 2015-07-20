<?php
class form_cart_form extends form_cart_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_mycart'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_mycart'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
<?php
include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
?>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_cart_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
<?php

include_once('form_cart_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).load(function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_cart_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form name="F1" method="post" 
               action="form_cart.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo NM_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<?php
$_SESSION['scriptcase']['error_span_title']['form_cart'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_cart'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['mostra_cab'] != "N"))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; background-color:#FFFFFF; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_mycart'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_mycart'] . ""; } ?></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


    ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['productid_']) && $this->nmgp_cmp_hidden['productid_'] == 'off') { $sStyleHidden_productid_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['productid_']) || $this->nmgp_cmp_hidden['productid_'] == 'on') {
      if (!isset($this->nm_new_label['productid_'])) {
          $this->nm_new_label['productid_'] = "" . $this->Ini->Nm_lang['lang_cart_fild_productid'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_productid_" style="text-align:left;vertical-align:middle;<?php echo $sStyleHidden_productid_; ?>" > <?php echo $this->Ini->Nm_lang['lang_cart_fild_productid'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['quantity_']) && $this->nmgp_cmp_hidden['quantity_'] == 'off') { $sStyleHidden_quantity_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['quantity_']) || $this->nmgp_cmp_hidden['quantity_'] == 'on') {
      if (!isset($this->nm_new_label['quantity_'])) {
          $this->nm_new_label['quantity_'] = "" . $this->Ini->Nm_lang['lang_cart_fild_quantity'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_quantity_" style=";<?php echo $sStyleHidden_quantity_; ?>" > <?php echo $this->Ini->Nm_lang['lang_cart_fild_quantity'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['vl_unit_']) && $this->nmgp_cmp_hidden['vl_unit_'] == 'off') { $sStyleHidden_vl_unit_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['vl_unit_']) || $this->nmgp_cmp_hidden['vl_unit_'] == 'on') {
      if (!isset($this->nm_new_label['vl_unit_'])) {
          $this->nm_new_label['vl_unit_'] = "" . $this->Ini->Nm_lang['lang_cart_unit_price'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_vl_unit_" style="text-align:right;<?php echo $sStyleHidden_vl_unit_; ?>" > <?php echo $this->Ini->Nm_lang['lang_cart_unit_price'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['total_']) && $this->nmgp_cmp_hidden['total_'] == 'off') { $sStyleHidden_total_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['total_']) || $this->nmgp_cmp_hidden['total_'] == 'on') {
      if (!isset($this->nm_new_label['total_'])) {
          $this->nm_new_label['total_'] = "" . $this->Ini->Nm_lang['lang_cart_total'] . ""; } ?>

    <TD class="scFormLabelOddMult" id="hidden_field_label_total_" style="text-align:right;<?php echo $sStyleHidden_total_; ?>" > <?php echo $this->Ini->Nm_lang['lang_cart_total'] ?> <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_cart);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_cart = $this->form_vert_form_cart;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_cart))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_form_cart as $sc_seq_vert => $sc_lixo)
   {
       $this->cartid_ = $this->form_vert_form_cart[$sc_seq_vert]['cartid_'];
       $this->session_id_ = $this->form_vert_form_cart[$sc_seq_vert]['session_id_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['productid_'] = true;
           $this->nmgp_cmp_readonly['quantity_'] = true;
           $this->nmgp_cmp_readonly['vl_unit_'] = true;
           $this->nmgp_cmp_readonly['total_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['productid_']) || $this->nmgp_cmp_readonly['productid_'] != "on") {$this->nmgp_cmp_readonly['productid_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['quantity_']) || $this->nmgp_cmp_readonly['quantity_'] != "on") {$this->nmgp_cmp_readonly['quantity_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['vl_unit_']) || $this->nmgp_cmp_readonly['vl_unit_'] != "on") {$this->nmgp_cmp_readonly['vl_unit_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['total_']) || $this->nmgp_cmp_readonly['total_'] != "on") {$this->nmgp_cmp_readonly['total_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->productid_ = $this->form_vert_form_cart[$sc_seq_vert]['productid_']; 
       $productid_ = $this->productid_; 
       $sStyleHidden_productid_ = '';
       if (isset($sCheckRead_productid_))
       {
           unset($sCheckRead_productid_);
       }
       if (isset($this->nmgp_cmp_readonly['productid_']))
       {
           $sCheckRead_productid_ = $this->nmgp_cmp_readonly['productid_'];
       }
       if (isset($this->nmgp_cmp_hidden['productid_']) && $this->nmgp_cmp_hidden['productid_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['productid_']);
           $sStyleHidden_productid_ = 'display: none;';
       }
       $bTestReadOnly_productid_ = true;
       $sStyleReadLab_productid_ = 'display: none;';
       $sStyleReadInp_productid_ = '';
       if (isset($this->nmgp_cmp_readonly['productid_']) && $this->nmgp_cmp_readonly['productid_'] == 'on')
       {
           $bTestReadOnly_productid_ = false;
           unset($this->nmgp_cmp_readonly['productid_']);
           $sStyleReadLab_productid_ = '';
           $sStyleReadInp_productid_ = 'display: none;';
       }
       $this->quantity_ = $this->form_vert_form_cart[$sc_seq_vert]['quantity_']; 
       $quantity_ = $this->quantity_; 
       $sStyleHidden_quantity_ = '';
       if (isset($sCheckRead_quantity_))
       {
           unset($sCheckRead_quantity_);
       }
       if (isset($this->nmgp_cmp_readonly['quantity_']))
       {
           $sCheckRead_quantity_ = $this->nmgp_cmp_readonly['quantity_'];
       }
       if (isset($this->nmgp_cmp_hidden['quantity_']) && $this->nmgp_cmp_hidden['quantity_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['quantity_']);
           $sStyleHidden_quantity_ = 'display: none;';
       }
       $bTestReadOnly_quantity_ = true;
       $sStyleReadLab_quantity_ = 'display: none;';
       $sStyleReadInp_quantity_ = '';
       if (isset($this->nmgp_cmp_readonly['quantity_']) && $this->nmgp_cmp_readonly['quantity_'] == 'on')
       {
           $bTestReadOnly_quantity_ = false;
           unset($this->nmgp_cmp_readonly['quantity_']);
           $sStyleReadLab_quantity_ = '';
           $sStyleReadInp_quantity_ = 'display: none;';
       }
       $this->vl_unit_ = $this->form_vert_form_cart[$sc_seq_vert]['vl_unit_']; 
       $vl_unit_ = $this->vl_unit_; 
       $sStyleHidden_vl_unit_ = '';
       if (isset($sCheckRead_vl_unit_))
       {
           unset($sCheckRead_vl_unit_);
       }
       if (isset($this->nmgp_cmp_readonly['vl_unit_']))
       {
           $sCheckRead_vl_unit_ = $this->nmgp_cmp_readonly['vl_unit_'];
       }
       if (isset($this->nmgp_cmp_hidden['vl_unit_']) && $this->nmgp_cmp_hidden['vl_unit_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['vl_unit_']);
           $sStyleHidden_vl_unit_ = 'display: none;';
       }
       $bTestReadOnly_vl_unit_ = true;
       $sStyleReadLab_vl_unit_ = 'display: none;';
       $sStyleReadInp_vl_unit_ = '';
       if (isset($this->nmgp_cmp_readonly['vl_unit_']) && $this->nmgp_cmp_readonly['vl_unit_'] == 'on')
       {
           $bTestReadOnly_vl_unit_ = false;
           unset($this->nmgp_cmp_readonly['vl_unit_']);
           $sStyleReadLab_vl_unit_ = '';
           $sStyleReadInp_vl_unit_ = 'display: none;';
       }
       $this->total_ = $this->form_vert_form_cart[$sc_seq_vert]['total_']; 
       $total_ = $this->total_; 
       $sStyleHidden_total_ = '';
       if (isset($sCheckRead_total_))
       {
           unset($sCheckRead_total_);
       }
       if (isset($this->nmgp_cmp_readonly['total_']))
       {
           $sCheckRead_total_ = $this->nmgp_cmp_readonly['total_'];
       }
       if (isset($this->nmgp_cmp_hidden['total_']) && $this->nmgp_cmp_hidden['total_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['total_']);
           $sStyleHidden_total_ = 'display: none;';
       }
       $bTestReadOnly_total_ = true;
       $sStyleReadLab_total_ = 'display: none;';
       $sStyleReadInp_total_ = '';
       if (isset($this->nmgp_cmp_readonly['total_']) && $this->nmgp_cmp_readonly['total_'] == 'on')
       {
           $bTestReadOnly_total_ = false;
           unset($this->nmgp_cmp_readonly['total_']);
           $sStyleReadLab_total_ = '';
           $sStyleReadInp_total_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_botoes['delete'] == "on" && $this->nmgp_opcao != "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_botoes['update'] == "on" && $this->nmgp_opcao != "novo") {
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_cart_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_cart_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cart_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_cart_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_cart_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_cart_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['productid_']) && $this->nmgp_cmp_hidden['productid_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="productid_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($this->productid_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_productid_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_productid_; ?>text-align:left;vertical-align:middle;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style="text-align:left;vertical-align:middle;padding: 0px">
<?php if ($bTestReadOnly_productid_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["productid_"]) &&  $this->nmgp_cmp_readonly["productid_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array(); 
    }

   $old_value_quantity_ = $this->quantity_;
   $old_value_vl_unit_ = $this->vl_unit_;
   $old_value_total_ = $this->total_;
   $this->nm_tira_formatacao();


   $unformatted_value_quantity_ = $this->quantity_;
   $unformatted_value_vl_unit_ = $this->vl_unit_;
   $unformatted_value_total_ = $this->total_;

   $nm_comando = "select productid, name 
from products 
order by name";

   $this->quantity_ = $old_value_quantity_;
   $this->vl_unit_ = $old_value_vl_unit_;
   $this->total_ = $old_value_total_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $productid__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->productid__1))
          {
              foreach ($this->productid__1 as $tmp_productid_)
              {
                  if (trim($tmp_productid_) === trim($cadaselect[1])) { $productid__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->productid_) === trim($cadaselect[1])) { $productid__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="productid_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($productid_) . "\">" . $productid__look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'] = array(); 
    }

   $old_value_quantity_ = $this->quantity_;
   $old_value_vl_unit_ = $this->vl_unit_;
   $old_value_total_ = $this->total_;
   $this->nm_tira_formatacao();


   $unformatted_value_quantity_ = $this->quantity_;
   $unformatted_value_vl_unit_ = $this->vl_unit_;
   $unformatted_value_total_ = $this->total_;

   $nm_comando = "select productid, name 
from products 
order by name";

   $this->quantity_ = $old_value_quantity_;
   $this->vl_unit_ = $old_value_vl_unit_;
   $this->total_ = $old_value_total_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['Lookup_productid_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0 ; 
   $todo = explode("?@?", $nmgp_def_dados) ; 
   $x = 0; 
   $productid__look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->productid__1))
          {
              foreach ($this->productid__1 as $tmp_productid_)
              {
                  if (trim($tmp_productid_) === trim($cadaselect[1])) { $productid__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->productid_) === trim($cadaselect[1])) { $productid__look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_productid_" . $sc_seq_vert . "\" style=\"text-align:left;vertical-align:middle;" .  $sStyleReadLab_productid_ . "\">" . NM_encode_input($productid__look) . "</span><span id=\"id_read_off_productid_" . $sc_seq_vert . "\" style=\"" . $sStyleReadInp_productid_ . "\">";
   echo " <span id=\"idAjaxSelect_productid_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult\" style=\";\" id=\"id_sc_field_productid_" . $sc_seq_vert . "\" name=\"productid_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->productid_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->productid_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_productid_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_productid_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['quantity_']) && $this->nmgp_cmp_hidden['quantity_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="quantity_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($quantity_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_quantity_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_quantity_; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult" style=";;vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_quantity_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["quantity_"]) &&  $this->nmgp_cmp_readonly["quantity_"] == "on") { 

 ?>
<input type="hidden" name="quantity_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($quantity_) . "\">" . $quantity_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_quantity_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-quantity_<?php echo $sc_seq_vert ?>" style=";<?php echo $sStyleReadLab_quantity_; ?>"><?php echo NM_encode_input($this->quantity_); ?></span><span id="id_read_off_quantity_<?php echo $sc_seq_vert ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_quantity_; ?>">
 <input class="sc-js-input scFormObjectOddMult" style="text-align:right;" id="id_sc_field_quantity_<?php echo $sc_seq_vert ?>" type=text name="quantity_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($quantity_) ?>"
 size=30 maxlength=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['quantity_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['quantity_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_quantity_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_quantity_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['vl_unit_']) && $this->nmgp_cmp_hidden['vl_unit_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vl_unit_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($vl_unit_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_vl_unit_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_vl_unit_; ?>text-align:right;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult" style="text-align:right;;vertical-align: top;padding: 0px"><input type="hidden" name="vl_unit_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($vl_unit_); ?>"><span id="id_ajax_label_vl_unit_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($vl_unit_); ?></span>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_vl_unit_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vl_unit_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['total_']) && $this->nmgp_cmp_hidden['total_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="total_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($total_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult" id="hidden_field_data_total_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_total_; ?>text-align:right;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult" style="text-align:right;;vertical-align: top;padding: 0px"><input type="hidden" name="total_<?php echo $sc_seq_vert ?>" value="<?php echo NM_encode_input($total_); ?>"><span id="id_ajax_label_total_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($total_); ?></span>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_total_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_total_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_productid_))
       {
           $this->nmgp_cmp_readonly['productid_'] = $sCheckRead_productid_;
       }
       if ('display: none;' == $sStyleHidden_productid_)
       {
           $this->nmgp_cmp_hidden['productid_'] = 'off';
       }
       if (isset($sCheckRead_quantity_))
       {
           $this->nmgp_cmp_readonly['quantity_'] = $sCheckRead_quantity_;
       }
       if ('display: none;' == $sStyleHidden_quantity_)
       {
           $this->nmgp_cmp_hidden['quantity_'] = 'off';
       }
       if (isset($sCheckRead_vl_unit_))
       {
           $this->nmgp_cmp_readonly['vl_unit_'] = $sCheckRead_vl_unit_;
       }
       if ('display: none;' == $sStyleHidden_vl_unit_)
       {
           $this->nmgp_cmp_hidden['vl_unit_'] = 'off';
       }
       if (isset($sCheckRead_total_))
       {
           $this->nmgp_cmp_readonly['total_'] = $sCheckRead_total_;
       }
       if ('display: none;' == $sStyleHidden_total_)
       {
           $this->nmgp_cmp_hidden['total_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_cart = $guarda_form_vert_form_cart;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div> 
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo NM_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
       <?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if ($NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_1";
        echo "<img id=\"NM_sep_1\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['buy_now'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "buy_now", "sc_btn_buy_now()", "sc_btn_buy_now()", "sc_buy_now_bot", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (isset($this->NMSC_modal) && $this->NMSC_modal == "ok") {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_cart");
 parent.scAjaxDetailHeight("form_cart", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailHeight("form_cart", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cart']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
