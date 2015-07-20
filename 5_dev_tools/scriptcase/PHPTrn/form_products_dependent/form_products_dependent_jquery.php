
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (0 < $oField.length) {
    switch ($oField[0].name) {
      case 'productid':
      case 'name':
      case 'categoryid':
      case 'subcategoryid':
      case 'price':
      case 'shippingid':
      case 'taxable':
      case 'onhandquantity':
      case 'measure':
        sc_exib_ocult_pag('form_products_dependent_form0');
        break;
      case 'description':
        sc_exib_ocult_pag('form_products_dependent_form1');
        break;
      case 'picture':
        sc_exib_ocult_pag('form_products_dependent_form2');
        break;
      case 'overview':
        sc_exib_ocult_pag('form_products_dependent_form3');
        break;
      case 'specifications':
        sc_exib_ocult_pag('form_products_dependent_form4');
        break;
      case 'acessories':
        sc_exib_ocult_pag('form_products_dependent_form5');
        break;
    }
  }

  if (false == scSetFocusOnField($oField) && 0 < $("#id_ac_" + sField).length) {
    scSetFocusOnField($("#id_ac_" + sField));
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if (0 < $oField.length && 0 < $oField[0].offsetHeight && 0 < $oField[0].offsetWidth && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["productid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["categoryid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["subcategoryid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["price" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["shippingid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["taxable" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["onhandquantity" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["measure" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["description" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["picture" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["overview" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["specifications" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["acessories" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["prod_active" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["productid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["productid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["categoryid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["categoryid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subcategoryid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subcategoryid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["price" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["price" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["shippingid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["shippingid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["taxable" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["taxable" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["onhandquantity" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["onhandquantity" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["measure" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["measure" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["overview" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["overview" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["specifications" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["specifications" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acessories" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acessories" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["prod_active" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prod_active" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_productid' + iSeqRow).bind('blur', function() { sc_form_products_dependent_productid_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_products_dependent_productid_onfocus(this, iSeqRow) });
  $('#id_sc_field_shippingid' + iSeqRow).bind('blur', function() { sc_form_products_dependent_shippingid_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_products_dependent_shippingid_onfocus(this, iSeqRow) });
  $('#id_sc_field_measure' + iSeqRow).bind('blur', function() { sc_form_products_dependent_measure_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_products_dependent_measure_onfocus(this, iSeqRow) });
  $('#id_sc_field_categoryid' + iSeqRow).bind('blur', function() { sc_form_products_dependent_categoryid_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_products_dependent_categoryid_onfocus(this, iSeqRow) });
  $('#id_sc_field_subcategoryid' + iSeqRow).bind('blur', function() { sc_form_products_dependent_subcategoryid_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_products_dependent_subcategoryid_onfocus(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_form_products_dependent_name_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_products_dependent_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_description' + iSeqRow).bind('blur', function() { sc_form_products_dependent_description_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_products_dependent_description_onfocus(this, iSeqRow) });
  $('#id_sc_field_picture' + iSeqRow).bind('blur', function() { sc_form_products_dependent_picture_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_products_dependent_picture_onfocus(this, iSeqRow) });
  $('#id_sc_field_price' + iSeqRow).bind('blur', function() { sc_form_products_dependent_price_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_products_dependent_price_onfocus(this, iSeqRow) });
  $('#id_sc_field_taxable' + iSeqRow).bind('blur', function() { sc_form_products_dependent_taxable_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_products_dependent_taxable_onfocus(this, iSeqRow) });
  $('#id_sc_field_onhandquantity' + iSeqRow).bind('blur', function() { sc_form_products_dependent_onhandquantity_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_products_dependent_onhandquantity_onfocus(this, iSeqRow) });
  $('#id_sc_field_overview' + iSeqRow).bind('blur', function() { sc_form_products_dependent_overview_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_products_dependent_overview_onfocus(this, iSeqRow) });
  $('#id_sc_field_specifications' + iSeqRow).bind('blur', function() { sc_form_products_dependent_specifications_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_products_dependent_specifications_onfocus(this, iSeqRow) });
  $('#id_sc_field_acessories' + iSeqRow).bind('blur', function() { sc_form_products_dependent_acessories_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_products_dependent_acessories_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_products_dependent_productid_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_productid();
  scCssBlur(oThis);
}

function sc_form_products_dependent_productid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_shippingid_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_shippingid();
  scCssBlur(oThis);
}

function sc_form_products_dependent_shippingid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_measure_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_measure();
  scCssBlur(oThis);
}

function sc_form_products_dependent_measure_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_categoryid_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_categoryid();
  scCssBlur(oThis);
}

function sc_form_products_dependent_categoryid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_subcategoryid_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_subcategoryid();
  scCssBlur(oThis);
}

function sc_form_products_dependent_subcategoryid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_name_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_name();
  scCssBlur(oThis);
}

function sc_form_products_dependent_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_description_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_description();
  scCssBlur(oThis);
}

function sc_form_products_dependent_description_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_picture_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_products_dependent_picture_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_products_dependent_price_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_price();
  scCssBlur(oThis);
}

function sc_form_products_dependent_price_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_taxable_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_taxable();
  scCssBlur(oThis);
}

function sc_form_products_dependent_taxable_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_onhandquantity_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_onhandquantity();
  scCssBlur(oThis);
}

function sc_form_products_dependent_onhandquantity_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_overview_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_overview();
  scCssBlur(oThis);
}

function sc_form_products_dependent_overview_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_specifications_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_specifications();
  scCssBlur(oThis);
}

function sc_form_products_dependent_specifications_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_products_dependent_acessories_onblur(oThis, iSeqRow) {
  do_ajax_form_products_dependent_validate_acessories();
  scCssBlur(oThis);
}

function sc_form_products_dependent_acessories_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_picture" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_products_dependent_ul_save.php",
    dropZone: $("#hidden_field_data_picture" + iSeqRow),
    formData: function() {
      return [
        {name: 'app_dir', value: '<?php echo $this->Ini->path_aplicacao; ?>'},
        {name: 'app_name', value: 'form_products_dependent'},
        {name: 'upload_dir', value: '<?php echo $this->Ini->root . $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_url', value: '<?php echo $this->Ini->path_imag_temp; ?>/'},
        {name: 'upload_type', value: 'single'},
        {name: 'param_name', value: 'picture' + iSeqRow},
        {name: 'upload_file_height', value: '0'},
        {name: 'upload_file_width', value: '0'},
        {name: 'upload_file_aspect', value: 'S'},
        {name: 'upload_file_type', value: 'I'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_picture" + iSeqRow);
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_picture" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, thumbDisplay, checkDisplay, var_ajax_img_thumb;
      if (data.result[0].body) {
        fileData = $.parseJSON(data.result[0].body.innerText);
      }
      else {
        fileData = eval(data.result);
      }
      $("#id_sc_field_picture" + iSeqRow).val("");
      $("#id_sc_field_picture_ul_name" + iSeqRow).val(fileData[0].sc_random_prot);
      $("#id_sc_field_picture_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_picture = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_random_prot;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_picture) ? "none" : "";
      $("#id_ajax_img_picture" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_picture" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_picture) {
        document.F1.temp_out_picture.value = var_ajax_img_thumb;
        document.F1.temp_out1_picture.value = var_ajax_img_picture;
      }
      else if (document.F1.temp_out_picture) {
        document.F1.temp_out_picture.value = var_ajax_img_picture;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_picture" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_picture" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      $("#txt_ajax_img_picture" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_picture" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_picture" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_picture" + iSeqRow).hide();
      }
    }
  });

} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

