
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
  scEventControl_data["description" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["states" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["address1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["address2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["country" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["phone1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["phone2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["postalcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["description" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["description" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["states" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["states" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["postalcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["postalcode" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("country" + iSeq == fieldName) {
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
  $('#id_sc_field_description' + iSeqRow).bind('blur', function() { sc_form_address_restore_description_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_address_restore_description_onfocus(this, iSeqRow) });
  $('#id_sc_field_address1' + iSeqRow).bind('blur', function() { sc_form_address_restore_address1_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_address_restore_address1_onfocus(this, iSeqRow) });
  $('#id_sc_field_address2' + iSeqRow).bind('blur', function() { sc_form_address_restore_address2_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_address_restore_address2_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_address_restore_city_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_address_restore_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_states' + iSeqRow).bind('blur', function() { sc_form_address_restore_states_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_address_restore_states_onfocus(this, iSeqRow) });
  $('#id_sc_field_country' + iSeqRow).bind('blur', function() { sc_form_address_restore_country_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_address_restore_country_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_address_restore_country_onfocus(this, iSeqRow) });
  $('#id_sc_field_postalcode' + iSeqRow).bind('blur', function() { sc_form_address_restore_postalcode_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_address_restore_postalcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone1' + iSeqRow).bind('blur', function() { sc_form_address_restore_phone1_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_address_restore_phone1_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone2' + iSeqRow).bind('blur', function() { sc_form_address_restore_phone2_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_address_restore_phone2_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_address_restore_description_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_description();
  scCssBlur(oThis);
}

function sc_form_address_restore_description_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_address1_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_address1();
  scCssBlur(oThis);
}

function sc_form_address_restore_address1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_address2_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_address2();
  scCssBlur(oThis);
}

function sc_form_address_restore_address2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_city_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_city();
  scCssBlur(oThis);
}

function sc_form_address_restore_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_states_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_states();
  scCssBlur(oThis);
}

function sc_form_address_restore_states_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_country_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_country();
  scCssBlur(oThis);
}

function sc_form_address_restore_country_onchange(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_refresh_country();
  do_ajax_form_address_restore_mob_event_country_onchange();
}

function sc_form_address_restore_country_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_postalcode_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_postalcode();
  scCssBlur(oThis);
}

function sc_form_address_restore_postalcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_phone1_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_phone1();
  scCssBlur(oThis);
}

function sc_form_address_restore_phone1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_address_restore_phone2_onblur(oThis, iSeqRow) {
  do_ajax_form_address_restore_mob_validate_phone2();
  scCssBlur(oThis);
}

function sc_form_address_restore_phone2_onfocus(oThis, iSeqRow) {
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
