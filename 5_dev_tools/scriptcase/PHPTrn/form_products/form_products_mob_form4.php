<div id="form_products_mob_form4" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php $sStyleHidden_overview_dumb = ('' == $sStyleHidden_overview) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_overview_dumb" style="<?php echo $sStyleHidden_overview_dumb; ?>"></TD>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['specifications']))
    {
        $this->nm_new_label['specifications'] = "specifications";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $specifications = $this->specifications;
   $sStyleHidden_specifications = '';
   if (isset($this->nmgp_cmp_hidden['specifications']) && $this->nmgp_cmp_hidden['specifications'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['specifications']);
       $sStyleHidden_specifications = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_specifications = 'display: none;';
   $sStyleReadInp_specifications = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['specifications']) && $this->nmgp_cmp_readonly['specifications'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['specifications']);
       $sStyleReadLab_specifications = '';
       $sStyleReadInp_specifications = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['specifications']) && $this->nmgp_cmp_hidden['specifications'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="specifications" value="<?php echo NM_encode_input($specifications) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd" id="hidden_field_data_specifications" style="<?php echo $sStyleHidden_specifications; ?>;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd" style=";;vertical-align: top;padding: 0px"><span id="id_read_on_specifications" style="<?php echo $sStyleReadLab_specifications; ?>"><?php echo $this->specifications; ?></span><span id="id_read_off_specifications" style="<?php echo $sStyleReadInp_specifications; ?>"><textarea id="specifications" name="specifications" cols="50" rows="3" class="mceEditor_specifications" style="width: 100%; height:200px;"><?php echo $this->specifications; ?></textarea>
</span></td><td style="vertical-align: top; padding: 0px 0px 0px 2px"><table class="scFormFieldErrorTable" style="display: none; position: absolute" id="id_error_display_specifications_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_specifications_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
