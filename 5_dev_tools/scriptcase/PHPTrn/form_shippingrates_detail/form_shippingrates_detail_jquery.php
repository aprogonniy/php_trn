
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
  scEventControl_data["price_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["weightfrom_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["weightto_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["shippingratesid_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["price_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["price_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["weightfrom_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["weightfrom_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["weightto_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["weightto_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["shippingratesid_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["shippingratesid_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
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
  $('#id_sc_field_shippingratesid_' + iSeqRow).bind('blur', function() { sc_form_shippingrates_detail_shippingratesid__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_shippingrates_detail_shippingratesid__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_shippingrates_detail_shippingratesid__onfocus(this, iSeqRow) });
  $('#id_sc_field_weightfrom_' + iSeqRow).bind('blur', function() { sc_form_shippingrates_detail_weightfrom__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_shippingrates_detail_weightfrom__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_shippingrates_detail_weightfrom__onfocus(this, iSeqRow) });
  $('#id_sc_field_weightto_' + iSeqRow).bind('blur', function() { sc_form_shippingrates_detail_weightto__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_shippingrates_detail_weightto__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_shippingrates_detail_weightto__onfocus(this, iSeqRow) });
  $('#id_sc_field_price_' + iSeqRow).bind('blur', function() { sc_form_shippingrates_detail_price__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_shippingrates_detail_price__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_shippingrates_detail_price__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_shippingrates_detail_shippingratesid__onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_detail_validate_shippingratesid_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_shippingratesid__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_shippingrates_detail_shippingratesid__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_weightfrom__onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_detail_validate_weightfrom_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_weightfrom__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_shippingrates_detail_weightfrom__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_weightto__onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_detail_validate_weightto_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_weightto__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_shippingrates_detail_weightto__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_price__onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_detail_validate_price_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_shippingrates_detail_price__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_shippingrates_detail_price__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

