<div id="form_products_dependent_form2" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['picture']))
    {
        $this->nm_new_label['picture'] = "" . $this->Ini->Nm_lang['lang_products_fild_picture'] . "";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $picture = $this->picture;
   $sStyleHidden_picture = '';
   if (isset($this->nmgp_cmp_hidden['picture']) && $this->nmgp_cmp_hidden['picture'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['picture']);
       $sStyleHidden_picture = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_picture = 'display: none;';
   $sStyleReadInp_picture = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['picture']) && $this->nmgp_cmp_readonly['picture'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['picture']);
       $sStyleReadLab_picture = '';
       $sStyleReadInp_picture = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['picture']) && $this->nmgp_cmp_hidden['picture'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="picture" value="<?php echo NM_encode_input($picture) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_picture" style="<?php echo $sStyleHidden_picture; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px">
 <script>var var_ajax_img_picture = '<?php echo $out_picture; ?>';</script><input type="hidden" name="temp_out_picture" value="<?php echo NM_encode_input($out_picture); ?>" /><?php if (!empty($out_picture)) {  echo "<a  href=\"javascript:nm_mostra_img(var_ajax_img_picture, '" . $this->nmgp_return_img['picture'][0] . "', '" . $this->nmgp_return_img['picture'][1] . "')\"><img id=\"id_ajax_img_picture\" border=\"0\" src=\"$out_picture\"></a>"; } else {  echo "<img id=\"id_ajax_img_picture\" border=\"0\" style=\"display: none\">"; } ?><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["picture"]) &&  $this->nmgp_cmp_readonly["picture"] == "on") { 

 ?>
<img id=\"picture_img_uploading\" style=\"display: none\" border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" /><input type="hidden" name="picture" value="<?php echo NM_encode_input($picture) . "\">" . $picture . ""; ?>
<?php } else { ?>
<span id="id_read_off_picture" style="white-space: nowrap;<?php echo $sStyleReadInp_picture; ?>">
 <input class="sc-js-input scFormObjectOdd" style=";" type="file" name="picture[]" id="id_sc_field_picture" onchange="<?php if ($this->nmgp_opcao == "novo") {echo "if (document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]']) { document.F1.elements['sc_check_vert[" . $sc_seq_vert . "]'].checked = true }"; }?>" alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"><span id="chk_ajax_img_picture"<?php if ($this->nmgp_opcao == "novo" || empty($picture)) { echo " style=\"display: none\""; } ?>> <input type=checkbox name="picture_limpa" value="<?php echo $picture_limpa . '" '; if ($picture_limpa == "S"){echo "checked ";} ?> onclick="this.value = ''; if (this.checked){ this.value = 'S'};"><?php echo $this->Ini->Nm_lang['lang_btns_dele_hint']; ?> &nbsp;</span><img id="picture_img_uploading" style="display: none" border="0" src="<?php echo $this->Ini->path_icones; ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" /><div id="id_sc_dragdrop_picture" class="scFormDataDragNDrop"><?php echo $this->Ini->Nm_lang['lang_errm_mu_dragimg'] ?></div>
<div id="id_img_loader_picture" class="progress progress-success progress-striped active scProgressBarStart" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="display: none"><div class="bar scProgressBarLoading">&nbsp;</div></div><img id="id_ajax_loader_picture" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" style="display: none" /></span><?php } ?>
</td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_picture_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_picture_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
