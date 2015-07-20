
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
  scEventControl_data["customerid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["orderitens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["order_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["customerid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["customerid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["orderitens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["orderitens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["order_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["order_date" + iSeqRow]["change"]) {
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
  $('#id_sc_field_customerid' + iSeqRow).bind('blur', function() { sc_form_orders_customerid_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_orders_customerid_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_orders_status_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_orders_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_orders_total_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_orders_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_orderitens' + iSeqRow).bind('blur', function() { sc_form_orders_orderitens_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_orders_orderitens_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_orders_customerid_onblur(oThis, iSeqRow) {
  do_ajax_form_orders_validate_customerid();
  scCssBlur(oThis);
}

function sc_form_orders_customerid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_orders_status_onblur(oThis, iSeqRow) {
  do_ajax_form_orders_validate_status();
  scCssBlur(oThis);
}

function sc_form_orders_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_orders_total_onblur(oThis, iSeqRow) {
  do_ajax_form_orders_validate_total();
  scCssBlur(oThis);
}

function sc_form_orders_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_orders_orderitens_onblur(oThis, iSeqRow) {
  do_ajax_form_orders_validate_orderitens();
  scCssBlur(oThis);
}

function sc_form_orders_orderitens_onfocus(oThis, iSeqRow) {
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

