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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_tble_products'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_tble_products'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
<?php
header("X-XSS-Protection: 0");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}

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
 </SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_progressbar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_tiny_mce; ?>/tiny_mce.js"></SCRIPT>
 <SCRIPT type="text/javascript">
 tinyMCE.init({
  mode: "textareas",
  theme: "advanced",
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['description']) && $this->nmgp_cmp_readonly['description'] == 'on')
{
    unset($this->nmgp_cmp_readonly['description']);
?>
   readonly: "true",
<?php
}
$sLangTest = substr($this->Ini->str_lang, 0, 2);
switch ($sLangTest)
{
    case 'ar':
    case 'de':
    case 'en':
    case 'es':
    case 'fr':
    case 'it':
    case 'ja':
    case 'nl':
    case 'pt':
    case 'ru':
    case 'sv':
    case 'zh':
        echo "  language: \"" . $sLangTest . "\",\r\n";
        break;
    default:
        echo "  language: \"en\",\r\n";
        break;
}
?>
  plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
  theme_advanced_buttons1: "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,fontselect,fontsizeselect,forecolor",
  theme_advanced_buttons2: "tablecontrols,link,unlink,emotions,image",
  theme_advanced_buttons3: "",
  theme_advanced_path : false,
  theme_advanced_toolbar_align: "center",
  theme_advanced_toolbar_location: "top",
  editor_selector: "mceEditor_description"
 });
 tinyMCE.init({
  mode: "textareas",
  theme: "advanced",
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['overview']) && $this->nmgp_cmp_readonly['overview'] == 'on')
{
    unset($this->nmgp_cmp_readonly['overview']);
?>
   readonly: "true",
<?php
}
$sLangTest = substr($this->Ini->str_lang, 0, 2);
switch ($sLangTest)
{
    case 'ar':
    case 'de':
    case 'en':
    case 'es':
    case 'fr':
    case 'it':
    case 'ja':
    case 'nl':
    case 'pt':
    case 'ru':
    case 'sv':
    case 'zh':
        echo "  language: \"" . $sLangTest . "\",\r\n";
        break;
    default:
        echo "  language: \"en\",\r\n";
        break;
}
?>
  plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
  theme_advanced_buttons1: "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,fontselect,fontsizeselect,forecolor",
  theme_advanced_buttons2: "tablecontrols,link,unlink,emotions,image",
  theme_advanced_buttons3: "",
  theme_advanced_path : false,
  theme_advanced_toolbar_align: "center",
  theme_advanced_toolbar_location: "top",
  editor_selector: "mceEditor_overview"
 });
 tinyMCE.init({
  mode: "textareas",
  theme: "advanced",
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['specifications']) && $this->nmgp_cmp_readonly['specifications'] == 'on')
{
    unset($this->nmgp_cmp_readonly['specifications']);
?>
   readonly: "true",
<?php
}
$sLangTest = substr($this->Ini->str_lang, 0, 2);
switch ($sLangTest)
{
    case 'ar':
    case 'de':
    case 'en':
    case 'es':
    case 'fr':
    case 'it':
    case 'ja':
    case 'nl':
    case 'pt':
    case 'ru':
    case 'sv':
    case 'zh':
        echo "  language: \"" . $sLangTest . "\",\r\n";
        break;
    default:
        echo "  language: \"en\",\r\n";
        break;
}
?>
  plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
  theme_advanced_buttons1: "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,fontselect,fontsizeselect,forecolor",
  theme_advanced_buttons2: "tablecontrols,link,unlink,emotions,image",
  theme_advanced_buttons3: "",
  theme_advanced_path : false,
  theme_advanced_toolbar_align: "center",
  theme_advanced_toolbar_location: "top",
  editor_selector: "mceEditor_specifications"
 });
 tinyMCE.init({
  mode: "textareas",
  theme: "advanced",
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['acessories']) && $this->nmgp_cmp_readonly['acessories'] == 'on')
{
    unset($this->nmgp_cmp_readonly['acessories']);
?>
   readonly: "true",
<?php
}
$sLangTest = substr($this->Ini->str_lang, 0, 2);
switch ($sLangTest)
{
    case 'ar':
    case 'de':
    case 'en':
    case 'es':
    case 'fr':
    case 'it':
    case 'ja':
    case 'nl':
    case 'pt':
    case 'ru':
    case 'sv':
    case 'zh':
        echo "  language: \"" . $sLangTest . "\",\r\n";
        break;
    default:
        echo "  language: \"en\",\r\n";
        break;
}
?>
  plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
  theme_advanced_buttons1: "bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,fontselect,fontsizeselect,forecolor",
  theme_advanced_buttons2: "tablecontrols,link,unlink,emotions,image",
  theme_advanced_buttons3: "",
  theme_advanced_path : false,
  theme_advanced_toolbar_align: "center",
  theme_advanced_toolbar_location: "top",
  editor_selector: "mceEditor_acessories"
 });
 </SCRIPT>

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_products_mob_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
<?php

