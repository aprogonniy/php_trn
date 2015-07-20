
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
  scEventControl_data["productid_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["quantity_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["vl_unit_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["total_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["productid_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["productid_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["quantity_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["quantity_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vl_unit_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vl_unit_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total_" + iSeqRow]["change"]) {
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
  if ("quantity_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    return;
  }
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
  $('#id_sc_field_productid_' + iSeqRow).bind('blur', function() { sc_form_cart_productid__onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cart_productid__onfocus(this, iSeqRow) });
  $('#id_sc_field_quantity_' + iSeqRow).bind('blur', function() { sc_form_cart_quantity__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cart_quantity__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cart_quantity__onfocus(this, iSeqRow) });
  $('#id_sc_field_vl_unit_' + iSeqRow).bind('blur', function() { sc_form_cart_vl_unit__onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cart_vl_unit__onfocus(this, iSeqRow) });
  $('#id_sc_field_total_' + iSeqRow).bind('blur', function() { sc_form_cart_total__onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cart_total__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cart_productid__onblur(oThis, iSeqRow) {
  do_ajax_form_cart_validate_productid_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cart_productid__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cart_quantity__onblur(oThis, iSeqRow) {
  do_ajax_form_cart_validate_quantity_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cart_quantity__onchange(oThis, iSeqRow) {
  do_ajax_form_cart_event_quantity__onchange(iSeqRow);
}

function sc_form_cart_quantity__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cart_vl_unit__onblur(oThis, iSeqRow) {
  do_ajax_form_cart_validate_vl_unit_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cart_vl_unit__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_cart_total__onblur(oThis, iSeqRow) {
  do_ajax_form_cart_validate_total_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_cart_total__onfocus(oThis, iSeqRow) {
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

