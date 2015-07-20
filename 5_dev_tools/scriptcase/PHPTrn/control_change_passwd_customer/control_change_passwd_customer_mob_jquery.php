
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
  scEventControl_data["new_password1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["new_password2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["new_password1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["new_password1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["new_password2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["new_password2" + iSeqRow]["change"]) {
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
  $('#id_sc_field_new_password1' + iSeqRow).bind('blur', function() { sc_control_change_passwd_customer_new_password1_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_change_passwd_customer_new_password1_onfocus(this, iSeqRow) });
  $('#id_sc_field_new_password2' + iSeqRow).bind('blur', function() { sc_control_change_passwd_customer_new_password2_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_change_passwd_customer_new_password2_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_change_passwd_customer_new_password1_onblur(oThis, iSeqRow) {
  do_ajax_control_change_passwd_customer_mob_validate_new_password1();
  scCssBlur(oThis);
}

function sc_control_change_passwd_customer_new_password1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_change_passwd_customer_new_password2_onblur(oThis, iSeqRow) {
  do_ajax_control_change_passwd_customer_mob_validate_new_password2();
  scCssBlur(oThis);
}

function sc_control_change_passwd_customer_new_password2_onfocus(oThis, iSeqRow) {
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