include_once('form_products_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
  $(".scBtnGrpClick").find("a").click(function(e){
     e.preventDefault();
  });
  $(".scBtnGrpClick").click(function(){
     var aObj = $(this).find("a"), aHref = aObj.attr("href");
     if ("javascript:" == aHref.substr(0, 11)) {
        eval(aHref.substr(11));
     }
     else {
        aObj.trigger("click");
     }
   }).mouseover(function(){
     $(this).css("cursor", "pointer");
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
     scQuickSearchInit(false, '');
     $('#SC_fast_search_t').listen();
     scQuickSearchKeyUp('t', null);
     scQSInit = false;
   });
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if ('' == sPos || 't' == sPos) scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
     }
   }
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'height': Math.max(oInput.height(), 16) + 'px',
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['recarga'];
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
 include_once("form_products_mob_js0.php");
?>
<script type="text/javascript" src="<?php echo str_replace("{str_idioma}", $this->Ini->str_lang, "../_lib/js/tab_erro_{str_idioma}.js"); ?>"> 
</script> 
<script type="text/javascript"> 
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
<form name="F1" method="post" enctype="multipart/form-data" 
               action="form_products_mob.php" 
               target="_self"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo NM_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php  echo NM_encode_input(session_id()); ?>"> 
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>"> 
<input type="hidden" name="upload_file_flag" value="">
<input type="hidden" name="upload_file_check" value="">
<input type="hidden" name="upload_file_name" value="">
<input type="hidden" name="upload_file_temp" value="">
<input type="hidden" name="upload_file_libs" value="">
<input type="hidden" name="upload_file_height" value="">
<input type="hidden" name="upload_file_width" value="">
<input type="hidden" name="upload_file_aspect" value="">
<input type="hidden" name="upload_file_type" value="">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_products_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_products_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>ERROR</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="550">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['mostra_cab'] != "N"))
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
        	<td id="lin1_col1" class="scFormHeaderFont"><span><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_tble_products'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_tble_products'] . ""; } ?></span></td>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" id="sc_btgp_div_group_2_t">
 <tr><td class="scBtnGrpBackground">
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "nm_move ('novo');", "nm_move ('novo');", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "nm_atualiza ('incluir');", "nm_atualiza ('incluir');", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "" . $this->NM_cancel_insert_new . " document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "nm_atualiza ('alterar');", "nm_atualiza ('alterar');", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "nm_atualiza ('excluir');", "nm_atualiza ('excluir');", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "nm_move ('clone');", "nm_move ('clone');", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
?>
 </td></tr>
