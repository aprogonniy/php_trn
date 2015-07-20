
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
  scEventControl_data["shippingid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["weightfrom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["weightto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["price" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["shippingid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["shippingid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["weightfrom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["weightfrom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["weightto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["weightto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["price" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["price" + iSeqRow]["change"]) {
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
  $('#id_sc_field_shippingid' + iSeqRow).bind('blur', function() { sc_form_shippingrates_shippingid_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_shippingrates_shippingid_onfocus(this, iSeqRow) });
  $('#id_sc_field_weightfrom' + iSeqRow).bind('blur', function() { sc_form_shippingrates_weightfrom_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_shippingrates_weightfrom_onfocus(this, iSeqRow) });
  $('#id_sc_field_weightto' + iSeqRow).bind('blur', function() { sc_form_shippingrates_weightto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_shippingrates_weightto_onfocus(this, iSeqRow) });
  $('#id_sc_field_price' + iSeqRow).bind('blur', function() { sc_form_shippingrates_price_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_shippingrates_price_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_shippingrates_shippingid_onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_validate_shippingid();
  scCssBlur(oThis);
}

function sc_form_shippingrates_shippingid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_shippingrates_weightfrom_onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_validate_weightfrom();
  scCssBlur(oThis);
}

function sc_form_shippingrates_weightfrom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_shippingrates_weightto_onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_validate_weightto();
  scCssBlur(oThis);
}

function sc_form_shippingrates_weightto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_shippingrates_price_onblur(oThis, iSeqRow) {
  do_ajax_form_shippingrates_validate_price();
  scCssBlur(oThis);
}

function sc_form_shippingrates_price_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

