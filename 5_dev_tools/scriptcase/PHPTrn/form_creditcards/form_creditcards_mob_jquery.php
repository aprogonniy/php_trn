
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
  scEventControl_data["cardtypeid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["expirationdate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cardnumber" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cardholder" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["securitycode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["country" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["state" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["city" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["address1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["address2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["postalcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["cardtypeid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cardtypeid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["expirationdate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["expirationdate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cardnumber" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cardnumber" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cardholder" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cardholder" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["securitycode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["securitycode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["state" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["city" + iSeqRow]["change"]) {
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
  $('#id_sc_field_cardtypeid' + iSeqRow).bind('blur', function() { sc_form_creditcards_cardtypeid_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_creditcards_cardtypeid_onfocus(this, iSeqRow) });
  $('#id_sc_field_expirationdate' + iSeqRow).bind('blur', function() { sc_form_creditcards_expirationdate_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_creditcards_expirationdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_cardnumber' + iSeqRow).bind('blur', function() { sc_form_creditcards_cardnumber_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_creditcards_cardnumber_onfocus(this, iSeqRow) });
  $('#id_sc_field_cardholder' + iSeqRow).bind('blur', function() { sc_form_creditcards_cardholder_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_creditcards_cardholder_onfocus(this, iSeqRow) });
  $('#id_sc_field_securitycode' + iSeqRow).bind('blur', function() { sc_form_creditcards_securitycode_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_creditcards_securitycode_onfocus(this, iSeqRow) });
  $('#id_sc_field_address1' + iSeqRow).bind('blur', function() { sc_form_creditcards_address1_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_creditcards_address1_onfocus(this, iSeqRow) });
  $('#id_sc_field_address2' + iSeqRow).bind('blur', function() { sc_form_creditcards_address2_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_creditcards_address2_onfocus(this, iSeqRow) });
  $('#id_sc_field_city' + iSeqRow).bind('blur', function() { sc_form_creditcards_city_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_creditcards_city_onfocus(this, iSeqRow) });
  $('#id_sc_field_state' + iSeqRow).bind('blur', function() { sc_form_creditcards_state_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_creditcards_state_onfocus(this, iSeqRow) });
  $('#id_sc_field_country' + iSeqRow).bind('blur', function() { sc_form_creditcards_country_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_creditcards_country_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_creditcards_country_onfocus(this, iSeqRow) });
  $('#id_sc_field_postalcode' + iSeqRow).bind('blur', function() { sc_form_creditcards_postalcode_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_creditcards_postalcode_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_creditcards_cardtypeid_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_cardtypeid();
  scCssBlur(oThis);
}

function sc_form_creditcards_cardtypeid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_expirationdate_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_expirationdate();
  scCssBlur(oThis);
}

function sc_form_creditcards_expirationdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_cardnumber_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_cardnumber();
  scCssBlur(oThis);
}

function sc_form_creditcards_cardnumber_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_cardholder_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_cardholder();
  scCssBlur(oThis);
}

function sc_form_creditcards_cardholder_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_securitycode_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_securitycode();
  scCssBlur(oThis);
}

function sc_form_creditcards_securitycode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_address1_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_address1();
  scCssBlur(oThis);
}

function sc_form_creditcards_address1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_address2_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_address2();
  scCssBlur(oThis);
}

function sc_form_creditcards_address2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_city_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_city();
  scCssBlur(oThis);
}

function sc_form_creditcards_city_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_state_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_state();
  scCssBlur(oThis);
}

function sc_form_creditcards_state_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_country_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_country();
  scCssBlur(oThis);
}

function sc_form_creditcards_country_onchange(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_refresh_country();
  do_ajax_form_creditcards_mob_event_country_onchange();
}

function sc_form_creditcards_country_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_creditcards_postalcode_onblur(oThis, iSeqRow) {
  do_ajax_form_creditcards_mob_validate_postalcode();
  scCssBlur(oThis);
}

function sc_form_creditcards_postalcode_onfocus(oThis, iSeqRow) {
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