</table>
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "window.open('" . $this->url_webhelp. "', '', 'resizable, scrollbars'); ", "", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R") && (!$this->Embutida_call)) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "R") && (!$this->Embutida_call)) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "document.F5.action='" . $nm_url_saida. "'; document.F5.submit();", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R" && (!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call)) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && (!$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "document.F6.action='" . $nm_url_saida. "'; document.F6.submit(); return false;", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['run_iframe'] != "R")
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
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['empty_filter'] = true;
       }
       echo "</td></tr><tr><td align=center>";
       echo "<font face=\"" . $this->Ini->pag_fonte_tipo . "\" color=\"" . $this->Ini->cor_txt_grid . "\" size=\"2\"><b>" . $this->Ini->Nm_lang['lang_errm_empt'] . "</b></font>";
       echo "</td></tr>";
  }
  else
  {
?>
<script type="text/javascript">
var pag_ativa = "form_products_mob_form0";
</script>
<ul class="scTabLine">
<?php
    if ($nmgp_num_form == "form_products_mob_form0")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_products_mob_form0" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_products_mob_form0')">
     <?php echo $this->Ini->Nm_lang['lang_products_fild_name']; ?>
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_products_mob_form1")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_products_mob_form1" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_products_mob_form1')">
     <?php echo $this->Ini->Nm_lang['lang_description']; ?>
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_products_mob_form2")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_products_mob_form2" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_products_mob_form2')">
     <?php echo $this->Ini->Nm_lang['lang_products_fild_picture']; ?>
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_products_mob_form3")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_products_mob_form3" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_products_mob_form3')">
     <?php echo $this->Ini->Nm_lang['lang_overview']; ?>
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_products_mob_form4")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_products_mob_form4" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_products_mob_form4')">
     <?php echo $this->Ini->Nm_lang['lang_specifications']; ?>
    </a>
   </li>
<?php
    if ($nmgp_num_form == "form_products_mob_form5")
    {
        $css_celula = "scTabActive";
    }
    else
    {
        $css_celula = "scTabInactive";
    }
?>
   <li id="id_form_products_mob_form5" class="<?php echo $css_celula; ?>">
    <a href="javascript: sc_exib_ocult_pag ('form_products_mob_form5')">
     <?php echo $this->Ini->Nm_lang['lang_acessories']; ?>
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_products_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><input type="hidden" name="picture_ul_name" id="id_sc_field_picture_ul_name" value="<?php echo NM_encode_input($this->picture_ul_name);?>">
<input type="hidden" name="picture_ul_type" id="id_sc_field_picture_ul_type" value="<?php echo NM_encode_input($this->picture_ul_type);?>">
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['productid']))
    {
        $this->nm_new_label['productid'] = "Productid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $productid = $this->productid;
   $sStyleHidden_productid = '';
   if (isset($this->nmgp_cmp_hidden['productid']) && $this->nmgp_cmp_hidden['productid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['productid']);
       $sStyleHidden_productid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_productid = 'display: none;';
   $sStyleReadInp_productid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['productid']) && $this->nmgp_cmp_readonly['productid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['productid']);
       $sStyleReadLab_productid = '';
       $sStyleReadInp_productid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['productid']) && $this->nmgp_cmp_hidden['productid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="productid" value="<?php echo NM_encode_input($productid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd" id="hidden_field_data_productid" style="<?php echo $sStyleHidden_productid; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_productid"><?php echo $this->nm_new_label['productid']; ?></span></span><br><span id="id_read_on_productid" style=";<?php echo $sStyleReadLab_productid; ?>"><?php echo NM_encode_input($this->productid); ?></span><span id="id_read_off_productid" style="<?php echo $sStyleReadInp_productid; ?>"><input type="hidden" name="productid" value="<?php echo NM_encode_input($productid) . "\">"?><span id="id_ajax_label_productid"><?php echo nl2br($productid); ?></span>
</span></span></td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_productid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_productid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_productid_dumb = ('' == $sStyleHidden_productid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_productid_dumb" style="<?php echo $sStyleHidden_productid_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['name']))
    {
        $this->nm_new_label['name'] = "name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $name = $this->name;
   $sStyleHidden_name = '';
   if (isset($this->nmgp_cmp_hidden['name']) && $this->nmgp_cmp_hidden['name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['name']);
       $sStyleHidden_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_name = 'display: none;';
   $sStyleReadInp_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['name']) && $this->nmgp_cmp_readonly['name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['name']);
       $sStyleReadLab_name = '';
       $sStyleReadInp_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['name']) && $this->nmgp_cmp_hidden['name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="name" value="<?php echo NM_encode_input($name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_name" style="<?php echo $sStyleHidden_name; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_name"><?php echo $this->nm_new_label['name']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['name'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["name"]) &&  $this->nmgp_cmp_readonly["name"] == "on") { 

 ?>
<input type="hidden" name="name" value="<?php echo NM_encode_input($name) . "\">" . $name . ""; ?>
<?php } else { ?>
<span id="id_read_on_name" class="sc-ui-readonly-name" style=";<?php echo $sStyleReadLab_name; ?>"><?php echo NM_encode_input($this->name); ?></span><span id="id_read_off_name" style="white-space: nowrap;<?php echo $sStyleReadInp_name; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_name" type=text name="name" value="<?php echo NM_encode_input($name) ?>"
 size=35 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_name_dumb = ('' == $sStyleHidden_name) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_name_dumb" style="<?php echo $sStyleHidden_name_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['categoryid']))
    {
        $this->nm_new_label['categoryid'] = "Categoryid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $categoryid = $this->categoryid;
   $sStyleHidden_categoryid = '';
   if (isset($this->nmgp_cmp_hidden['categoryid']) && $this->nmgp_cmp_hidden['categoryid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['categoryid']);
       $sStyleHidden_categoryid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_categoryid = 'display: none;';
   $sStyleReadInp_categoryid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['categoryid']) && $this->nmgp_cmp_readonly['categoryid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['categoryid']);
       $sStyleReadLab_categoryid = '';
       $sStyleReadInp_categoryid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['categoryid']) && $this->nmgp_cmp_hidden['categoryid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="categoryid" value="<?php echo NM_encode_input($categoryid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_categoryid" style="<?php echo $sStyleHidden_categoryid; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_categoryid"><?php echo $this->nm_new_label['categoryid']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['categoryid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['categoryid'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["categoryid"]) &&  $this->nmgp_cmp_readonly["categoryid"] == "on") { 

 ?>
<input type="hidden" name="categoryid" value="<?php echo NM_encode_input($categoryid) . "\">" . $categoryid . ""; ?>
<?php } else { ?>
<span id="id_read_on_categoryid" class="sc-ui-readonly-categoryid" style=";<?php echo $sStyleReadLab_categoryid; ?>"><?php echo NM_encode_input($this->categoryid); ?></span><span id="id_read_off_categoryid" style="white-space: nowrap;<?php echo $sStyleReadInp_categoryid; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_categoryid" type=text name="categoryid" value="<?php echo NM_encode_input($categoryid) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['categoryid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['categoryid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_categoryid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_categoryid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_categoryid_dumb = ('' == $sStyleHidden_categoryid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_categoryid_dumb" style="<?php echo $sStyleHidden_categoryid_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['subcategoryid']))
    {
        $this->nm_new_label['subcategoryid'] = "Subcategoryid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $subcategoryid = $this->subcategoryid;
   $sStyleHidden_subcategoryid = '';
   if (isset($this->nmgp_cmp_hidden['subcategoryid']) && $this->nmgp_cmp_hidden['subcategoryid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['subcategoryid']);
       $sStyleHidden_subcategoryid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_subcategoryid = 'display: none;';
   $sStyleReadInp_subcategoryid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['subcategoryid']) && $this->nmgp_cmp_readonly['subcategoryid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['subcategoryid']);
       $sStyleReadLab_subcategoryid = '';
       $sStyleReadInp_subcategoryid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['subcategoryid']) && $this->nmgp_cmp_hidden['subcategoryid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subcategoryid" value="<?php echo NM_encode_input($subcategoryid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_subcategoryid" style="<?php echo $sStyleHidden_subcategoryid; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_subcategoryid"><?php echo $this->nm_new_label['subcategoryid']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['subcategoryid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['subcategoryid'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subcategoryid"]) &&  $this->nmgp_cmp_readonly["subcategoryid"] == "on") { 

 ?>
<input type="hidden" name="subcategoryid" value="<?php echo NM_encode_input($subcategoryid) . "\">" . $subcategoryid . ""; ?>
<?php } else { ?>
<span id="id_read_on_subcategoryid" class="sc-ui-readonly-subcategoryid" style=";<?php echo $sStyleReadLab_subcategoryid; ?>"><?php echo NM_encode_input($this->subcategoryid); ?></span><span id="id_read_off_subcategoryid" style="white-space: nowrap;<?php echo $sStyleReadInp_subcategoryid; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_subcategoryid" type=text name="subcategoryid" value="<?php echo NM_encode_input($subcategoryid) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['subcategoryid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['subcategoryid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_subcategoryid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subcategoryid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_subcategoryid_dumb = ('' == $sStyleHidden_subcategoryid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_subcategoryid_dumb" style="<?php echo $sStyleHidden_subcategoryid_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['price']))
    {
        $this->nm_new_label['price'] = "price";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $price = $this->price;
   $sStyleHidden_price = '';
   if (isset($this->nmgp_cmp_hidden['price']) && $this->nmgp_cmp_hidden['price'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['price']);
       $sStyleHidden_price = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_price = 'display: none;';
   $sStyleReadInp_price = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['price']) && $this->nmgp_cmp_readonly['price'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['price']);
       $sStyleReadLab_price = '';
       $sStyleReadInp_price = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['price']) && $this->nmgp_cmp_hidden['price'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="price" value="<?php echo NM_encode_input($price) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_price" style="<?php echo $sStyleHidden_price; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_price"><?php echo $this->nm_new_label['price']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['price']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['price'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["price"]) &&  $this->nmgp_cmp_readonly["price"] == "on") { 

 ?>
<input type="hidden" name="price" value="<?php echo NM_encode_input($price) . "\">" . $price . ""; ?>
<?php } else { ?>
<span id="id_read_on_price" class="sc-ui-readonly-price" style=";<?php echo $sStyleReadLab_price; ?>"><?php echo NM_encode_input($this->price); ?></span><span id="id_read_off_price" style="white-space: nowrap;<?php echo $sStyleReadInp_price; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:right;" id="id_sc_field_price" type=text name="price" value="<?php echo NM_encode_input($price) ?>"
 size=5 alt="{datatype: 'decimal', maxLength: 10, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['price']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['price']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['price']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_price_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_price_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_price_dumb = ('' == $sStyleHidden_price) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_price_dumb" style="<?php echo $sStyleHidden_price_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['shippingid']))
    {
        $this->nm_new_label['shippingid'] = "Shippingid";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $shippingid = $this->shippingid;
   $sStyleHidden_shippingid = '';
   if (isset($this->nmgp_cmp_hidden['shippingid']) && $this->nmgp_cmp_hidden['shippingid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['shippingid']);
       $sStyleHidden_shippingid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_shippingid = 'display: none;';
   $sStyleReadInp_shippingid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['shippingid']) && $this->nmgp_cmp_readonly['shippingid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['shippingid']);
       $sStyleReadLab_shippingid = '';
       $sStyleReadInp_shippingid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['shippingid']) && $this->nmgp_cmp_hidden['shippingid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="shippingid" value="<?php echo NM_encode_input($shippingid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_shippingid" style="<?php echo $sStyleHidden_shippingid; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_shippingid"><?php echo $this->nm_new_label['shippingid']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['shippingid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['shippingid'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["shippingid"]) &&  $this->nmgp_cmp_readonly["shippingid"] == "on") { 

 ?>
<input type="hidden" name="shippingid" value="<?php echo NM_encode_input($shippingid) . "\">" . $shippingid . ""; ?>
<?php } else { ?>
<span id="id_read_on_shippingid" class="sc-ui-readonly-shippingid" style=";<?php echo $sStyleReadLab_shippingid; ?>"><?php echo NM_encode_input($this->shippingid); ?></span><span id="id_read_off_shippingid" style="white-space: nowrap;<?php echo $sStyleReadInp_shippingid; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_shippingid" type=text name="shippingid" value="<?php echo NM_encode_input($shippingid) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['shippingid']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['shippingid']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_shippingid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_shippingid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_shippingid_dumb = ('' == $sStyleHidden_shippingid) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_shippingid_dumb" style="<?php echo $sStyleHidden_shippingid_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['taxable']))
    {
        $this->nm_new_label['taxable'] = "taxable";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $taxable = $this->taxable;
   $sStyleHidden_taxable = '';
   if (isset($this->nmgp_cmp_hidden['taxable']) && $this->nmgp_cmp_hidden['taxable'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['taxable']);
       $sStyleHidden_taxable = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_taxable = 'display: none;';
   $sStyleReadInp_taxable = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['taxable']) && $this->nmgp_cmp_readonly['taxable'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['taxable']);
       $sStyleReadLab_taxable = '';
       $sStyleReadInp_taxable = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['taxable']) && $this->nmgp_cmp_hidden['taxable'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="taxable" value="<?php echo NM_encode_input($taxable) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_taxable" style="<?php echo $sStyleHidden_taxable; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_taxable"><?php echo $this->nm_new_label['taxable']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['taxable']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['taxable'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["taxable"]) &&  $this->nmgp_cmp_readonly["taxable"] == "on") { 

 if ("Y" == $this->taxable) { $taxable_look = "Yes";} 
 if ("N" == $this->taxable) { $taxable_look = "No";} 
?>
<input type="hidden" name="taxable" value="<?php echo NM_encode_input($taxable) . "\">" . $taxable_look . ""; ?>
<?php } else { ?>

<?php

 if ("Y" == $this->taxable) { $taxable_look = "Yes";} 
 if ("N" == $this->taxable) { $taxable_look = "No";} 
?>
<span id="id_read_on_taxable" style=";<?php echo $sStyleReadLab_taxable; ?>"><?php echo NM_encode_input($taxable_look); ?></span><span id="id_read_off_taxable" style="<?php echo $sStyleReadInp_taxable; ?>"><div id="idAjaxRadio_taxable">
<TABLE><TR>
  <TD class="scFormDataFontOdd" style=";">    <input  type=radio name="taxable" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_taxable'][] = 'Y'; ?>
<?php  if ("Y" == $this->taxable)  { echo " checked" ;} ?>  onClick="" >Yes</TD>
  <TD class="scFormDataFontOdd" style=";">    <input  type=radio name="taxable" value="N"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_taxable'][] = 'N'; ?>
<?php  if ("N" == $this->taxable)  { echo " checked" ;} ?>  onClick="" >No</TD>
</TR></TABLE>
</div>
</span><?php  }?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_taxable_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_taxable_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_taxable_dumb = ('' == $sStyleHidden_taxable) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_taxable_dumb" style="<?php echo $sStyleHidden_taxable_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['onhandquantity']))
    {
        $this->nm_new_label['onhandquantity'] = "Onhandquantity";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $onhandquantity = $this->onhandquantity;
   $sStyleHidden_onhandquantity = '';
   if (isset($this->nmgp_cmp_hidden['onhandquantity']) && $this->nmgp_cmp_hidden['onhandquantity'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['onhandquantity']);
       $sStyleHidden_onhandquantity = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_onhandquantity = 'display: none;';
   $sStyleReadInp_onhandquantity = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['onhandquantity']) && $this->nmgp_cmp_readonly['onhandquantity'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['onhandquantity']);
       $sStyleReadLab_onhandquantity = '';
       $sStyleReadInp_onhandquantity = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['onhandquantity']) && $this->nmgp_cmp_hidden['onhandquantity'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="onhandquantity" value="<?php echo NM_encode_input($onhandquantity) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_onhandquantity" style="<?php echo $sStyleHidden_onhandquantity; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_onhandquantity"><?php echo $this->nm_new_label['onhandquantity']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['onhandquantity']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['onhandquantity'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["onhandquantity"]) &&  $this->nmgp_cmp_readonly["onhandquantity"] == "on") { 

 ?>
<input type="hidden" name="onhandquantity" value="<?php echo NM_encode_input($onhandquantity) . "\">" . $onhandquantity . ""; ?>
<?php } else { ?>
<span id="id_read_on_onhandquantity" class="sc-ui-readonly-onhandquantity" style=";<?php echo $sStyleReadLab_onhandquantity; ?>"><?php echo NM_encode_input($this->onhandquantity); ?></span><span id="id_read_off_onhandquantity" style="white-space: nowrap;<?php echo $sStyleReadInp_onhandquantity; ?>">
 <input class="sc-js-input scFormObjectOdd" style="text-align:left;" id="id_sc_field_onhandquantity" type=text name="onhandquantity" value="<?php echo NM_encode_input($onhandquantity) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['onhandquantity']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['onhandquantity']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_onhandquantity_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_onhandquantity_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php $sStyleHidden_onhandquantity_dumb = ('' == $sStyleHidden_onhandquantity) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_onhandquantity_dumb" style="<?php echo $sStyleHidden_onhandquantity_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['measure']))
   {
       $this->nm_new_label['measure'] = "measure";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $measure = $this->measure;
   $sStyleHidden_measure = '';
   if (isset($this->nmgp_cmp_hidden['measure']) && $this->nmgp_cmp_hidden['measure'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['measure']);
       $sStyleHidden_measure = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_measure = 'display: none;';
   $sStyleReadInp_measure = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['measure']) && $this->nmgp_cmp_readonly['measure'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['measure']);
       $sStyleReadLab_measure = '';
       $sStyleReadInp_measure = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['measure']) && $this->nmgp_cmp_hidden['measure'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="measure" value="<?php echo NM_encode_input($this->measure) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_measure" style="<?php echo $sStyleHidden_measure; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat" style=";" ><span id="id_label_measure"><?php echo $this->nm_new_label['measure']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['measure']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['php_cmp_required']['measure'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["measure"]) &&  $this->nmgp_cmp_readonly["measure"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array(); 
    }

   $old_value_productid = $this->productid;
   $old_value_categoryid = $this->categoryid;
   $old_value_subcategoryid = $this->subcategoryid;
   $old_value_price = $this->price;
   $old_value_shippingid = $this->shippingid;
   $old_value_onhandquantity = $this->onhandquantity;
   $this->nm_tira_formatacao();


   $unformatted_value_productid = $this->productid;
   $unformatted_value_categoryid = $this->categoryid;
   $unformatted_value_subcategoryid = $this->subcategoryid;
   $unformatted_value_price = $this->price;
   $unformatted_value_shippingid = $this->shippingid;
   $unformatted_value_onhandquantity = $this->onhandquantity;

   $nm_comando = "SELECT measureId, description 
FROM measure 
ORDER BY description";

   $this->productid = $old_value_productid;
   $this->categoryid = $old_value_categoryid;
   $this->subcategoryid = $old_value_subcategoryid;
   $this->price = $old_value_price;
   $this->shippingid = $old_value_shippingid;
   $this->onhandquantity = $old_value_onhandquantity;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'][] = $rs->fields[0];
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
   $measure_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->measure_1))
          {
              foreach ($this->measure_1 as $tmp_measure)
              {
                  if (trim($tmp_measure) === trim($cadaselect[1])) { $measure_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->measure) === trim($cadaselect[1])) { $measure_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="measure" value="<?php echo NM_encode_input($measure) . "\">" . $measure_look . ""; ?>
<?php } else { ?>
 
<?php  
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'] = array(); 
    }

   $old_value_productid = $this->productid;
   $old_value_categoryid = $this->categoryid;
   $old_value_subcategoryid = $this->subcategoryid;
   $old_value_price = $this->price;
   $old_value_shippingid = $this->shippingid;
   $old_value_onhandquantity = $this->onhandquantity;
   $this->nm_tira_formatacao();


   $unformatted_value_productid = $this->productid;
   $unformatted_value_categoryid = $this->categoryid;
   $unformatted_value_subcategoryid = $this->subcategoryid;
   $unformatted_value_price = $this->price;
   $unformatted_value_shippingid = $this->shippingid;
   $unformatted_value_onhandquantity = $this->onhandquantity;

   $nm_comando = "SELECT measureId, description 
FROM measure 
ORDER BY description";

   $this->productid = $old_value_productid;
   $this->categoryid = $old_value_categoryid;
   $this->subcategoryid = $old_value_subcategoryid;
   $this->price = $old_value_price;
   $this->shippingid = $old_value_shippingid;
   $this->onhandquantity = $old_value_onhandquantity;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'][] = $rs->fields[0];
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
   $measure_look = ""; 
   $todo = explode("?@?", trim($nmgp_def_dados)) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->measure_1))
          {
              foreach ($this->measure_1 as $tmp_measure)
              {
                  if (trim($tmp_measure) === trim($cadaselect[1])) { $measure_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->measure) === trim($cadaselect[1])) { $measure_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_measure\" style=\";" .  $sStyleReadLab_measure . "\">" . NM_encode_input($measure_look) . "</span><span id=\"id_read_off_measure\" style=\"" . $sStyleReadInp_measure . "\">";
   echo " <span id=\"idAjaxSelect_measure\"><select class=\"sc-js-input scFormObjectOdd\" style=\";\" id=\"id_sc_field_measure\" name=\"measure\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_products_mob']['Lookup_measure'][] = ''; 
   echo "  <option value=\"\"></option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->measure) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->measure)) 
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
 ?>&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "bform_lookuplink", "", "", "fldedt_measure", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->link_form_measure_edit . "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_url_saida=modal&nmgp_parms=sc_redir_atualiz*scinok*scout&nmgp_outra_jan=true&nm_evt_ret_edit=do_ajax_form_products_mob_lkpedt_refresh_measure&KeepThis=true&TB_iframe=true&height=350&width=300&modal=true", "");?>
<?php    echo "</span>";
?> 
<?php  }?>
&nbsp;<br /><?php echo $this->Ini->Nm_lang['lang_help_add_measure'] ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_measure_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_measure_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
