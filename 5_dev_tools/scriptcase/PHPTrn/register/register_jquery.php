
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
  scEventControl_data["login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["name_new" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["email_new" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["password_new" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["password_new_confirm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["name_new" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name_new" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_new" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_new" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password_new" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password_new" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password_new_confirm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password_new_confirm" + iSeqRow]["change"]) {
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
  $('#id_sc_field_login' + iSeqRow).bind('blur', function() { sc_register_login_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_register_login_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_register_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_password' + iSeqRow).bind('blur', function() { sc_register_password_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_register_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_name_new' + iSeqRow).bind('blur', function() { sc_register_name_new_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_register_name_new_onfocus(this, iSeqRow) });
  $('#id_sc_field_email_new' + iSeqRow).bind('blur', function() { sc_register_email_new_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_register_email_new_onfocus(this, iSeqRow) });
  $('#id_sc_field_password_new' + iSeqRow).bind('blur', function() { sc_register_password_new_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_register_password_new_onfocus(this, iSeqRow) });
  $('#id_sc_field_password_new_confirm' + iSeqRow).bind('blur', function() { sc_register_password_new_confirm_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_register_password_new_confirm_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_register_login_onblur(oThis, iSeqRow) {
  do_ajax_register_validate_login();
  scCssBlur(oThis);
}

function sc_register_login_onchange(oThis, iSeqRow) {
  lookup_login();
}

function sc_register_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_register_password_onblur(oThis, iSeqRow) {
  do_ajax_register_validate_password();
  scCssBlur(oThis);
}

function sc_register_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_register_name_new_onblur(oThis, iSeqRow) {
  do_ajax_register_validate_name_new();
  scCssBlur(oThis);
}

function sc_register_name_new_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_register_email_new_onblur(oThis, iSeqRow) {
  do_ajax_register_validate_email_new();
  scCssBlur(oThis);
}

function sc_register_email_new_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_register_password_new_onblur(oThis, iSeqRow) {
  do_ajax_register_validate_password_new();
  scCssBlur(oThis);
}

function sc_register_password_new_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_register_password_new_confirm_onblur(oThis, iSeqRow) {
  do_ajax_register_validate_password_new_confirm();
  scCssBlur(oThis);
}

function sc_register_password_new_confirm_onfocus(oThis, iSeqRow) {
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

